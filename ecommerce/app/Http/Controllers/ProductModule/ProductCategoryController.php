<?php

namespace App\Http\Controllers\ProductModule;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductModule\ProductCategoryRequest;
use App\Http\Resources\ProductModule\ProductCategoryResource;
use App\Models\ProductModule\ProductCategory;
use App\Services\ProductModule\ProductCategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Unlu\Laravel\Api\QueryBuilder;

class ProductCategoryController extends Controller
{
    private $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProductCategoryRequest $request)
    {
        $queryBuilder = new QueryBuilder(new ProductCategory, $request);
        return response()->json($queryBuilder->build()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ProductCategoryResource
     */
    public function store(ProductCategoryRequest $request)
    {
        $fields = $request->validated();
        $productCategory = $this->productCategoryService->make($fields);
        return new ProductCategoryResource($productCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return ProductCategoryResource
     */
    public function show(ProductCategoryRequest $request, $id)
    {
        $request->validated();
        $productCategory = $this->productCategoryService->get($id);
        return new ProductCategoryResource($productCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return ProductCategoryResource
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        $fields = $request->validated();
        $productCategory = $this->productCategoryService->update($id, $fields);
        return new ProductCategoryResource($productCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return Response
     */
    public function destroy(ProductCategoryRequest $request, $id)
    {
        $request->validated();
        return $this->productCategoryService->delete($id);
    }
}
