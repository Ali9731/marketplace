<?php

namespace App\Repositories\Vendor;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VendorRepository implements VendorRepositoryInterface
{
    public function mostDelayedVendors($days)
    {
        return DB::table('vendors as v')
            ->selectRaw('v.*, sum(d.estimated_time) as delays')
            ->join('orders as o', 'v.id', '=', 'o.vendor_id')
            ->join('delay_reports as d', 'o.id', '=', 'd.order_id')
            ->where('d.created_at', '>', Carbon::now()->subDays($days))
            ->whereNot('d.estimated_time', null)
            ->groupBy('o.vendor_id')
            ->orderBy('delays', 'desc')
            ->get();
    }
}
