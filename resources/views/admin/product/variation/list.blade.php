@extends('admin.layouts.master')


@section('title','Product Attributes')

@section('content')

    @if (session('submit'))
    <div id="alert" class="alert alert-success alert-dismissible  in mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        <strong>Done!</strong> {{session('submit')}}
    </div>
    @endif



    @if (session()->has('update'))
    <div id="alert" class="alert alert-primary alert-dismissible in mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        <strong>Done!</strong> {{session('update')}}
    </div>
    @endif

    @if (session('error'))
    <div id="alert" class="alert alert-danger alert-dismissible  in mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
        <strong>Error!</strong> {{session('error')}}
    </div>
    @endif

    @if (session('delete'))
      <div id="alert" class="alert alert-danger alert-dismissible  in mb-1" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
          </button>
          <strong>Deleted!</strong> {{session('delete')}}
      </div>
    @endif

              <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Product Attributes</h4>
                            <p class="card-description">
                              Attributes let you define extra product data, such as size or colour.
                            </p>
                            <form class="forms-sample" action="{{ url('admin/variation')}}" method="POST">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" />
                                <p class="card-description">Name for the attribute (shown on the front-end).</p>
                              </div>
                                <button type="submit" class="btn btn-info mr-2">
                                    <i class="icon-plus"></i>&nbsp;
                                    Add
                                </button>
                            </form>
                          </div>
                        </div>
                    </div>

                    {{-- data table use  --}}
                    <div class="col-md-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                            <table id="sortable-table-1" class="table">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th class="sortStyle ascStyle">Name<i class="fa fa-angle-down"></i></th>
                                      <th class="sortStyle unsortStyle">Terms<i class="fa fa-angle-down"></i></th>
                                    </tr>
                                  </thead>

                                  <tbody>
                                    @foreach ($variation as $item)
                                  <tr>
                                      <td>{{$item->id}}</td>
                                      <td>{{$item->name}}</td>
                                      <td> <a href="{{ url('admin/variation_option/'.$item->id)}}">configure terms</a>
                                       </td>
                                     <td>
                                      <a type="button" href="{{url('admin/variation/'.$item->id.'/edit')}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                                        <i class="ti-pencil-alt"></i>&nbsp;
                                        Edit
                                    </a>
                                    </td>
                                    <td>
                                      <form action="{{ url('admin/variation/'.$item->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" style="padding:10px" class="btn btn-md btn-danger btn-icon-text" style="padding:10px" >
                                        <i class="ti-trash"></i>&nbsp;
                                        Delete
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
                    {{-- data table use end--}}
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

<script src="{{asset('backend/js/alerts.js')}}"></script>



@endsection
