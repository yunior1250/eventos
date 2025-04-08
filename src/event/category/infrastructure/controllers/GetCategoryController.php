<?php

namespace Src\event\category\infrastructure\controllers;

use  App\Http\Controllers\Controller;
use Src\event\category\application\GetCategoryUseCase;
use Src\event\category\infrastructure\helpers\ResponseHelper;

class GetCategoryController extends Controller
{
    private GetCategoryUseCase $getCategoryUseCase;

    public function __construct(GetCategoryUseCase $getCategoryUseCase)
    {
        $this->getCategoryUseCase = $getCategoryUseCase;
    }

    public function index()
    {
        $categories = $this->getCategoryUseCase->execute();
        return ResponseHelper::success($categories, 'Categories retrieved successfully');
//        $categories = $this->getCategoryUseCase->execute();
//        return response()->json($categories);
    }
}
