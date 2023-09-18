<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{

    public function index()
    {
        $barang = Barang::all();
        return view('admin/barang')->with('barang', $barang);
        // $barang = DB::table('barang')->get();
        // return $barang;
    }
    public function market()
    {
        $barang = Barang::all();
        return view('/market')->with('barang', $barang);
        // $barang = DB::table('barang')->get();
        // return $barang;
    }

    public function detail($id)
    {
        $barang = Barang::select('*')
            ->where('id', $id)
            ->get();

        return view('DetailBarang', ['barang' => $barang]);
    }

    public function store(Request $request)
    {
        // ddd($request);
        // return request()->all();
        // return $request->file('gambar')->store('img');
        // $fileName = time() . '.' . $request->gambar->extension();
        // $request->img->move(storage_path('app/public/img'), $fileName);
        // 
        $file           = $request->file('gambar');
        //mengambil nama file
        $nama_file      = $file->getClientOriginalName();
        $file->move('file_upload', $file->getClientOriginalName());

        $post           = new Barang;
        $post->nama_barang     = $request->nama;
        $post->harga    = $request->harga;
        $post->stock   = $request->stock;
        $post->keterangan = $request->ket;
        $post->gambar = $nama_file;



        // // $post->save() digunakan untuk menyimpan data title dan content
        $post->save();

        // //digunakan untuk mengakses route post
        return redirect('/barang');
    }

    public function hapus($id)
    {
        $barang = Barang::where('id', $id)
            ->delete();

        return redirect('/barang');
    }

    public function ubah($id)
    {
        $barang = Barang::select('*')
            ->where('id', $id)
            ->get();

        return view('admin/ubahbarang', ['barang' => $barang]);
    }

    public function update(Request $request)
    {
        $barang = Barang::where('id', $request->id)
            ->update([
                'nama_barang' => $request->nama,
                'harga' => $request->harga,
                'keterangan' => $request->ket,
                'stock' => $request->stock
            ]);

        return redirect('/barang');
    }
}
