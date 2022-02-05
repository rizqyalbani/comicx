@extends('layouts.admin')

@section('title') Dashboard Admin @endsection
@section('head')
<link rel="stylesheet" href="/admin/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('content')
<div class="row">

    <div class="col-xl-3 col-md-6 mb-2">
      <div class="card border-left-primary h-100 py-2">
        <div class="card-body">
        <a href="{{route('admin.user.index')}}">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah User</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['user']}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-800"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-2">
      <div class="card border-left-info h-100 py-2">
        <div class="card-body">
        <a href="{{route('admin.competitor.index')}}">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Peserta</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['competitor']}}</div>
                <small>Total : {{$data['competitor_total']}}</small>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-800"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-2">
      <div class="card border-left-success h-100 py-2">
        <div class="card-body">
        <a href="{{route('admin.competition.index')}}">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kategori Lomba</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['category']}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-table fa-2x text-gray-800"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-2">
      <div class="card border-left-warning h-100 py-2">
        <div class="card-body">
        <a href="{{route('admin.competitionType.index')}}">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tipe Lomba</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['type']}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-trophy fa-2x text-gray-800"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="card border-left-primary py-2">
        <div class="card-body">
          <div class="chart-area">
              <canvas id="myAreaChart"></canvas>
          </div>
          <br>
          <p class="text-center"><small>Pertambahan Peserta Lomba (Bayar)</small></p>
        </div>
      </div>
      <hr>
    </div>
    <div class="col-md-3">
      <div class="card border-left-danger py-2 mb-2">
        <div class="card-body">
        <a href="{{route('admin.payment.index')}}">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pembayaran Pending</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['pending']}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-wallet fa-2x text-gray-800"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="card border-left-success py-2 mb-2">
        <div class="card-body">
        <a href="{{route('admin.payment.index')}}">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Dana</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($data['dana'])}}</div>
              </div>
              <div class="col-auto">
                <i class="fa fa-credit-card fa-2x text-gray-800"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      
      <div class="card">
        <div class="card-header text-gray-800">
          Cek Slot Kategori Lomba
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lomba</th>
                    <th>Slot</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($models as $i => $item)
              <tr>
                <td>{{$i + 1}}</td>
                <td><small>{{$item->name()}}</small></td>
                <td>
                <small>{{$item->competitor->count()}}/{{$item->quota}}</small>
                </td>
                <td>
                <a href="{{route('admin.competitor.index')}}?type={{$item->id}}" class="btn btn-primary btn-sm">Lihat</a>
                </td>
              </tr>
                @empty
                <tr>
                    <td colspan="4">Belum ada data</td>
                </tr>
                @endforelse
    
    
      
                </tbody>
            </table>
           </div>
        </div>
      </div>
    </div>
    
</div>
@endsection

@section('script')
<script src="/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
{{-- <script src="/admin/vendor/jquery/jquery.min.js"></script>
<script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<script src="/admin/vendor/chart.js/Chart.min.js"></script>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';
  
  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }
  
  // Area Chart Example
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: {!!$date_graph!!},
      datasets: [{
        label: "",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "rgba(78, 115, 223, 1)",
        pointRadius: 3,
        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        pointBorderColor: "rgba(78, 115, 223, 1)",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: {!!$invoice_graph!!},
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            maxTicksLimit: 5,
            padding: 10,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
              return number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return number_format(tooltipItem.yLabel);
          }
        }
      }
    }
  });
  </script>
<script>
   $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection
