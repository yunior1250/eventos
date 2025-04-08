<?php

namespace Src\event\category\infrastructure\controllers;

use App\Http\Controllers\Controller;
use  Illuminate\Http\Request;
use Src\event\category\application\CreateCategoryUseCase;
use Src\event\category\domain\entities\Category;
use Src\event\category\domain\contracts\CategoryRepositoryInterface;
use Src\event\category\domain\value_objects\CategoryDescription;
use Src\event\category\domain\value_objects\CategoryName;
use Src\event\category\infrastructure\helpers\ResponseHelper;
use Src\event\category\infrastructure\repositories\EloquentCategoryRepository;
use Src\event\category\application\CreateCategory;

class CreateCategoryController extends Controller

{
    private CreateCategoryUseCase $createCategoryUseCase;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->createCategoryUseCase = new CreateCategoryUseCase($repository);
    }
    public function store(Request $request)
    {
        // Crear los objetos de valor a partir de los datos del request
        $categoryName = new CategoryName($request->name);
        $categoryDescription = new CategoryDescription($request->description); // Aquí se está creando correctamente el objeto

        // Crear la entidad Category
        $category = new Category(null, $categoryName, $categoryDescription);

        // Ejecutar la creación de la categoría usando el caso de uso
        $createdCategory = $this->createCategoryUseCase->execute($category);

      return ResponseHelper::success($createdCategory , 'Category created successfully',201);

    }

}
