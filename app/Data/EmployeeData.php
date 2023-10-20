<?php

namespace App\Data;

use App\Models\LegacyTeamMember;
use App\Models\TeamMember;
use App\Models\User;
use Spatie\LaravelData\Data;

class EmployeeData extends Data
{


    public function __construct(
        public string  $name,
        public string  $mail,
        public ?string $position
    )
    {
    }

    public static function fromModel(User|TeamMember|LegacyTeamMember $user): self
    {
        return match (get_class($user)) {
            User::class => new EmployeeData($user->name, $user->email, 'nicht verfügbar'),
            TeamMember::class => new EmployeeData($user->name, $user->email, $user->position),
            LegacyTeamMember::class => new EmployeeData($user->Vorname . ' ' . $user->Nachname, $user->{'E-Mail'}, 'nicht verfügbar'),
            default => null
        };
    }
}
