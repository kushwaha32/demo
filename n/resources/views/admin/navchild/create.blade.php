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
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title text-capitalize">add nav child</h3>
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
    <form action="{{route('navchild.store')}}" class="form" method="POST">
      @csrf
    <div class="card-body">   
        
        <div class="form-group">
        <label for="exampleInputEmail1" class="text-capitalize">Select nav parent</label>
        <select name="nvparent" class="form-control">
            <option value="noparend">--Select Parend--</option>
            <option value="home">home</option>
            <option value="news">news</option>
            <option value="health&welness">health & welness</option>
            <option value="fashion">fashion</option>
            <option value="tech">tech</option>
            <option value="business">business</option>
        </select>
        </div>
        <div class="form-group">
        <label for="nvchild" class="text-capitalize">child name</label>
        <input type="text" name="nvchild" class="form-control" id="nvchild">
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
   </div>
</div>

</section>
@endsection