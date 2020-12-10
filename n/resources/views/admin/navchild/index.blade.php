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
        <h3 class="card-title text-capitalize">Nav childs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
        @if(isset($navs) && $navs->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th class="text-capitalize">nav chils</th>
                    <th class="text-capitalize">nav parent</th>
                    <th class="text-capitalize" style="width: 40px">action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                     $i = 1;
                  @endphp
                   @foreach($navs as $nav)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$nav->nvchild}}</td>
                        <td>{{$nav->nvparent}}</td>
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
                {{ $navs->links() }}
                </ul>
              </div>
    </div>
    </div>
    </section>
@endsection