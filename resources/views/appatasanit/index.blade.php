
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
  <!-- tidak pakai tombol tambah open ticket 
  <div class="col-lg-2">
    <a href="{{ route('transaksiot.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Open Ticket</a>
  </div>
  -->
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
                  <h4 class="card-title">Data Approve Ticket Atasan IT</h4>
                  
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
                            Tgl Close
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
                          <a href="{{route('appatasanit.show', $data->id)}}"> 
                            {{$data->kode_transaksi}}
                          </a>
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
                            {{date('d/m/y', strtotime($data->tgl_close))}}
                          </td>
                          <td>
                          {{$data->case}}
                          </td>
                          <td>
                          @if($data->status_ticket == '1')
                          <label class="badge badge-warning">open</label>
                          @elseif($data->status_ticket == '2')
                          <label class="badge badge-warning">Belum App</label>
                            @elseif($data->status_ticket == '3')
                            <label class="badge badge-warning">Sudah App </label>
                            @elseif($data->status_ticket == '4')
                            <label class="badge badge-warning">Selesai</label>
                          @else
                          <label class="badge badge-success">close</label>
                          @endif
                          <!--
                          @if($data->status == 'open')
                            <label class="badge badge-warning">open</label>
                          @else
                            <label class="badge badge-success">close</label>
                          @endif
                          -->
                          </td>
                          
                          
                          <td>
                          
                          <form action="{{ route('appatasanit.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="btn btn-info btn-sm" onclick="return confirm('Anda yakin data ticket di approve?')">Approve
                            </button>
                          </form>
                    

                          <form action="{{ route('appatasanit.destroy', $data->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="btn btn-info btn-sm" onclick="return confirm('Anda yakin data ticket di Tolak?')">Tolak
                            </button>
                          </form>
                          
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