<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TripStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TripStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TripStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|TripStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TripStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TripStatus whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class TripStatus extends Model
{
    use HasFactory;

    const STATUS_ASSIGNED = 1;

    const STATUS_AT_VENDOR = 2;

    const STATUS_PICKED = 3;

    const STATUS_DELIVERED = 4;

    protected $fillable = [
        'id',
        'name',
        'persian_name',
    ];
}
