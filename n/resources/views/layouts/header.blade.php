<div class="container-fluid bg-000" >
          <header>
            <!-- date time and social media link -->
             <div class="row py-2">
               <!-- date and time -->
               <div class="col-xl-6 col-lg-6 col-md-6" style="color: #fff;">
                <span class="text-uppercase font-12">sunday, october, 2020</span>
              </div>
              <!-- social media links -->
               <div class="col-xl-6 col-lg-6 col-md-6 text-right share-link" style="color: #fff;">
                  <ul>
                    <li style="margin-right: 0px;"><a href="#"><img src="img/sicialIcon/facebook.png" alt=""></a></li>
                    <li><a href="#"><img src="{{asset('img/sicialIcon/instagram.png')}}" alt=""></a></li>
                    <li><a href="#"><img src="{{asset('img/sicialIcon/twitter.png')}}" alt=""></a></li>
                    <li><a href=""><img src="{{asset('img/sicialIcon/linkedin.png')}}" alt=""></a></li>
                    <li><a href=""><img src="{{asset('img/sicialIcon/telegram.png')}}" alt=""></a></li>
                    <li style="margin-right: 0px;"><a href=""><img src="{{asset('img/sicialIcon/youtube.png')}}" alt=""></a></li>
                    <li><a href=""><img src="{{asset('img/sicialIcon/tumblr.png')}}" alt=""></a></li>
                  </ul>
              </div>
             </div>
             <!-- logo brand -->
             <div class="brand-web"><img class="img-responsive" src="{{asset('img/Screenshot_2020-11-25 Nervs Veins-01 png (PNG Image, 4500 × 4500 pixels) — Scaled (5%).png')}}" alt=""></div>
             <!-- navigation links -->
             <!-- <nav class="navbar navbar-expand-md navbar-dark sticky-top" style="padding-top: 3px;padding-bottom: 0px;">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse navbar-custom" id="collapsibleNavbar">
                <ul class="navbar-nav text-uppercase">
                  <li class="nav-item" style="background: #fff;">
                    <a class="nav-link" style="color:#000 !important;" href="#">home</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#">news</a>
                     
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#">Health & Wellness</a>
                  </li> 
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#">fashion</a>
                  </li>  
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="#">tech</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="#">business</a>
                  </li>  
                </ul>
              </div>   -->
                 <!-- search engin  -->
                 <!-- <form action="" class="p-relative">
                     <input type="text" class="search-input p-absolute">
                     <button class="btn btn-cu-color p-absolute"><i class="fa fa-search"></i></button>
                 </form>
            </nav> -->
            </header>
      </div>
      <nav class="navbar navbar-expand-md bg-000 sticky-top" style="padding-top: 3px;padding-bottom: 0px;">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse navbar-custom" id="collapsibleNavbar">
                <ul class="navbar-nav text-uppercase">
                  <li class="nav-item" style=" @if(request()->url() == route('userhome')) {{ 'background:#fff !important' }} @endif">
                    <a class="nav-link"  href="{{route('userhome')}}" style="@if(request()->url() == route('userhome')) {{ 'color:#000 !important' }} @endif">home</a>
                  </li>
                  <li class="nav-item dropdown dropdown-custom-cu" style=" @if(request()->url() == route('news')) {{ 'background:#fff !important' }} @endif">
                    <a class="nav-link @if(isset($news) && $news->count() > 0) {{'dropdown-toggle'}} @endif" href="{{route('news')}}" id="navbardrop" 
                     style="@if(request()->url() == route('news')) {{ 'color:#000 !important' }} @endif">news</a>
                   @if(isset($news) && $news->count() > 0)
                    <div class="dropdown-menu">
                      @foreach($news as $new)
                       <a class="dropdown-item" href="#">{{$new->nvchild}}</a>
                     @endforeach
                    </div>
                    @endif
                  </li>
                  <li class="nav-item dropdown dropdown-custom-cu" style=" @if(request()->url() == route('health')) {{ 'background:#fff !important' }} @endif">
                    <a class="nav-link @if(isset($heawes) && $heawes->count() > 0) {{'dropdown-toggle'}} @endif" href="{{route('health')}}" style="@if(request()->url() == route('health')) {{ 'color:#000 !important' }} @endif">Health & Wellness</a>
                    @if(isset($heawes) && $heawes->count() > 0)
                    <div class="dropdown-menu">
                      @foreach($heawes as $heawe)
                       <a class="dropdown-item" href="#">{{$heawe->nvchild}}</a>
                     @endforeach
                    </div>
                    @endif
                  </li> 
                  <li class="nav-item dropdown dropdown-custom-cu" style=" @if(request()->url() == route('fashion')) {{ 'background:#fff !important' }} @endif">
                    <a class="nav-link @if(isset($fashions) && $fashions->count() > 0) {{'dropdown-toggle'}} @endif" href="{{route('fashion')}}" style="@if(request()->url() == route('fashion')) {{ 'color:#000 !important' }} @endif">fashion</a>
                    @if(isset($fashions) && $fashions->count() > 0)
                    <div class="dropdown-menu">
                      @foreach($fashions as $fashion)
                       <a class="dropdown-item" href="#">{{$fashion->nvchild}}</a>
                     @endforeach
                    </div>
                    @endif
                  </li>  
                  <li class="nav-item dropdown dropdown-custom-cu" style=" @if(request()->url() == route('tech')) {{ 'background:#fff !important' }} @endif">
                    <a class="nav-link @if(isset($techs) && $techs->count() > 0) {{'dropdown-toggle'}} @endif" href="{{route('tech')}}" style="@if(request()->url() == route('tech')) {{ 'color:#000 !important' }} @endif">tech</a>
                    @if(isset($techs) && $techs->count() > 0)
                    <div class="dropdown-menu">
                      @foreach($techs as $tech)
                       <a class="dropdown-item" href="#">{{$tech->nvchild}}</a>
                     @endforeach
                    </div>
                    @endif
                  </li> 
                  <li class="nav-item dropdown dropdown-custom-cu" style=" @if(request()->url() == route('business')) {{ 'background:#fff !important' }} @endif">
                    <a class="nav-link @if(isset($business) && $business->count() > 0) {{'dropdown-toggle'}} @endif" href="{{route('business')}}" style="@if(request()->url() == route('business')) {{ 'color:#000 !important' }} @endif">business</a>
                    @if(isset($business) && $business->count() > 0)
                    <div class="dropdown-menu">
                      @foreach($business as $busines)
                       <a class="dropdown-item" href="#">{{$busines->nvchild}}</a>
                     @endforeach
                    </div>
                    @endif
                  </li>  
                </ul>
              </div>  
                 <!-- search engin  -->
                 <form action="" class="p-relative">
                     <input type="text" class="search-input p-absolute">
                     <button class="btn btn-cu-color p-absolute"><i class="fa fa-search"></i></button>
                 </form>
            </nav>