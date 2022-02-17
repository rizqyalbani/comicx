<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="ryanadhitama">

  <title>@yield('title') - {{config("app.name")}}</title>
  <link href="/assets/img/icon-matalogi.png" rel="icon">

  <!-- Custom fonts for this template-->
  <link href="/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="/admin/css/style.css" rel="stylesheet">

  @yield('head')

  <style>
    @media screen and (max-width: 600px){
      #sidebarToggleTop, .sidebar{
        display: none !important;
      }

      #bottom-nav{
        display: block !important;
      }

      .nav-radius{
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }

    }

    .detail-competitor hr{
      border-top: 1px dashed rgba(0,0,0,.3);
    }

    .bottom-nav{
      padding: 0;
      list-style: none;
      margin: 10px auto;
    }

    .bottom-nav li{
      display: inline-block;
    }

    .bottom-nav li.active a{
      color: #4e73df !important;
    }

    .line-height-1{
      line-height: 1em;
    }

    @media screen and (min-width: 601px){
      #bottom-nav{
        display: none !important;
      }
    }
  </style>
  <style>

    .sidebar .nav-item .nav-link[data-toggle=collapse].collapsed::after,
    .sidebar-dark .nav-item .nav-link[data-toggle=collapse]::after{
      display: none;
    }

    .sidebar .collapse-inner a.store, #collapseStore .nav-link,
    .sidebar .collapse-inner a.store, #collapseAdmin .nav-link{
      display: none !important;
    }

  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <div id="bottom-nav" style="position: fixed;bottom: 0;z-index: 9999;width: 100%;">
      <nav class="navbar navbar-expand navbar-light bg-white static-top shadow" style="height: 67px; border-top-left-radius: 20px;
      border-top-right-radius: 20px;">
        <ul class="bottom-nav">
          @if(Auth::user()->isAdmin == 1)
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link text-gray-800 dropdown-toggle text-center" href="#" id="dropdownStore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-user"></i>
              <span style="display: block; font-size: 13px;">Beranda</span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dropdownStore" style="top: -350px; margin-left: -20px; margin-right: auto; left: 0; right: 0;">
  
              <a class="dropdown-item" href="{{route('admin.index')}}">
                Dashboard Admin
              </a>
              <a class="dropdown-item" href="{{route('home')}}">
                Dashboard User
              </a>
              <a class="dropdown-item" href="{{route('admin.competition.index')}}">
                Kategori Lomba
              </a>
              <a class="dropdown-item" href="{{route('admin.competitionType.index')}}">
                Jenis Lomba
              </a>
              <a class="dropdown-item" href="{{route('admin.payment.index')}}">
                Pembayaran
              </a>
              <a class="dropdown-item" href="{{route('admin.competitor.index')}}">
                Peserta
              </a>
              <a class="dropdown-item" href="{{route('admin.user.index')}}">
                User
              </a>
              <a class="dropdown-item" href="{{route('admin.question.index')}}">
                Pertanyaan
              </a>
              <a class="dropdown-item" href="{{route('admin.sponsor.index')}}">
                Sponsor
              </a>
              <a class="dropdown-item" href="{{route('admin.paymentMethod.index')}}">
                Metode Bayar
              </a>
              <a class="dropdown-item" href="{{route('admin.panduan.index')}}">
                Panduan
              </a>
              
              
            </div>
        </li>
          @else
          <li class="nav-item">
            <a class="nav-link text-center text-gray-800" href="/home">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span style="display: block; font-size: 13px;">Beranda</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
          <a class="nav-link text-center text-gray-800" href="{{route('app.competitor.index')}}">
              <i class="fas fa-fw fa-trophy"></i>
              <span style="display: block; font-size: 13px;">Lomba</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center text-gray-800" href="{{route('app.payment.index')}}">
              <i class="fas fa-fw fa-wallet"></i>
              <span style="display: block; font-size: 13px;">Bayar</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center text-gray-800" href="{{route('app.upload.index')}}">
              <i class="fas fa-fw fa-upload"></i>
              <span style="display: block; font-size: 13px;">Upload</span>
            </a>
          </li>
         
          {{--  --}}
          
        </ul>
      </nav>
    </div>
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #0f0f0f" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-text mx-3 p-5">
          <img width="100%" src="/img/general/comic-x.png" alt="COMIC X - 2022">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      @if(Auth::user()->isAdmin == 1)
      <li class="nav-item">
        <a class="store nav-link collapsed text-center" href="" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="false" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user"></i>
          <br>
          <span>Admin</span>
          <div id="collapseAdmin" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
            
              <a class="collapse-item @if(\URL::current() == route('admin.index')) active @endif" href="{{route('admin.index')}}">Dashboard</a>
              <a class="collapse-item @if(\URL::current() == route('admin.competition.index')) active @endif" href="{{route('admin.competition.index')}}"> Lomba</a>
              <a class="collapse-item @if(\URL::current() == route('admin.competitionType.index')) active @endif" href="{{route('admin.competitionType.index')}}">Tipe Lomba</a>
              <a class="collapse-item @if(\URL::current() == route('admin.payment.index')) active @endif" href="{{route('admin.payment.index')}}">Pembayaran</a>
              {{-- <a class="collapse item @if(\URL::current() == route('admin.upload.index')) active @endif" href="{{route('admin.upload.index')}}">Upload Karya</a> --}}
              <a class="collapse-item @if(\URL::current() == route('admin.competitor.index')) active @endif" href="{{route('admin.competitor.index')}}">Peserta</a>
              <a class="collapse-item @if(\URL::current() == route('admin.user.index')) active @endif" href="{{route('admin.user.index')}}">User</a>
              <a class="collapse-item @if(\URL::current() == route('admin.question.index')) active @endif" href="{{route('admin.question.index')}}">Pertanyaan</a>
              <a class="collapse-item @if(\URL::current() == route('admin.sponsor.index')) active @endif" href="{{route('admin.sponsor.index')}}">Sponsor</a>
              <a class="collapse-item @if(\URL::current() == route('admin.paymentMethod.index')) active @endif" href="{{route('admin.paymentMethod.index')}}">Metode Pembayaran</a>
              <a class="collapse-item @if(\URL::current() == route('admin.panduan.index')) active @endif" href="{{route('admin.panduan.index')}}">Panduan</a>
              
              
            </div>
          </div>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link text-center" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <br>
          <span>Dashboard</span>
        </a>
      </li>

      

      <li class="nav-item">
        <a class="nav-link text-center @if(\URL::current() == route('app.competitor.index')) active @endif" href="{{route('app.competitor.index')}}">
          <i class="fas fa-fw fa-trophy"></i>
          <br>
          <span>Peserta Lomba</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center @if(\URL::current() == route('app.payment.index')) active @endif" href="{{route('app.payment.index')}}">
          <i class="fas fa-fw fa-wallet"></i>
          <br>
          <span>Pembayaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center @if(\URL::current() == route('app.upload.index')) active @endif" href="{{route('app.upload.index')}}">
          <i class="fas fa-fw fa-upload"></i>
          <br>
          <span>Upload Karya</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-center @if(\URL::current() == route('panduan.index')) active @endif" href="{{route('panduan.index')}}" target="_blank">
          <i class="fas fa-fw fa-book"></i>
          <br>
          <span>Panduan</span>
        </a>
      </li>


      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" class="pb-2" style="background-color:#191919">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow nav-radius">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        <a target="_blank" href="{{route('panduan.index')}}" class="btn btn-info btn-icon-split btn-sm">
            <span class="icon text-white-50">
              Panduan <i class="fas fa-question-circle"></i>
            </span>
          </a>

          
          <a target="_blank" href="/" class="ml-2 btn btn-success btn-sm">
            Website <i class="fas fa-external-link-alt"></i>
          </a>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
              <?php
                  $b = 0;
                    $msg  = \App\Models\Message::isActive()->isForYou()->orderBy('id','desc')->get();

                    foreach ($msg as $value) {
                      if($value->isNotRead()) {
                        $b++;
                      }
                    }
                ?>
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                  @if($b > 0)
              <span class="badge badge-danger badge-counter">{{$b}}</span>
                  @endif
              </a>
              <!-- Dropdown - Alerts -->
              <div style="" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                      Pemberitahuan
                  </h6>

                  
                  <div style="height: 300px; overflow-y:scroll;">
                    <?php
                    $msg  = \App\Models\Message::isActive()->isForYou()->orderBy('id','desc')->get();
                  ?>
                  @foreach ($msg as $item)
                  <a @if($item->isNotRead()) style="background-color: #f8f9fc;" @endif class="dropdown-item d-flex align-items-center " href="{{route('message.show', $item->id)}}">
                      {{-- <div class="mr-3">
                          <div class="icon-circle bg-primary">
                              <i class="fas fa-file-alt text-white"></i>
                          </div>
                      </div> --}}
                      <div>
                          <div class="small text-gray-500">{{$item->date()}}</div>
                          <span class="font-weight-bold">{{$item->name}}</span> <br>
                          <small>
                            <p class="text-gray-800">{!!$item->description!!}</p>
                          </small>
                      </div>
                  </a>
                  @endforeach
                </div>

                  
                  <a class="dropdown-item text-center small text-gray-500" href="#">&nbsp;</a>
              </div>
          </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
              <div style="text-align: center; padding-top: 4px; background: #323c6d;" class="img-profile rounded-circle">{{Auth::user()->getFirstChar()}}</div>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{route('account.index')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profile
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          @yield('back_button')
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-300">@yield('title')</h1>
          </div>

          @include('layouts.include.breadcrumbs', ['title' => app()->view->getSections()['title']])
          @if(\Session::has('success'))
                    <div class="row">
                      <div class="col-md-12">
                        <small>
                          <div class="alert alert-success alert-dismissible fade show">
                            {{\Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </small>
                      </div>
                    </div>
          @endif
          @if(\Session::has('info'))
                    <div class="row">
                      <div class="col-md-12">
                        <small>
                          <div class="alert alert-info alert-dismissible fade show">
                            {{\Session::get('info')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </small>
                      </div>
                    </div>
          @endif
          @if(\Session::has('error_msg'))
                    <div class="row">
                      <div class="col-md-12">
                        <small>
                          <div class="alert alert-danger alert-dismissible fade show">
                            {{\Session::get('error_msg')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </small>
                      </div>
                    </div>
          @endif
          @if (count($errors) > 0)
          <div class="row">
            <div class="col-md-12">
              <small>
                <div class="alert alert-danger alert-dismissible fade show">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                </div>
              </small>
            </div>
          </div>
          @endif

          @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Comic X {{date('Y')}}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih <b>keluar</b> di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary w-100" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            Keluar
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
        </div>
      </div>
    </div>
  </div>
    @if (now()->toDateTimeString() > "2022-02-17 00:00:00" && now()->toDateTimeString() <= "2022-02-18 20:00:00")        
    <div class="alert alert-light alert-dismissible fade show notif-lomba pr-0 p-3" role="alert">
      <h5 class="card-title mb-0 text-center mt-2">Pengumuman</h5>
      <p class="card-text text-center">Batas Akhir Pengumpulan Karya <br> 18 Februari 2022, 20.00 WITA </p>
      <h3 id="countdown-popup" class="text-center mb-0 text-center"></h3>
      <a href="{{url('app/upload')}}" class="btn btn-primary text-center d-block m-2">Kumpul Karya!</a>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

  <!-- Bootstrap core JavaScript-->
  <script src="/admin/vendor/jquery/jquery.min.js"></script>
  <script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/admin/js/sb-admin-2.min.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="{{url('assets/js/jquery.countdown.min.js')}}"></script>

  @yield('script')
</body>

<script>
  $("#countdown-popup").countdown("2022/02/18 20:00:00", function(event) {
        console.log(event.offset.totalHours);
        $(this).html(
            event.strftime('<div>%D<span class="d-inline"></span></div>:<div class="d-inline" >%H<span></span></div>:<div>%M<span></span></div>:<div>%S<span></span></div>')
        );
      });
</script>

<script>

  @if (Auth::user()->isAdmin == 0)
    @if (isset($paymentChecker))

        Swal.fire({
        title: 'Batas Waktu Pembayaran Berakhir',
        html: "Pembayaran atas Nama <br> <strong>{{$paymentChecker['dataName']}}</strong> - <strong>{{$paymentChecker['dataDetail']->name . ' ' . $paymentChecker['level'] . $paymentChecker['fullGender'] }}</strong> dibatalkan karena batas waktu pembayaran telah berakhir. Silahkan melakukan pendaftaran ulang",
        icon: 'error',
        confirmButtonText: '<a class="text-white text-decoration-none" href="{{url('app/competitor')}}">Lanjutkan</a>'
      })
      {{App\Http\Controllers\PaymentChecker::deleteAutoLatePayment()}};

    @endif
  @endif

</script>

<script>
  $(document).ready(function(){
    $('#accordionSidebar li').each(function(){
      var current = window.location.href;
      var a = $(this).find('a').attr('href');

      if(a == current){
        $(this).addClass('active');
      }

    });

    $('#bottom-nav li').each(function(){
      var current = window.location.href;
      var a = $(this).find('a').attr('href');

      if(a == current){
        $(this).addClass('active');
      }

    });
  });
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(element).select();
        document.execCommand("copy");
        $temp.remove();
        alert('Berhasil salin link');
    }
</script>
</html>
