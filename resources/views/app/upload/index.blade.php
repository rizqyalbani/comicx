@extends('layouts.admin')

@section('title') Upload Karya @endsection
@section('back_button')
<a href="/home" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
      @if (now()->toDateTimeString() <= "2022-02-16 23:59")
        <div class="row align-items-center" style="min-height: 500px" >
          <div class="col-lg-12 waiting-upload">
            <h1 class="text-center text-white font-weight-bold">Menunggu Waktu Pengumpulan Karya</h1>
            <h4 class="text-center text-white font-weight-bold">17 Februari 2022 WITA</h4>
            <div id="countdown-karya" class="text-center mt-4"></div>
          </div>
        </div>
      @elseif (now()->toDateTimeString() >= '2022-02-18 20:00' )
        <div class="row align-items-center" style="min-height: 500px" >
          <div class="col-lg-12 waiting-upload">
            <h1 class="text-center text-white font-weight-bold">Pengumpulan karya telah ditutup</h1>
            <h4 class="text-center text-white font-weight-bold">18 Februari 2022, 20.00 WITA</h4>
          </div>
        </div>
      @else
        @if($models->count() < 1)
          <div class="row">
            <div class="col-md-12">
              <p class="mt-3 text-white text-center"><b>Belum ada data.</b> <br> Segera lakukan pendaftaran dan pembayaran</p>
            </div>
          </div>
        @else 
            
            <div class="row mt-3">

              <div class="col-md-12">
                <div class="form-group">
                <label for="" class="label text-white">Pilih Status :</label>
                  <select style="max-width: 300px;" name="" id="status_upload" class="form-control">
                    <option  value="{{route('app.upload.index')}}">Semua Status</option>
                    <option @if(\Request::fullUrl() == route('app.upload.index', ['status'=>0])) selected @endif  value="{{route('app.upload.index')}}?status=0">Belum diupload</option>
                  <option @if(\Request::fullUrl() == route('app.upload.index', ['status'=>1])) selected @endif value="{{route('app.upload.index')}}?status=1">Sudah diupload</option>
                  </select>
                
                </div>
                <hr>
              </div>

              @foreach ($models as $key => $item)
                <div class="col-md-4">
                  <div class="card mb-3">
                    <div class="card-body text-gray-800">
                      <b class="">{{$item->number()}}</b> 
                      @if($item->submission_status == '1')
                      <span class="badge badge-success">Karya diterima</span>
                    @endif
                      <p>{{$item->competitionCategory->name()}}</p>
                      
                      <hr style="margin: 5px 0;">
                      @foreach ($item->competitorDetail as $detail)
                          <li><small>{{$detail->name}}</small></li>
                      @endforeach
                      <a href="{{route('app.upload.show', $item->uuid)}}" class="mt-2 btn btn-success btn-sm float-right"><i class="fa fa-upload"></i></a>
                    </div>
                  </div>
                </div>
              @endforeach
            
              
            </div>

        @endif
      @endif
    </div>
</div>
@endsection

@section('script')
    <!--Counter up -->
    <script src="{{url('assets/js/jquery.counterup.min.js')}}"></script>
    <!--Counter down -->
    <script src="{{url('assets/js/jquery.countdown.min.js')}}"></script>

    <script>
      $('#status_upload').change(function(){
        window.location = $(this).find('option:selected').val();
      });

      $("#countdown-karya").countdown("2022/02/17", function(event) {
        $(this).html(
            event.strftime('<div>%D <span class="d-inline"> Hari</span></div>  <div class="d-inline" >%H<span> Jam</span></div> <div>%M<span> Menit</span></div> <div>%S<span> Detik</span></div>')
        );
      });

    </script>
@endsection


