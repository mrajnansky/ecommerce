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
     * @return Response
     */
    public function store(Request $request)
    {
        abort(501, "Not implemented yet");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProductCategoryResource
     */
    public function show($id)
    {
        $productCategory = $this->productCategoryService->get($id);
        return new ProductCategoryResource($productCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        abort(501, "Not implemented yet");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        abort(501, "Not implemented yet");
    }
}
