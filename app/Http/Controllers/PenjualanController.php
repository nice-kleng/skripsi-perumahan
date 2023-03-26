<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Perumahan;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $perumahan = Perumahan::all();

        return view('back.marketing.penjualan', compact('perumahan'));
    }

    public function apirumah(Request $request)
    {
        $html = "<option value=''>--Pilih Rumah--</option>";
        $rumah = Rumah::where('perumahan_id', $request->perumahan_id)->get();

        foreach ($rumah as $item) {
            $html .= "<option value='$item->id'>" . $item->kode_rumah . "</option>";
        }

        return response()->json($html);
    }

    public function storePenjualan(Request $request)
    {
        $rumah = Rumah::find($request->post('rumah'));
        DB::transaction(function () use ($request, $rumah) {
            Penjualan::create([
                'perumahan_id' => $request->post('perumahan'),
                'rumah_id' => $request->post('rumah'),
                'nik' => $request->post('nik'),
                'nama' => $request->post('nama'),
                'ttl' => $request->post('ttl'),
                'alamat' => $request->post('alamat'),
                'pekerjaan' => $request->post('pekerjaan'),
                'dp' => intval($request->post('dp')),
                'kurang_bayar' => intval($request->post('dp')),
                'status' => '0',
            ]);


            $rumah->update([
                'status' => '0'
            ]);
        });

        toastr()->success('Data Penjualan Berhasil ditambahkan');
        return redirect()->back();
    }
}
