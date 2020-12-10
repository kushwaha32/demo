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
        <div class="card-header clearfix">
            <h3 class="card-title text-capitalize">Contents</h3>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3 float-right" method="post" action="{{ route('content.search') }}">
              @csrf
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" name="searchContent" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="overflow-x:scroll">
        @if(isset($contents) && $contents->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th class="text-capitalize">title</th>
                    <th class="text-capitalize" style="min-width:150px;">writer name</th>
                    <th class="text-capitalize" style="min-width:150px;">img</th>
                    <th class="text-capitalize" style="min-width:150px;">nav parent</th>
                    <th class="text-capitalize" style="min-width:150px;">nav child</th>
                    <th class="text-capitalize" style="min-width:150px;">status</th>
                    <th class="text-capitalize" style="min-width:150px;">trending status</th>
                    <th class="text-capitalize" style="min-width:150px;">img gallery</th>
                    <th class="text-capitalize" style="min-width:150px;">img gallery main</th>
                    <th class="text-capitalize" style="min-width:150px;">video link</th>
                    <th class="text-capitalize" style="width: 40px">action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                     $i = 1;
                  @endphp
                   @foreach($contents as $content)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><a href="{{ route('content.show', $content->id) }}">{!! $content->tile !!}</a></td>
                        <td>{{ $content->auther_name }}</td>
                        <td style="width:20px;height:20px">
                          @foreach($content->img as $img)
                           <img src="{{asset('storage/'.$img)}}" class="img-fluid mb-2" alt="">
                          @endforeach
                        </td>
                        <td>{{ $content->nvparent }}</td>
                        @php
                           $navchilds = App\Models\Navchild::where('id', $content->navchild_id)->get();
                        @endphp
                        @foreach($navchilds as $nav)
                        <td>{{ $nav->nvchild }}</td>
                        @endforeach
                        <td><label class="switch">
                              <input type="checkbox" class="status_check" value="@if($content->status == '1'){{ '1'}} @else {{ '0' }} @endif"
                                @if($content->status == '1'){{ 'checked'}} @endif>
                              <span class="slider round"></span>
                              <input type="hidden" class="content_id" value="{{ $content->id }}">
                            </label>
                        </td>
                        <td><label class="switch">
                              <input type="checkbox" class="trending_status_check" value="@if($content->trending == '1'){{ '1'}} @else {{ '0' }} @endif"
                                @if($content->trending == '1'){{ 'checked'}} @endif>
                              <span class="slider round"></span>
                              <input type="hidden" class="trending_content_id" value="{{ $content->id }}">
                            </label>
                        </td>
                        <td><label class="switch">
                              <input type="checkbox" class="img_gallery_check" value="@if($content->img_gallery == '1'){{ '1'}} @else {{ '0' }} @endif"
                                @if($content->img_gallery == '1'){{ 'checked'}} @endif>
                              <span class="slider round"></span>
                              <input type="hidden" class="img_gallery_id" value="{{ $content->id }}">
                            </label>
                        </td>
                        <td><label class="switch">
                              <input type="checkbox" class="img_gallery_main_check" value="@if($content->img_gallery_main == '1'){{ '1'}} @else {{ '0' }} @endif"
                                @if($content->img_gallery_main == '1'){{ 'checked'}} @endif>
                              <span class="slider round"></span>
                              <input type="hidden" class="img_gallery_main_id" value="{{ $content->id }}">
                            </label>
                        </td>
                        <td>
                          @foreach($content->iframe as $iframe)
                              <iframe src="{{ $iframe }}" frameborder="0"></iframe>
                          @endforeach
                        </td>
                        <td>
                          <i class="fas fa-trash text-danger"></i> |
                          <a href="{{ route('content.edit', $content->id) }}"><i class="fas fa-edit text-success"></i> </a>
                        </td>
                    </tr>
                    
                   @endforeach
                </tbody>
            </table>
        @else

        @endif
       
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                {{ $contents->links() }}
                </ul>
              </div>
    </div>
    </div>
    </section>
@endsection


@section('proscript')
    <script>
      $(document).ready(function(){
        //header setup
        $.ajaxSetup({
           header:{
             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
           }
        });
        $('.status_check').on('click', function(){
             // get checkbox value
             var value = $(this).val();
             var $this = $(this);
              if(value == 1){
                value = 0;
              }
              else{
                value = 1;
              }
             // get content id from hidden field
             var content_id = $(this).closest("td").find('.content_id').val();
             var data ={
               "_token":'{{csrf_token()}}',
               "content_id":content_id,
               "value":value
             };
             //send ajax request to status update
             $.ajax({
               type:"PUT",
               url:"/home/content/status/"+content_id,
               data:data,
               success:function(response){
                $this.val(response);
                
               }
             });
        });
        //.status check
        $('.trending_status_check').on('click', function(){
             // get checkbox value
             var value = $(this).val();
             var $this = $(this);
              if(value == 1){
                value = 0;
              }
              else{
                value = 1;
              }
             // get content id from hidden field
             var content_id = $(this).closest("td").find('.trending_content_id').val();
            
             var data ={
               "_token":'{{csrf_token()}}',
               "content_id":content_id,
               "value":value
             };
           
             //send ajax request to status update
             $.ajax({
               type:"PUT",
               url:"/home/content/trending/"+content_id,
               data:data,
               success:function(response){
                  $this.val(response);
               }
             });
        });
        //.trending status end
        // img gallery
        $('.img_gallery_check').on('click', function(){
             // get checkbox value
             var value = $(this).val();
             var $this = $(this);
              if(value == 1){
                value = 0;
              }
              else{
                value = 1;
              }
             // get content id from hidden field
             var content_id = $(this).closest("td").find('.img_gallery_id').val();
            
             var data ={
               "_token":'{{csrf_token()}}',
               "content_id":content_id,
               "value":value
             };
           
             //send ajax request to status update
             $.ajax({
               type:"PUT",
               url:"/home/content/img_gallery/"+content_id,
               data:data,
               success:function(response){
                  $this.val(response);
               }
             });
        });
        //.img gallery end
        // img gallery main
        $('.img_gallery_main_check').on('click', function(){
             // get checkbox value
             var value = $(this).val();
             var $this = $(this);
              if(value == 1){
                value = 0;
              }
              else{
                value = 1;
              }
             // get content id from hidden field
             var content_id = $(this).closest("td").find('.img_gallery_main_id').val();
            
             var data ={
               "_token":'{{csrf_token()}}',
               "content_id":content_id,
               "value":value
             };
           
             //send ajax request to status update
             $.ajax({
               type:"PUT",
               url:"/home/content/img_gallery_main_id/"+content_id,
               data:data,
               success:function(response){
                  $this.val(response);
               }
             });
        });
        //.img gallery main end
      });
       
    </script>

@endsection