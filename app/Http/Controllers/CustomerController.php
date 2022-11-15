<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $customer = Customer::when($request->keyword, function ($query) use ($request) {
            $query
                ->where('id', 'like', "%{$request->keyword}%")
                ->orWhere('namaCustomer', 'like', "%{$request->keyword}%")
                ->orWhere('alamat', 'like', "%{$request->keyword}%")
                ->orWhere('telepon', 'like', "%{$request->keyword}%");
        })->orderBy('id')->paginate($pagination);


        $customer->appends($request->only('keyword'));
        return view('customer.customerIndex', compact('customer'))
            ->with('i', (request()->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('customer.customerCreate', ['customer' => $customer]);
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
            'id' => 'required|string|max:16',
            'namaCustomer' => 'required|string|',
            'alamat'=>'required|string|',
            'telepon'=>'required',
        ]);

        $customer = new Customer();
        $customer->id = $request->get('id');
        $customer->namaCustomer = $request->get('namaCustomer');
        $customer->alamat = $request->get('alamat');
        $customer->telepon = $request->get('telepon');

        $customer->save();

        Alert::success('Success', 'Data Customer Berhasil Ditambahkan');
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customer.customerDetail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.customerEdit', compact('customer'));
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
            'id' => 'required|string|max:16',
            'namaCustomer' => 'required|string|',
            'alamat'=>'required|string|',
            'telepon'=>'required',
        ]);

        $customer = Customer::where('id', $id)->first();
        $customer->id = $request->get('id');
        $customer->namaCustomer = $request->get('namaCustomer');
        $customer->alamat = $request->get('alamat');
        $customer->telepon = $request->get('telepon');

        $customer->save();

        return redirect()->route('customer.index')
            ->with('success', 'Data customer Berhasil Diupdate');
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
            Customer::find($id)->delete();
            return redirect()->route('customer.index')
                ->with('success', 'Data customer Berhasil Dihapus');
        } catch (\Exception $e) {
            Alert::error('Gagal','Data Tidak Dapat Dihapus Karena Terhubung dengan Tabel Lain');
            return redirect()->route('customer.index');
        }
    }

    public function cetak_pdf($id){
        $customer = Customer::where('id', $id)->first();
        $pdf = PDF::loadview('customer.customerPdf',['customer'=>$customer])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
