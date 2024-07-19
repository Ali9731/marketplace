<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VendorDelaysResource;
use App\Repositories\Vendor\VendorRepositoryInterface;

class VendorController extends Controller
{
    public function __construct(protected VendorRepositoryInterface $vendorRepository) {}

    public function vendorDelays()
    {
        return response()->json(VendorDelaysResource::collection($this->vendorRepository->mostDelayedVendors(7)));
    }
}
