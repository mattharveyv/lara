<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_index_page_loads(): void
    {
        Product::factory()->create([
            'name' => 'Mechanical Keyboard',
            'price' => 89.99,
        ]);

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee('Mechanical Keyboard');
    }

    public function test_product_can_be_created(): void
    {
        $response = $this->post('/products', [
            'name' => 'Gaming Monitor',
            'description' => '27 inch 144Hz monitor',
            'price' => 299.99,
            'stock' => 15,
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', [
            'name' => 'Gaming Monitor',
            'price' => 299.99,
        ]);
    }
}
