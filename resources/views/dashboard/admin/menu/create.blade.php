
@extends('dashboard.layout.template')

@section('title')
    menu
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
           
            <div class="card-box">
    
    
                <h4 class="header-title m-t-0 m-b-30">Create menu</h4>
    
                <form class="form-horizontal" role="form" method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group ">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image" >Image</label>
                        <input  id="cat_image" type="file" name="image" class="form-control">
                        @error('image')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="#" id="category-img-tag" class="img-fluid" width="500px" alt="Preview image" >
                    </div>

                    <div class="form-group ">
                        <label class="control-label">Price</label>
                        <input type="number" min="0" name="price" value="{{old('price')}}" class="form-control">
                        @error('price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group ">
                        <label class="control-label">Stok(optional)</label>
                        <input type="number" min="0" name="stok" value="{{old('stok')}}" class="form-control">
                        @error('stok')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    

                    <div class="form-group">
                        <label for="" class="control-label">SubCategory</label>
                        <select multiple="multiple" class="multi-select" id="my_multi_select1" name="subcategory[]" data-plugin="multiselect">
                            @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Show</option>
                            <option value="0">Hidden</option>
                        </select>
                        @error('status')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('menu.index')}}" class="btn btn-default">Back</a>
                    </div>
                </form>
            </div>    
        </div><!-- end col -->
    </div>
</div>

@endsection