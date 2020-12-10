@extends('admin.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="card">
          <div class="card-header">
             <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                   <a class="nav-link active" data-toggle="tab" href="#showcontent">Show Contents</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#addcontent">Add Contents</a>
                </li>
             </ul> 
          </div>
          <!-- ./card-header -->
          <div class="card-body">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="showcontent" class="container tab-pane active"><br>
                    <h3>HOME</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                     </div>
                    <div id="addcontent" class="container tab-pane fade"><br>
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
                    
                    <form method="POST" action="{{ route('storeContentDiscription') }}" enctype = "multipart/form-data">
                                <div class = "row">
                                        <div class="col-md-8">
                                        @csrf                 
                                            <div class="card-body">
                                            <div class="form-group">
                                                <label for="texturl">Discription</label>
                                                <textarea name="discription" class="form-control  text-heading" id="texturl" cols="30" rows="10"></textarea>
                                                 <input type="hidden" name="content_id" value="{{$con_id->id}}">
                                            </div>
                                            <div class="row">
                                            <div class="form-group input_field_wrapper col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11">
                                                <label for="video_link">Video link</label>
                                                <input type="text" class="form-control" id="video_link" name="video_link[]" placeholder="video link">
                                            </div>
                                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1" style="margin-top: 31px;">
                                            <button class="btn btn-success addHtmlbtn">
                                            <i class="fas fa-plus"></i></button>
                                            </div>
                                            </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class = "border border-top-0 border-right-0 border-bottom-0">
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
                                            <input type="submit" name="submit" class="btn btn-primary" value="Add Product">
                                            </div>
                                            </div>
                                        </div>
                                </div>
                        </form>
                    </div>
                </div>
          </div>
          <!-- ./card-body -->
      </div>
    </div>
</section>
@endsection


@section('proscript')
   <script>
       $(function(){
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