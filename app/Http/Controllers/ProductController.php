<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {

    }

    public function index()
    {
        $products = Product::all();
    
        return view('admin.products', [ 'products' => $products ]);
    }

    public function add_products()
    {
        return view('admin.add_products');
    }

    public function detail_products($id)
    {
        $product = Product::with('images')->findOrFail($id);

        return view('admin.detail_products', [ 'product' => $product ]);
    }   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'type' => 'required|string',
            'file' => 'required|array',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:5048', // Adjust allowed file types and size
        ], [
            'file.*.image' => 'The file must be an image.',
            'file.*.mimes' => 'The file must be of type: jpeg, png, jpg, gif.',
            'file.*.max' => 'The file may not be greater than 5048 kilobytes.',
        ]);

        // Create a new product
        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
        ]);

        // Handle file uploads
        if(!$product) {
            return back()->withErrors(['error' => 'Failed to create product']);
        }

        foreach ($request->file('file') as $file) {
            // Store the file in the storage directory
            $path = $file->store('product_images', 'public');

            // Save file information in the database
            $product->images()->create([
                'image_path' => $path,
            ]);
        }

        // Redirect or do something else after storing data
        return redirect()->route('dashboard-products');
    }

    public function destroy($id)
    {
        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Get all associated images
            $images = ProductImage::where('product_id', $product->id)->get();

            // Delete the product
            $product->delete();

            // Delete associated images from the database
            ProductImage::where('product_id', $product->id)->delete();

            // Delete the corresponding image files from the public directory
            foreach ($images as $image) {
                $imagePath = public_path('product_images/' . $image->filename);

                if (file_exists($imagePath)) {
                    // Delete the file
                    unlink($imagePath);
                }
            }

            return response()->json(['message' => 'Product and associated images deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete the product'], 500);
        }
    }

}
