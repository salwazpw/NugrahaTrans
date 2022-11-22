<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pemasukan = Pemasukan::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('tanggalPemasukan','like',"%{$request->keyword}%")
            ->orWhere('jenisPemasukan','like',"%{$request->keyword}%")
            ->orWhere('jumlahPemasukan','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);

            $pemasukan->appends($request->only('keyword'));
            return view('pemasukan.pemasukanIndex',compact('pemasukan'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemasukan = Pemasukan::all();
        return view('pemasukan.pemasukanCreate',['pemasukan'=>$pemasukan]);
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
            'tanggalPemasukan' => 'required|date',
            'jenisPemasukan' => 'required|string',
            'jumlahPemasukan' => 'required|numeric',   
        ]);
        $pemasukan = new Pemasukan();
        $pemasukan->id = $request->get('id');
        $pemasukan->tanggalPemasukan = $request->get('tanggalPemasukan');
        $pemasukan->jenisPemasukan = $request->get('jenisPemasukan');
        $pemasukan->jumlahPemasukan = $request->get('jumlahPemasukan');

        $pemasukan->save();
        
        Alert::success('Success','Data Pemasukan Berhasil Ditambahkan');
        return redirect()->route('pemasukan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemasukan = Pemasukan::find($id);
        return view('pemasukan.pemasukanDetail',compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemasukan = Pemasukan::find($id);
        return view('pemasukan.pemasukanEdit',compact('pemasukan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggalPemasukan' => 'required|date',
            'jenisPemasukan' => 'required|string',       
            'jumlahPemasukan' => 'required|numeric',
        ]);
        $pemasukan = Pemasukan::where('id', $id)->first();
        $pemasukan->tanggalPemasukan = $request->get('tanggalPemasukan');
        $pemasukan->jenisPemasukan = $request->get('jenisPemasukan');
        $pemasukan->jumlahPemasukan = $request->get('jumlahPemasukan');   

        $pemasukan->save();

        return redirect()->route('pemasukan.index')
        ->with('success', 'Data Pemasukan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        try{
            Pemasukan::find($id)->delete();
            return redirect()->route('pemasukan.index')
            -> with('success', 'Pemasukan Berhasil Dihapus');
        }
        catch (\Exception $e) {
            Alert::error('Gagal','Data Tidak Dapat Dihapus Karena Terhubung dengan Tabel Lain');
            return redirect()->route('pemasukan.index');
        }
    }

    public function cetak_pdf(){
        $pemasukan = Pemasukan::all();
        $pdf = PDF::loadview('pemasukan.pemasukanPdf',['pemasukan'=>$pemasukan])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
