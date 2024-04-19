<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianBarang;
use App\Models\MasterBarang;

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
        $masterBarang = MasterBarang::get();

        return view('pages.pembelian-barang.create', [
            'pageTitle' => $this->_pageTitle,
            'masterBarang' => $masterBarang
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
            'Harga'         => 'required',
            'Diskon'        => 'required'
        ]);

        $jumlah_beli = $request->Qty * $request->Harga;
        $jumlah_diskon = ($jumlah_beli) * $request->Diskon / 100;
        $subtotal = $jumlah_beli - $jumlah_diskon;
        
        // 'Nomor_Pembelian',
        // 'Tanggal',
        // 'Kode_Barang',
        // 'Satuan',
        // 'Qty',
        // 'Harga',
        // 'Diskon',
        // 'Subtotal',

        $createdRecord = PembelianBarang::create(array_merge($validatedData, [
            'Nomor_Pembelian' => rand(0, 999),
            'Tanggal' => \Carbon\Carbon::now(),
            'Subtotal' => $subtotal,
        ]));
        return redirect()->route('pembelian-barang.index')->with('success', 'Data created successfully');
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
        return redirect()->route('pembelian-barang.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterBarang $masterBarang)
    {
        $masterBarang->delete();
        return redirect()->route('pembelian-barang.index')->with('success', 'Data deleted successfully');
    }
}
