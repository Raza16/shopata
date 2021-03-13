@extends('admin.layouts.master')


@section('title','Dashboard')


@section('content')
<div class="page-header">
  <h3 class="page-title">
    Dashboard
  </h3>
</div>

<div class="row grid-margin">
  <div class="col-12">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="statistics-item">
              <p>
                <i class="icon-sm fa fa-user mr-2"></i>
                Employee
              </p>
              <h2>{{$user->count()}}</h2>
              {{-- <label class="badge badge-outline-success badge-pill">2.7% increase</label> --}}
            </div>
            <div class="statistics-item">
              <p>
                <i class="fas fa-store menu-icon"></i>
                Vendors
              </p>
              <h2>0</h2>
              {{-- <label class="badge badge-outline-danger badge-pill">30% decrease</label> --}}
            </div>
            <div class="statistics-item">
              <p>
                {{-- <i class="icon-sm fas fa-cloud-download-alt mr-2"></i> --}}

                <i><img src="{{asset('backend/images/product.png')}}" style="width:25px ; height:auto;background-color: white; border-radius:15px" alt=""> </i>&nbsp;
                Products
              </p>
              <h2>{{$product->count()}}</h2>
              {{-- <label class="badge badge-outline-success badge-pill">12% increase</label> --}}
            </div>
            <div class="statistics-item">
              <p>
                {{-- <i class="icon-sm fas fa-check-circle mr-2"></i> --}}
                <i><img src="{{asset('backend/images/shopping.png')}}" style="width:25px ; height:auto ;background-color: white; border-radius:15px " alt=""> </i>&nbsp;
                Customers
              </p>
              <h2>0</h2>
              {{-- <label class="badge badge-outline-success badge-pill">57% increase</label> --}}
            </div>
            <div class="statistics-item">
              <p>
                <i class="icon-sm fas fa-chart-line mr-2"></i>
                Sales
              </p>
              <h2>0</h2>
              {{-- <label class="badge badge-outline-success badge-pill">10% increase</label> --}}
            </div>
            <div class="statistics-item">
              <p>
                <i class="icon-sm fas fa-circle-notch mr-2"></i>
                Order Pending
              </p>
              <h2>0 </h2>
              {{-- <label class="badge badge-outline-danger badge-pill">16% decrease</label> --}}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

