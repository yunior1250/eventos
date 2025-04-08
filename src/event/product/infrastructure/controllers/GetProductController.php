<?php

namespace Src\event\product\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Src\event\category\infrastructure\controllers\GetCategoryController;
use Src\event\category\infrastructure\helpers\ResponseHelper;
use Src\event\product\application\GetProductUseCase;

class GetProductController extends Controller
{
    private GetProductUseCase   $getProductUseCase ;

    public function __construct(GetProductUseCase $getProductUseCase)
    {
        $this->getProductUseCase = $getProductUseCase;
    }

    public function index()
    {
        $products = $this->getProductUseCase->execute();
        return ResponseHelper::success($products, 'Products retrieved successfully');
    }

}
