<?php

namespace App\DTO;

use App\Enums\RegistrationStatus;

class SearchResultDTO
{
    public function __construct(
        public RegistrationStatus $status,
        public string $nid,
        public ?string $name,
        public ?string $center,
        public ?string $location,
        public ?string $scheduledDate,
    ) {
    }

    public function toArray(): array
    {
        return [
            'status' => $this->status,
            'nid' => $this->nid,
            'name' => $this->name ?? null,
            'center' => $this->center ?? null,
            'location' => $this->location ?? null,
            'scheduleDate' => $this->scheduledDate ?? null,
        ];
    }


}
