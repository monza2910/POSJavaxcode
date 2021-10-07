
@extends('dashboard.layout.template')

@section('title')
    outlet
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
           
            <div class="card-box">
    
    
                <h4 class="header-title m-t-0 m-b-30">Create outlet</h4>
    
                <form class="form-horizontal" role="form" method="POST" action="{{route('outlet.store')}}">
                    @csrf
                    <div class="form-group ">
                        <label class="control-label">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="control-label">Telephone (Optional)</label>
                        <input type="text"name="telp" value="{{old('telp')}}" class="form-control">
                        @error('telp')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group ">
                        <label class="control-label">Whatsapp (Optional)</label>
                        <input type="text"name="whatsapp" value="{{old('whatsapp')}}" class="form-control">
                        @error('whatsapp')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group ">
                        <label class="control-label">Instagram (Optional)</label>
                        <input type="text"name="instagram" value="{{old('instagram')}}" class="form-control">
                        @error('instagram')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group ">
                        <label class="control-label">Address</label>
                        <textarea name="address" class="form-control" id="" cols="30" rows="10">{{old('address')}}</textarea>
                        @error('address')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
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
                        <a href="{{route('outlet.index')}}" class="btn btn-default">Back</a>
                    </div>
                </form>
            </div>    
        </div><!-- end col -->
    </div>
</div>

@endsection