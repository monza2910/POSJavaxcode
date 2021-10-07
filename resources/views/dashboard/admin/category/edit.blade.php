
@extends('dashboard.layout.template')

@section('title')
    Category
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
    
    
                <h4 class="header-title m-t-0 m-b-30">Update Category</h4>
    
                <form class="form-horizontal" role="form" method="POST" action="{{route('category.update',$category->id)}}">
                    @method('put')
                    @csrf
                    <div class="form-group ">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('category.index')}}" class="btn btn-default">Back</a>

                    </div>
                </form>
            </div>    
        </div><!-- end col -->
    </div>
</div>

@endsection