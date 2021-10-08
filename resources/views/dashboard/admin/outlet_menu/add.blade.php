
@extends('dashboard.layout.template')

@section('title')
    Menu
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
           
            <div class="card-box">
    
                <h4 class="header-title m-t-0 m-b-30">Create Menu in Outlet</h4>
    
                <form class="form-horizontal" role="form" method="POST" action="{{route('outletmenu.store')}}" >
                    @csrf
                    <input type="text" hidden name="menu_id" value="{{$menu->id}}">

                    <div class="form-group">
                        <label class="control-label">Outlet</label>
                        <select name="outlet_id" id="" class="form-control">
                            @foreach ($outlets as $outlet)
                            <option value="{{$outlet->id}}">{{$outlet->name.' ('.$outlet->address.')' }}</option>
                            @endforeach
                        </select>
                        @error('outlet')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <img src="/images/images_menu/{{$menu->image}}"  class="img-fluid" height="300px" width="300px" alt="Preview image">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" value="{{$menu->name}}" readonly class="form-control">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
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
                                <input type="number" min="0" name="stok" value="{{old('stok')}}" class="form-control">
                                @error('stok')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                   
                    

                    <div class="form-group">
                        <label class="control-label">Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Non-Active</option>
                        </select>
                        @error('status')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('outletmenu.index')}}" class="btn btn-default">Back</a>
                    </div>
                </form>
            </div>    
        </div><!-- end col -->
    </div>
</div>

@endsection