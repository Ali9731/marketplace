<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Order extends Model
{
    use HasFactory,SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function delayReports()
    {
        return $this->hasMany(DelayReport::class);
    }

    public function activeDelayReports()
    {
        return $this->delayReports()->whereIn('delay_report_status_id', [DelayReportStatus::STATUS_PENDING, DelayReportStatus::STATUS_IN_PROGRESS]);
    }
}
