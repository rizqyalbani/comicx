@extends('layouts.admin')

@section('title') User @endsection
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
@include('admin.user.create')
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
                <th>Email</th>
                <th>Telepon</th>
                <th>Waktu</th>
                <th>Tipe</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($models as $i => $item)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->date()}}</td>
                    <td>{{$item->getType()}}</td>
                    <td>
                        <form  id="formDelete-{{$item->id}}" action="{{route('admin.user.destroy',$item->id)}}" method="POST">
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
                                <form action="{{route('admin.user.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PUT')
                                  <div class="modal-body">
                                      <div class="form-group">
                                          <label for="" class="label">Nama</label>
                                          <input type="text" class="form-control" autocomplete="off" name="name" required value="{{$item->name}}">
                                      </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="label">Telepon</label>
                                                <input type="tel" class="form-control" autocomplete="off" name="phone" required value="{{$item->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label for="" class="label">Email</label>
                                                <input disabled type="email" class="form-control" autocomplete="off" name="email" required value="{{$item->email}}">
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="label">Tipe Akun</label>
                                        <select name="isAdmin" id="" class="form-control">
                                            <option @if($item->isAdmin == 0) selected @endif  value="0">User</option>
                                            <option @if($item->isAdmin == 1) selected @endif  value="1">Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="label">Password <strong>(Masukkan jika ingin merubah password)</strong></label>
                                        <input type="password" class="form-control" autocomplete="off" name="password" >
                                    </div>
                                    <div class="form-group">
                                      <div class="text-gray-800">
                                       <b> Data Peserta</b> <br>
                                        @forelse ($item->competitor as $com)
                                          {{$com->competitionCategory->name()}} <br>
                                          
                                          @foreach ($com->competitorDetail as $detail)
                                              <li><small>{{$detail->name}}</small></li>
                                          @endforeach
                                          {!!$com->statusPembayaran()!!} 
                             
                                          <hr>
                                        @empty
                                            <p><small>Belum ada data</small></p>
                                        @endforelse
                                      </div>
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