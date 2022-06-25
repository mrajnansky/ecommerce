<?php

namespace App\Http\Controllers\ProductModule;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductModule\ProductRequest;
use App\Http\Resources\ProductModule\ProductResource;
use App\Models\ProductModule\Product;
use App\Services\ProductModule\ProductService;
use Illuminate\Http\Request;
use Unlu\Laravel\Api\QueryBuilder;

class ProductController extends Controller
{
    private $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductRequest $request)
    {
        $queryBuilder = new QueryBuilder(new Product, $request);
        return response()->json($queryBuilder->build()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return ProductResource
     */
    public function store(ProductRequest $request)
    {
        $fields = $request->validated();
        $product = $this->productService->make($fields);
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param ProductRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRequest $request, $id)
    {
        $request->validated();
        $product = $this->productService->get($id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $fields = $request->validated();
        $product = $this->productService->update($id, $fields);
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRequest $request, $id)
    {
        $request->validated();
        return $this->productService->delete($id);
    }
}
