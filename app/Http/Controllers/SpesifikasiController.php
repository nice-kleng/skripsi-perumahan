<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;
use App\Models\Spesifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SpesifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'perumahan_id' => 'required',
            'tipe' => 'required|max:50',
            'harga' => 'required|numeric',
            'l_bangunan' => 'required',
            'l_lahan' => 'required',
            'k_tidur' => 'required|numeric',
            'k_mandi' => 'required|numeric',
            'atap' => 'required',
            'dinding' => 'required',
            'lantai_pondasi' => 'required',
            'f_depan' => 'required|file|image|mimes:jpg,png,jpeg|max:10480',
            'f_denah' => 'required|file|image|mimes:jpg,png,jpeg|max:10480',
        ], [
            'perumahan_id' => [
                'required' => 'Perumahan Tidak Terdeteksi',
            ],
            'tipe' => [
                'required' => 'Silahkan Masukkan Tipe Rumah terlebih dahulu',
                'max' => 'Isian melebihi batas maksimal'
            ],
            'harga' => [
                'required' => 'Silahkan Masukkan Harga Rumah terlebih dahulu',
                'numeric' => 'Harga Rumah Hanya Berisi Angka'
            ],
            'l_bangunan' => [
                'required' => 'Silahkan Masukkan Luas Bangunan terlebih dahulu',
                // 'numeric' => 'Harga Rumah Hanya Berisi Angka'
            ],
            'l_lahan' => [
                'required' => 'Silahkan Masukkan Luas Lahan terlebih dahulu',
                // 'numeric' => 'Harga Rumah Hanya Berisi Angka'
            ],
            'k_tidur' => [
                'required' => 'Silahkan Masukkan Jumlah Kamar Tidur terlebih dahulu',
                'numeric' => 'Jumlah Kamar Tidur hanya berisi angka'
            ],
            'k_mandi' => [
                'required' => 'Silahkan Masukkan Jumlah Kamar Mandi terlebih dahulu',
                'numeric' => 'Jumlah Kamar Mandi hanya berisi angka'
            ],
            'atap' => [
                'required' => 'Silahkan Masukkan Detail Atap terlebih dahulu',
                // 'numeric' => 'Jumlah Kamar Mandi hanya berisi angka'
            ],
            'dinding' => [
                'required' => 'Silahkan Masukkan Detail Dinding terlebih dahulu',
                // 'numeric' => 'Jumlah Kamar Mandi hanya berisi angka'
            ],
            'lantai_pondasi' => [
                'required' => 'Silahkan Masukkan Detail Lantai dan Pondasi terlebih dahulu',
                // 'numeric' => 'Jumlah Kamar Mandi hanya berisi angka'
            ],
            'f_depan' => [
                'required' => 'Silahkan Masukkan Contoh Foto Bagian Depan terlebih dahulu',
                'file' => 'Masukkan Foto dengan benar',
                'image' => 'Hanya boleh diisi dengan gambar',
                'mimes' => 'Silahkan masukkan Foto dengan format: jpg,jpeg,png',
                'max' => 'Ukuran Foto maksimal 10mb'
            ],
            'f_denah' => [
                'required' => 'Silahkan Masukkan Gambar Denah terlebih dahulu',
                'file' => 'Masukkan Gambar dengan benar',
                'image' => 'Hanya boleh diisi dengan gambar',
                'mimes' => 'Silahkan masukkan Gambar dengan format: jpg,jpeg,png',
                'max' => 'Ukuran Foto maksimal 10mb'
            ],
        ]);

        $perumahan = Perumahan::find($request->perumahan_id);

        // dd($perumahan->nama_perumahan);

        if ($request->hasFile('f_depan')) {
            $f_depan_name = 'f-depan-' . $perumahan->nama_perumahan . '-' . date('Ymd');
            $f_depan = $request->file('f_depan')->storeAs('contoh-foto-depan', Str::of($f_depan_name)->slug('-') . '.' . $request->file('f_depan')->getClientOriginalExtension());
        }

        if ($request->hasFile('f_denah')) {
            $f_denah_name = 'f-denah-' . $perumahan->nama_perumahan . '-' . date('Ymd');
            $f_denah = $request->file('f_denah')->storeAs('foto-denah', Str::of($f_denah_name)->slug('-') . '.' . $request->file('f_denah')->getClientOriginalExtension());
        }

        Spesifikasi::create([
            'perumahan_id' => $request->post('perumahan_id'),
            'tipe' => $request->post('tipe'),
            'harga' => $request->post('harga'),
            'l_bangunan' => $request->post('l_bangunan'),
            'l_lahan' => $request->post('l_lahan'),
            'k_tidur' => $request->post('k_tidur'),
            'k_mandi' => $request->post('k_mandi'),
            'atap' => $request->post('atap'),
            'dinding' => $request->post('dinding'),
            'lantai_pondasi' => $request->post('lantai_pondasi'),
            'f_depan' => $f_depan,
            'f_denah' => $f_denah,
        ]);

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $request->validate([
            'perumahan_id' => 'required',
            'tipe' => 'required|max:50',
            'harga' => 'required|numeric',
            'l_bangunan' => 'required',
            'l_lahan' => 'required',
            'k_tidur' => 'required|numeric',
            'k_mandi' => 'required|numeric',
            'atap' => 'required',
            'dinding' => 'required',
            'lantai_pondasi' => 'required',
            'f_depan' => 'file|image|mimes:jpg,png,jpeg|max:10480',
            'f_denah' => 'file|image|mimes:jpg,png,jpeg|max:10480',
        ], [
            'perumahan_id' => [
                'required' => 'Perumahan Tidak Terdeteksi',
            ],
            'tipe' => [
                'required' => 'Silahkan Masukkan Tipe Rumah terlebih dahulu',
                'max' => 'Isian melebihi batas maksimal'
            ],
            'harga' => [
                'required' => 'Silahkan Masukkan Harga Rumah terlebih dahulu',
                'numeric' => 'Harga Rumah Hanya Berisi Angka'
            ],
            'l_bangunan' => [
                'required' => 'Silahkan Masukkan Luas Bangunan terlebih dahulu',
                // 'numeric' => 'Harga Rumah Hanya Berisi Angka'
            ],
            'l_lahan' => [
                'required' => 'Silahkan Masukkan Luas Lahan terlebih dahulu',
                // 'numeric' => 'Harga Rumah Hanya Berisi Angka'
            ],
            'k_tidur' => [
                'required' => 'Silahkan Masukkan Jumlah Kamar Tidur terlebih dahulu',
                'numeric' => 'Jumlah Kamar Tidur hanya berisi angka'
            ],
            'k_mandi' => [
                'required' => 'Silahkan Masukkan Jumlah Kamar Mandi terlebih dahulu',
                'numeric' => 'Jumlah Kamar Mandi hanya berisi angka'
            ],
            'atap' => [
                'required' => 'Silahkan Masukkan Detail Atap terlebih dahulu',
                // 'numeric' => 'Jumlah Kamar Mandi hanya berisi angka'
            ],
            'dinding' => [
                'required' => 'Silahkan Masukkan Detail Dinding terlebih dahulu',
                // 'numeric' => 'Jumlah Kamar Mandi hanya berisi angka'
            ],
            'lantai_pondasi' => [
                'required' => 'Silahkan Masukkan Detail Lantai dan Pondasi terlebih dahulu',
                // 'numeric' => 'Jumlah Kamar Mandi hanya berisi angka'
            ],
            'f_depan' => [
                'file' => 'Masukkan Foto dengan benar',
                'image' => 'Hanya boleh diisi dengan gambar',
                'mimes' => 'Silahkan masukkan Foto dengan format: jpg,jpeg,png',
                'max' => 'Ukuran Foto maksimal 10mb'
            ],
            'f_denah' => [
                'file' => 'Masukkan Gambar dengan benar',
                'image' => 'Hanya boleh diisi dengan gambar',
                'mimes' => 'Silahkan masukkan Gambar dengan format: jpg,jpeg,png',
                'max' => 'Ukuran Foto maksimal 10mb'
            ],
        ]);

        $perumahan = Perumahan::find($request->perumahan_id);
        $f_depan = $request->post('f_depan_lama');
        $f_denah = $request->post('f_denah_lama');

        if ($request->hasFile('f_depan')) {
            if (File::exists(public_path('storage/' . $request->post('f_depan_lama')))) {
                File::delete(public_path('storage/' . $request->post('f_depan_lama')));
            }
            $f_depan_name = 'f-depan-' . $perumahan->nama_perumahan . '-' . date('Ymd');
            $f_depan = $request->file('f_depan')->storeAs('contoh-foto-depan', Str::of($f_depan_name)->slug('-') . '.' . $request->file('f_depane')->getClientOriginalExtension());
        }

        if ($request->hasFile('f_denah')) {
            if (File::exists(public_path('storage/' . $request->post('f_denah_lama')))) {
                File::delete(public_path('storage/' . $request->post('f_denah_lama')));
            }
            $f_denah_name = 'f-denah-' . '-' . $perumahan->nama_perumahan . '-' . date('Ymd');
            $f_denah = $request->file('f_denah')->storeAs('foto-denah', Str::of($f_denah_name)->slug('-') . '.' . $request->file('f_denahe')->getClientOriginalExtension());
        }

        $spesifikasi = Spesifikasi::find($id);
        $spesifikasi->update([
            'tipe' => $request->post('tipe'),
            'harga' => $request->post('harga'),
            'l_bangunan' => $request->post('l_bangunan'),
            'l_lahan' => $request->post('l_lahan'),
            'k_tidur' => $request->post('k_tidur'),
            'k_mandi' => $request->post('k_mandi'),
            'atap' => $request->post('atap'),
            'dinding' => $request->post('dinding'),
            'lantai_pondasi' => $request->post('lantai_pondasi'),
            'f_depan' => $f_depan,
            'f_denah' => $f_denah,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
