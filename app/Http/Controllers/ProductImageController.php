<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;



class ProductImageController extends Controller
{
    public function create($productId)
    {
        $product = Product::find($productId);
        return view('product_images.create', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::with('images')->find($productId);
        foreach ($product->images as $image) {
            Log::info('Image path: ' . $image->image_path);
            Storage::disk('public')->delete($image->image_path);
        }

        $productName = $product->title;


        $imagePath = $request->file('image')->storeAs('uploads', $productName . '.jpg', 'public');

        $productImage = ProductImage::updateOrCreate(
            ['product_id' => $product->id],
            ['image_path' => $imagePath]
        );

        return redirect()->route('request.product', $product->domain_name);
    }

}
