
@extends('dashboard.layout.template')

@section('title')
    Menu
@endsection


@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success mx-4 my-4">
                    <p>{{ $message }}</p>
                </div>
                @elseif($message = session::get('deleted'))
                <div class="alert alert-danger mx-4 my-4">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-box table-responsive">
                    

                    <h4 class="header-title m-t-0 m-b-30">menu</h4>
                    <a href="{{route('menu.create')}}" class="btn btn-icon icon-left btn-primary m-t-1 m-b-20 " ><i class="fa fa-plus"></i> menu</a>
                       

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
                            @foreach ($menus as $index => $menu)
                                
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$menu->name}}</td>
                                <td>{{$menu->slug}}</td>
                                <td>
                                    <form action="{{ route('menu.destroy',$menu->id) }}" method="POST">
                                    
                                        @csrf
                                        @method('DELETE')
                                        
                                        <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-icon icon-left btn-warning "><i class="fa fa-pencil"></i> Update</a>
                                        <button type="submit" class="btn btn-icon icon-left btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Delete</button>
                                    </form>                          
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->


<!-- end row -->
@endsection