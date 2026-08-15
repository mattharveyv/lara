<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function welcome()
    {
        $cart = session('cart', []);

        $products = [
            ['name' => 'Wireless Headphones', 'price' => 79, 'icon' => '🎧', 'tag' => 'Audio'],
            ['name' => 'Smart Watch', 'price' => 129, 'icon' => '⌚', 'tag' => 'Wearable'],
            ['name' => 'Smartphone', 'price' => 249, 'icon' => '📱', 'tag' => 'Mobile'],
            ['name' => 'Laptop', 'price' => 699, 'icon' => '💻', 'tag' => 'Laptop'],
            ['name' => 'Wireless Mouse', 'price' => 39, 'icon' => '🖱️', 'tag' => 'Accessory'],
            ['name' => 'Mechanical Keyboard', 'price' => 89, 'icon' => '⌨️', 'tag' => 'Accessory'],
            ['name' => 'Gaming Monitor', 'price' => 299, 'icon' => '🖥️', 'tag' => 'Display'],
            ['name' => 'USB-C Hub', 'price' => 59, 'icon' => '🔌', 'tag' => 'Accessory'],
        ];

        return view('welcome', [
            'title' => 'Shop the Latest Deals',
            'subtitle' => 'Premium gadgets and everyday essentials at unbeatable prices.',
            'cartCount' => count($cart),
            'products' => $products,
        ]);
    }

    public function home()
    {
        return $this->welcome();
    }

    public function about()
    {
        return view('about', [
            'title' => 'About Us',
            'description' => 'We help customers discover quality products at great prices.',
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Contact Us',
            'description' => 'We would love to hear from you about your order or questions.',
        ]);
    }

    public function addToCart(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cart = $request->session()->get('cart', []);

        $found = false;
        foreach ($cart as &$item) {
            if ($item['name'] === $data['name']) {
                $item['quantity'] += $data['quantity'];
                $item['price'] = $data['price'];
                $found = true;
            }
        }

        if (! $found) {
            $cart[] = [
                'name' => $data['name'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
            ];
        }

        $request->session()->put('cart', $cart);

        return redirect('/cart');
    }

    public function cart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('cart', [
            'title' => 'Your Cart',
            'items' => $cart,
            'total' => $total,
            'cartCount' => count($cart),
        ]);
    }

    public function checkout(Request $request)
    {
        $items = $request->input('items', []);

        if (is_string($items)) {
            $items = json_decode($items, true) ?? [];
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string', 'min:5'],
            'payment' => ['required', 'string'],
        ]);

        $items = collect($items)->map(function ($item) {
            return [
                'name' => $item['name'] ?? '',
                'quantity' => (int) ($item['quantity'] ?? 1),
                'price' => (float) ($item['price'] ?? 0),
            ];
        })->all();

        if (empty($items)) {
            $request->validate([
                'items' => ['required', 'array'],
            ]);
        }

        $subtotal = collect($items)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $tax = round($subtotal * 0.12, 2);
        $total = $subtotal + $tax;

        $receipt = [
            'id' => 'INV-' . strtoupper(Str::random(8)),
            'customer' => $validated['name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'payment' => $validated['payment'],
            'items' => $items,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'status' => 'Paid',
        ];

        $history = $request->session()->get('order_history', []);
        $history[] = $receipt;
        $request->session()->put('order_history', $history);
        $request->session()->put('last_receipt', $receipt);
        $request->session()->forget('cart');

        return view('receipt', [
            'receipt' => $receipt,
            'title' => 'Receipt',
        ]);
    }

    public function orders(Request $request)
    {
        $orders = $request->session()->get('order_history', []);

        return view('orders', [
            'title' => 'Order History',
            'orders' => $orders,
        ]);
    }

    public function receipt(Request $request, $id = null)
    {
        $receipt = $request->session()->get('last_receipt');

        if (! $receipt) {
            $receipt = [
                'id' => $id ?? 'INV-00000000',
                'customer' => 'Customer',
                'phone' => 'N/A',
                'address' => 'N/A',
                'payment' => 'Cash on Delivery',
                'items' => [
                    ['name' => 'Sample Product', 'quantity' => 1, 'price' => 0],
                ],
                'subtotal' => 0,
                'tax' => 0,
                'total' => 0,
                'status' => 'Pending',
            ];
        }

        return view('receipt', [
            'receipt' => $receipt,
            'title' => 'Receipt',
        ]);
    }
}
