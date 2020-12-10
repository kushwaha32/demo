@extends('admin.app')
@section('content')
    <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Contents</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
     <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
         <!-- general form elements -->
         <div class="card card-primary box box-primary">
         <div class="card-header">
          <h3 class="card-title">Edit Content</h3>
        </div>  
        @if($errors->any())
                  <div class = "alert alert-danger mx-2 mt-3">
                     <ul>
                        @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
              @endif
              @if(session()->has('message'))
                  <div class = "alert alert-success mx-2 mt-3">
                     {{ session("message")}}
                  </div>
              @endif                           
        <!-- /.card-header -->
        <!-- form start -->
        @if(isset($content) && $content->count() > 0)
        <form method="POST" action="{{ route('content.update', $content->id) }}" enctype = "multipart/form-data">
          <div class = "row">
                <div class="col-md-8">
                   @csrf                 
                    <div class="card-body">
                    <div class="form-group">
                        <label for="texturl">Title</label>
                        <textarea name="title" class="form-control  text-heading" id="texturl" cols="30" rows="10">{{ $content->tile }}</textarea>
                        <p class="small">http://localhost /<span id="url"></span></p>
                        <input type="hidden" name="slug" id="slug" value="">
                    </div>
                    <div class="form-group">
                        <label for="writername">Writer Name</label>
                        <input type="text" name="writer_name" value="{{$content->auther_name}}" class="form-control" id="writername" placeholder="Writer Name">
                    </div>
                    <div class="form-group">
                        <label for="editor">Description</label>
                        <textarea name="discription" class="form-control" id="editor" cols="30" rows="10">{{ $content->discription }}</textarea>
                    </div>
                    <div class="row">
                      <div class="form-group input_field_wrapper col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11">
                        @foreach($content->iframe as $iframe)
                            <label for="video_link">Video link</label>
                            <input type="text" class="form-control mb-2" id="video_link" value="{{ $iframe }}" name="video_link[]" placeholder="video link">
                        @endforeach
                      </div>
                      <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1" style="margin-top: 31px;">
                       <button class="btn btn-success addHtmlbtn">
                       <i class="fas fa-plus"></i></button>
                      </div>
                    </div>
                    <div class="form-group">
                         <label for="navparent">Select Nav Parent</label>
                         <select name="navparent" id="navparent" class="form-control">
                            <option value="news" class="text-capitalize" @if($content->nvparent == "news") {{'selected'}} @endif>news</option>
                            <option value="health&welness" class="text-capitalize" @if($content->nvparent == "health&welness") {{'selected'}} @endif>health & welness</option>
                            <option value="fashion" class="text-capitalize" @if($content->nvparent == "fashion") {{'selected'}} @endif>fashion</option>
                            <option value="tech" class="text-capitalize" @if($content->nvparent == "tech") {{'selected'}} @endif>tech</option>
                            <option value="business" class="text-capitalize" @if($content->nvparent == "business") {{'selected'}} @endif>business</option>
                         </select>
                    </div> 
                    <div class="form-group">
                         <label for="navparent">Select Nav Child</label>
                         <select name="navchild" id="navparent" class="form-control">
                           @if(isset($navs) && $navs->count() > 0)
                             @foreach($navs as $nav)
                              <option value="{{ $nav->id }}" class="text-capitalize">{{ $nav->nvchild }}</option>
                             @endforeach
                            @endif
                           
                         </select>
                    </div> 
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="col-md-4">
                    <div class = "border border-top-0 border-right-0 border-bottom-0">
                    <h4 class="mt-4 p-3 pro-side-h">Status</h4>
                    <div class="form-group my-3 px-3">
                        <select class="custom-select" name = "status">
                          <option value = "0" @if($content->status == 0){{'selected'}} @endif>Pending</option>
                          <option value = "1" @if($content->status == 1){{'selected'}} @endif>Publish</option>
                        </select>
                      </div>
                    <h4 class="mt-4 p-3 pro-side-h">Trending</h4>
                    <div class="form-group my-3 px-3">
                        <select class="custom-select" name = "trending">
                          <option value = "0" @if($content->trending == 0){{'selected'}} @endif>untrend</option>
                          <option value = "1" @if($content->trending == 1){{'selected'}} @endif>trend</option>
                        </select>
                      </div>
                      <div class="uppend-img-parend">
                        <h4 class="mt-4 p-3 pro-side-h">Featured Image </h4>
                        <div class = "px-3 mt-3">
                          <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input inputFileGet" id="customFile" name="thumbnail[]" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                          <div id="img-target-append">
                             <img src="{{asset('img/tDPMH.png')}}" class = "img-thumbnail" alt="">
                          </div>
                           
                        </div>
                      </div>
                    </div>
                      <div class="card-footer">
                      <input type="submit" name="submit" class="btn btn-primary" value="Update">
                      </div>
                    </div>
                </div>
          </div>
  </form>
  @endif
</div>
<!-- /.card -->
</div>
<!--/.col (left) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
@endsection

@section('proscript')
   <script>
       $(function(){
           //header setup
        $.ajaxSetup({
           header:{
             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        // slug generator
          $('#texturl').on('keyup', function(){
             var url = slugify($(this).val());
             
             $('#url').html(url);
             $('#slug').val(url)
          });
          // showing img after file selection
          $('.inputFileGet').on('change', function(e){
              var files = e.target.files;
              if(files){
                $("#img-target-append").empty();
                $.each(files, function(i, file){
                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e){
                var template = ' <img src="'+ e.target.result +'" class = "img-thumbnail mb-2" alt="">';
                 $("#img-target-append").append(template);
                };
                });
              }else{
                $(".img-thumbnail").attr("src", asset('storage/images/tDPMH.png'));
              }
          });// showing img after file selection
          // Featured pro
          $('#featuredPro').on('change', function(){
              if($(this).is(':checked')){
                $(this).val(1);
              }else{
                $(this).val(0);
              }
               
          });// end Featured pro
          // add dynamic input video link fild event trigger
          var i = 1;
          $(".addHtmlbtn").on('click', function(e){
             e.preventDefault();
             $(".input_field_wrapper").append('<div class="mt-3" style="position:relative;"><label for="video_link">Video link '+ i +'</label><input type="text" class="form-control" id="video_link" name="video_link[]" placeholder="video link"><span style="position:absolute;right:-69px;top:31px;z-index:1000;"><button class="btn btn-danger remove_bnt"><i class="fas fa-minus"></i></button></span</div>');
             i++;
          });
          // remove dynamic input video link field event trigger
          $(".input_field_wrapper").on('click', '.remove_bnt', function(e){
             e.preventDefault();
             $(this).closest('div').remove();
          });
         $("#navparent").on('change', function(){
            var navParent = $(this).val();
            var data ={
               "_token":'{{csrf_token()}}',
               "navparent":navParent
             };
             //send ajax request to get navchild
             $.ajax({
               type:"get",
               url:"/home/content/edit/navchild/"+navParent,
               data:data,
               success:function(response){
                  
               }
             });
            
         });
       });
       $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
      //wisivik text editor
      tinymce.init({
           selector:'textarea',
      });
      
   </script>

@endsection