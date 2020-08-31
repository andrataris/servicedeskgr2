<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apprrovebidang extends Model
{
	protected $table = 'transaksi_ticket';
    protected $fillable = ['id','status_ticket','atasan_it','tglappatasanunit'];


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
