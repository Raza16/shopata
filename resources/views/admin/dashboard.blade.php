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
                        </div>
                        <div class="statistics-item">
                        <p>
                            <i class="fas fa-store menu-icon"></i>&nbsp;&nbsp;&nbsp;
                            Vendors
                        </p>
                        <h2>{{$seller->count()}}</h2>
                        </div>
                        <div class="statistics-item">
                        <p>
                            <i class="ti-bag" style="font-size: 16px"></i>&nbsp;
                            Products
                        </p>
                        <h2>{{$product->count()}}</h2>
                        </div>
                        <div class="statistics-item">
                        <p>
                            {{-- <i class="ti-user" style="font-size: 16px"></i>&nbsp; --}}
                            <i class="icon-people" style="font-size: 20px"></i>&nbsp;
                            Customers
                        </p>
                        <h2>{{$customer->count()}}</h2>
                        </div>
                        <div class="statistics-item">
                        <p>
                            <i class="icon-sm fas fa-chart-line mr-2"></i>
                            Sales
                        </p>
                        <h2>0</h2>
                        </div>
                        <div class="statistics-item">
                        <p>
                            <i class="ti-shopping-cart" style="font-size: 16px"></i>&nbsp;
                            Order Pending
                        </p>
                        <h2>0</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                    <i class="fas fa-calendar-alt"></i>
                    Calendar
                    </h4>
                    <div id="inline-datepicker-example" class="datepicker">
                        <div class="datepicker datepicker-inline">
                            <div class="datepicker-days" style="">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

