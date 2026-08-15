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
}
