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
                    "slug",
                    'display_name',
                    'unit_size',
                    'unit_type',
                    'Product_Category',
                    'Product_Sub_Category',
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
                    'slug' => $product->slug,
                    'display_name' => $product->display_name,
                    'unit_size' => $product->unit_size,
                    'unit_type' => $product->unit_type,
                    'Product_Category' => $product->Product_Category,
                    'Product_Sub_Category' => $product->Product_Sub_Category,
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
                'slug' => 'required|string',
                'display_name' => 'required|string',
                'unit_size' => 'required|string',
                'unit_type' => 'required|string',
                'Product_Category' => 'required|string',
                'Product_Sub_Category' => 'required|string',
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
            $product->slug = $request->slug;
            $product->display_name = $request->display_name;
            $product->unit_size = $request->unit_size;
            $product->unit_type = $request->unit_type;
            $product->Product_Category = $request->Product_Category;
            $product->Product_Sub_Category = $request->Product_Sub_Category;
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

     public function show(string $idOrBarcode)
{
    try {
        // Determine if the parameter is a barcode or a category ID
        $isBarcode = preg_match('/^[0-9]{12,13}$/', $idOrBarcode); // Adjust regex based on your barcode format

        // Log what is being searched
        \Log::info("Searching by " . ($isBarcode ? "barcode: $idOrBarcode" : "category ID: $idOrBarcode"));

        // Get products based on category ID or barcode
        $query = Product::with([
                'country:id,name',
                'category:id,name',
                'nutrition:id,product_id,calories,fat,protein,carbohydrates',
                'brand:id,name'
            ])
            ->select(
                'id',
                'name',
                'slug',
                'display_name',
                'unit_size',
                'unit_type',
                'Product_Category',
                'Product_Sub_Category',
                'bar_code',
                'description',
                'price',
                'image_url',
                'ingredients',
                'category_id',
                'country_id',
                'brand_id'
            );

        
            $query->where('bar_code', $idOrBarcode);
        
            $query->orWhere('category_id', $idOrBarcode);
        

        $products = $query->get();

        // Log the query for debugging
        \Log::info("Executed query: " . $query->toSql());

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found'], 404);
        }

        $products = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'display_name' => $product->display_name,
                'unit_size' => $product->unit_size,
                'unit_type' => $product->unit_type,
                'Product_Category' => $product->Product_Category,
                'Product_Sub_Category' => $product->Product_Sub_Category,
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
