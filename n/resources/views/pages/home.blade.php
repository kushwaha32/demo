@extends('welcome')
@section('content')
<section>
<!-- trending carocell -->
<div id="demo" class="carousel slide" data-ride="carousel">
    <div class="row ">
            <div class="col-xl-2 col-lg-2 col-md-2 p-relative">
                <h3 class="heading-trending text-center text-uppercase">trending now</h3>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <!-- The slideshow text -->
                <div class="carousel-inner" id="caro_parent">
                  @if(isset($trendingContent) && $trendingContent->count() > 0) 
                    @foreach($trendingContent as $trend)
                    <div class="carousel-item">
                        <a href="{{ route('showBlog', $trend->id) }}" class="trending-text">{!! $trend->tile !!}</a>
                    </div>
                    @endforeach
                  @endif
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 text-right">
                <!-- Left and right controls -->
                <a class="carocell-arrow mr-1 text-center" href="#demo" data-slide="prev">
                <img src="img/left-arrow.png" alt="">
                </a>
                <a class="carocell-arrow text-center" href="#demo" data-slide="next">
                <img src="img/right.png" alt="">
                </a>
            </div>
    </div>
</div>
</section>
<section>
<!-- image gallery -->
<div class="row" style="margin-top: 5px !important;height: 350px;">
    @if(isset($imgGalleryMain) && $imgGalleryMain->count() > 0)
      @foreach($imgGalleryMain as $img)
        <div class="col-xl-6 col-lg-6 col-md-6 pr-1 imggallery-main" style="height: 100%;">
            <a href="" class="p-relative">
            <span></span>
            <img src="{{asset('storage/'.$img->img[0])}}" class="h-100" alt="">
            <p>{!! $img->tile !!}</p>
            </a>
        </div>
        @endforeach
     @endif
    <div class="col-xl-6 col-lg-6 col-md-6" style="height: 100%;">
    <div class="row h-100"  id="img-gallery-parent">
       @if(isset($imgGallery) && $imgGallery->count() > 0)
         @foreach($imgGallery as $img)
            <div class="col-xl-6 col-lg-6 col-md-6 p-cu-l  imggallery-main h-50">
                <a href="" class="p-relative">
                    <span></span>
                    <img src="{{asset('storage/'.$img->img[0])}}" class="h-100" alt="">
                    <p>{!! $img->tile !!}</p>
                </a>
            </div>
          @endforeach
        @endif
      
       
       
    </div>
    </div>

</div>
</section>
<section class="mt-1 trendOwlSec px-5">
<div class="clearfix my-4">
    <div class="float-left stories-dinots mr-3">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="float-left stories-h">
    <h4>stories</h4>
    </div>
    <div class="float-left hr">
    <hr>
    </div>
</div>
<div class="owl-carousel owl-theme mb-4" style="margin-top: -20px;">
<div class="item">
    <div class="card cat-link-card">
        <a href="">
        <img src="img/imggallery/hd-wallpaper-4.jpg" class="card-img" alt="">
        </a>
        <div class="card-body">
            <a class="card-text d-block mb-3">category</a>
            <a href="" class="card-title text-capitalize">Lorem ipsum dolor sit amet consectetur adip</a>
        </div>
    </div>
</div>
<div class="item">
    <div class="card cat-link-card">
    <a href="">
        <img src="img/imggallery/hd-wallpaper-4.jpg" class="card-img" alt="">
    </a>
    <div class="card-body">
        <p class="card-text">category</p>
        <a href="" class="card-title text-capitalize">Lorem ipsum dolor sit amet consectetur adip</a>
    </div>
    </div>
</div>
        <div class="item">
        <div class="card cat-link-card">
            <a href="">
            <img src="img/imggallery/hd-wallpaper-4.jpg" class="card-img" alt="">
            </a>
            <div class="card-body">
                <p class="card-text">category</p>
                <a href="" class="card-title text-capitalize">Lorem ipsum dolor sit amet consectetur adip</a>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card cat-link-card">
        <a href="">
            <img src="img/imggallery/hd-wallpaper-4.jpg" class="card-img" alt="">
        </a>
        <div class="card-body">
            <p class="card-text">category</p>
            <a href="" class="card-title text-capitalize">Lorem ipsum dolor sit amet consectetur adip</a>
        </div>
        </div>
    </div>
    <div class="item">
    <div class="card cat-link-card">
        <a href="">
        <img src="img/imggallery/hd-wallpaper-4.jpg" class="card-img" alt="">
        </a>
        <div class="card-body">
            <p class="card-text">category</p>
            <a href="" class="card-title text-capitalize">Lorem ipsum dolor sit amet consectetur adip</a>
        </div>
    </div>
</div>
<div class="item">
    <div class="card cat-link-card">
    <a href="">
        <img src="img/imggallery/hd-wallpaper-4.jpg" class="card-img" alt="">
    </a>
    <div class="card-body">
        <p class="card-text">category</p>
        <a href="" class="card-title text-capitalize">Lorem ipsum dolor sit amet consectetur adip</a>
    </div>
    </div>
</div>
<div class="item">
    <div class="card cat-link-card">
    <a href="">
        <img src="img/imggallery/hd-wallpaper-4.jpg" class="card-img" alt="">
    </a>
    <div class="card-body">
        <p class="card-text">category</p>
        <a href="" class="card-title text-capitalize">Lorem ipsum dolor sit amet consectetur adip</a>
    </div>
    </div>
</div>
<div class="item">
<div class="card cat-link-card">
    <a href="">
    <img src="img/imggallery/hd-wallpaper-4.jpg" class="card-img" alt="">
    </a>
    <div class="card-body">
        <p class="card-text">category</p>
        <a href="" class="card-title text-capitalize">Lorem ipsum dolor sit amet consectetur adip</a>
    </div>
</div>
</div>
</div>
</section>
@endsection

@section('scriptyield')
  <script>
    $('document').ready(function(){
        $('#caro_parent div:first').addClass('active');
        $('#img-gallery-parent div:first').addClass('pr-1 pb-1');
        $("#img-gallery-parent > div:nth-child(2)").addClass('pb-1');
        $("#img-gallery-parent > div:nth-child(3)").addClass('pr-1');
       
        
    });
     
   
  </script>
@endsection