<?php

namespace App\Enums;

enum CTFStatus: string
{
    case FINISHED = 'finished';
    case RUNNING  = 'running';
    case UPCOMING = 'upcoming';

    public function isUpcoming(): bool
    {
        return $this === self::UPCOMING;
    }
}
