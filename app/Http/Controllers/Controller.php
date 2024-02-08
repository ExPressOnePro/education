<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function main() {
        $products = Product::get();

        $compact = compact( 'products');
        return view('pages.main', $compact);
    }
    public function product(Request $request, $domain_name) {

        $product = Product::where('domain_name', $domain_name)->firstOrFail();
        $product->increment('views');
        $products = Product::get();
        $productCategories = $product->categories ?? [];


        $compact = compact(
            'product',
            'products',
            'productCategories'
        );

        return view('pages.product', $compact);
    }


}
