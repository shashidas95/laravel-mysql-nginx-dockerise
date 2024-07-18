<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
  public function index(){
    $products = Product::all();
        return response()->json([
            "data" => $products,
        ]);
  }
  
  
  public function store(Request $request, Product $product)
  {
      $validatedData = $request->validate([
          'name' => 'required|string|max:255',
          'price' => 'required|numeric',
          'inventory' => 'required|numeric',
          // Add more validation rules as needed
      ]);
  
      $newProduct = $product->create($validatedData);
  
      return response()->json([
          "data" => $newProduct,
          "message" => "Item created successfully",
      ], Response::HTTP_CREATED);
  }


}
