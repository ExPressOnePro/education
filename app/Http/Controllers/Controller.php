<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Product;

use App\Models\slide;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home() {
        return view('pages.home');
    }

    public function main() {
        $posts = post::query()->get();
        $slides = slide::get();
        $compact = compact('posts', 'slides');
        return view('pages.components.main',$compact);
    }
    public function about() {
        return view('pages.components.about');
    }

    public function news(Request $request) {
        $posts = post::query()->get();
        $compact = compact('posts');
        return view('pages.components.posts', $compact);
    }


    public function post(Request $request, $id) {
        $post = post::query()->find($id);

        $compact = compact('post');
        return view('pages.components.post', $compact);
    }


}
