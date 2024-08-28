<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesDetail;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        $id_transaksi = Sales::max('id');
        $id_transaksi++;
        $kode_transaksi = "SL" . date("dmY") . sprintf("%03s", $id_transaksi);

        return view('penjualan.index', compact('categories', 'kode_transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dateFormat = date('Y-m-d');
        $sales = Sales::create([
            // kolom database => $request->nama_input
            'trans_code' => $request->kode_transaksi,
            'trans_date' => $dateFormat,
            'trans_paid' => $request->dibayar,
            'trans_change' => $request->kembalian,
            'trans_total_price' => $request->total_price,
        ]);

        foreach ($request->product_id as $key => $product) {
            SalesDetail::create([
                'sales_id' => $sales->id,
                'product_id' => $request->product_id[$key],
                'qty' => $request->qty[$key],
                'sub_total' => $request->sub_total[$key]
            ]);
        }
        toast('Data berhasil disimpan', 'success');
        return redirect()->to('print/' . $sales->id)->with('message', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getProducts($category_id)
    {
        $products = Product::where('category_id', $category_id)->get();
        return response()->json($products);
    }

    public function productName($product_id)
    {
        $product = Product::findOrFail($product_id);
        return response()->json($product);
    }

    public function print($id_sales)
    {
        $sales = Sales::where('id', $id_sales)->first();
        $detail_sales = SalesDetail::with('product')->where('sales_id', $id_sales)->get();


        return view('penjualan.print', compact('sales', 'detail_sales'));
    }
}
