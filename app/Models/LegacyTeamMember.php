<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LegacyTeamMember
 *
 * @property int $id
 * @property string $Vorname
 * @property string $Nachname
 * @property string $E-Mail
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyTeamMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyTeamMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyTeamMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyTeamMember whereEMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyTeamMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyTeamMember whereNachname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LegacyTeamMember whereVorname($value)
 * @mixin \Eloquent
 */
class LegacyTeamMember extends Model
{
    protected $connection = 'mysql_2';
    protected $table = 'legacy_team_member';
    use HasFactory;
}
