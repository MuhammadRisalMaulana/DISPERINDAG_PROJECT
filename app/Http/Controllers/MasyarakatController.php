<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->nik;
        // dd($user);

        return view('pages.masyarakat.index', ['liat' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.masyarakat.index');
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
            'description' => 'required',
            'image' => 'required',
            'lokasi_kejadian' => 'required',
            
        ]);

        $user_alamat = Auth::user()->alamat;
        $id = Auth::user()->id;
        $name = Auth::user()->name;

        $data = $request->all();
        $data['user_alamat'] = $user_alamat;
        $data['user_id'] = $id;
        $data['name'] = $name;
        $data['lokasi_kejadian'] = $request->lokasi_kejadian;
        $data['keterangan_tambahan'] = $request->keterangan_tambahan;
        $data['image'] = $request->file('image')->store('assets/laporan', 'public');


        Alert::success('Berhasil', 'Pengaduan terkirim');
        Pengaduan::create($data);
        return redirect('user/pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function lihat()
    {
        $user = Auth::user()->pengaduan()->orderBy('created_at', 'DESC')->get();

        return view('pages.masyarakat.detail', [
            'items' => $user
        ]);
    }

    public function show($id)
    {
        $item = Pengaduan::with([
            'details',
            'user'
        ])->findOrFail($id);

        $tangap = Tanggapan::where('pengaduan_id', $id)->first();

        return view('pages.masyarakat.show', [
            'item' => $item,
            'tangap' => $tangap
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            // Mencari data masyarakat berdasarkan id
            $masyarakat = User::findOrFail($id);
    
            // Menghapus data masyarakat
            $masyarakat->delete();
    
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'name' => $masyarakat->name
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.'
            ], 500);
        }
}
}