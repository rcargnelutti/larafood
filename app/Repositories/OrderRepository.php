<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenantId,
        string $comment = '',
        $clientId = '',
        $tableId = ''
    ){
        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'comment' => $comment,
            'tenant_id' => $tenantId,
        ];
        if ($clientId) $data['client_id'] = $clientId;
        if ($tableId) $data['table_id'] = $tableId;
        //dd($data);
        $order = $this->entity->create($data);
        return $order;
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }

    public function registerProductsOrder(int $orderId, array $products)
    {
        // utilizando o eloquent
        $order = $this->entity->find($orderId);

        $orderProducts = [];

        foreach ($products as $product) {
            $orderProducts[$product['id']] = [
                'qty' => $product['qty'],
                'price' => $product['price'],
            ];
        }
        $order->products()->attach($orderProducts);

        // //utilizando query builder
        // foreach ($products as $product) {
        //     array_push($orderProducts, [
        //         'order_id' => $orderId,
        //         'product_id' => $product['id'],
        //         'qty' => $product['qty'],
        //         'price' => $product['price'],
        //     ]);
        // }
        // DB::table('order_product')->insert($orderProducts);
    }

    public function getOrdersByClientId(int $idClient)
    {
        $orders = $this->entity->where('client_id', $idClient)->paginate();

        return $orders;
    }

}
