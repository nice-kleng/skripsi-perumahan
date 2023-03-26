<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('back.admin.dashboard');
    }

    public function getKabupaten(Request $request)
    {
        $html = "<option value=''>--Pilih Kabupaten--</option>";
        $kabupaten = DB::select('select * from kabupaten where id_propinsi = ' . $request->propinsi_id . '');

        foreach ($kabupaten as $item) {
            $html .= "<option value='" . $item->nama . "' data-id='" . $item->id . "'>" . $item->nama . "</option>";
        }

        return response()->json($html);
    }

    public function getKecamatan(Request $request)
    {
        $html = "<option value=''>--Pilih Kecamatan--</option>";
        $kecamatan = DB::select('select * from kecamatan where id_kabupaten = ' . $request->kabupaten_id . '');

        foreach ($kecamatan as $item) {
            $html .= "<option value='" . $item->nama . "' data-id='" . $item->id . "'>" . $item->nama . "</option>";
        }

        return response()->json($html);
    }

    public function getDesa(Request $request)
    {
        $html = "<option value=''>--Pilih Desa--</option>";
        $desa = DB::select('select * from desa where id_kecamatan = ' . $request->kecamatan_id . '');

        foreach ($desa as $item) {
            $html .= "<option value='" . $item->nama . "' data-id='" . $item->id . "'>" . $item->nama . "</option>";
        }

        return response()->json($html);
    }

    public function getDusun(Request $request)
    {
        $html = "<option value=''>--Pilih Dusun--</option>";
        $dusun = DB::select('select * from dusun where id_desa = ' . $request->desa_id . '');

        foreach ($dusun as $item) {
            $html .= "<option value='" . $item->nama . "' data-id='" . $item->id . "'>" . $item->nama . "</option>";
        }

        return response()->json($html);
    }
}
