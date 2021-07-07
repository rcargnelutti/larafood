<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrder;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use App\Services\OrderSevice;

class OrderApiController extends Controller
{
    protected $orderService;

    public function __construct(OrderSevice $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store (StoreOrder $request)
    {
        $order = $this->orderService->createNewOrder($request->all());

        return new OrderResource($order);
    }
}
