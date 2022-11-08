<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $testimoni = Testimoni::when($request->keyword, function($query) use ($request){
            $query
            ->Where('nama','like',"%{$request->keyword}%")
            ->orWhere('testimoni','like',"%{$request->keyword}%")
            ->orWhere('rate','like',"%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);

            $testimoni->appends($request->only('keyword'));
            return view('testimoni.testimoniIndex',compact('testimoni'))
                ->with('i',(request()->input('page',1)-1)*$pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimoni = Testimoni::all();
        return view('testimoni.testimoniCreate',['testimoni'=>$testimoni]);
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
            'nama' => 'required|string',
            'testimoni' => 'required|string',
            'rate' => 'required',   
        ]);
        $testimoni = new Testimoni;
        $testimoni->nama = $request->get('nama');
        $testimoni->testimoni = $request->get('testimoni');
        $testimoni->rate = $request->get('rate');

        $testimoni->save();
        
        Alert::success('Success','Data Testimoni Berhasil Ditambahkan');
        return redirect()->route('testimoni.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimoni  $testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        //
    }
}
