
@extends('dashboard.layout.template')

@section('title')
    Outlet Menu
@endsection


@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <div class="card-box table-responsive">
                    <h4 class="header-title m-t-0 m-b-30">Menu</h4>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($menus as $index =>$menu)
                                
                            
                            <tr>
                                <td>
                                    <img src="/images/images_menu/{{$menu->image}}"  class="img-fluid" height="100px" width="100px" alt="Preview image">
                                </td>
                                <td>{{$menu->name}}</td>
                                <td>
                                    @if ($menu->category)
                                    {{$menu->category->name}}
                                    @else
                                    
                                    @endif
                                </td>
                                <td>@if ($menu->subcategory)
                                    @foreach ($menu->subcategory as $subcategory)
                                    <ul>
                                        <li>{{$subcategory->name}}</li>
                                    </ul>
                                    @endforeach
                                @endif</td>
                                <td>{{$menu->price}}</td>
                                <td>
                                    <a href="{{route('add.outletmenu',$menu->id)}}" class="btn btn-sm btn-primary waves-effect waves-light" >Add To Outlet</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
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
                    

                    <h4 class="header-title m-t-0 m-b-30">Outlet Menu</h4>
                    

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Outlet</th>
                                <th>Stok</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($outletmenus as $index => $outletmenu)
                                
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>
                                    @if ($outletmenu->menu)
                                        {{$outletmenu->menu->name}}
                                    @endif
                                </td>
                                <td>
                                    @if ($outletmenu->outlet)
                                        {{$outletmenu->outlet->name}}
                                    @endif
                                </td>
                                <td>{{$outletmenu->stok}}</td>
                                <td>{{$outletmenu->price}}</td>
                                <td>
                                    @if ($outletmenu->status == '1')
                                        Aktif
                                    @else
                                        Non-Aktif
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('outletmenu.destroy',$outletmenu->id) }}" method="POST">
                                    
                                        @csrf
                                        @method('DELETE')
                                        
                                        <a href="{{route('outletmenu.edit',$outletmenu->id)}}" class="btn btn-icon icon-left btn-warning "><i class="fa fa-pencil"></i> Update</a>
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