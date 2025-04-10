<?php

namespace Src\event\product\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\event\category\infrastructure\helpers\ResponseHelper;
use Src\event\product\application\UpdateProductUseCase;
use Src\event\product\domain\contracts\ProductRepositoryInterface;
use Src\event\product\domain\entities\Product;
use Src\event\product\domain\value_objects\ProductDescription;
use Src\event\product\domain\value_objects\ProductImage;
use Src\event\product\domain\value_objects\ProductName;
use Src\event\product\domain\value_objects\ProductPrice;
use Src\event\product\domain\value_objects\ProductStock;

class UpdateProductController extends Controller
{
    private UpdateProductUseCase $updateProductUseCase;

    public function __construct(UpdateProductUseCase $updateProductUseCase)
    {
        $this->updateProductUseCase = $updateProductUseCase;
    }


    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Procesar la imagen si existe
        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        $productName = new ProductName($request->name);
        $productDescription = new ProductDescription($request->description);
        $productPrice = new ProductPrice($request->price);
        $productStock = new ProductStock($request->stock);

        // Si no hay imagen, crea un objeto ProductImage con un valor predeterminado
        $productImage = $imagePath ? new ProductImage($imagePath) : new ProductImage('default/image/path.jpg');

        $product = new Product(
            $id,
            $productName,
            $productDescription,
            $productPrice,
            $productStock,
            $request->category_id,
            $productImage
        );

        try {
            $updatedProduct = $this->updateProductUseCase->execute($product);
            return ResponseHelper::success($updatedProduct , 'Product updated successfully', 200);
        } catch (\Exception $e) {
            return ResponseHelper::error($e);
        }
    }
}
