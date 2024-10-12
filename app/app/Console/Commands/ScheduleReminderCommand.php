<?php

namespace App\Console\Commands;

use App\Enums\RegistrationStatus;
use App\Jobs\ProcessScheduleReminderJob;
use App\Models\Registration;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class ScheduleReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:schedule-reminder-notification';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Sends reminder notifications to users who have vaccination schedules for the next day';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $regIds = Registration::whereDate('scheduled_date', now()->addDay()->toDateString())
            ->where('status', RegistrationStatus::SCHEDULED)
            ->pluck('id');

        $this->info('Found ' . $regIds->count() . ' scheduled registrations for tomorrow.');

        // Handle chunking to avoid memory issues (chunked at 100 records per job)
        $regIds->chunk(100)->each(function (Collection $chunk) {
            ProcessScheduleReminderJob::dispatch($chunk);
        });

        // Output message indicating the reminder job dispatch
        $this->info('Reminder notifications have been scheduled for processing.');
    }
}
