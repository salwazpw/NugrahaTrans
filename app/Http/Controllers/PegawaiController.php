<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use PDF;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $pegawai = Pegawai::when($request->keyword, function($query) use ($request){
            $query
            ->where('id','like',"%{$request->keyword}%")
            ->orWhere('namaPegawai','like',"%{$request->keyword}%")
            ->orWhere('jabatan','like',"%{$request->keyword}%")
            ->orWhere('telepon','like',"%{$request->keyword}%")
            ->orWhere('email','like',"%{$request->keyword}%")
            ->orWhere('alamat','like',"%{$request->keyword}%")
            ->orWhere('jenisKelamin','like',"%{$request->keyword}%")
            ->orWhere('gaji','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);

            $pegawai->appends($request->only('keyword'));
            return view('pegawai.pegawaiIndex',compact('pegawai'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.pegawaiCreate',['pegawai'=>$pegawai]);
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
            'namaPegawai' => 'required|string',
            'jabatan' => 'required',
            'telepon' => 'required|max:13',
            'email' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',
            'gaji' => 'required|numeric',   
        ]);
        // Pegawai::create($request->all());
        $pegawai = new Pegawai;
        $pegawai->id = $request->get('id');
        $pegawai->namaPegawai = $request->get('namaPegawai');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->telepon = $request->get('telepon');
        $pegawai->email = $request->get('email');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->jenisKelamin = $request->get('jenisKelamin');
        $pegawai->gaji = $request->get('gaji');

        $pegawai->save();
        
        Alert::success('Success','Data Pegawai Berhasil Ditambahkan');
        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.pegawaiDetail',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.pegawaiEdit',compact('pegawai'));
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
            'namaPegawai' => 'required|string',
            'jabatan' => 'required',
            'telepon' => 'required|max:13',
            'email' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',         
            'gaji' => 'required|numeric',
        ]);
        $pegawai = Pegawai::where('id', $id)->first();
        $pegawai->namaPegawai = $request->get('namaPegawai');
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->telepon = $request->get('telepon');
        $pegawai->email = $request->get('email');
        $pegawai->alamat = $request->get('alamat');
        $pegawai->jenisKelamin = $request->get('jenisKelamin');
        $pegawai->gaji = $request->get('gaji');   

        $pegawai->save();

        // Pegawai::find($nip)->update($request->all());
        return redirect()->route('pegawai.index')
        ->with('success', 'Data Pegawai Berhasil Diupdate');
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
            Pegawai::find($id)->delete();
            return redirect()->route('pegawai.index')
            -> with('success', 'Pegawai Berhasil Dihapus');
        }
        catch (\Exception $e) {
            Alert::error('Gagal','Data Tidak Dapat Dihapus Karena Terhubung dengan Tabel Lain');
            return redirect()->route('pegawai.index');
        }
    }

    public function cetak_pdf($id){
        $pegawai = Pegawai::where('id', $id)->first();
        $pdf = PDF::loadview('pegawai.pegawaiPdf',['pegawai'=>$pegawai]);
        return $pdf->stream();
    }
}