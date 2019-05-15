<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anybody_can_get_product_list()
    {
        $products = factory(Product::class, 3)->create();
        $response = $this->getJson(route('product.index'));
        $response->assertStatus(200);
        $response->assertJson(['meta' => ['total' => 3], 'data' => $products->toArray()]);
    }

    /** @test */
    public function anybody_can_get_product_details()
    {
        $product = factory(Product::class)->create();
        $response = $this->getJson(route('product.show', $product));
        $response->assertStatus(200);
        $response->assertJson(['data' => $product->toArray()]);
    }
}
