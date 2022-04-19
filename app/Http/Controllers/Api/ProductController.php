<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::paginate());
    }

    public function order(Request $request, Product $product)
    {
        $user = $request->user();

        $cart = Cart::create(['user_id' => $user->id, 'product_id' => $product->id]);

        return new CartResource($cart);
    }

    public function createOrder(Request $request)
    {
        $user = $request->user();
        $carts = $user->carts;
        $price = 0;
        foreach ($carts as $cart) {
            $price += round($cart->product->price, 1, PHP_ROUND_HALF_UP);
        }

        $order = Order::create([
            'user_id' => $user->id,
            'price'   => $price,
        ]);
        $user->carts()->delete();

        OrderCreated::dispatch($order);
    }
}
