<?php

namespace App\Enums;

enum NotificationType: int
{
    case EMAIL = 1;
    case SMS = 2;
}
