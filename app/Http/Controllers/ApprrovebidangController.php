<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buku;
use App\Anggota;
// nambah vlookup subservice
use App\Subservice;
use App\Service;


// /use App\Transaksi;
use App\Transaksiot;
use App\Apprrovebidang;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;


class ApprrovebidangController extends Controller
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
        if(Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        //$datas = Apprrovebidang::get();
        $datas = Apprrovebidang::where('atasan_id', '=' , '3' )->where('status_ticket', '=' , '1' )->get(); 
        return view('apprrovebidang.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $apprrovebidang = Apprrovebidang::find($id);
        
        //use Carbon\Carbon;

        $date = Carbon::now()->toDateTimeString();
        $tglapp=date('Y-m-d H:i:s');
        $apprrovebidang->update([
                'status_ticket' => '2',
                'atasan_it' => '5',
                'tglappatasanunit' => $tglapp
                ]);
        

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('apprrovebidang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $apprrovebidang = Apprrovebidang::find($id);
        
        //use Carbon\Carbon;

        $date = Carbon::now()->toDateTimeString();
        $tglapp=date('Y-m-d H:i:s');
        $apprrovebidang->update([
                'status_ticket' => '6',
                'tglappatasanunit' => $tglapp
                ]);
        

        alert()->success('Berhasil.','Data telah ditolak!');
        return redirect()->route('apprrovebidang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
