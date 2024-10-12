<?php

namespace App\Listeners;

use App\Enums\RegistrationStatus;
use App\Events\RegisteredEvent;
use App\Mail\ScheduleNotification;
use App\Models\Registration;
use App\Models\VaccineCenter;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AssignVaccineScheduleListener implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3; // Number of retry attempts
    public int $timeout = 120; // timeout in 2 minutes

    /**
     * Handle the event.
     */
    public function handle(RegisteredEvent $event): void
    {
        $user = $event->user;
        $registration = $event->registration;
        $vaccineCenter = VaccineCenter::find($registration->vaccine_center_id);

        $nextAvailableDate = $this->calculateNextAvailableDate($vaccineCenter);

        $registration->update([
            'scheduled_date' => $nextAvailableDate,
            'status' => RegistrationStatus::SCHEDULED,
        ]);

        logger('Registration updated', $registration->toArray());

        Mail::to($user->email)->send(new ScheduleNotification($user, $vaccineCenter, $nextAvailableDate));
    }

    private function calculateNextAvailableDate(VaccineCenter $vaccineCenter): Carbon
    {
        $currentDate = Carbon::now();

        do {
            // skip weekend (friday, saturday)
            if ($currentDate->isFriday()) {
                $currentDate = $currentDate->next('Sunday');
            }

            if ($currentDate->isSaturday()) {
                $currentDate = $currentDate->next('Sunday');
            }

            // Check scheduled registrations for the current date
            $scheduledCount = Registration::where('vaccine_center_id', $vaccineCenter->id)
                ->whereDate('scheduled_date', $currentDate->toDateString())
                ->count();

            if ($scheduledCount < $vaccineCenter->daily_capacity) {
                break;
            }

            $currentDate = $currentDate->addDay();

        } while (true);

        return $currentDate;
    }
}
