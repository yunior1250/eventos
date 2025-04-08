<?php

namespace Src\event\category\infrastructure\controllers;

use App\Http\Controllers\Controller;

final class ExampleGETController extends Controller {

 public function index() {

    return response()->json([
            'message' => 'Hello from ExampleGETController'
        ]);
    }

    public function show($id) {
        return response()->json([
            'message' => 'Hello from ExampleGETController',
            'id' => $id
        ]);
 }
}
