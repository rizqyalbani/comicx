@extends('layouts.admin')

@section('title') Detail Pembayaran {{$models->invoice()}} @endsection
@section('back_button')
<a href="{{route('app.payment.index')}}" class="mb-2 d-block"><small><i class="fa fa-arrow-left"></i> Kembali</small></a>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Invoice</b>
            </div>
            <div class="card-body text-gray-800">
                <b class="">{{$models->invoice()}}</b> <br>
                <small>Oleh : {{$models->user ? $models->user->name : '-'}}</small>
                <hr style="border-top-style: dotted;">
                <small>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <b>Dibuat</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->date()}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Batas Bayar</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->dueDate()}}
                            </td>
                        </tr>
                        @if($models->status == 1)
                        <tr>
                            <td>
                                <b>Waktu diterima</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->approvedTime()}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Diterima oleh</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->approve ? $models->approve->name : '-'}}
                            </td>
                        </tr>
                        @endif
                        <tr>
                            <td>
                                <b>Status</b>
                            </td>
                            <td></td>
                            <td>
                                : {!!$models->getStatus()!!}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Subtotal</b>
                            </td>
                            <td></td>
                            <td>
                                : Rp{{number_format($models->subtotal)}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Kode Unik</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->unique_number}}
                            </td>
                        </tr>
                       
                        
                        <tr>
                            <td colspan="3">
                                <style>
                                    .totalPayment {
                                        padding: 20px;
                                        border: 1px dotted #222;
                                        display: block;
                                        margin-top: 10px;
                                        text-align: center;
                                    }

                                    .totalPaymentTitle {
                                        font-size: 15pt;
                                    }

                                    .totalPaymentNumber {
                                        font-size: 18pt;
                                    }
                                </style>
                                <div class="totalPayment">
                                    <span class="totalPaymentTitle"><b>Total Bayar</b></span> <br>
                                    <span class="totalPaymentNumber">{{number_format($models->total)}}</span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </small>

                <hr style="border-top-style: dotted;">
                <b>Tujuan Pembayaran</b>

                <small>
                    <br>
                    <img class="mt-2" src="{{$models->payment ? $models->payment->bank ? $models->payment->bank->getImage() : '-' : '-'}}" alt="bank" width="100">
                    <table style="width: 100%;" class="mt-2 mb-2">
                        <tr>
                            <td>
                                <b>Bank</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->payment ? $models->payment->bank ? $models->payment->bank->name : '-' : '-'}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Ref Name</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->payment ? $models->payment->ref_name : '-'}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Ref Number</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->payment ? $models->payment->ref_number : '-'}}
                            </td>
                        </tr>
                        
                        
                    </table>
                </small>

                <hr style="border-top-style: dotted;">
                <b>Bukti Pembayaran</b>
                <small>
                    <table style="width: 100%;" class="mt-2 mb-2">
                        <tr>
                            <td>
                                <b>Bank</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->bank}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Ref Name</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->ref_name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Ref Number</b>
                            </td>
                            <td></td>
                            <td>
                                : {{$models->ref_number}}
                            </td>
                        </tr>
                        <tr>
                            <td >
                                <b>Bukti Transfer</b>
                            </td>
                            <td></td>
                            <td>
                                : 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                            <a href="{{$models->getFile()}}" target="_blank" class="btn mt-2 btn-primary btn-sm btn-block">Lihat</a>
                            </td>
                        </tr>
                    </table>
                </small>

                

            </div>
            
          </div>

          
    </div>
    <div class="col-lg-8">
        
        <div class="card mb-3">
            <div class="card-header text-gray-800">
                <b>Rincian Pembayaran</b>
            </div>
            <div class="card-body text-gray-800">
                @foreach ($models->detail as $item)
                    <p>
                        <small>
                        <b>{{$item->competitionCategory ? $item->competitionCategory->name() : '-'}}</b> <br>
                        
                            Rp {{number_format($item->total)}}
                        </small>
                        <br>
                    <small><a href="{{route('app.competitor.edit', $item->competitor->uuid)}}">Lihat</a></small>
                    </p>
                    <hr>
                @endforeach
            </div>
        </div>

        
    </div>
</div>
@endsection