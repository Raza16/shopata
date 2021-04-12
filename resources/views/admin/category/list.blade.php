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
    Categories List
  </h3>
  <div class="page">
  <a type="button"  class="btn btn-info btn-fw" href="{{url('admin/category/create')}}"><i class="icon-plus"></i>&nbsp;Category Add</a>
  {{-- <a type="button" class="btn btn-success btn-fw" href="#">Category CSV</a> --}}
</div>
</div>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data table</h4>
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
                @foreach ($category as $rows)

            <tr role="row" class="odd">
                  <td class="sorting_1">{{$rows->id}}</td>
                  <td>{{$rows->title}}</td>
                  <td>{{$rows->slug}}</td>
                  <td style="text-transform:uppercase">{{$rows->user->name}}</td>
                  <td>
                      <a type="button" href="{{url('admin/category/'.$rows->id.'/edit')}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                        <i class="ti-pencil-alt"></i>&nbsp;
                        Edit
                          {{-- <i class="fas fa-pencil-alt btn-icon-append"></i> --}}
                      </a>
                  </td>
                  <td>

                        <form action="{{ url('admin/category/'.$rows->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" style="padding:10px" class="btn btn-md btn-danger btn-icon-text" style="padding:10px">
                            <i class="ti-trash"></i>&nbsp;Delete
                          </button>
                        </form>
                  </td>
            </tr>

              @endforeach
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
