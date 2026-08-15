<?php

namespace Tests\Feature;

use Tests\TestCase;

class StorefrontTest extends TestCase
{
    public function test_home_page_loads_and_displays_products(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Wireless Headphones');
        $response->assertSee('Shop the Latest Deals');
    }

    public function test_contact_page_loads_and_has_route(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Contact Us');
        $response->assertSee('Send us a Message');
    }

    public function test_home_page_has_cart_button(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Cart');
        $response->assertSee('Add to Cart');
    }

    public function test_cart_tracks_products_and_checkout_has_payment_options(): void
    {
        $response = $this->post('/cart/add', [
            'name' => 'Smartphone',
            'price' => 249,
            'quantity' => 1,
        ]);

        $response->assertRedirect('/cart');

        $cart = $this->get('/cart');
        $cart->assertStatus(200);
        $cart->assertSee('Smartphone');
        $cart->assertSee('Mode of Payment');
        $cart->assertSee('GCash');
    }

    public function test_home_page_displays_more_products(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Mouse');
        $response->assertSee('Keyboard');
        $response->assertSee('Monitor');
    }

    public function test_order_history_page_renders_recent_orders(): void
    {
        $this->post('/checkout', [
            'name' => 'Maria Santos',
            'phone' => '09123456789',
            'address' => 'Quezon City',
            'payment' => 'Cash on Delivery',
            'items' => [
                ['name' => 'Wireless Headphones', 'quantity' => 1, 'price' => 79],
            ],
        ]);

        $response = $this->get('/orders');

        $response->assertStatus(200);
        $response->assertSee('Order History');
        $response->assertSee('Wireless Headphones');
    }
}
