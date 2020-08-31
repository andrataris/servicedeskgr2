<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apppetugasit extends Model
{
	protected $table = 'transaksi_ticket';
    protected $fillable = ['id','status_ticket','tglapppetugasit','catpetugasit'];


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
