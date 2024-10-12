<?php

namespace App\Services;

use App\Models\VaccineCenter;

class VaccineCenterService
{
    public function getVaccineCenters(): \Illuminate\Database\Eloquent\Collection
    {
        return VaccineCenter::select('id','name','location')->get();
    }

}
