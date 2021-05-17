@extends('admin.layouts.master')

@section('title','Category List')

@section('content')


    @if(session()->has('delete'))
    <div id="alert" class="alert alert-danger alert-dismissible deletefade in mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Delete!</strong> {{session('delete')}}
    </div>
    @endif

    @if(session()->has('update'))
    <div id="alert" class="alert alert-success alert-dismissible  in mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Updated!</strong> {{session('update')}}
    </div>
    @endif

    @if(session()->has('submit'))
    <div id="alert" class="alert alert-success alert-dismissible  in mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong> {{session('submit')}}
    </div>
    @endif

    <div class="page-header">
        <h3 class="page-title">
            Category
        </h3>
        <div class="page">
            <a type="button"  class="btn btn-info btn-fw" href="{{url('admin/category/create')}}"><i class="icon-plus"></i>&nbsp;Add Category</a>
        </div>
    </div>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Categories List</h4>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">

                <div class="row">
                  <div class="col-sm-12">
                  <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
            <thead>
              <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Order #: activate to sort column descending" style="width: 58px;">#</th>
                  <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 103px;">Category</th>
                  <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 103px;">slug</th>
                  <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 103px;">User</th>
                   {{-- <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Purchased On: activate to sort column ascending" style="width: 103px;">User</th> --}}
                  <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 65px;">Edit</th>
                  <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 61px;">Delete</th></tr>
            </thead>
            <tbody>

            @forelse ($categories as $category)

                <tr role="row" class="odd">
                    <td class="sorting_1">{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->slug}}</td>
                    <td style="text-transform:uppercase">{{$category->user->name}}</td>
                    <td>
                        <a type="button" href="{{url('admin/category/'.$category->id.'/edit')}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                            <i class="ti-pencil-alt"></i>&nbsp;
                            Edit
                            {{-- <i class="fas fa-pencil-alt btn-icon-append"></i> --}}
                        </a>
                    </td>
                    <td>

                            <form action="{{ url('admin/category/'.$category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding:10px" class="btn btn-md btn-danger btn-icon-text" style="padding:10px">
                                <i class="ti-trash"></i>&nbsp;Delete
                            </button>
                            </form>
                    </td>
                </tr>

            @empty

                <tr>No Category Found.</tr>

            @endforelse

            </tbody>
          </table>
        </div>
      </div>

    </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection


{{-- script section use =======================>   @section('script') --}}

@section('script')
    <script>
      //--------------------------- Alert message
        $(document).ready(function() {
            $("#alert").fadeTo(500, 100).fadeOut(500, function(){
                $("#alert").alert('close');
            });
        });
    </script>
@endsection
