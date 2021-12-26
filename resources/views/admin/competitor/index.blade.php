@extends('layouts.admin')

@section('title') Peserta @endsection

@section('head')
<link rel="stylesheet" href="/admin/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('back_button')
<a href="{{route('admin.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="card shadow mb-4">
  
    <!-- Card Body -->
   <div class="card-body ">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="" class="label text-gray-800">Tipe Lomba :</label>
          <select name="" id="status_upload" class="form-control">
            <option  value="{{route('admin.competitor.index')}}">Semua</option>
            @foreach ($com as $item)
                <option @if(\Request::fullUrl() == route('admin.competitor.index', ['type'=>$item->id])) selected @endif  value="{{route('admin.competitor.index')}}?type={{$item->id}}">{{$item->name()}}</option>
            @endforeach
          </select>
        </div> 
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="" class="label text-gray-800">Status Bayar :</label>
          <select name="" id="status_bayar" class="form-control">
            <option  value="{{route('admin.competitor.index')}}">Semua</option>
            <option @if(\Request::fullUrl() == route('admin.competitor.index', ['status'=>'1'])) selected @endif  value="{{route('admin.competitor.index')}}?status=1">Sudah Bayar</option>
            <option @if(\Request::fullUrl() == route('admin.competitor.index', ['status'=>'0'])) selected @endif value="{{route('admin.competitor.index')}}?status=0">Belum Bayar</option>
            
          </select>
        </div> 
      </div>
      <div class="col-md-4" >
        <div class="form-group">
          <label for="" class="label text-white">Status Bayar :</label>
          <a href="@if(\Request::get('status') != null || \Request::get('type') != null ) {{\Request::fullUrl()}}&download=true @else {{\Request::fullUrl() }}?download=true @endif" class="btn btn-success form-control">Download Data</a>
        </div> 
      </div>
      

      {{-- <div class="col-md-4">
        <div class="form-group">
          <label for="" class="label text-gray-800">Status Karya :</label>
          <select name="" id="status_karya" class="form-control">
            <option  value="{{route('admin.competitor.index')}}">Semua</option>
            <option @if(\Request::fullUrl() == route('admin.competitor.index', ['karya'=>'2'])) selected @endif  value="{{route('admin.competitor.index')}}?karya=2">Diterima</option>
            <option @if(\Request::fullUrl() == route('admin.competitor.index', ['karya'=>'3'])) selected @endif  value="{{route('admin.competitor.index')}}?karya=3">Ditolak</option>
            <option @if(\Request::fullUrl() == route('admin.competitor.index', ['karya'=>'1'])) selected @endif value="{{route('admin.competitor.index')}}?karya=1">Baru Upload</option>
            <option @if(\Request::fullUrl() == route('admin.competitor.index', ['karya'=>'0'])) selected @endif value="{{route('admin.competitor.index')}}?karya=0">Belum Upload</option>
            
          </select>
        </div> 
      </div> --}}
    </div> 
    <br>
    <a href="/admin/tiket" class="btn btn-success">Tiket</a>
    <br><br>
       <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>No Daftar</th>
                <th>No Peserta</th>
                <th>Surah/Lagu</th>
                <th>Kwitansi</th>
                <th>Lomba</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Asal</th>
                <th>Tanggal Daftar</th>
                <th>Tanggal Deadline</th>
                <th>Catatan</th>
                <th>Kelengkapan Data (-)</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
          @forelse ($models as $i => $item)
          <tr>
            <td>{{$i + 1}}</td>
            <td><small>{{$item->caNumber()}}</small></td>
            <td><small>{{$item->number()}}</small></td>
            <td>
                <small>
                    {{$item->song ? $item->song->name : ""}}
                    @if($item->surah)
                    <b>{{$item->surah->surah}}</b> <br>
                    Ayat : {{$item->surah->ayat}} <br>
                    Halaman : {{$item->surah->halaman}}
                    @endif
                </small>
            </td>
            <td>
              <small>@if($item->competitor_status > 0)
                {{$item->kwitansi()}}
              @endif</small>
            </td>
            <td><small>{{$item->competitionCategory->name()}}</small></td>
            <td><small>@if($item->team_name != "") {{$item->team_name}} @else {{$item->competitorDetail ? $item->competitorDetail->first()->name : '-'}}@endif</small></td>
            <td><small>{{$item->phone}}</small></td>
            <td><small>{{$item->competitorDetail ? $item->competitorDetail->first()->from : '-'}}</small></td>
            <td><small>{{$item->date()}} <br>
            <b>Oleh</b> : {{$item->user->name}}</small></td>
            <td><small>{{date('d-m-Y h:i:s', strtotime($item->pay_deadline))}}</small></td>
            <td>{!!$item->statusPembayaran()!!} 
                 {!!$item->statusKarya()!!}  
                {{--{{$item->statusDokumen()}}  --}}
            </td>
            <td><small>
              @if($item->competitorDetail && $item->competitorDetail->first()->identity_lock == 1) <span class="badge badge-success">Terverifikasi</span> @endif
              {!!$item->competitorDetail ? $item->competitorDetail->first()->image ? '' : 'Pas foto<br>' : ''!!}
              {!!$item->competitorDetail ? $item->competitorDetail->first()->birth_place ? '' : 'Tanggal Lahir<br>' : ''!!}
              {!!$item->competitorDetail ? $item->competitorDetail->first()->birth_date ? '' : 'Tempat Lahir<br>' : ''!!}
              {!!$item->competitorDetail ? $item->competitorDetail->first()->student_identity ? '' : 'Kartu Identitas<br>' : ''!!} </small></td>
            <td>
                
                    <a href="{{route('admin.competitor.edit',$item->uuid)}}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-pen"></i>
                    </a>
                    
            </td>
          </tr>
            @empty
            <tr>
                <td colspan="10">Belum ada data</td>
            </tr>
            @endforelse


  
            </tbody>
        </table>
       </div>
   </div>
  </div>

@endsection

@section('script')
<script src="/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function openModalOnHash() {
        if(window.location.hash) {
          var hash = window.location.hash.substring(1);
          $('#'+hash).modal('show');
        }
      }

      $(document).ready(function() {
        openModalOnHash()
      });

    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    function deleteData(id) {
      Swal.fire({
        title: "Yakin ingin menghapus data?",
        text: "Setelah dihapus, Anda tidak akan dapat memulihkan data tersebut",
        icon: "warning",
        showCancelButton: true,
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete.isConfirmed) {
          $(id).unbind('submit').submit()
          Swal.fire(
            'Deleted!',
            'Data Berhasil dihapus',
            'success',
          )} else {
          return false;
        }
      });
    }
</script>

    <script>
      $('#status_upload').change(function(){
        window.location = $(this).find('option:selected').val();
      });
      $('#status_bayar').change(function(){
        window.location = $(this).find('option:selected').val();
      });
      $('#status_karya').change(function(){
        window.location = $(this).find('option:selected').val();
      });
    </script>
@endsection




