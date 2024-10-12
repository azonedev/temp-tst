<?php

namespace App\Jobs;

use App\Mail\ScheduleNotification;
use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

class ProcessScheduleReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3; // Number of retry attempts
    public int $timeout = 120; // Timeout in seconds

    public function __construct(public Collection $regIds)
    {
        //
    }

    public function handle(): void
    {
        $subject = 'Vaccination Schedule Reminder';

        $registrations = Registration::with('user', 'center')->whereIn('id', $this->regIds)->get();

        foreach ($registrations as $registration) {
            try {
                Mail::to($registration->user->email)
                    ->send(new ScheduleNotification($registration->user, $registration->center, Carbon::createFromDate($registration->scheduled_date), $subject));
            } catch (\Exception $e) {
                logger('Failed to send notification to ' . $registration->user->email . ': ' . $e->getMessage());
            }
        }
    }
}
