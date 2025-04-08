<?php

namespace Src\event\category\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Src\event\category\application\DeleteCategoryUseCase;
use Src\event\category\infrastructure\helpers\ResponseHelper;


class DeleteCategoryController extends Controller
{
    private DeleteCategoryUseCase $deleteCategoryUseCase;

    public function __construct(DeleteCategoryUseCase $deleteCategoryUseCase)
    {
        $this->deleteCategoryUseCase = $deleteCategoryUseCase;
    }

    public function delete(int $id)
    {
        $this->deleteCategoryUseCase->execute($id);
        return ResponseHelper::success(null, 'Category deleted successfully');

    }

}
