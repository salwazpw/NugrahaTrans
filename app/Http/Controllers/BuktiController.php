<?php

namespace App\Http\Controllers;

use App\Models\Bukti;
use App\Models\Sewa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BuktiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $bukti = Bukti::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('sewa_id', 'like', "%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


        $bukti->appends($request->only('keyword'));
        return view('bukti.buktiIndex', compact('bukti'))
            ->with('i', (request()->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewa = Sewa::where('status_pembayaran','Belum Terbayar')->get();
        return view('bukti.buktiCreate' ,['sewa'=>$sewa]);
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
            'sewa_id'=>'required',
            'buktiPembayaran'=>'required',
        ]);

        $bukti = new Bukti;
        $bukti -> sewa_id = $request->sewa_id;

        if ($request->file('buktiPembayaran')) {
            $image_name = $request->file('buktiPembayaran')->store('images', 'public');
        }

        $bukti->buktiPembayaran = $image_name;

        $bukti->save();

        $sewa = Sewa::find($request->sewa_id);
        $sewa -> status_pembayaran = 'Lunas';
        $sewa -> save();

        Alert::success('Success','Bukti Berhasil Ditambahkan');
        return redirect()->route('bukti.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function show(Bukti $bukti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function edit(Bukti $bukti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bukti $bukti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bukti $bukti)
    {
        //
    }

    public function __construct(){
        $this->middleware('auth');
    }
}
