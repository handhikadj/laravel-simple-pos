<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaksi_detail';
	protected $primaryKey = 'transaction_detail_id';
	protected $fillable = ['id_transaksi', 'kd_barang', 'jumlah', 'total_harga'];

	/**
	 * TransactionDetail belongs to Product.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function products()
	{
		// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
		return $this->belongsTo(Product::class, 'kd_barang', 'kd_barang');
	}

	/**
	 * TransactionDetail belongs to Transaction.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function transactions()
	{
		// belongsTo(RelatedModel, foreignKey = transaction_id, keyOnRelatedModel = id)
		return $this->belongsTo(Transaction::class, 'id_transaksi', 'id_transaksi');
	}

	public function scopeJoinTransactDetail($query, $kode)
	{
		return $query->where('transaksi_detail.id_transaksi', $kode)
								->join('product', 'transaksi_detail.kd_barang', '=', 'product.kd_barang')
                                ->select
                                (
                                    'transaksi_detail.transaction_detail_id',
                                    'transaksi_detail.kd_barang',
                                    'product.nama_roti', 
                                    'transaksi_detail.jumlah', 
                                    'transaksi_detail.total_harga', 
                                    'transaksi_detail.total_harga'
                                )->get();
	}

	public function scopeSumTransactDetail($query, $kode)
	{
		return $query->where('id_transaksi', $kode)->sum('total_harga');
	}

}
