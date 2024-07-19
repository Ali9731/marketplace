<?php

namespace App\Repositories\Order;

use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function find($id)
    {
        return Order::findOrFail($id);
    }
}
