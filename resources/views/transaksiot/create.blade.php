@section('js')

<script type="text/javascript">

            $(document).on('click', '.pilih_subservice', function (e) {
                document.getElementById("suservice_id").value = $(this).attr('data-suservice_id');
                document.getElementById("subservice_nama").value = $(this).attr('data-subservice_nama');
                $('#myModalsuservice').modal('hide');
            });


            
            $(document).on('click', '.pilih_service', function (e) {
                document.getElementById("service_id").value = $(this).attr('data-service_id');
                document.getElementById("service_nama").value = $(this).attr('data-service_nama');
                $('#myModalservice').modal('hide');
            });  

            $(document).on('click', '.pilih_anggota', function (e) {
                document.getElementById("atasan_id").value = $(this).attr('data-atasan_id');
                document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
                document.getElementById("anggota_email").value = $(this).attr('data-anggota_email');
                $('#myModal2').modal('hide');
            });




            $(function () {
                $("#lookup, #lookup2").dataTable();
            });    





$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('transaksiot.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Transaksi Open Ticket</h4>
                      
                      <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                            <label for="kode_transaksi" class="col-md-4 control-label">Kode Transaksi</label>
                            <div class="col-md-6">
                                <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}" required readonly="">
                                @if ($errors->has('kode_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgl_open') ? ' has-error' : '' }}">
                            <label for="tgl_open" class="col-md-4 control-label">Tanggal open ticket</label>
                            <div class="col-md-3">
                                <input id="tgl_open" type="date" class="form-control" name="tgl_open" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_open'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_open') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    


                        <!-- nambah service -->
                        @if(Auth::user()->level == 'admin')
                        <div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">
                            <label for="service_id" class="col-md-4 control-label">Cari Service</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="service_nama" type="text" class="form-control" readonly="" required>
                                <input id="service_id" type="hidden" name="service_id" value="{{ old('service_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModalservice"><b>Cari Service</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('service_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('service_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @else
                        <div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">
                        <label for="service_id" class="col-md-4 control-label">Cari Service</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="service_nama" type="text" class="form-control" readonly="" required>
                                <input id="service_id" type="hidden" name="service_id" value="{{ old('service_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModalservice"><b>Cari Service</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('service_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('service_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @endif
                        <!-- end service-->
                       <!-- nambah sub service -->
                       @if(Auth::user()->level == 'admin')
                        <div class="form-group{{ $errors->has('suservice_id') ? ' has-error' : '' }}">
                            <label for="suservice_id" class="col-md-4 control-label">Cari Sub Service</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="subservice_nama" type="text" class="form-control" readonly="" required>
                                <input id="suservice_id" type="hidden" name="suservice_id" value="{{ old('suservice_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModalsuservice"><b>Cari Sub Service</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('suservice_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suservice_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @else
                        <div class="form-group{{ $errors->has('suservice_id') ? ' has-error' : '' }}">
                        <label for="suservice_id" class="col-md-4 control-label">Cari Sub Service</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="subservice_nama" type="text" class="form-control" readonly="" required>
                                <input id="suservice_id" type="hidden" name="suservice_id" value="{{ old('suservice_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModalsuservice"><b>Cari Sub Service</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('suservice_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('suservice_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @endif
                        <!-- end sub service-->



                        @if(Auth::user()->level == 'admin')
                        <div class="form-group{{ $errors->has('atasan_id') ? ' has-error' : '' }}">
                            <label for="atasan_id" class="col-md-4 control-label">Atasan Bidang</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                                <input id="atasan_id" type="hidden" name="atasan_id" value="{{ old('atasan_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Atasan Bidang</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('atasan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('atasan_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @else
                        <div class="form-group{{ $errors->has('atasan_id') ? ' has-error' : '' }}">
                        <label for="atasan_id" class="col-md-4 control-label">Atasan Bidang</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                                <input id="atasan_id" type="text" name="atasan_id" value="{{ old('atasan_id') }}" required readonly="">
                                <input id="anggota_email" type="text" name="anggota_email" value="{{ old('anggota_email') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Atasan Bidang</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                
                                @if ($errors->has('atasan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('atasan_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @endif                    


                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Case Masalah</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}">
                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                            
                        <div class="form-group{{ $errors->has('userid') ? ' has-error' : '' }}">
                            <label for="userid" class="col-md-4 control-label">user id</label>
                            <div class="col-md-6">
                                <input id="userid" type="text" class="form-control" name="userid" value="{{Auth::user()->id}}">
                                @if ($errors->has('userid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>        
                        

                        
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('transaksiot.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>

<!-- Modal sub service-->
<div class="modal fade bd-example-modal-lg" id="myModalsuservice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Sub Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama Sub Service
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($subservices as $data)
                                <tr class="pilih_subservice" data-suservice_id="<?php echo $data->id; ?>" data-subservice_nama="<?php echo $data->ServiceSubName; ?>" >
                                    <td class="py-1">

                            {{$data->ServiceSubName}}
                          </td>
                        </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal sub service-->
         <div class="modal fade bd-example-modal-lg" id="myModalservice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Sub Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama Service
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($services as $data)
                                <tr class="pilih_service" data-service_id="<?php echo $data->id; ?>" data-service_nama="<?php echo $data->ServiceName; ?>" >
                                    <td class="py-1">

                            {{$data->ServiceName}}
                          </td>
                        </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Atasan Bidang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            NOPEG2
                          <th>
                            EMAIL
                        </tr>
                        
                      </thead>
                            <tbody>
                                @foreach($anggotas as $data)
                                <tr class="pilih_anggota" data-atasan_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>" data-anggota_email="<?php echo $data->email_atasan; ?>" >
                                    <td class="py-1">

                            {{$data->nama}}
                          </td>
                          <td>
                            {{$data->npm}}
                          </td>
                          <td>
                            {{$data->email_atasan}}
                          </td>
                        </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection