@section('js')
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
                document.getElementById("buku_id").value = $(this).attr('data-buku_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_anggota', function (e) {
                document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
                document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
                $('#myModal2').modal('hide');
            });



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

          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Transaksi baru</h4>
                    
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
                         <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                            <label for="tgl_pinjam" class="col-md-4 control-label">Tanggal Pinjam</label>
                            <div class="col-md-3">
                                <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_pinjam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                            <label for="tgl_kembali" class="col-md-4 control-label">Tanggal Kembali</label>
                            <div class="col-md-3">
                                <input id="tgl_kembali" type="date"  class="form-control" name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(5)->toDateString())) }}" required="" @if(Auth::user()->level == 'user') readonly @endif>
                                @if ($errors->has('tgl_kembali'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('buku_id') ? ' has-error' : '' }}">
                            <label for="buku_id" class="col-md-4 control-label">Buku</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="buku_judul" type="text" class="form-control" readonly="" required>
                                <input id="buku_id" type="hidden" name="buku_id" value="{{ old('buku_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Buku</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('buku_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('buku_id') }}</strong>
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
                            <label for="service_id" class="col-md-4 control-label">Anggota</label>
                            <div class="col-md-6">
                                <input id="service_nama" type="text" class="form-control" readonly="" value="{{Auth::user()->anggota->nama}}" required>
                                <input id="service_id" type="hidden" name="service_id" value="{{ Auth::user()->anggota->id }}" required readonly="">
                              
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
                            <label for="suservice_id" class="col-md-4 control-label">Anggota</label>
                            <div class="col-md-6">
                                <input id="subservice_nama" type="text" class="form-control" readonly="" value="{{Auth::user()->anggota->nama}}" required>
                                <input id="suservice_id" type="hidden" name="suservice_id" value="{{ Auth::user()->anggota->id }}" required readonly="">
                              
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
                        <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                            <label for="anggota_id" class="col-md-4 control-label">Atasan Bidang</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                                <input id="anggota_id" type="hidden" name="anggota_id" value="{{ old('anggota_id') }}" required readonly="">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Atasan Bidang</b> <span class="fa fa-search"></span></button>
                                </span>
                                </div>
                                @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @else
                        <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                            <label for="anggota_id" class="col-md-4 control-label">Anggota</label>
                            <div class="col-md-6">
                                <input id="anggota_nama" type="text" class="form-control" readonly="" value="{{Auth::user()->anggota->nama}}" required>
                                <input id="anggota_id" type="hidden" name="anggota_id" value="{{ Auth::user()->anggota->id }}" required readonly="">
                              
                                @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                        @endif









                        <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-6">
                                <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}">
                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
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
                        <a href="{{route('transaksi.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>ISBN</th>
                                    <th>Pengarang</th>
                                    <th>Tahun</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bukus as $data)
                                <tr class="pilih" data-buku_id="<?php echo $data->id; ?>" data-buku_judul="<?php echo $data->judul; ?>" >
                                    <td>@if($data->cover)
                            <img src="{{url('images/buku/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/buku/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          {{$data->judul}}</td>
                                    <td>{{$data->isbn}}</td>
                                    <td>{{$data->pengarang}}</td>
                                    <td>{{$data->tahun_terbit}}</td>
                                    <td>{{$data->jumlah_buku}}</td>
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
                            NOPEG
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($anggotas as $data)
                                <tr class="pilih_anggota" data-anggota_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>" >
                                    <td class="py-1">

                            {{$data->nama}}
                          </td>
                          <td>
                            {{$data->npm}}
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



@endsection