
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

  <div class="col-lg-2">
    <a href="{{ route('transaksiot.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Open Ticket</a>
  </div>
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Open Ticket</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Kode Ticket
                          </th>
                          <th>
                            Service
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
                            Case Problem
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          {{$data->kode_transaksi}}
                           <!-- 
                          <a href="{{route('transaksi.show', $data->id)}}"> 
                            
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
                            
                          </td>
                          <td>
                           {{date('d/m/y', strtotime($data->tgl_open))}}
                          </td>
                          <td>
                            {{date('d/m/y', strtotime($data->tglapppetugasit))}}
                          </td>
                          <td>
                          {{$data->case}}
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
                          @if(Auth::user()->level == 'admin')
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                          @if($data->status == 'pinjam')
                          <form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin data ini sudah kembali?')"> Sudah Kembali
                            </button>
                          </form>
                          @endif
                            <form action="{{ route('transaksi.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                          </div>
                        </div>
                        @else
                        @if($data->status == 'pinjam')
                        <form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="btn btn-info btn-xs" onclick="return confirm('Anda yakin data ini sudah kembali?')">Sudah Kembali
                            </button>
                          </form>
                          @else
                          -
                          @endif
                        @endif
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection