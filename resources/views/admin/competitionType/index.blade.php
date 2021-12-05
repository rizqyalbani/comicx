@extends('layouts.admin')
@section('title')
Tipe Lomba
@endsection
@section('back_button')
<a href="{{route('admin.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('head')
<link rel="stylesheet" href="/admin/vendor/datatables/dataTables.bootstrap4.min.css">
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')
<div class="card shadow mb-4">

    <!-- Card Body -->
   <div class="card-body ">
       <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
          @forelse ($models as $i => $item)
          <tr>
            <td>{{$i + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->code}}</td>
            <td>
              <a href="{{route('admin.competitionType.edit', $item->id)}}" class="btn btn-warning btn-circle btn-sm">
                  <i class="fas fa-pen"></i>
              </a>
              
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
