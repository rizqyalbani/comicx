@extends('layouts.admin')

@section('title') Peserta Lomba @endsection
@section('head')
<link rel="stylesheet" href="/admin/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('back_button')
<a href="/home" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<a href="{{route('app.competitor.create')}}" class="btn btn-primary btn-icon-split shadow">
    <span class="icon text-white-50">
      <i class="fas fa-plus"></i>
    </span>
    <span class="text">@if($models->count() < 1)Yuk, Daftar Lomba @else Yuk, Daftar Lomba Lagi @endif</span>
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
                <th>No Peserta</th>
                <th>Kwitansi</th>
                <th>Lomba</th>
                <th>Nama</th>
                <th>Tanggal Daftar</th>
                <th>Pembayaran Akhir</th>
                <th>Catatan</th>
                <th>Kelengkapan Data (-)</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($models as $i => $item)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td><small>{{$item->number()}}</small></td>
                    <td>
                      <small>@if($item->competitor_status > 0)
                        {{$item->kwitansi()}}
                      @endif</small>
                    </td>
                    <td><small>{{$item->competitionCategory->name()}}</small></td>
                    <td><small>@if($item->team_name != "") {{$item->team_name}} @else {{$item->competitorDetail ? $item->competitorDetail->first()->name : '-'}} @endif</small></td>
                    
                    <td><small>{{$item->date()}} </small></td>
                    <td><small>{{date('d-m-Y h:i:s', strtotime($item->pay_deadline))}}</small></td>
                    <td>{!!$item->statusPembayaran()!!} 
                        {!!$item->statusKarya()!!}  
                    </td>
                    <td>
                      @if($item->competitorDetail && $item->competitorDetail->first()->identity_lock == 1) <span class="badge badge-success">Terverifikasi</span> @endif
                      <small>
                        {!!$item->competitorDetail ? $item->competitorDetail->first()->image ? '' : 'Pas foto<br>' : ''!!}
                      {!!$item->competitorDetail ? $item->competitorDetail->first()->birth_place ? '' : 'Tanggal Lahir<br>' : ''!!}
                      {!!$item->competitorDetail ? $item->competitorDetail->first()->birth_date ? '' : 'Tempat Lahir<br>' : ''!!}
                      {!!$item->competitorDetail ? $item->competitorDetail->first()->student_identity ? '' : 'Kartu Identitas<br>' : ''!!} </small></td>
                      </small>
                    </td>
                    <td>
                
                            
                            <form  id="formDelete-{{$item->id}}" action="{{route('app.competitor.destroy',$item->uuid)}}" method="POST">
                              @method('DELETE')
                              @csrf
                              <a href="{{route('app.competitor.edit',$item->uuid)}}" class="btn btn-warning btn-circle btn-sm">
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
                        <td colspan="7">Belum ada data. Segera lakukan pendaftaran dan pembayaran</td>
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
                )
                  
                } else {
                  return false;
                }
              });
            }
</script>
@endsection

