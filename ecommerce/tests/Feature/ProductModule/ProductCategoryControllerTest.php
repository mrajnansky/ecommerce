<?php

namespace Tests\Feature\ProductModule;

use App\Models\ProductModule\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    public function testStore(){
        $productCategory = ProductCategory::factory()->makeOne();
        $response = $this->postJson('api/v1/products/categories', [
            'code' => $productCategory->code,
            'name' => $productCategory->name,
            'description' => $productCategory->description,
            'product_category_id' => $productCategory->product_category_id,
            'show' => $productCategory->show,
        ]);
        $response->assertCreated();
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
        $originalProductCategory = ProductCategory::factory()->create();
        $productCategory = ProductCategory::factory()->makeOne();
        $response = $this->putJson("api/v1/products/categories/{$originalProductCategory->id}", [
            'code' => $productCategory->code,
            'name' => $productCategory->name,
            'description' => $productCategory->description,
            'product_category_id' => $productCategory->product_category_id,
            'show' => $productCategory->show,
        ]);

        $response->assertOk();

        $originalProductCategory->refresh();
        $this->assertEquals($productCategory->name, $originalProductCategory->name);
        $this->assertEquals($productCategory->code, $originalProductCategory->code);
    }

    public function testDestroy(){
        $productCategory = ProductCategory::factory()->create();
        $productCategoryId = $productCategory->id;
        $response = $this->deleteJson("api/v1/products/categories/{$productCategoryId}");
        $response->assertOk();

        $response = $this->getJson("api/v1/products/categories/{$productCategoryId}");
        $response->assertNotFound();
    }

}
