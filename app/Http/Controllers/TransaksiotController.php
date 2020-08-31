<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buku;
use App\Anggota;
// nambah vlookup subservice
use App\Subservice;
use App\Service;

use Mail;


// /use App\Transaksi;
use App\Transaksiot;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        if(Auth::user()->level == 'user')
        {
            $datas = Transaksiot::where('anggota_id', Auth::user()->anggota->id)
                                ->get();
        } else {
            $datas = Transaksiot::get();
        }
        
        return view('transaksiot.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $getRow = Transaksiot::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "TICKET00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "TICKET0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "TICKET000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "TICKET00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "TICKET0".''.($lastId->id + 1);
            } else {
                    $kode = "TICKET".''.($lastId->id + 1);
            }
        }

        $bukus = Buku::where('jumlah_buku', '>', 0)->get();
        $anggotas = Anggota::get();
        // nambah vlookp subservice
        $subservices = Subservice::get();
        $services = Service::get();


        return view('transaksiot.create', compact('bukus', 'kode', 'anggotas', 'subservices', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_transaksi' => 'required|string|max:255',
            'tgl_open' => 'required',
            'service_id' => 'required',
            'suservice_id' => 'required',
            'atasan_id' => 'required',
            'ket' => 'required',
            

        ]);

        $transaksiot = Transaksiot::create([
                'kode_transaksi' => $request->get('kode_transaksi'),
                'tgl_open' => $request->get('tgl_open'),
                //'tgl_kembali' => $request->get('tgl_kembali'),
                'service_id' => $request->get('service_id'),
                'subservice_id' => $request->get('suservice_id'),
                'case' => $request->get('ket'),
                'status' => 'open',
                'atasan_id' => $request->get('atasan_id'),
                'status_ticket' => '1',
                'user_id' => $request->get('userid')
                
                
            ]);


            try{
                Mail::send('isiemail', array('pesan' => $request->get('ket'), 'pesan1' => $request->get('kode_transaksi')) , 
                function($pesan) use($request){
                    $pesan->to($request->get('anggota_email'),'ServiceDesk')->subject('ServiceDesk Konfirmasi');
                    $pesan->from(env('MAIL_USERNAME','andraresmi@gmail.com'),'ServiceDesk Konfirmasi');
                });
            }catch (Exception $e){
                return response (['status' => false,'errors' => $e->getMessage()]);
            }    
            
        /*    
        $transaksi->buku->where('id', $transaksi->buku_id)
                        ->update([
                            'jumlah_buku' => ($transaksi->buku->jumlah_buku - 1),
                            ]);
        */                        
        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('transaksiot.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
