<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Database\Factories\DelayReportFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DelayReport whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class DelayReport extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'agent_id', 'delay_report_status_id', 'estimated_time'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function status()
    {
        return $this->belongsTo(DelayReportStatus::class);
    }
}
