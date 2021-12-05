@extends('layouts.admin')
@section('title')
Sponsor
@endsection
@section('head')
<link rel="stylesheet" href="/admin/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('back_button')
<a href="{{route('admin.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<a href="javascript:void(0)" class="btn btn-primary btn-icon-split shadow" data-toggle="modal" data-target="#create">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Data</span>
</a>
@include('admin.sponsor.create')
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
                <th>Gambar</th>
                <th>Utama</th>
                <th>Tipe</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($models as $i => $item)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$item->name}}</td>
                    <td class="text-center">
                        @if ($item->image != "")
                            <img height="50" src="{{$item->getImage()}}" alt="{{$item->name}}">
                        @endif                    
                    </td>
                    <td>{{$item->getMain()}}</td>
                    <td>{{$item->getType()}}</td>
                    <td>
                        <form  id="formDelete-{{$item->id}}" action="{{route('admin.sponsor.destroy',$item->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="javascript:void(0)" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#edit-{{$item->id}}">
                                <i class="fas fa-pen"></i>
                            </a>
                            <button type="button" onclick="deleteData('#formDelete-{{$item->id}}')" class="btn btn-danger btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>

                        </form>
                        <div class="modal fade" id="edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="{{route('admin.sponsor.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                      <div class="form-group">
                                          <label for="" class="label">Name</label>
                                          <input type="text" class="form-control" autocomplete="off" name="name" required value="{{$item->name}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="" class="label">Tipe</label>
                                        <select name="type" id="" class="form-control">
                                            <option @if($item->type == 1) selected @endif value="1">Sponsor</option>
                                            <option @if($item->type == 2) selected @endif value="2">Media Partner</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="label">Sponsor Utama</label>
                                        <select name="main" id="" class="form-control">
                                            <option @if($item->main == 0) selected @endif value="0">Tidak</option>
                                            <option @if($item->main == 1) selected @endif value="1">Ya</option>
                                        </select>
                                    </div>
                                      <div class="form-group">
                                          
                                        <input type="file" name="image" class="form-control-file" accept="image/*"  id="image-source" >

                                        @if($item->image != null)

                                            <img src="{{$item->getImage()}}" class="mt-2" alt="" style="width: 64px;"> 
                                            <br>
                                            <a href="{{route('admin.sponsor.imgDelete', $item->id)}}" class="badge badge-danger mt-4">hapus gambar</a>
                                          @endif
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                    </td>
                  </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada data</td>
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
