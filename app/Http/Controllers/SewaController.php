<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use App\Models\Sewa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $sewa = Sewa::when($request->keyword, function($query) use ($request){
            $query
            ->where('nik','like',"%{$request->keyword}%")
            ->orWhere('katalog_id','like',"%{$request->keyword}%")
            ->orWhere('tanggalSewa','like',"%{$request->keyword}%")
            ->orWhere('tanggalAmbil','like',"%{$request->keyword}%")
            ->orWhere('tanggalKembali','like',"%{$request->keyword}%")
            ->orWhere('jumlah','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%")
            ->orWhere('status_pembayaran','like',"%{$request->keyword}%")
            ->orWhere('harga','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


            $sewa->appends($request->only('keyword'));
            return view('sewa.sewaIndex',compact('sewa'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katalog = Katalog::where('status','Tersedia')->get();
        return view('sewa.sewaCreate',['katalog'=>$katalog]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nik' => 'required',
            'katalog_id' => 'required',
            'tanggalSewa'=> 'required',
            'tanggalAmbil'=> 'required',
            'tanggalKembali'=> 'required',
            'harga' => 'required',
            // 'status_pembayaran'=> 'required'
        ]);

        $sewa = new Sewa;
        $sewa -> nik = $request->nik;
        $sewa -> katalog_id = $request->katalog_id;
        $sewa -> tanggalSewa = $request->tanggalSewa;
        $sewa -> tanggalAmbil = $request->tanggalAmbil;
        $sewa -> tanggalKembali = $request->tanggalKembali;
        $sewa -> harga = $request->harga;
        $sewa -> status_pembayaran ='Belum Terbayar';
        $sewa->save();

        $katalog = Katalog::find($request->katalog_id);
        $katalog -> status = 'Tersewa';
        $katalog -> save();

        Alert::success('Success','Transaksi Berhasil Ditambahkan');
        return redirect()->route('sewa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewa = Sewa::find($id);
        return view('sewa.sewaDetail',compact('sewa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $katalog = Katalog::where('status','Tersedia')->get();
        $sewa = Sewa::findOrFail($id);
        return view('sewa.sewaEdit',compact('katalog','sewa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request -> validate([
            'katalog_id' => 'required',
            'tanggalSewa'=> 'required',
            'tanggalAmbil'=> 'required',
            'tanggalKembali'=> 'required',
            'harga' => 'required',
            'status_pembayaran'=> 'required'
        ]);

        $sewa = Sewa::findOrFail($id);
        $sewa -> katalog_id = $request->katalog_id;
        $sewa -> tanggalSewa = $request->tanggalSewa;
        $sewa -> tanggalAmbil = $request->tanggalAmbil;
        $sewa -> tanggalKembali = $request->tanggalKembali;
        $sewa -> harga = $request->harga;
        $sewa -> status_pembayaran = $request->status_pembayaran;
        $sewa->save();

        Alert::success('Success','Sewa Berhasil Diupdate');
        return redirect()->route('sewa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Sewa::find($id)->delete();
            return redirect()->route('sewa.index')
                ->with('success', 'Data Sewa Berhasil Dihapus');
        } catch (\Exception $e) {
            Alert::error('Gagal','Data Tidak Dapat Dihapus Karena Terhubung dengan Tabel Lain');
            return redirect()->route('sewa.index');
        }
    }

    public function getPrice($id){
        $loadData = Katalog::find($id);
        return response()->json($loadData);
    }
}
