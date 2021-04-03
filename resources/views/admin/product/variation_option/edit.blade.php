@extends('admin.layouts.master')


@section('title','Product Attribute Option')

@section('content')

                  <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Update {{$variation_option->name}}</h4>

                          <p class="card-description">
                            Attribute terms can be assigned to products and variations.
                          </p>

                            <p class="card-description">
                              <b>
                                 Note: Deleting a term will remove it from all products and variations to which it has been assigned. Recreating a term will not automatically assign it back to products.
                              </b>
                            </p>

                          <form class="forms-sample" method="POST" action="{{url('admin/variation_option/'.$variation_option->id)}}">
                            @csrf
                            @method('PUT')

                            <h5 class="card-description">Update</h5>

                            <input type="text" name="variant_id" value="{{$variation_option->variant_id}}" hidden/>

                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name"  name="name" value="{{$variation_option->name}}"/>
                              @error('name')
                              <p><small class="text-danger">{{ $errors->first('name') }}</small></p>
                              @enderror
                              <p class="card-description">The name is how it appears on your site.</p>
                            </div>


                              {{-- product image --}}

                            {{-- product image end --}}

                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                          </form>
                        </div>
                      </div>
                    </div>

                        {{-- data table use  --}}

                        {{-- data table use end--}}

                  </div>


@endsection

