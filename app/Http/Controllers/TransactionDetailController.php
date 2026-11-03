<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactionDetails = TransactionDetail::with(['transaction', 'product'])->latest()->paginate(10);
        return view('transaction_details.index', compact('transactionDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transaction_details.create', compact('transactions', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'transaction_id' => 'required|integer',
            'product_id'     => 'required|integer',
            'quantity'       => 'required|integer|min:1',
            'price'          => 'required|integer|min:0',
        ]);

        TransactionDetail::create($data);

        return redirect()->route('transaction-details.index')
            ->with('success', 'Detail transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionDetail $transactionDetail)
    {
        $transactionDetail->load(['transaction', 'product']);
        return view('transaction_details.show', compact('transactionDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        $transactions = Transaction::all();
        $products = Product::all();
        return view('transaction_details.edit', compact('transactionDetail', 'transactions', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        $data = $request->validate([
            'transaction_id' => 'required|integer',
            'product_id'     => 'required|integer',
            'quantity'       => 'required|integer|min:1',
            'price'          => 'required|integer|min:0',
        ]);

        $transactionDetail->update($data);

        return redirect()->route('transaction-details.index')
            ->with('success', 'Detail transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        $transactionDetail->delete();

        return redirect()->route('transaction-details.index')
            ->with('success', 'Detail transaksi berhasil dihapus.');
    }
}
