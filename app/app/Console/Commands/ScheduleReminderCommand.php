<?php

namespace App\Console\Commands;

use App\Jobs\ProcessScheduleReminderJob;
use App\Models\Registration;
use Illuminate\Console\Command;

class ScheduleReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:schedule-reminder-notification';

    /**
     * The command will be scheduled to run daily at 9 PM. The command will be responsible for sending a reminder notification to users who have a vaccination schedule for the next day.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Registration::whereDate('scheduled_date', now()->addDay()->toDateString())
            ->pluck('id')
            ->chunk(100, function ($registrationIds) {
                logger('Processing schedule reminder notification', $registrationIds);
                // each chunk will be handled with a job - 100 registrations will be processed in a single job
                ProcessScheduleReminderJob::dispatch($registrationIds);
            });

    }
}
