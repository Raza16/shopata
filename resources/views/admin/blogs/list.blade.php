@extends('admin.layouts.master')


@section('title','Blogs List')


@section('content')

    @if(session()->has('submit'))
    <div id="alert" class="alert alert-success alert-dismissible  in mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong> {{session('submit')}}
    </div>
    @endif

    @if(session()->has('update'))
    <div id="alert" class="alert alert-primary alert-dismissible in mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Update!</strong> {{session('update')}}
    </div>
    @endif


  <div class="container">
    <div class="page-header">
        <h3 class="page-title">
            Blog
        </h3>
        <a type="button" class="btn btn-info btn-fw" href="{{url('admin/blog/create')}}">

            <i class="icon-plus"></i>&nbsp;
            Add Blog

        </a>
    </div>
    <br>
  </div>
  <br>

  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Blog List </h4>


        <div class="row">
          <div class="table-sorter-wrapper col-lg-12 table-responsive">
            <table id="sortable-table-1" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="sortStyle ascStyle">Title<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle ascStyle">slug<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle ascStyle">Image<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle unsortStyle">Created Date<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle unsortStyle">Delete<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle unsortStyle">Update<i class="fa fa-angle-down"></i></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($blog as $rows)

                  <tr role="row" class="odd" >
                        <td class="sorting_1">{{$rows->id}}</td>
                        <td>{{$rows->title}}</td>
                        <td>{{$rows->slug}}</td>
                        <td><img src="{{asset('backend/images/blogs/feature_image/'.$rows->image)}}" width="50px" height="auto"/></td>
                        <td>{{$rows->created_at->format('Y-m-d')}}</td>
                        <td>
                            <a type="button" href="{{url('admin/blog/'.$rows->slug.'/edit')}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                                Edit
                                <i class="fas fa-pencil-alt btn-icon-append"></i>
                            </a>
                        </td>
                        <td>
                          <form action="{{ url('admin/blog/'.$rows->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding:10px" class="btn btn-md btn-danger btn-icon-text" style="padding:10px"><i class="fas fa-trash btn-icon-prepend"></i>Delete
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
