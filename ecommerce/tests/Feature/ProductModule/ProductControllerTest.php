<?php

namespace Tests\Feature\ProductModule;

use App\Models\ProductModule\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        Sanctum::actingAs(
            $user
        );
    }

    public function testIndex()
    {
        $response = $this->getJson('api/v1/products');
        $response->assertOk();
        $this->assertEquals(0, count(json_decode($response->getContent())->data));

        Product::factory()->count(10)->create();
        $response = $this->getJson('api/v1/products');
        $response->assertOk();
        $this->assertEquals(10, count(json_decode($response->getContent())->data));

        Product::factory([
            'name' => 'banqueta',
        ])->create();

        $response = $this->getJson('api/v1/products?name=banqueta');
        $response->assertOk();
        $this->assertEquals(1, count(json_decode($response->getContent())->data));
    }

    public function testStore()
    {
        $product = Product::factory()->makeOne();
        $response = $this->postJson('api/v1/products/categories', [
            'code' => $product->code,
            'name' => $product->name,
            'stock' => $product->stock,
            'price' => $product->price,
            'description' => $product->description,
            'show' => $product->show,
        ]);
        $response->assertCreated();
    }

    public function testShow()
    {
        $product = Product::factory()->create();
        $response = $this->getJson("api/v1/products/{$product->id}");
        $response->assertOk();

        $freshProduct = json_decode($response->getContent());
        $this->assertEquals($product->name, $freshProduct->name);
        $this->assertEquals($product->code, $freshProduct->code);
        $this->assertEquals($product->description, $freshProduct->description);
        $this->assertEquals($product->price, $freshProduct->price);

    }

    public function testUpdate()
    {
        $originalProduct = Product::factory()->create();
        $product = Product::factory()->makeOne();
        $response = $this->putJson("api/v1/products/{$originalProduct->id}", [
            'code' => $product->code,
            'name' => $product->name,
            'stock' => $product->stock,
            'price' => $product->price,
            'description' => $product->description,
            'show' => $product->show,
        ]);

        $response->assertOk();

        $originalProduct->refresh();
        $this->assertEquals($product->name, $originalProduct->name);
        $this->assertEquals($product->code, $originalProduct->code);
    }

    public function testDestroy()
    {
        $product = Product::factory()->create();
        $productId = $product->id;
        $response = $this->deleteJson("api/v1/products/{$productId}");
        $response->assertOk();

        $response = $this->getJson("api/v1/products/{$productId}");
        $response->assertNotFound();
    }
}
