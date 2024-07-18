<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReportStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReportStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReportStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReportStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReportStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReportStatus whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class DelayReportStatus extends Model
{
    use HasFactory;

    const STATUS_PENDING = 1;

    const STATUS_IN_PROGRESS = 2;

    const STATUS_CLOSED = 3;

    const STATUS_NEW_ESTIMATE = 4;
}
