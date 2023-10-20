<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\TeamMember
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property string|null $email
 * @property string|null $position
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ToDo> $todos
 * @property-read int|null $todos_count
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TeamMember extends Model
{

    protected $connection = 'mysql_2';
    protected $guarded = [];

    use HasFactory;

    public function todos(): MorphMany
    {
        return $this->morphMany(ToDo::class, 'assignable');
    }
}
