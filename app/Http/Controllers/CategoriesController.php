<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;

class CategoriesController extends Controller
{
    public function index($id)
    {
        $cate = Category::find($id);
        $idCate = $cate->id;
        $product = Product::where('id_category', $idCate)->get();

        if($product) {
            return response()->json([
                'data' => $product,
            ]);
        }
    }
}
