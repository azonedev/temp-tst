<?php

namespace App\Enums;

enum RegistrationStatus: int
{
    // The statuses can be Not registered, Not scheduled, Scheduled, Vaccinated
    case NOT_REGISTERED = 1;
    case NOT_SCHEDULED = 2;
    case SCHEDULED = 3;
    case VACCINATED = 4;

}
