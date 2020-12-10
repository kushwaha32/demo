<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class FrontWebController extends Controller
{
    public function index(){
        $trendingContent = Content::where('trending', '=', '1')->orderBy('created_at', 'desc')->get();
        $imgGallery = Content::where('img_gallery', '=', '1')->orderBy('created_at', 'desc')->take(4)->get();
        $imgGalleryMain = Content::where('img_gallery_main', '=', '1')->orderBy('created_at', 'desc')->take(1)->get();
        return view('pages.home', compact('trendingContent', 'imgGallery', 'imgGalleryMain'));
    }

    public function showBlog(Content $content){
        return view('pages.blogshow');
    }
}
