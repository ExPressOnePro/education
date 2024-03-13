<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\Slide;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home(): View
    {
        return view('pages.home');
    }

    public function main(): View
    {
        return view(
            [
                'posts' => Post::all(),
                'slides' => Slide::all(),
                'contacts' => Contact::all(),
            ]
        );
    }

    public function about(): View
    {
        return view('pages.components.about', ['contacts' => Contact::all()]);
    }

    public function news(): View
    {
        return view('pages.components.posts', ['posts' => Post::all()]);
    }

    public function post(int $id): View
    {
        return view(
            'pages.components.post',
            [
                'post' => Post::query()->findOrFail($id),
            ]
        );
    }
}
