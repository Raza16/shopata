@extends('admin.layouts.master')


@section('title','Product list')


@section('content')


@if(session()->has('submit'))
<div id="alert" class="alert alert-success alert-dismissible deletefade in mb-1" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Submit!</strong> {{session('submit')}}
</div>
@endif

@if(session()->has('update'))
<div id="alert" class="alert alert-primary alert-dismissible deletefade in mb-1" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Update!</strong> {{session('update')}}
</div>
@endif

@if(session()->has('delete'))
<div id="alert" class="alert alert-danger alert-dismissible deletefade in mb-1" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Deleted !</strong> {{session('delete')}}
</div>
@endif

    <div class="page-header">
        <h3 class="page-title">
        Product List
        </h3>
        <a type="button" class="btn btn-primary btn-fw" href="{{url('admin/product/create')}}">Product Add</a>
    </div>

  <br>
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Product List </h4>

          {{-- <p class="page-description">Add class <code>.sortable-table</code></p> --}}
          <div class="row">
            <div class="table-sorter-wrapper col-lg-12 table-responsive">
              <table id="order-listing" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">


                <thead>
                  <tr>
                    <th>#</th>
                    <th>Image<i class="fa fa-angle-down"></i></th>
                    <th class="sortStyle ascStyle">Title<i class="fa fa-angle-down"></i></th>
                    <th class="sortStyle unsortStyle">Catgeory<i class="fa fa-angle-down"></i></th>
                    <th class="sortStyle unsortStyle">Brand<i class="fa fa-angle-down"></i></th>
                    <th class="sortStyle unsortStyle">Seller<i class="fa fa-angle-down"></i></th>
                    <th class="sortStyle unsortStyle">Status<i class="fa fa-angle-down"></i></th>
                    <th class="sortStyle unsortStyle">View<i class="fa fa-angle-down"></i></th>
                    <th class="sortStyle unsortStyle">Update<i class="fa fa-angle-down"></i></th>
                    <th class="sortStyle unsortStyle">Delete<i class="fa fa-angle-down"></i></th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($product as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><img src="{{asset('backend/images/products/'.$item->product_image)}}" alt=""></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category_id ? $item->category->title : 'Uncategories'}}</td>
                    <td>{{$item->brand_id ? $item->brand->title : "Uncategories"}}</td>
                    <td style="text-transform: uppercase">{{$item->user->name}}</td>
                    <td style="text-transform: uppercase">{{$item->status == 'publish' ? 'Publish' : 'Draft'}}</td>
                    <td>
                      <a href="{{url('shop/'.$item->slug)}}" style="padding:10px" target="_blank" class="btn btn-md btn-success btn-icon-text">
                          View
                      </a>
                    </td>
                    <td>
                      <a href="{{url('admin/product/'.$item->id."/edit")}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                          Edit
                          <i class="fas fa-pencil-alt btn-icon-append"></i>
                      </a>
                    </td>
                    <td>
                        <form action="{{url('admin/product/'.$item->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-md btn-danger btn-icon-text" style="padding:10px"><i class="fas fa-trash btn-icon-prepend"></i>Delete
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

@endsection

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
