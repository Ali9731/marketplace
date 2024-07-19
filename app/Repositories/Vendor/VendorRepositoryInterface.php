<?php

namespace App\Repositories\Vendor;

interface VendorRepositoryInterface
{
    public function mostDelayedVendors($days);
}
