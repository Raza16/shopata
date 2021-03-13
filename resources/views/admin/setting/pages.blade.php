@extends('admin.layouts.master')


@section('title','Pages')
    
@section('content')

  <div class="row">

    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
              <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
                </div>
              </div>
              <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
              </div>
          </div>
          <h4 class="card-title">
            <i><img src="{{asset('backend/images/privacy.png')}}" alt="privacy" ></i>
            Privacy Policy
          </h4>
         
        </div>
      </div>
    </div>

    <div class="col-6">
      <div class="card">
        <div class="card-body">
          <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
              <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
            </div>
            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
              <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
            </div>
          </div>
          <h4 class="card-title">
            <i><img src="{{asset('backend/images/terms.png')}}" alt="privacy" ></i>
            Terms & Condition
          </h4>
          {{-- <canvas id="orders-chart" width="460" height="230" class="chartjs-render-monitor" style="display: block; width: 460px; height: 230px;"></canvas>
          <div id="orders-chart-legend" class="orders-chart-legend"><ul class="legend0"><li><span class="legend-label" style="background-color:#392c70"></span>Delivered</li><li><span class="legend-label" style="background-color:#d1cede"></span>Estimated</li></ul></div>                   --}}
        </div>
      </div>
    </div>

  </div>

@endsection