<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Transaksi;


use App\Transaksiot;
use App\Anggota;
use App\Buku;
use App\User;
use DB;
use Auth;


class HomeotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiot = Transaksiot::get();

        $anggota   = Anggota::get();
        $buku      = Buku::get();
        if(Auth::user()->level == 'user')
        {
            $datas = Transaksiot::where('status', 'open')
                                ->where('anggota_id', Auth::user()->anggota->id)
                                ->get();
        } else {
            $datas = Transaksiot::where('status', 'open')->get();
            
            $datas2 = DB::table('transaksi_ticket')
            ->select(
                'users.name',
                'transaksi_ticket.*'
                )
            ->leftjoin('users', 'users.id', '=', 'transaksi_ticket.user_id')
            ->get();
                
        }
        return view('homeot', compact('transaksiot', 'anggota', 'buku', 'datas','datas2'));
    }
}
