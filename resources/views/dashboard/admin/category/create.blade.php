
@extends('dashboard.layout.template')

@section('title')
    Category
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
    
    
                <h4 class="header-title m-t-0 m-b-30">Create Category</h4>
    
                <form class="form-horizontal" role="form">
                    <div class="form-group ">
                        <label class="control-label">Text</label>
                        <input type="text" class="form-control">
                    </div>
                    
                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>    
        </div><!-- end col -->
    </div>
</div>

@endsection