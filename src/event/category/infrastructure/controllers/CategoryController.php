<?php
namespace  Src\event\category\infrastructure\controllers;
use App\Http\Controllers\Controller;
use  Illuminate\Http\Request;
use Src\event\category\domain\entities\Category;
use Src\event\category\domain\contracts\CategoryRepositoryInterface;
use Src\event\category\domain\value_objects\CategoryName;
use Src\event\category\infrastructure\repositories\EloquentCategoryRepository;
use Src\event\category\application\CreateCategory;


class CategoryController extends Controller
{
    private CreateCategory $crearCategoria;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CreateCategory $crearCategoria, CategoryRepositoryInterface $categoryRepository)
    {
        $this->crearCategoria = $crearCategoria;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $categoryName = new CategoryName($request->name);
        $category = new Category(null, $categoryName, $request->description);

        $createdCategory = $this->crearCategoria->execute($category);

        return response()->json(['message' => 'Category created successfullysss', 'category' => $createdCategory], 201);

    }

    public function show($id)
    {
        $category = $this->categoryRepository->getById($id);
        if ($category === null) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category);
    }
    public function getAll(): array
    {
        $categories = EloquentCategory::all(); // Obtiene todas las categorías
        return $categories->map(function ($category) {
            return new Category($category->id, new CategoryName($category->name), $category->description);
        })->toArray();
    }
    public function destroy(int $id)
    {
        $category = $this->categoryRepository->getById($id);
        if ($category === null) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        $this->categoryRepository->delete($id);
        return response()->json(['message' => 'Category deleted successfully']);
    }

}
