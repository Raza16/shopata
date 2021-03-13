@extends('admin.layouts.master')

@section('title','Product PPOM')
    
@section('content')
<div class="container">
  <h4 class="card-title">PPOM Fileds </h4>
  <br>
</div>

<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Product List </h4>
     
      {{-- <p class="page-description">Add class <code>.sortable-table</code></p> --}}
      <div class="row">
        <div class="table-sorter-wrapper col-lg-12 table-responsive">
          <table id="sortable-table-1" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th class="sortStyle ascStyle">Name<i class="fa fa-angle-down"></i></th>
                <th class="sortStyle unsortStyle">Meta<i class="fa fa-angle-down"></i></th>
                <th class="sortStyle unsortStyle">Select Products<i class="fa fa-angle-down"></i></th>
                <th class="sortStyle unsortStyle">Delete<i class="fa fa-angle-down"></i></th>
                <th class="sortStyle unsortStyle">Update<i class="fa fa-angle-down"></i></th>
              </tr>
            </thead>

            {{-- <tbody>
              @foreach ($product as $item)
                  
             
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->category_id}}</td>
                <td>{{$item->brand_id}}</td>
                <td>{{$item->user_id}}</td>
                <td>
                  <a href="{{url('product/'.$item->id."/edit")}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                      Edit
                      <i class="fas fa-pencil-alt btn-icon-append"></i>
                  </a>
              </td>
              <td>
                  <form action="{{url('product/'.$item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-md btn-danger btn-icon-text" style="padding:10px"><i class="fas fa-trash btn-icon-prepend"></i>Delete
                    </button>
                  </form>
              </td>
              </tr>
              @endforeach
             </tbody> --}}

          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection