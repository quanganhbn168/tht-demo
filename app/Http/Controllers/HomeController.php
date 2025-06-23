<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Category;
use App\Models\ServiceCategory;
use App\Models\PostCategory;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::where('status',1)->get();
        $categories = Category::where('status',1)->get();
        $serviceCategory = ServiceCategory::where('status', 1)->whereNot('parent_id', 0)
            ->with(['services' => function($query) {
                $query->where('status', 1)->limit(6);
            }])->get();

        $serviceCategoryHome = ServiceCategory::where("status",1)->where("parent_id",0)->get();

        $homeCategories = PostCategory::where('status', 1)
            ->where('is_home', 1)
            ->with(['posts' => function ($q) {
                $q->where('status', 1)->latest()->limit(6);
            }])->get();

        return view('frontend.index', compact(
            'slides',
            'categories',
            'serviceCategory',
            'serviceCategoryHome',
            'homeCategories'
        ));
    }
 
    public function search(Request $request)
    {
        $keyword = trim($request->input('q'));

        $posts = Post::where('status', 1)
        ->where(function ($query) use ($keyword) {
            $query->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('content', 'LIKE', "%{$keyword}%");
        })
        ->latest()
        ->paginate(10);

        return view('frontend.posts.result', compact('posts', 'keyword'));
    }
}
