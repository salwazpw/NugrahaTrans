<?php

namespace App\Http\Controllers;

use App\Models\Katalog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class KatalogController extends Controller
{

    // public function __invoke(Request $request)
    // {
    //     // Kode Anda di sini
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $katalog = Katalog::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('plat', 'like', "%{$request->keyword}%")
                ->orWhere('jenisKendaraan', 'like', "%{$request->keyword}%")
                ->orWhere('merk', 'like', "%{$request->keyword}%")
                ->orWhere('warna', 'like', "%{$request->keyword}%")
                ->orWhere('harga', 'like', "%{$request->keyword}%")
                ->orWhere('status', 'like', "%{$request->keyword}%")
                ->orWhere('informasi', 'like', "%{$request->keyword}%")
                ->orWhere('catatan', 'like', "%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


        $katalog->appends($request->only('keyword'));
        return view('katalog.katalogIndex', compact('katalog'))
            ->with('i', (request()->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $katalog = Katalog::all();
        return view('katalog.katalogCreate', ['katalog' => $katalog]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'plat' => 'required',
            'jenisKendaraan' => 'required',
            'merk'=>'required|string|',
            'warna'=>'required',
            'gambarKendaraan' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'harga'=> 'required|numeric',
            'informasi' => 'required',
            'catatan'=> 'required',
        ]);

        $katalog = new Katalog;
        $katalog->plat = $request->get('plat');
        $katalog->jenisKendaraan = $request->get('jenisKendaraan');
        $katalog->merk = $request->get('merk');
        $katalog->warna = $request->get('warna');
        $katalog->harga = $request->get('harga');
        $katalog->status = 'Tersedia';
        $katalog->informasi = $request->get('informasi');
        $katalog->catatan = $request->get('catatan');

        if ($request->file('gambarKendaraan')) {
            $image_name = $request->file('gambarKendaraan')->store('images', 'public');
        }

        $katalog->gambarKendaraan = $image_name;

        $katalog->save();

        Alert::success('Success', 'Data Katalog Kendaraan Berhasil Ditambahkan');
        return redirect()->route('katalog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $katalog = Katalog::find($id);
        return view('katalog.katalogDetail', compact('katalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $katalog = Katalog::findOrFail($id);
        return view('katalog.katalogEdit', compact('katalog'));
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
            'plat' => 'required|string',
            'jenisKendaraan' => 'required|string|',
            'merk'=>'required|string|',
            'warna'=>'required',
            'harga'=> 'required|numeric',
            'status' => 'required',
            'informasi' => 'required',
            'catatan'=> 'required',
        ]);

        $katalog = Katalog::where('id', $id)->first();
        if ($request->hasFile('gambarKendaraan')) {
            if ($katalog->gambarKendaraan && file_exists(storage_path('app/public/' . $katalog->gambarKendaraan))) {
                Storage::delete('public/' . $katalog->gambarKendaraan);
            }
            $image_name = $request->file('gambarKendaraan')->store('images', 'public');
            $katalog->gambarKendaraan = $image_name;
        }
        $katalog->plat = $request->get('plat');
        $katalog->jenisKendaraan = $request->get('jenisKendaraan');
        $katalog->merk = $request->get('merk');
        $katalog->warna = $request->get('warna');
        $katalog->harga = $request->get('harga');
        $katalog->status = $request->get('status');
        $katalog->informasi = $request->get('informasi');
        $katalog->catatan = $request->get('catatan'); 

        $katalog->save();

        return redirect()->route('katalog.index')
            ->with('success', 'Data Katalog Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Katalog::find($id)->delete();
            return redirect()->route('katalog.index')
                ->with('success', 'Data Katalog Berhasil Dihapus');
        } catch (\Exception $e) {
            Alert::error('Gagal','Data Tidak Dapat Dihapus Karena Terhubung dengan Tabel Lain');
            return redirect()->route('katalog.index');
        }
    }

    public function indexCar(){
        $data = Katalog::all();

        return view('katalog.index', ['products' => $data]);
    }
}
