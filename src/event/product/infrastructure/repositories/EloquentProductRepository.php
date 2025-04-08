<?php
namespace  Src\event\product\infrastructure\repositories;

use Illuminate\Support\Facades\DB;
use Src\event\category\domain\contracts\CategoryRepositoryInterface;
use Src\event\product\domain\contracts\ProductRepositoryInterface;
use App\Models\Product as EloquentProduct;
use Src\event\product\domain\entities\Product;
use Src\event\product\domain\value_objects\ProductDescription;
use Src\event\product\domain\value_objects\ProductName;
use Src\event\product\domain\value_objects\ProductPrice;
use Src\event\product\domain\value_objects\ProductStock;
use Src\event\product\domain\value_objects\ProductImage;
class  EloquentProductRepository implements ProductRepositoryInterface
{
    public function create(Product $product): Product
    {
        $productModel = EloquentProduct::create([
            'name' => $product->getName()->getValue(),
            'description' => $product->getDescription()->getValue(),
            'price' => $product->getPrice()->getValue(),
            'stock' => $product->getStock()->getValue(),
            'category_id' => $product->getCategoryId(),
            'image' => $product->getImage()->getValue()
        ]);

        return new Product(
            $productModel->id,
            new ProductName($productModel->name),
            new ProductDescription($productModel->description),
            new ProductPrice($productModel->price),
            new ProductStock($productModel->stock),
            $productModel->category_id,
            new ProductImage($productModel->image)
        );

    }
    public function update(Product $product): Product
    {
        $productModel = EloquentProduct::findOrFail($product->getId());
        $productModel->update([
            'name' => $product->getName()->getValue(),
            'description' => $product->getDescription()->getValue(),
            'price' => $product->getPrice()->getValue(),
            'stock' => $product->getStock()->getValue(),
            'category_id' => $product->getCategoryId(),
            'image' => $product->getImage()->getValue()

        ]);

        return new Product(
            $productModel->id,
            new ProductName($productModel->name),
            new ProductDescription($productModel->description),
            new ProductPrice($productModel->price),
            new ProductStock($productModel->stock),
            $productModel->category_id,
            new ProductImage($productModel->image)
        );

    }
    public function delete(int $id): bool
    {
        return EloquentProduct::destroy($id) > 0;
    }
    public function findById(int $id): ?Product
    {
        $productModel = EloquentProduct::find($id);
        return $productModel ? new Product(
            $productModel->id,
            new ProductName($productModel->name),
            new ProductDescription($productModel->description),
            new ProductPrice($productModel->price),
            new ProductStock($productModel->stock),
            $productModel->category_id,
            new ProductImage($productModel->image)
        ) : null;
    }
    public function getAll(): array
    {
        $products = EloquentProduct::all();

        return $products->map(function ($product) {
            return new Product(
                $product->id,
                new ProductName($product->name),
                new ProductDescription($product->description),
                new ProductPrice($product->price),
                new ProductStock($product->stock),
                $product->category_id,
                new ProductImage($product->image)
            );
        })->toArray();
    }
    public function getById(int $id): ?Product
    {
        return $this->findById($id);
    }
}
