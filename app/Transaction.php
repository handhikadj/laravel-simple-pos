<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

	protected $table = 'transaksi';
	protected $primaryKey = 'id_transaksi';
	protected $fillable = [ 'id_transaksi', 'total_harga' ];
	public $incrementing = false;

	/**
	 * Query scope TransactionSelect.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeTransactionSelect($query, $kdotomatis)
	{
		return $query->select('id_transaksi')
                                ->where('id_transaksi', 'like' , $kdotomatis . '%')
                                ->latest('id_transaksi')->first();
	}
	
}
