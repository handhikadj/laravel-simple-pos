<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class TransactionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Transaction $transaction)
    {   
        $jumlah = TransactionDetail::where('id_transaksi', $request->id_transaksi)
                                                            ->get()->sum('total_harga');

        return $transaction->create([
                                                'id_transaksi' => $request->id_transaksi,
                                                'total_harga'   => $jumlah
                                            ]);
    }

    public function exportpdfs(Request $request, TransactionDetail $transactionpdf)
    {
        $transactionpdfs = $transactionpdf->whereDate('created_at', $request->laporanpdf)->get();
        
        $totalpdf = $transactionpdfs->sum('total_harga');
        $totalpdf = "Rp. " . number_format($totalpdf,2,',','.');
        
        $pdf = PDF::loadView('pdf', compact('transactionpdfs', 'totalpdf'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
    }

}


