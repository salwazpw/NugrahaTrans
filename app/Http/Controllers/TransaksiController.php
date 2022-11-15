<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Katalog;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 5;
        $transaksi = Transaksi::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('customer_id','like',"%{$request->keyword}%")
            ->orWhere('tanggalSewa','like',"%{$request->keyword}%")
            ->orWhere('tanggalAmbil','like',"%{$request->keyword}%")
            ->orWhere('tanggalKembali','like',"%{$request->keyword}%")
            ->orWhere('jumlah','like',"%{$request->keyword}%")
            ->orWhere('katalog_id','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%")
            ->orWhere('totalPembayaran','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $transaksi->appends($request->only('keyword'));
            return view('transaksi.transaksiIndex',compact('transaksi'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    public function create()
    {
        $transaksi = Transaksi::get();
        $customer = Customer::get();
        $katalog = Katalog::get();

        return view('transaksi.transaksiCreate' ,['transaksi'=>$transaksi, 'customer'=>$customer, 'katalog'=>$katalog]);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'Customer'=> 'required',
            'tanggalSewa'=>'required',
            'tanggalAmbil'=>'required',
            'tanggalKembali'=>'required',
            'Katalog'=>'required',
            'harga'=>'required',
            'totalPembayaran'=>'required'
        ]);

        $transaksi = new Transaksi();
        $transaksi->tanggalSewa = $request->get('tanggalSewa');
        $transaksi->tanggalAmbil = $request->get('tanggalAmbil');
        $transaksi->tanggalKembali = $request->get('tanggalKembali');
        $transaksi->harga = $request->get('harga');
        $transaksi->totalPembayaran = $request->get('totalPembayaran');

        $customer = new Customer();
        $customer->id = $request->get('Customer');

        $katalog = new Katalog();
        $katalog->id = $request->get('Katalog');

        $transaksi->customer()->associate($customer);
        $transaksi->katalog()->associate($katalog);
        $transaksi->save();
        
        Alert::success('Success','Data Transaksi Berhasil Ditambahkan');
        return redirect()->route('transaksi.index');
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('customer', 'katalog')->where('id', $id)->first();
        return view('transaksi.transaksiDetail', ['transaksi' => $transaksi]);
    }

    public function edit($id)
    {
        $transaksi = Transaksi::with('customer', 'katalog')->where('id', $id)->first();
        $customer = Customer::all();
        $katalog = Katalog::all(); 
        return view('transaksi.transaksiEdit', compact('customer', 'katalog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Customer'=> 'required',
            'tanggalSewa'=>'required',
            'tanggalAmbil'=>'required',
            'tanggalKembali'=>'required',
            'Katalog'=>'required',
            'harga'=>'required',
            'totalPembayaran'=>'required'
        ]);

        $transaksi = new Transaksi;
        $transaksi->tanggalSewa = $request->get('tanggalSewa');
        $transaksi->tanggalAmbil = $request->get('tanggalAmbil');
        $transaksi->tanggalKembali = $request->get('tanggalKembali');
        $transaksi->harga = $request->get('harga');
        $transaksi->totalPembayaran = $request->get('totalPembayaran');

        $customer = new Customer;
        $customer->id = $request->get('Customer');

        $katalog = new Katalog;
        $katalog->id = $request->get('Katalog');

        $transaksi->customer()->associate($customer);
        $transaksi->katalog()->associate($katalog);
        $transaksi->save();
        
        Alert::success('Success','Data Transaksi Berhasil Ditambahkan');
        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        Transaksi::find($id)->delete();
        return redirect()->route('transaksi.index')
            -> with('success', 'Transaksi Berhasil Dihapus');
    }

    public function transaksi($id){
        
        $transaksi = Transaksi::where('id', $id)->first();
        return view('transaksi.transaksi', ['transaksi' => $transaksi]);

    }

    public function getPrice($id){
        $loadData = Katalog::find($id);
        return response()->json($loadData);
    }

    public function cetak_pdf($id){
        $transaksi = Transaksi::where('id', $id)->first();
        $pdf = PDF::loadview('transaksi.transaksi_pdf',['transaksi'=>$transaksi]);
        return $pdf->stream();
    }
}
