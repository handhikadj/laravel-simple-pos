<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $kode = '';
        if ( empty($kode) )
        {
            $kdotomatis             = "TR". date('ym');
            $transactionselect  = Transaction::transactionselect($kdotomatis);

            if (!isset($transactionselect->id_transaksi))
            {
                $kode = "TR" . date('ym') . '001';                
                return $kode;
            }
            else 
            {
                $transactionid = substr($transactionselect->id_transaksi, 6);
                $transactionid = (int)$transactionid;
                $transactionid++;

                // Conjure automatic code
                $data =  sprintf('%03d', $transactionid);
                $kode = $kdotomatis . $data;
                
                return $kode;
            } // end of else

        } // end of if(empty $kode) 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kdproduct  = Product::where('kd_barang', $request->kd_barang)->first();

        $transactiondetail = new TransactionDetail($request->all());

        $totalharga = $kdproduct->harga * $request->jumlah;
        $transactiondetail->total_harga = $totalharga;
        $transactiondetail->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil'
        ]);     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionDetail $transactionDetail)
    {
        $kode = $this->index();

        $transaksicombine = DB::table('transaksi_detail as a')
                                                    ->join('product as b', 'a.kd_barang', '=', 'b.kd_barang')
                                                    ->select
                                                    (
                                                        'a.transaction_detail_id',
                                                        'a.kd_barang',
                                                        'b.nama_roti', 
                                                        'a.jumlah', 
                                                        'a.total_harga', 
                                                        'a.total_harga'
                                                    )
                                                    ->where('a.id_transaksi', $kode)
                                                    ->get();
        $total = DB::table('transaksi_detail')
                        ->where('id_transaksi', $kode)
                        ->sum('total_harga');
        // return $transaksicombine;
        return view('tablehitung', compact('transaksicombine', 'total'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transactiondetaildelete = TransactionDetail::findOrFail($id);
        
        TransactionDetail::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil terhapus'
        ]);
    }
}
