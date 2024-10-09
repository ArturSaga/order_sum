<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function processOrder($orderId)
    {
        $order = Order::with('products')->find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $orderDetails = [];
        $totalAmount = 0;

        foreach ($order->products as $product) {
            $discountedPrice = $product->price * (1 - $product->discount / 100);
            $totalAmount += $discountedPrice;

            $orderDetails[] = [
                'name' => $product->name,
                'price' => $product->price,
                'discount' => $product->discount,
                'total_after_discount' => $discountedPrice,
            ];
        }

        return response()->json([
            'order_id' => $order->id,
            'total_amount' => $totalAmount,
            'products' => $orderDetails,
        ]);
    }
}
