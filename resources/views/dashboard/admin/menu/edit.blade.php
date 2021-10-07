
@extends('dashboard.layout.template')

@section('title')
    menu
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
           
            <div class="card-box">
    
    
                <h4 class="header-title m-t-0 m-b-30">Update menu</h4>
    
                <form class="form-horizontal" role="form" method="POST" action="{{route('menu.update',$menu->id)}}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group ">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" value="{{$menu->name}}" class="form-control">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group">
                                <label for="image" >Old Image(optional)</label>
                                <div class="form-group">
                                    <img src="/images/images_menu/{{$menu->image}}"  class="img-fluid" width="300px"  >
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image" >New Image(optional)</label>
                                <input  id="cat_image" type="file" name="image" class="form-control">
                                @error('image')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img src="#" id="category-img-tag" class="img-fluid" width="300px" alt="Preview image">
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group ">
                        <label class="control-label">Price</label>
                        <input type="number" min="0" name="price" value="{{$menu->price}}" class="form-control">
                        @error('price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group ">
                        <label class="control-label">Stok(optional)</label>
                        <input type="number" min="0" name="stok" value="{{$menu->stok}}" class="form-control">
                        @error('stok')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="control-label">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="{{$menu->category_id}}">{{$menu->category->name}}</option>
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
                            <option value="{{$subcategory->id}}" @foreach ($menu->subcategory as $value)
                                @if ($subcategory->id == $value->id)
                                    selected
                                @endif
                            @endforeach>{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select name="status" id="" class="form-control">
                            @if ($menu->status == '1')
                            <option value="1" selected>Show</option>
                            <option value="0">Hidden</option>
                            @else
                            <option value="1">Show</option>
                            <option value="0" selected>Hidden</option>
                            @endif
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