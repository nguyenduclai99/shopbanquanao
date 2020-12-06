@extends('admin.index')
<!-- Page Content -->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Quản Trị Hệ Thống</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$categories}}</h3>
                            <p>DANH MỤC</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-align-right"></i>
                        </div>
                        <a href="{{route('admin.category.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$products}}</h3>
                            <p>SẢN PHẨM</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a href="{{route('admin.product.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$users}}</h3>
                            <p>THÀNH VIÊN</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('admin.user.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$distributors}}</h3>
                            <p>NHÀ PHÂN PHỐI</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('admin.distributor.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$articles}}</h3>
                            <p>BÀI VIẾT</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <a href="{{route('admin.article.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$transactions}}</h3>
                            <p>ĐƠN HÀNG</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{route('admin.transaction.index')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <figure class="highcharts-figure">
                      <div id="chart_transaction" data-list-day="{{$listDayofMonth}}"></div>
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Danh sách đơn hàng mới nhất</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Thông tin</th>
                                            <th>Trạng thái</th>
                                            <th>Ngày tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactionsList as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td style="text-align:left !important">
                                                <ul>
                                                    <li>Tên: {{$data->tst_name}}</li>
                                                    <li>Email: {{$data->tst_email}}</li>
                                                    <li>SĐT: {{$data->tst_phone}}</li>
                                                    <li>Địa Chỉ: {{$data->tst_address}}</li>
                                                    <li>Ghi Chú: {{$data->tst_note}}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn {{ $data->getStatus($data->tst_status)['class'] }} btn-sm">{{ $data->getStatus($data->tst_status)['name'] }}</button>
                                                    <div class="btn-group">
                                                    </div>
                                                </div>  
                                            </td>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{route('admin.transaction.index')}}" class="btn btn-sm btn-secondary float-right">Xem chi tiết</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
                <div class="col-md-5">
                  <figure class="highcharts-figure">
                    <div id="pie_transaction" data-json="{{$statusTransaction}}"></div>
                  </figure>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  <script src="{{asset('admin/highcharts/highcharts.js')}}"></script>
  <script src="{{asset('admin/highcharts/modules/data.js')}}"></script>
  <script src="{{asset('admin/highcharts/modules/drilldown.js')}}"></script>
  <script src="{{asset('admin/highcharts/modules/series-label.js')}}"></script>
  <script src="{{asset('admin/highcharts/modules/exporting.js')}}"></script>
  <script src="{{asset('admin/highcharts/modules/export-data.js')}}"></script>
  <script src="{{asset('admin/highcharts/modules/accessibility.js')}}"></script>   
<script>
    var dataListDay = $("#chart_transaction").attr("data-list-day");
    dataListDay = JSON.parse(dataListDay);

    // Highcharts.chart('chart_transaction', {

    //     title: {
    //         text: 'Thống kê đơn hàng trong tháng'
    //     },

    //     subtitle: {
    //         text: 'Đơn hàng theo ngày'
    //     },

    //     yAxis: {
    //         title: {
    //             text: 'Tổng số đơn hàng'
    //         }
    //     },

    //     xAxis: {
    //         accessibility: {
    //             rangeDescription: 'Range: 1 to 30'
    //         }
    //     },

    //     legend: {
    //         layout: 'vertical',
    //         align: 'right',
    //         verticalAlign: 'middle'
    //     },

    //     plotOptions: {
    //         series: {
    //             label: {
    //                 connectorAllowed: false
    //             },
    //             pointStart: 2010
    //         }
    //     },

    //     series: [{
    //         name: 'Installation',
    //         data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    //     }, {
    //         name: 'Manufacturing',
    //         data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    //     }, {
    //         name: 'Sales & Distribution',
    //         data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    //     }, {
    //         name: 'Project Development',
    //         data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    //     }, {
    //         name: 'Other',
    //         data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    //     }],

    //     responsive: {
    //         rules: [{
    //             condition: {
    //                 maxWidth: 500
    //             },
    //             chartOptions: {
    //                 legend: {
    //                     layout: 'horizontal',
    //                     align: 'center',
    //                     verticalAlign: 'bottom'
    //                 }
    //             }
    //         }]
    //     }

    // }); 
</script>

<script type="text/javascript">
  var dataTransaction = $("#pie_transaction").attr("data-json");
      dataTransaction = JSON.parse(dataTransaction);

  Highcharts.chart('pie_transaction', {
      chart: {
          type: 'pie'
      },
      title: {
          text: 'Thống kê tổng số đơn hàng'
      },
      subtitle: {
          text: 'Tổng số đơn hàng: <a href="{{route('admin.transaction.index')}}" target="_blank">Xem chi tiết</a>'
      },

      accessibility: {
          announceNewData: {
              enabled: true
          },
          point: {
              valueSuffix: '%'
          }
      },

      plotOptions: {
          series: {
              dataLabels: {
                  enabled: true,
                  format: '{point.name}: {point.y}'
              }
              
          }
      },

      tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
      },

      series: [{
          name: "Browsers",
          colorByPoint: true,
          data: dataTransaction,
          showInLegend: true
      }]
  });
</script>
@endsection