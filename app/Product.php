<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
	protected $fillable = ['kd_barang', 'nama_roti', 'harga'];

	public function setKdBarangAttribute($value)
    {
        return $this->attributes['kd_barang'] = "A-" . sprintf('%03d', $value);
	}

    /**
     * Product has Many Transactiondetail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactiondetails()
    {
        // hasMany(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
        return $this->hasMany(TransactionDetail::class, 'kd_barang', 'kd_barang');
    }

    /**
     * Product has one .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transactionones()
    {
        // hasOne(RelatedModel, foreignKeyOnRelatedModel = product_id, localKey = id)
        return $this->hasOne(Transaction::class, 'id_transaksi');
    }
}
