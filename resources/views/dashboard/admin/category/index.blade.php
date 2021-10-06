
@extends('dashboard.layout.template')

@section('title')
    Category
@endsection


@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    

                    <h4 class="header-title m-t-0 m-b-30">Category</h4>
                    <a href="" class="btn btn-icon icon-left btn-primary m-t-1 m-b-20 " ><i class="fa fa-plus"></i> Category</a>
                       

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>
                                    <a href="" class="btn-sm btn-warning " ><i class="fa fa-pencil"></i> Update</a>
                                    <a href="" class="btn-sm btn-danger " ><i class="fa fa-trash"></i> Hapus</a>                                  
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>
                                    <a href="" class="btn-sm btn-warning m-t-1 m-b-20 " ><i class="fa fa-pencil"></i> Update</a>
                                    <a href="" class="btn-sm btn-danger m-t-1 m-b-20 " ><i class="fa fa-trash"></i> Hapus</a>                                  
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->


<!-- end row -->
@endsection