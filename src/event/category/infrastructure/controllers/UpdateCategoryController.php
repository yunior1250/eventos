<?php

namespace Src\event\category\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\event\category\application\UpdateCategoryUseCase;
use Src\event\category\domain\entities\Category;
use Src\event\category\domain\value_objects\CategoryDescription;
use Src\event\category\domain\value_objects\CategoryName;
use Src\event\category\infrastructure\helpers\ResponseHelper;

class UpdateCategoryController extends Controller
{
    private UpdateCategoryUseCase $updateCategoryUseCase;

    public function __construct(UpdateCategoryUseCase $updateCategoryUseCase)
    {
        $this->updateCategoryUseCase = $updateCategoryUseCase;
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        $categoryName = new CategoryName($request->name);
        $categoryDescription = new CategoryDescription($request->description);

        $category = new Category($id, $categoryName, $categoryDescription);

        $updatedCategory = $this->updateCategoryUseCase->execute($category);
        return ResponseHelper::success($updatedCategory, 'Category was successfully updated');
    }
}
