<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ToDo
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $title
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo query()
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo whereUpdatedAt($value)
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|ToDo whereUserId($value)
 * @property-read \App\Models\User|null $user
 * @mixin \Eloquent
 */
class ToDo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
