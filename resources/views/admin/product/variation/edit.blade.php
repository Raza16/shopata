@extends('admin.layouts.master')


@section('title','Product Attributes')

@section('content')


              <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Product Attributes Edit {{$variation->name}}</h4>
                            <p class="card-description">
                              Attributes let you define extra product data, such as size or colour.
                            </p>
                            <form class="forms-sample" action="{{ url('admin/variation/'.$variation->id)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$variation->name}}" />
                                <p class="card-description">Name for the attribute (shown on the front-end).</p>
                              </div>
                              <button type="submit" class="btn btn-primary mr-2">Update {{$variation->name}}</button>
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
                                      <th class="sortStyle unsortStyle">slug<i class="fa fa-angle-down"></i></th>
                                      
                                    </tr>
                                  </thead>
                      
                                  <tbody>
                                    @foreach ($variation_all as $item)
                                  <tr>
                                      <td>{{$item->id}}</td>
                                      <td>{{$item->name}}</td>
                                      <td>{{$item->slug}}</td>
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

  $("#name").keyup(function(){
    var str = $(this).val();
    var trims = $.trim(str)
    var slug = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    $("#slug").val(slug.toLowerCase());
  });

</script>

@endsection