<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $recentPosts = Post::query()->withCount(['comments'])->with(['tags'])->latest()->limit(8)->get();
        $popularPosts = Post::query()->withCount(['comments'])->with(['tags'])->latest('views')->limit(4)->get();

        return view('home', [
            'recentPosts' => $recentPosts,
            'popularPosts' => $popularPosts,
        ]);
    }
}
