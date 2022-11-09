<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pengeluaran = Pengeluaran::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('tanggalPengeluaran','like',"%{$request->keyword}%")
            ->orWhere('jenisPengeluaran','like',"%{$request->keyword}%")
            ->orWhere('jumlahPengeluaran','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);

            $pengeluaran->appends($request->only('keyword'));
            return view('pengeluaran.pengeluaranIndex',compact('pengeluaran'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.pengeluaranCreate',['pengeluaran'=>$pengeluaran]);
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
            'id'=> 'required|string|max:10',
            'tanggalPengeluaran' => 'required|date',
            'jenisPengeluaran' => 'required|string',
            'jumlahPengeluaran' => 'required|numeric',   
        ]);
        $pengeluaran = new Pengeluaran;
        $pengeluaran->id = $request->get('id');
        $pengeluaran->tanggalPengeluaran = $request->get('tanggalPengeluaran');
        $pengeluaran->jenisPengeluaran = $request->get('jenisPengeluaran');
        $pengeluaran->jumlahPengeluaran = $request->get('jumlahPengeluaran');

        $pengeluaran->save();
        
        Alert::success('Success','Data Pengeluaran Berhasil Ditambahkan');
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.pengeluaranDetail',compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        return view('pengeluaran.pengeluaranEdit',compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggalPengeluaran' => 'required|date',
            'jenisPengeluaran' => 'required|string',       
            'jumlahPengeluaran' => 'required|numeric',
        ]);
        $pengeluaran = Pengeluaran::where('id', $id)->first();
        $pengeluaran->tanggalPengeluaran = $request->get('tanggalPengeluaran');
        $pengeluaran->jenisPengeluaran = $request->get('jenisPengeluaran');
        $pengeluaran->jumlahPengeluaran = $request->get('jumlahPengeluaran');   

        $pengeluaran->save();

        return redirect()->route('pengeluaran.index')
        ->with('success', 'Data Pengeluaran Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        try{
            Pengeluaran::find($id)->delete();
            return redirect()->route('pengeluaran.index')
            -> with('success', 'Pengeluaran Berhasil Dihapus');
        }
        catch (\Exception $e) {
            Alert::error('Gagal','Data Tidak Dapat Dihapus Karena Terhubung dengan Tabel Lain');
            return redirect()->route('pengeluaran.index');
        }
    }

    public function cetak_pdf(){
        $pengeluaran = Pengeluaran::all();
        $pdf = PDF::loadview('pengeluaran.pengeluaranPdf',['pengeluaran'=>$pengeluaran])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
