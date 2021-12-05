@extends('layouts.admin')

@section('title') Panduan @endsection

@section('head')
<link rel="stylesheet" href="/admin/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('back_button')
<a href="{{route('admin.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<a href="{{route('admin.panduan.create')}}" class="btn btn-primary btn-icon-split shadow" >
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
</a>
<br><br>
<div class="card shadow mb-4">

    <!-- Card Body -->
   <div class="card-body ">
       <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
          @forelse ($models as $i => $item)
          <tr>
            <td>{{$i + 1}}</td>
            <td>{{$item->name}}</td>
            <td>
                <form  id="formDelete-{{$item->id}}" action="{{route('admin.panduan.destroy',$item->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <a href="{{route('admin.panduan.edit',$item->id)}}" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-pen"></i>
                    </a>
                    <button type="button" onclick="deleteData('#formDelete-{{$item->id}}')" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>

                </form>
            </td>
          </tr>
            @empty
            <tr>
                <td colspan="3">Belum ada data</td>
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
@endsection


