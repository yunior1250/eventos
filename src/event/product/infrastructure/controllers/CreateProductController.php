<?php

namespace Src\event\product\infrastructure\controllers;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use Src\event\category\infrastructure\helpers\ResponseHelper;
use Src\event\product\application\CreateProductUseCase;
use Src\event\product\domain\value_objects\ProductDescription;
use Src\event\product\domain\value_objects\ProductName;
use Src\event\product\domain\value_objects\ProductPrice;
use Src\event\product\domain\value_objects\ProductStock;

class CreateProductController extends Controller
{
    private CreateProductUseCase $createProductUseCase;

    public function __construct(CreateProductUseCase $createProductUseCase)
    {
        $this->createProductUseCase = $createProductUseCase;

    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data['image'] = $request->file('image')->store('images', 'public');

        $product = new Product($data);
        $createdProduct = $this->createProductUseCase->execute($product);

        return ResponseHelper::success($createdProduct, 'Product created successfully', 201);
    }




//    public function store(Request $request)
//    {
//        $productName = new ProductName($request->name);
//        $productDescription = new ProductDescription($request->description);
//        $productPrice = new ProductPrice($request->price);
//        $productStock = new ProductStock($request->stock ?? 0); // Usamos 0 si no se pasó stock
//        $productImage = $request->file('image')->store('images', 'public'); // Ruta de la imagen
//        $categoryId = $request->category_id;
//
//        $product = new Product(null,
//            $productName,
//            $productDescription,
//            $productPrice,
//            $productStock,
//            $categoryId,
//            $productImage
//        );
//        $createdProduct = $this->createProductUseCase->execute($product);
//        return ResponseHelper::success($createdProduct, 'Product created successfully', 201);
//    }
//    public function store(Request $request)
//    {
//        $data = $request->validate([
//            'name' => 'required|string|max:255',
//            'description' => 'required|string|max:1000',
//            'price' => 'required|numeric|min:0',
//            'category_id' => 'required|integer|exists:categories,id',
//            'stock' => 'required|integer|min:0',
//            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
//        ]);
//        $imagePath = null;
//        if ($request->hasFile('image')&& $request->file('image')->isValid()) {
//            $imagePath = $request->file('image')->store('images', 'public');
//        }
//        $data['image'] = $imagePath;
//
//        $product = $this->createProductUseCase->execute($data);
//
//        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
//
//    }
}
