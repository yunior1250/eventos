<?php

namespace Src\event\product\infrastructure\controllers;

use App\Http\Controllers\Controller;
use Src\event\category\infrastructure\helpers\ResponseHelper;
use Src\event\product\application\DeleteProductUseCase;

class DeleteProductController extends Controller
{
    private DeleteProductUseCase $deleteProductUseCase;

    public function __construct(DeleteProductUseCase $deleteProductUseCase)
    {
        $this->deleteProductUseCase = $deleteProductUseCase;
    }

    public function delete(int $id)
    {
        $this->deleteProductUseCase->execute($id);
        return ResponseHelper::success(null, 'Product deleted successfully', 200);
    }


}
