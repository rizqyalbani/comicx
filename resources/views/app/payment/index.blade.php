@extends('layouts.admin')

@section('title') Pembayaran @endsection
@section('back_button')
<a href="/home" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('head')
<link rel="stylesheet" href="/admin/vendor/datatables/dataTables.bootstrap4.min.css">
@endsection
@section('content')
@if (now()->toDateTimeString() < "2022-02-10 23:59")
    <a href="{{route('app.payment.create')}}" class="btn btn-primary btn-icon-split shadow">
        <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
        </span>
        <span class="text">Bayar</span>
    </a>
@else
    <span class="btn btn-danger btn-icon-split shadow">
        <span class="icon text-white-50">
        <i class="fas fa-minus"></i>
        </span>
        <span class="text">Pendaftaran Telah ditutup pada: 23.59</span>
    </span>
@endif
<br><br>
<div class="card shadow mb-4">

    <!-- Card Body -->
   <div class="card-body ">
       <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Invoice</th>
               
                <th>Subtotal</th>
                <th>Kode Unik</th>
                <th>Total</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Konfirmasi</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($models as $i => $item)
                <tr>
                    <td>{{$i + 1}}</td>
                    <td>{{$item->invoice()}}</td>
                    
                    <td>Rp {{number_format($item->subtotal)}}</td>
                    <td>{{$item->unique_number}}</td>
                    <td>Rp {{number_format($item->total)}}</td>
                    <td>{{$item->date()}}</td>
                    <td>{{$item->approvedTime()}}</td>
                    <td>{!!$item->getStatus()!!}</td>
                    <td><a href="{{route('app.payment.show', $item->uuid)}}" class="btn btn-sm btn-primary">Detail</a></td>
                  </tr>
                @empty
                    <tr>
                        <td colspan="7">Belum ada data.</td>
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
        $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {

     @if(\Session::has('alert-success'))
         Swal.fire({
             title: "Selamat!",
             text: "Upload bukti pembayaran berhasil, proses konfirmasi membutuhkan waktu maksimal 1x24 jam",
             icon: "success",
             button: "Okay",
         });
     @endif

    });
</script>
@endsection


