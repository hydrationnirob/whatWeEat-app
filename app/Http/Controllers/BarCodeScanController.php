<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BarCodeScanController extends Controller
{
   /**
     * Display a specific product by bar_code.
     */
    public function showByBarCode(Request $request)
    {
        try {
            // Validate that bar_code is provided
            $request->validate([
                'bar_code' => 'required|string'
            ]);

            // Fetch product by bar_code
            $product = Product::with([
                'country:id,name',
                'category:id,name',
                'nutrition:id,product_id,calories,fat,protein,carbohydrates',
                'brand:id,name'
            ])
            ->select(
                'id',
                'name',
                'display_name',
                'bar_code',
                'description',
                'price',
                'image_url',
                'ingredients',
                'category_id',
                'country_id',
                'brand_id'
            )
            ->where('bar_code', $request->bar_code)
            ->first();

            if (!$product) {
                return response()->json(['message' => 'Product not found ' ], 404);
            }

            $product = [
                'id' => $product->id,
                'name' => $product->name,
                'display_name' => $product->display_name,
                'bar_code' => $product->bar_code,
                'description' => $product->description,
                'price' => $product->price,
                'image_url' => $product->image_url,
                'ingredients' => $product->ingredients,
                'category_id' => $product->category_id,
                'category_name' => $product->category->name ?? null,
                'country_name' => $product->country->name ?? null,
                'brand_name' => $product->brand->name ?? null,
                'nutrition' => [
                    'calories' => $product->nutrition->calories ?? null,
                    'fat' => $product->nutrition->fat ?? null,
                    'protein' => $product->nutrition->protein ?? null,
                    'carbohydrates' => $product->nutrition->carbohydrates ?? null,
                ],
            ];

            return response()->json([
                'message' => 'Product retrieved successfully',
                'product' => $product,
            ]);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
