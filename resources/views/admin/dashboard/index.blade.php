@extends('template.master')
@section('content')

<div class="col-lg-12 grid-margin stretch-card">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">Dashboard</h4>

                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 grid-margin  grid-margin-lg-0">
                    <div class="ps-0 pl-lg-4 ">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <div class="d-xl-flex justify-content-between align-items-center mb-2">
                            <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                            </div>
                            <div class="d-lg-flex">
                                <p class="me-2 mb-0">Penjualan</p>
                            </div>
                        </div>
                        <div class="graph-custom-legend clearfix" id="device-sales-legend">
                         
                        </div>
                        <canvas id="device-sales" width="662" height="331"
                            style="display: block; width: 662px; height: 331px;"
                            class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')
<script src="{{asset('template/assets/js/dashboard_penjualan.js')}}"></script>

<script>
    $(document).ready(()=>{
        var penjualan = @json($penjualan);
        var bulan=[];
        var total=[];
        penjualan.map((data)=>{
            bulan.push(data.bulan);
            total.push(data.total)
        })
        barChartx.data.datasets[0].data = total;
        barChartx.data.labels = bulan;
        barChartx.update();
    })
    
</script>



@endsection