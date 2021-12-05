@extends('layouts.admin')

@section('title') Upload Karya @endsection
@section('back_button')
<a href="/home" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        @if($models->count() < 1)
    
          <p class="mt-3 text-gray-800"><b>Belum ada data.</b> <br> Segera lakukan pendaftaran dan pembayaran</p>
    
        @else 
          
          <div class="row mt-3">

            <div class="col-md-12">
              <div class="form-group">
              <label for="" class="label text-gray-800">Pilih Status :</label>
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
      </div>
</div>
@endsection

@section('script')
    <script>
      $('#status_upload').change(function(){
        window.location = $(this).find('option:selected').val();
      });
    </script>
@endsection


