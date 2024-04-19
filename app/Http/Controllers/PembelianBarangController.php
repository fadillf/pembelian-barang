<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianBarang;

class PembelianBarangController extends Controller
{
    protected $_pageTitle = 'Pembelian Barang';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PembelianBarang::get();
        return view('pages.pembelian-barang.index', [
            'pageTitle' => $this->_pageTitle,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pembelian-barang.create', [
            'pageTitle' => $this->_pageTitle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Kode_Barang'   => 'required|string|max:255',
            'Nama_Barang'   => 'required',
            'Satuan'        => 'required',
            'Qty'           => 'required',
            'Harga'         => 'required'
        ]);
        $createdRecord = MasterBarang::create(array_merge($validatedData, [
            'user_id' => auth()->user()->id,
        ]));
        return redirect()->route('master-barang.index')->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterBarang $masterBarang)
    {
        return view('pages.pembelian-barang.show', [
            'pageTitle' => $this->_pageTitle,
            'record' => $masterBarang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterBarang $masterBarang)
    {
        return view('pages.pembelian-barang.edit', [
            'pageTitle' => $this->_pageTitle,
            'record' => $masterBarang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterBarang $masterBarang)
    {
        $validatedData = $request->validate([
            'Kode_Barang'   => 'required|string|max:255',
            'Nama_Barang'   => 'required',
            'Satuan'        => 'required',
            'Qty'           => 'required',
            'Harga'         => 'required'
        ]);
        $masterBarang->update($validatedData);
        return redirect()->route('master-barang.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterBarang $masterBarang)
    {
        $masterBarang->delete();
        return redirect()->route('master-barang.index')->with('success', 'Data deleted successfully');
    }
}
