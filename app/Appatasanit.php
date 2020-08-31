<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appatasanit extends Model
{
	protected $table = 'transaksi_ticket';
    protected $fillable = ['id','status_ticket','petugas_it','tglappatasanit'];


    /**
     * Method One To One 
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Method One To Many 
     */
    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
