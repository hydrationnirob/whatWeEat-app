<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::with([
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
                ->get();
    
            if ($products->isEmpty()) {
                return response()->json(['message' => 'No products found'], 404);
            }
    
            $products = $products->map(function ($product) {
                return [
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
            });
    
            return response()->json([
                'message' => 'Products retrieved successfully',
                 'total' => $products->count(),
                'products' => $products,
            ]);
    
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request)
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string',
                'display_name' => 'required|string',
                'bar_code' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|string',
                'image_url' => 'required|string',
                'ingredients' => 'required|string',
                'Category_id' => 'required|integer',
                'country_id' => 'required|integer',
                'brand_id' => 'required|integer',
                
            ]);

            $product = new Product();
            $product->name = $request->name;
            $product->display_name = $request->display_name;
            $product->bar_code = $request->bar_code;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->image_url = $request->image_url;
            $product->ingredients = $request->ingredients;
            $product->Category_id = $request->Category_id;
           
            $product->country_id = $request->country_id;
            $product->brand_id = $request->brand_id;

            //if bar code is already in the database 

            $product = Product::where('bar_code', $request->bar_code)->first();

            if ($product) {
                return response()->json(['message' => 'Product already exists'], 409);
            }

            $product->save();

            return response()->json([
                'message' => 'Product created successfully',
                'product' => $request->all(),
            ]);
    
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        

        try {
            $products = Product::with([
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
                ->where('category_id', $id)
                ->get();
    
            if ($products->isEmpty()) {
                return response()->json(['message' => 'No products found'], 404);
            }
    
            $products = $products->map(function ($product) {
                return [
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
            });
    
            return response()->json([
                'message' => 'Products retrieved successfully',
                 'total' => $products->count(),
                'products' => $products,
            ]);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

     //how to use this 
        //http:// localhost:8000/api/products/1 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }




}
