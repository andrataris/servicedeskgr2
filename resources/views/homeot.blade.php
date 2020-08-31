@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Ticket Masih Open</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$transaksiot->where('status_ticket', '<>' , '4' )->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Belum ditangani
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tiket Selesai</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$transaksiot->where('status_ticket', '=' , '4' )->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Sudah ditangani
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-book text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Ticket Masuk</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$transaksiot->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Ticket masuk
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Anggota</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$anggota->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-account mr-1" aria-hidden="true"></i> Total seluruh anggota
                  </p>
                </div>
              </div>
            </div>
</div>
<div class="row" >
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data yang masih Open Ticket</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Kode Ticket2
                          </th>
                          <th>
                            Layanan Service
                          </th>
                          <th>
                            User
                          </th>
                          <th>
                            Tgl Open
                          </th>
                          <th>
                            Tgl Selesai
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Case Masalah
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          {{$data->kode_transaksi}}
                          <!--
                          <a href="{{route('transaksiot.show', $data->id)}}"> 
                            
                          </a>
                          -->
                          </td>
                          <td>
                          @if($data->service_id == '1')
                              Software
                          @elseif($data->service_id == '2')
                            Hardware
                            @elseif($data->service_id == '3')
                            Network
                          @else
                            Email
                          @endif
                            
                          </td>

                          <td>
                          <!--
                          @foreach($datas2 as $datas3)
                          {{$datas3->name}}  
                          @endforeach
                          -->
                          </td>
                          <td>
                           {{date('d/m/y', strtotime($data->tgl_open))}}
                          </td>
                          <td>
                            {{date('d/m/y', strtotime($data->tglapppetugasit))}}
                          </td>
                          <td>
                          @if($data->status_ticket == '1')
                          <label class="badge badge-warning">open</label>
                          @elseif($data->status_ticket == '2')
                          <label class="badge badge-warning">Sdh App Atasan</label>
                            @elseif($data->status_ticket == '3')
                            <label class="badge badge-warning">Sudah App Atasan IT </label>
                            @elseif($data->status_ticket == '4')
                            <label class="badge badge-success">Selesai</label>
                            @elseif($data->status_ticket == '7')
                            <label class="badge badge-success">Ditolak Atasan IT</label>
                            @elseif($data->status_ticket == '6')
                            <label class="badge badge-success">Ditolak Atasan Unit</label>
                          @else
                          <label class="badge badge-success">close</label>
                          @endif
                          </td>
                          <td>
                          {{$data->case}}
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
