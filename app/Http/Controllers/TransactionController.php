<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Supplier;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['supplier', 'transactionDetails'])->latest()->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('transactions.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'invoice_number'   => 'required|string|max:255',
            'supplier_id'      => 'required|integer',
            'transaction_type' => 'required|string|max:255',
            'subtotal'         => 'required|integer|min:0',
        ]);

        Transaction::create($data);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transaction->load(['supplier', 'transactionDetails.product']);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $suppliers = Supplier::all();
        return view('transactions.edit', compact('transaction', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->validate([
            'invoice_number'   => 'required|string|max:255',
            'supplier_id'      => 'required|integer',
            'transaction_type' => 'required|string|max:255',
            'subtotal'         => 'required|integer|min:0',
        ]);

        $transaction->update($data);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
