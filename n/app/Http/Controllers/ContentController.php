<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\Navchild;
use App\Models\Contentdiscription;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::paginate(5);
        return view('admin.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navs = Navchild::all();
        return view('admin.content.create', compact('navs'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $request->validate([
            'title' => 'required',
            // 'slug' => 'required|unique:products',
            'writer_name' => 'required|max:255',
            'navparent' => 'required',
            'navchild' => 'required',
            'status' => 'required|numeric',
            'trending' => 'required|numeric',
            'thumbnail.*'=> 'required|mimes:jpeg,bmp,png|max:2048',
       ]);
        //initializing image array
        $filesArray = [];
        $files = $request->file('thumbnail');
        if($files){
            foreach($files as $file)
            {
                $extension = ".".$file->getClientOriginalExtension();
                $name = basename($file->getClientOriginalName(), $extension).time();
                $name = $name.$extension;
                $path = $file->storeAs('images', $name, 'public');
                $filesArray[] = $path;
            }
            
        }
        
        $iframeArray = [];
        $iframes = $request->video_link;
        if($iframes){
            foreach($iframes as $iframe)
            {
                $iframeArray[] = $iframe;
            }
        }
       
        $content = new Content;
        $content->tile = $request->title;
        $content->auther_name = $request->writer_name;
        $content->nvparent = $request->navparent;
        $content->navchild_id = $request->navchild;
        $content->status = $request->status;
        $content->trending = $request->trending;
        $content->img = $filesArray;
        
        if($request->video_link != ""){
            $content->iframe = $iframeArray;
        }
         $content = $content->save();
        if($content){
            
            return back()->with('message', 'Content successfully added');
        }else{
            return back()->with('message', 'Error Inserting Content');
        }
    }
    // status update
     
    public function statusupdate(Request $request, Content $content)
    {
        $request->validate([
            "content_id" => "required",
            "value" => "required"
        ]);
        
        $content->status = $request->value;
        $content->save();
        $con = Content::Where('id', $request->content_id)->get();
        $con = json_decode(json_encode($con));
        return response()->json($con[0]->status, 200);

    }
    // tranding status update
    public function trendingupdate(Request $request, Content $content){
        $request->validate([
            "content_id" => "required",
            "value" => "required"
        ]);
        
        $content->trending = $request->value;
        $content->save();
        $con = Content::Where('id', $request->content_id)->get();
        $con = json_decode(json_encode($con));
        
        return response()->json($con[0]->trending, 200);
    }
    // img gallery update
    public function imggalleryupdate(Request $request, Content $content){
        $request->validate([
            "content_id" => "required",
            "value" => "required"
        ]);
        
        $content->img_gallery = $request->value;
        $content->save();
        $con = Content::Where('id', $request->content_id)->get();
        $con = json_decode(json_encode($con));
        
        return response()->json($con[0]->img_gallery, 200);
    }
    // img gallery main update
    public function imggallerymainupdate(Request $request, Content $content){
        $request->validate([
            "content_id" => "required",
            "value" => "required"
        ]);
        
        $content->img_gallery_main = $request->value;
        $content->save();
        $con = Content::Where('id', $request->content_id)->get();
        $con = json_decode(json_encode($con));
        
        return response()->json($con[0]->img_gallery_main, 200);
    }
    // trending content
    public function trendingcontent(){
        $trendings = Content::where('trending', '=', 1)->paginate(5);
        return view('admin.content.trending', compact('trendings'));

    }
    // content search function
    public function searchContent(Request $request){
        $search = Content::where('tile', 'LIKE', "%{$request->searchContent}%")
                           ->orWhere('auther_name', 'LIKE', "%{$request->searchContent}%")
                           ->orWhere('nvparent', 'LIKE', "%{$request->searchContent}%")
                           ->get();
       return view('admin.content.search', compact('search'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {    
        $con_id = json_decode($content);
       
        return view('admin.content.show', compact('con_id'));
    }

    // content discription store

    public function storeContentDiscription(Request $request)
    {
         $request->validate([
              'discription' => 'required',
              'thumbnail.*'   => 'mimes:jpeg,bmp,png|max:2048'
         ]);
        //initializing image array
        $filesArray = [];
        $files = $request->file('thumbnail');
        if($files){
            foreach($files as $file)
            {
                $extension = ".".$file->getClientOriginalExtension();
                $name = basename($file->getClientOriginalName(), $extension).time();
                $name = $name.$extension;
                $path = $file->storeAs('images', $name, 'public');
                $filesArray[] = $path;
            }
        }
        $iframeArray = [];
        $iframes = $request->video_link;
        if($iframes){
            foreach($iframes as $iframe)
            {
                $iframeArray[] = $iframe;
            }
        }
       
        $discription = new Contentdiscription;
        $discription->content_id = $request->content_id;
        $discription->discription = $request->discription;
        $discription->img = $filesArray;
        
        if($request->video_link != ""){
            $discription->iframe = $iframeArray;
        }
         $discription = $discription->save();
         if($discription){
             return back()->with('message', 'Discription add successfully');
         }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        return view('admin.content.edit', compact('content'));
    }
    // get nav child ajax
    public function ajaxnavchild(Request $request){
       dd($request->all());
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        //
    }
}
