@extends('admin.layouts.master')


@section('title','Product Attribute Option')

@section('content')

                  <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">{{$variation->name}}</h4>

                          <p class="card-description">
                            Attribute terms can be assigned to products and variations.
                          </p>

                            <p class="card-description">
                              <b>
                                 Note: Deleting a term will remove it from all products and variations to which it has been assigned. Recreating a term will not automatically assign it back to products.
                              </b>
                            </p>

                          <form class="forms-sample" method="POST" action="{{url('admin/variation_option')}}">
                              @csrf

                            <h5 class="card-description">Add new </h5>

                            <input type="text" name="product_att_id" value="{{$variation->id}}" hidden/>

                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name"  name="name" value="{{old('name')}}" autofocus/>
                              @error('name')
                              <p><small class="text-danger">{{ $errors->first('name') }}</small></p>
                              @enderror
                              <p class="card-description">The name is how it appears on your site.</p>
                            </div>


                              {{-- product image --}}

                            {{-- product image end --}}

                            <button type="submit" class="btn btn-primary mr-2">Add new {{$variation->name}}</button>
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
                                          <th class="sortStyle ascStyle">Name<i class="fa fa-angle-down"></i></th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        @foreach ($variation_option as $item)

                                      <tr>
                                          <td>{{$item->name}}</td>
                                          <td>
                                            <a href="{{ url('admin/variation_option/'.$item->id.'/edit')}}" style="padding:10px" class="btn btn-md btn-primary btn-icon-text">
                                              <i class="fas fa-pencil-alt btn-icon-append"></i>
                                            </a>
                                          </td>
                                          <td>
                                            <form action="{{ url('admin/variation_option/'.$item->id) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" style="padding:10px" class="btn btn-md btn-danger btn-icon-text" style="padding:10px" ><i class="fas fa-trash btn-icon-prepend"></i>
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

