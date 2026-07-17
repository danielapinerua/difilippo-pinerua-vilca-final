<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    /**
     * Get the cart array from session.
     *
     * @return array
     */
    protected function getCartData(): array
    {
        return session()->get('cart', []);
    }

    /**
     * Save the cart array to session.
     *
     * @param array $cart
     * @return void
     */
    protected function saveCartData(array $cart): void
    {
        session()->put('cart', $cart);
    }

    /**
     * Add a product to the cart.
     *
     * @param Product $product
     * @param int $quantity
     * @return void
     */
    public function add(Product $product, int $quantity = 1)
    {
        $cart = $this->getCartData();
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'quantity' => $quantity,
            ];
        }

        $this->saveCartData($cart);
    }

    /**
     * Increment the quantity of a product in the cart.
     *
     * @param Product $product
     * @return void
     */
    public function increment(Product $product)
    {
        $this->add($product, 1);
    }

    /**
     * Decrement the quantity of a product in the cart.
     *
     * @param Product $product
     * @return void
     */
    public function decrement(Product $product)
    {
        $cart = $this->getCartData();
        $id = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;

            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }

            $this->saveCartData($cart);
        }
    }

    /**
     * Remove a product from the cart completely.
     *
     * @param Product $product
     * @return void
     */
    public function remove(Product $product)
    {
        $cart = $this->getCartData();
        $id = $product->id;

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $this->saveCartData($cart);
        }
    }

    /**
     * Get the cart items hydrated with Product models.
     *
     * @return array
     */
    public function getCart()
    {
        $cart = $this->getCartData();
        
        if (empty($cart)) {
            return [
                'items' => [],
                'total' => 0,
            ];
        }

        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $items = [];
        $total = 0;

        foreach ($cart as $id => $details) {
            if ($products->has($id)) {
                $product = $products->get($id);
                $quantity = $details['quantity'];
                $subtotal = $product->price * $quantity;
                
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ];

                $total += $subtotal;
            }
        }

        return [
            'items' => $items,
            'total' => $total,
        ];
    }
}
