<?php

namespace Tests\Feature\ProductModule;

use App\Models\ProductModule\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testIndex()
    {
        $response = $this->getJson('api/v1/products/categories');
        $response->assertOk();
        $this->assertEquals(0, count(json_decode($response->getContent())->data));
        ProductCategory::factory()->count(3)->create();

        $response = $this->getJson('api/v1/products/categories');
        $response->assertOk();
        $this->assertEquals(3, count(json_decode($response->getContent())->data));

        ProductCategory::factory([
            'name' => 'banqueta 3 peldaños',
        ])->create();

        $response = $this->getJson('api/v1/products/categories?name=banqueta 3 peldaños');
        $response->assertOk();
        $this->assertEquals(1, count(json_decode($response->getContent())->data));
    }

    public function testCreate(){
        $this->markTestSkipped();
    }

    public function testGet(){
        $productCategory = ProductCategory::factory()->create();
        $response = $this->getJson("api/v1/products/categories/{$productCategory->id}");
        $response->assertOk();

        $freshProductCategory = json_decode($response->getContent());
        $this->assertEquals($productCategory->name, $freshProductCategory->name);
        $this->assertEquals($productCategory->code, $freshProductCategory->code);
    }

    public function testUpdate(){
        $this->markTestSkipped();
    }

    public function testDestroy(){
        $this->markTestSkipped();
    }

}
