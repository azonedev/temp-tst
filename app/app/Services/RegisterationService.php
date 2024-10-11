<?php

namespace App\Services;

use App\Events\RegisteredEvent;
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
        return Registration::create([
            'user_id' => $userId,
            'vaccine_center_id' => $vachineCenterId,
        ]);
    }
}
