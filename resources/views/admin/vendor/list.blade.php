@extends('admin.layouts.master')

@section('title','Vendor List')
  
@section('content')

  <div class="container">
    <a type="button" class="btn btn-md btn-primary" href="{{url('admin/vendor/create')}}">Vendor Add</a>
  </div>

  <br>

  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Vendor List </h4>
      
        
        <div class="row">
          <div class="table-sorter-wrapper col-lg-12 table-responsive">
            <table id="sortable-table-1" class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Profile</th>
                  <th class="sortStyle ascStyle">Name<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle ascStyle">Company Name<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle unsortStyle">Company Email<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle ascStyle">Company logo<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle unsortStyle">Update<i class="fa fa-angle-down"></i></th>
                  <th class="sortStyle unsortStyle">Delete<i class="fa fa-angle-down"></i></th>

                </tr>
              </thead>
              <tbody>
                  @foreach ($seller as $rows)
                  
                    <tr role="row" class="odd">
                          <td class="sorting_1"><div class="badge badge-pill {{$rows->status == 0 ? 'badge-danger' : 'badge-success'}}">{{$rows->id}}</div> </td>
                          <td><img src="{{$rows->image  ? asset('backend/images/vendor/'.$rows->image) : 'https://via.placeholder.com/200x200?text=Profile Image'}}" width="50px" height="auto"/></td>
                          <td>{{$rows->username}}</td>
                          <td>{{$rows->company_name}}</td>
                          <td>{{$rows->company_email}}</td>
                          <td><img src="{{$rows->company_logo ? asset('backend/images/vendor/'.$rows->company_logo) : 'https://via.placeholder.com/200x200?text=Company Logo'}}" width="50px" height="auto"/></td>
                          <td>
                              <a type="button" href="{{url('admin/vendor/'.$rows->id.'/edit')}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                                  Edit
                                  <i class="fas fa-pencil-alt btn-icon-append"></i>
                              </a>
                          </td>
                          <td>
                            <form action="{{ url('admin/vendor/'.$rows->user_id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              {{-- <input type="hidden" value="{{$rows->user_id}}" name="user_id"> --}}
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