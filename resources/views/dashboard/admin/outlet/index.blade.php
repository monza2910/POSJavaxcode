
@extends('dashboard.layout.template')

@section('title')
    outlet
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
                    

                    <h4 class="header-title m-t-0 m-b-30">outlet</h4>
                    <a href="{{route('outlet.create')}}" class="btn btn-icon icon-left btn-primary m-t-1 m-b-20 " ><i class="fa fa-plus"></i> outlet</a>
                       

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Telephone</th>
                                <th>Whatsapp</th>
                                <th>Instagram</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($outlets as $index => $outlet)
                                
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$outlet->name}}</td>
                                <td>{{$outlet->telp}}</td>
                                <td>{{$outlet->whatsapp}}</td>
                                <td>{{$outlet->instagram}}</td>
                                <td>{{$outlet->alamat}}</td>
                                <td>
                                    @if ($outlet->status == '1')
                                        Aktif
                                    @else
                                        Non-Aktif
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('outlet.destroy',$outlet->id) }}" method="POST">
                                    
                                        @csrf
                                        @method('DELETE')
                                        
                                        <a href="{{route('outlet.edit',$outlet->id)}}" class="btn btn-icon icon-left btn-warning "><i class="fa fa-pencil"></i> Update</a>
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