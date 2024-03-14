<?php

namespace App\Http\Controllers\Products;

use App\Builder\ReturnApi;
use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductsController\StoreRequest;
use App\Services\Product\ProductService;

class ProductsController extends Controller
{
    protected $productService;


    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function store(StoreRequest $request)
    {
        try {

            $data = $this->productService->store($request->validated());

            return ReturnApi::success(
                $data,
                "Produto criado com sucesso!"
            );
        } catch (\Throwable $e) {
            info($e);
            throw new ApiException("Erro ao criar produto");
        }
    }
}
