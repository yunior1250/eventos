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
        // Crear la categoría sin pasarle un ID explícito (el ID es auto-generado por la DB)
        $categoryName = new CategoryName($request->name);  // Creamos un valor objeto para el nombre de la categoría
        $category = new Category(null, $categoryName, $request->description); // ID es null porque se generará automáticamente

        // Ejecutar la creación de la categoría pasando la entidad completa
        $createdCategory = $this->crearCategoria->execute($category);

        return response()->json(['message' => 'Category created successfully', 'category' => $createdCategory], 201);
    }

    public function show($id)
    {
        $category = $this->categoryRepository->getById($id);
        if ($category === null) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category);
    }
}
