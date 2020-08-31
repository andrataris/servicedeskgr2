<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksiot extends Model
{
    protected $table = 'transaksi_ticket';
    protected $fillable = ['kode_transaksi', 'service_id', 'subservice_id', 'tgl_open', 'tgl_close', 'status', 'case','atasan_id' ,'status_ticket','user_id'];

    public function anggota()
    {
    	return $this->belongsTo(Anggota::class);
    }

    public function buku()
    {
    	return $this->belongsTo(Buku::class);
    }


    //nambah vlookup subservice
    public function subservice()
    {
    	return $this->belongsTo(Subservice::class);
    }

    public function service()
    {
    	return $this->belongsTo(Service::class);
    }
}
