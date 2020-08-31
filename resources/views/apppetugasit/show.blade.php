@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Detail <b>{{$data->kode_transaksi}}</b></h4>
                    <div class="form-group">
                     
                        <!--
                        
                        -->
                        <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                            <label for="kode_transaksi" class="col-md-4 control-label">Kode Transaksi</label>
                            <div class="col-md-6">
                                <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{$data->kode_transaksi}}" required readonly="">
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                            <label for="tgl_pinjam" class="col-md-4 control-label">Tanggal Open</label>
                            <div class="col-md-3">
                                <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime($data->tgl_open)) }}" readonly="">
                            </div>
                        </div>

                        <!--    
                         <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                            <label for="tgl_kembali" class="col-md-4 control-label">Tanggal Selesai</label>
                            <div class="col-md-3">
                                <input id="tgl_kembali" type="date"  class="form-control" name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" readonly="">
                            </div>
                        </div>
                        -->

                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Kategori service</label>
                            <div class="col-md-6">
                            @if($data->service_id == '1')
                            <label class="badge badge-warning">Software</label>
                            @elseif($data->service_id == '2')
                            <label class="badge badge-warning">Hardware</label>
                                @elseif($data->service_id == '3')
                                <label class="badge badge-warning">Network</label>
                            @else
                            <label class="badge badge-warning">Email</label>
                            @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="anggota_id" class="col-md-4 control-label">Case Masalah</label>
                            <div class="col-md-6">
                                <input id="buku" type="text" class="form-control" readonly="" value="{{$data->case}}">

                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            @if($data->status_ticket == '1')
                                <label class="badge badge-warning">open</label>
                            @elseif($data->status_ticket == '2')
                                <label class="badge badge-warning">Belum App</label>
                               @elseif($data->status_ticket == '3')
                                <label class="badge badge-warning">Belum App </label>
                            @elseif($data->status_ticket == '4')
                                <label class="badge badge-warning">Selesai</label>
                            @else
                                <label class="badge badge-success">close</label>
                            @endif
                            </div>
                        </div>


                
                        <a href="{{route('apppetugasit.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>


@endsection