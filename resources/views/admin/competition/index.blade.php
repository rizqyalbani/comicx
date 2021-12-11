@extends('layouts.admin')
@section('title')
Lomba
@endsection
@section('head')
<link rel="stylesheet" href="/admin/vendor/datatables/dataTables.bootstrap4.min.css">
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection
@section('back_button')
<a href="{{route('admin.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')

<div class="card shadow mb-4 mt-2">
    <!-- Card Body -->
   <div class="card-body ">
       <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenjang</th>
                <th>Gender</th>
                <th>Kuota</th>
                <th>Tim</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
          @forelse ($models as $i => $item)
          <tr>
            <td>{{$i + 1}}</td>
            <td>{{$item->competitionType ? $item->competitionType->name : ''}}</td>
            <td>{{$item->competition_level_id}}</td>
            <td>{{$item->competitionGender ? $item->competitionGender->name : ""}}</td>
            <td>{{$item->quota}}</td>
            <td>{{$item->isTeam()}}</td>
            <td>Rp{{number_format($item->price)}}</td>
            <td>
              <a href="{{route('admin.competition.edit', $item->id)}}" class="btn btn-warning btn-circle btn-sm">
                  <i class="fas fa-pen"></i>
              </a>
              
            </td>
          </tr>
            @empty
            <tr>
                <td colspan="8">Belum ada data</td>
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
</script>
@endsection
