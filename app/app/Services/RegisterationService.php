<?php

namespace App\Services;

use App\Enums\RegistrationStatus;
use App\Models\Registration;
use App\Models\User;

class RegisterationService
{
    public function saveUserInfo(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'nid' => $data['nid'],
        ]);
    }

    public function createRegisteration(int $userId, int $vachineCenterId): Registration
    {
        // the schedule will be handled with event (RegisteredEvent)
        return Registration::create([
            'user_id' => $userId,
            'vaccine_center_id' => $vachineCenterId,
            'scheduled_date' => null,
        ]);
    }

    public function getUserByNID(string $nid): ?User
    {
        return User::where('nid', $nid)->with('registration','registration.center')->first();
    }

    public function getUserStatus(Registration $registration): RegistrationStatus
    {
        $status = $registration->status;

        if($status === RegistrationStatus::SCHEDULED->value && $registration->scheduled_date < now()->subDay(1)){
            return RegistrationStatus::VACCINATED;
        }

        return RegistrationStatus::tryFrom($status);
    }
}
