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
            <h3 class="card-title text-capitalize">Trending Contents</h3>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3 float-right" method="post" action="{{ route('content.search') }}">
               @csrf
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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
        @if(isset($trendings) && $trendings->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th class="text-capitalize">title</th>
                    <th class="text-capitalize" style="min-width:150px;">writer name</th>
                    <th class="text-capitalize" style="min-width:150px;">img</th>
                    <th class="text-capitalize" style="min-width:150px;">status</th>
                    <th class="text-capitalize" style="min-width:150px;">trending status</th>
                    <th class="text-capitalize" style="width: 40px">action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                     $i = 1;
                  @endphp
                   @foreach($trendings as $trending)
                    
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{!! $trending->tile !!}</td>
                        <td>{{ $trending->auther_name }}</td>
                        <td style="width:20px;height:20px">
                          @foreach($trending->img as $img)
                           <img src="{{asset('storage/'.$img)}}" class="img-fluid mb-2" alt="">
                          @endforeach
                        </td>
                        <td><label class="switch">
                              <input type="checkbox" class="status_check" value="@if($trending->status == '1'){{ '1'}} @else {{ '0' }} @endif"
                                @if($trending->status == '1'){{ 'checked'}} @endif>
                              <span class="slider round"></span>
                              <input type="hidden" class="content_id" value="{{ $trending->id }}">
                            </label>
                        </td>
                        <td><label class="switch">
                              <input type="checkbox" class="trending_status_check" value="@if($trending->trending == '1'){{ '1'}} @else {{ '0' }} @endif"
                                @if($trending->trending == '1'){{ 'checked'}} @endif>
                              <span class="slider round"></span>
                              <input type="hidden" class="trending_content_id" value="{{ $trending->id }}">
                            </label>
                        </td>
                        <td>
                          <i class="fas fa-trash text-danger"></i> |
                          <i class="fas fa-edit text-success"></i>
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
                {{ $trendings->links() }}
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
      });
       
    </script>

@endsection