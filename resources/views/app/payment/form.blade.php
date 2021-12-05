@extends('layouts.admin')

@section('title') Tambah Pembayaran @endsection
@section('back_button')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<a href="{{route('app.payment.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card mb-4">
            <div class="card-header text-gray-800">
                Peserta
            </div>
            <div class="card-body text-gray-800">
                @php $price = 0; @endphp
                @forelse ($competitor as $item)
                    <h6><b>{{$item->competitionCategory->name()}}</b> (Rp{{number_format($item->total)}})</h6>
                    <ul>
                        @foreach ($item->competitorDetail as $detail)
                            <li>{{$detail->name}}</li>
                        @endforeach
                        @php $price += $item->total; @endphp
                    </ul>
                    <hr>
                @empty
                    Belum ada tagihan <br>

                    <a href="{{route('app.competitor.create')}}" class="mt-1 btn btn-success btn-sm">Tambah Peserta</a>
                @endforelse
            </div>
        </div>
        @if($competitor->count() > 0)
        <div class="card mb-4">
            <div class="card-header text-gray-800">
                Rincian Pembayaran
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr class="text-gray-800">
                            <td>
                                Subtotal
                            </td>
                            <td>
                                :
                            </td>
                            <td class="text-right">
                                Rp{{number_format($price)}}
                            </td>
                        </tr>
                        <tr class="text-gray-800">
                            <td>
                                Kode Unik
                            </td>
                            <td>
                                :
                            </td>
                            <td class="text-right">
                                {{Auth::user()->id}}
                            </td>
                        </tr>
                        <tr class="text-gray-800">
                            <td>
                                Total
                            </td>
                            <td>
                                :
                            </td>
                            <td class="text-right">
                                Rp{{number_format($price + Auth::user()->id)}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
    @if($competitor->count() > 0)
    <div class="col-md-7">
        <div class="card mb-4">
            <div class="card-header text-gray-800">
                Panduan Pembayaran
            </div>
            <div class="card-body text-gray-800">
                <style>
                    .payment-box {
                        border: 1px dashed #5a5c69;
                        padding: 20px;
                    }
                </style>

                <div class="payment-box text-center">
                    <img class="mb-2" src="{{$method->bank ? $method->bank->getImage() : '-'}}" alt="{{$method->bank ? $method->bank->name : '-'}}" width="100"> <br>
                    {{$method->bank ? $method->bank->name : '-'}} (Kode : {{$method->bank ? $method->bank->kode : '-'}})
                    <h4 class="mt-1"><b>{{$method->ref_number}}</b></h4>
                    <p>a/n {{$method->ref_name}}</p>
                    <hr>
                    <p>Jumlah Transfer
                    <h4>
                        Rp {{number_format($price + Auth::user()->id)}}
                    </h4>
                     </p>
                     <a data-toggle="modal" data-target="#panduanModal" class="btn btn-primary" href="">Panduan Bayar</a>
                     <a href="" data-toggle="modal" data-target="#buktiModal" class="btn btn-success">Upload Bukti</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="modal fade" id="buktiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Upload Bukti Bayar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <form action="{{route('app.payment.store')}}" method="POST" enctype="multipart/form-data" class="text-gray-800">
            <div class="modal-body"> 
            <div class="form-group">
                  @csrf
                  <label for="">Bank pengirim</label>
                  {{-- <input required type="text" name="bank" placeholder="contoh : Bank Mandiri" class="form-control"> --}}

                  <select class="form-control select2 " name="bank" autocomplete="off" required style="width:100%;">
                      <option value="Dana" >Dana</option>
                    <option value="ANZ Panin Bank" >ANZ Panin Bank</option>
                    <option value="Bank Agroniaga" >Bank Agroniaga</option>
                    <option value="Bank Antar Daerah" >Bank Antar Daerah</option>
                    <option value="Bank Artha Graha" >Bank Artha Graha</option>
                    <option value="Bank Artos Indonesia" >Bank Artos Indonesia</option>
                    <option value="Bank BKE" >Bank BKE</option>
                    <option value="BANK BNI SYARIAH" >BANK BNI SYARIAH</option>
                    <option value="Bank BTPN" >Bank BTPN</option>
                    <option value="Bank Bukopin" >Bank Bukopin</option>
                    <option value="Bank Bumi Arta" >Bank Bumi Arta</option>
                    <option value="Bank Bumiputera Indonesia" >Bank Bumiputera Indonesia</option>
                    <option value="Bank Capital" >Bank Capital</option>
                    <option value="Bank Central Asia (BCA)"  selected >Bank Central Asia (BCA)</option>
                    <option value="Bank Central Asia (BCA) Syariah" >Bank Central Asia (BCA) Syariah</option>
                    <option value="Bank CIMB Niaga" >Bank CIMB Niaga</option>
                    <option value="Bank Commonwealth" >Bank Commonwealth</option>
                    <option value="Bank Danamon" >Bank Danamon</option>
                    <option value="Bank DBS" >Bank DBS</option>
                    <option value="Bank DKI" >Bank DKI</option>
                    <option value="Bank Ekonomi Raharja" >Bank Ekonomi Raharja</option>
                    <option value="Bank Eksekutif Internasional/BPR KS" >Bank Eksekutif Internasional/BPR KS</option>
                    <option value="Bank Ganesha" >Bank Ganesha</option>
                    <option value="Bank Hana" >Bank Hana</option>
                    <option value="Bank INA Perdana" >Bank INA Perdana</option>
                    <option value="Bank Index" >Bank Index</option>
                    <option value="Bank Jabar Banten Syariah" >Bank Jabar Banten Syariah</option>
                    <option value="Bank Jabar (BJB)" >Bank Jabar (BJB)</option>
                    <option value="Bank Jasa Jakarta" >Bank Jasa Jakarta</option>
                    <option value="Bank Kesawan" >Bank Kesawan</option>
                    <option value="Bank Mandiri" >Bank Mandiri</option>
                    <option value="Bank Mandiri Syariah" >Bank Mandiri Syariah</option>
                    <option value="Bank Maspion" >Bank Maspion</option>
                    <option value="Bank Mayapada Internasional" >Bank Mayapada Internasional</option>
                    <option value="Bank Mayora" >Bank Mayora</option>
                    <option value="Bank Mega" >Bank Mega</option>
                    <option value="Bank Mega Syariah" >Bank Mega Syariah</option>
                    <option value="Bank Mestika" >Bank Mestika</option>
                    <option value="Bank Muamalat Indonesia" >Bank Muamalat Indonesia</option>
                    <option value="Bank Mutiara" >Bank Mutiara</option>
                    <option value="Bank Nagari" >Bank Nagari</option>
                    <option value="Bank Nationalnobu" >Bank Nationalnobu</option>
                    <option value="Bank Negara Indonesia (BNI)" >Bank Negara Indonesia (BNI)</option>
                    <option value="Bank Nusantara Parahyangan" >Bank Nusantara Parahyangan</option>
                    <option value="Bank OCBC NISP" >Bank OCBC NISP</option>
                    <option value="Bank Of China" >Bank Of China</option>
                    <option value="Bank Panin" >Bank Panin</option>
                    <option value="Bank Permata" >Bank Permata</option>
                    <option value="Bank Rakyat Indonesia (BRI)" >Bank Rakyat Indonesia (BRI)</option>
                    <option value="Bank Royal" >Bank Royal</option>
                    <option value="Bank Saudara" >Bank Saudara</option>
                    <option value="Bank SBI Indonesia (IndoMonex)" >Bank SBI Indonesia (IndoMonex)</option>
                    <option value="Bank Sinarmas" >Bank Sinarmas</option>
                    <option value="Bank Swadesi" >Bank Swadesi</option>
                    <option value="Bank Tabungan Negara (BTN)" >Bank Tabungan Negara (BTN)</option>
                    <option value="Bank Victoria Internasional" >Bank Victoria Internasional</option>
                    <option value="Bank Windu Kentjana Internasional" >Bank Windu Kentjana Internasional</option>
                    <option value="BPD Aceh" >BPD Aceh</option>
                    <option value="BPD Bali" >BPD Bali</option>
                    <option value="BPD Bengkulu" >BPD Bengkulu</option>
                    <option value="BPD DIY" >BPD DIY</option>
                    <option value="BPD Jambi" >BPD Jambi</option>
                    <option value="BPD Jateng" >BPD Jateng</option>
                    <option value="BPD Jatim" >BPD Jatim</option>
                    <option value="BPD Kalimantan Barat" >BPD Kalimantan Barat</option>
                    <option value="BPD Kalimantan Selatan" >BPD Kalimantan Selatan</option>
                    <option value="BPD Kalimantan Tengah" >BPD Kalimantan Tengah</option>
                    <option value="BPD Kalimantan Timur" >BPD Kalimantan Timur</option>
                    <option value="BPD Lampung" >BPD Lampung</option>
                    <option value="BPD Maluku" >BPD Maluku</option>
                    <option value="BPD NTB" >BPD NTB</option>
                    <option value="BPD NTT" >BPD NTT</option>
                    <option value="BPD Papua" >BPD Papua</option>
                    <option value="BPD Riau" >BPD Riau</option>
                    <option value="BPD Sulawesi Selatan" >BPD Sulawesi Selatan</option>
                    <option value="BPD Sulawesi Tengah" >BPD Sulawesi Tengah</option>
                    <option value="BPD Sulawesi Tenggara" >BPD Sulawesi Tenggara</option>
                    <option value="BPD Sulawesi Utara" >BPD Sulawesi Utara</option>
                    <option value="BPD Sumatera Utara" >BPD Sumatera Utara</option>
                    <option value="BPD Sumsel dan Babel" >BPD Sumsel dan Babel</option>
                    <option value="BRI Syariah" >BRI Syariah</option>
                    <option value="Citibank" >Citibank</option>
                    <option value="HSBC" >HSBC</option>
                    <option value="Maybank" >Maybank</option>
                    <option value="Rabobank" >Rabobank</option>
                    <option value="Standard Chartered Bank" >Standard Chartered Bank</option>
                    <option value="The Bank of Tokyo-Mitsubishi UFJ" >The Bank of Tokyo-Mitsubishi UFJ</option>
                    <option value="UOB Indonesia" >UOB Indonesia</option>
                </select>

              </div>
              <div class="form-group">
                <label for="">Nama pengirim di rekening bank</label>
                <input required type="text" name="ref_name"  placeholder="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nomor rekening</label>
                <input required type="text" name="ref_number" placeholder="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Foto bukti transfer</label>
                <input required type="file" name="proof_of_transfer" placeholder="" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
          </form>
        
      </div>
    </div>
  </div>

<div class="modal fade" id="panduanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Panduan Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-gray-800">
        <b>
            ATM BRI
        </b>
        <ol>
            <li>Pilih menu Transfer > Sesama BRI</li>
            <li>Setelah itu, pilih menu “Transfer” dan “Ke Rek BCA”</li>
            <li>Masukkan nomor rekening <b>{{$method->ref_number}}</b></li>
            <li>Masukkan jumlah nominal Rp {{number_format($price + Auth::user()->id)}}</li>
            <li>Ikuti instruksi selanjutnya untuk menyelesaikan transaksi</li>
         
        </ol>
        <br>
        
        <b>
            BRI Mobile Banking
        </b>
        <ol>
            <li>Buka Aplikasi</li>
            <li>Pilih menu Transfer > Sesama BRI</li>
            <li>Masukkan nomor rekening <b>{{$method->ref_number}}</b></li>
            <li>Masukkan jumlah nominal Rp {{number_format($price + Auth::user()->id)}}</li>
            <li>Ikuti instruksi selanjutnya untuk menyelesaikan transaksi</li>
        </ol>

        <br>
          <b>ATM/ATM BERSAMA</b>
          <ol>
              <li>Pilih menu TRANSFER</li>
              <li>Pilih REK BANK LAIN</li>
              <li>Masukkan kode bank {{$method->bank ? $method->bank->name : '-'}} (Kode {{$method->bank ? $method->bank->kode : '-'}}) dan Nomor Rekening <b>{{$method->ref_number}}</b></li>
              <li>Masukkan Jumlah Transfer sesuai dengan Total Tagihan Rp {{number_format($price + Auth::user()->id)}}</li>
              <li>Ikuti instruksi selanjutnya untuk menyelesaikan transaksi</li>
          </ol>

          <br>
          <b>INTERNET/MOBILE BANKING</b>
          <ol>
              <li>Login ke akunmu</li>
              <li>Pilih menu TRANSFER</li>
              <li>Pilih REK BANK LAIN</li>
              <li>Masukkan kode bank {{$method->bank ? $method->bank->name : '-'}} (Kode {{$method->bank ? $method->bank->kode : '-'}}) dan Nomor Rekening <b>{{$method->ref_number}}</b></li>
              <li>Masukkan Jumlah Transfer sesuai dengan Total Tagihan Rp {{number_format($price + Auth::user()->id)}}</li>
              <li>Ikuti instruksi selanjutnya untuk menyelesaikan transaksi</li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          
        </div>
      </div>
    </div>
  </div>
@endsection



@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();       
    });
</script>
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
