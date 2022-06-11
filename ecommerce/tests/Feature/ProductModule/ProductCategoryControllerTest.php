<?php

namespace Tests\Feature\ProductModule;

use App\Models\ProductModule\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCategoryControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->getJson('api/v1/products/categories');
        $response->assertOk();
        $response->assertJsonCount(0);

        ProductCategory::factory()->count(3)->create();

        $response = $this->getJson('api/v1/products/categories');
        $response->assertOk();
        $response->assertJsonCount(3);
    }
}
