<?php

namespace App\Http\Controllers;

use App\Models\Blok;
use App\Models\Perumahan;
use App\Models\Rumah;
use App\Models\Spesifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PerumahanController extends Controller
{
    public function index()
    {
        $perumahan = Perumahan::latest()->get();

        return view('back.perumahan.index', compact('perumahan'));
    }

    public function create()
    {
        $propinsi = DB::select('select * from propinsi');
        return view('back.perumahan.add-perumahan', compact('propinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:10480',
            'siteplan' => 'required|file|image|mimes:jpg,png,jpeg|max:10480',
            'f_gerbang' => 'required|file|image|mimes:jpg,png,jpeg|max:10480',
            'f_posisi_tengah' => 'required|file|image|mimes:jpg,png,jpeg|max:10480',
            'f_rumah' => 'required|file|image|mimes:jpg,png,jpeg|max:10480',
        ], [
            'pdf' => [
                'required' => 'PDF IMB/PBG Asli Wajib diisi',
                'file' => 'Masukkan File dengan benar',
                'mimes' => 'Silahkan masukkan file dengan jenis PDF',
                'max' => 'Ukuran File melebihi ketentuan'
            ],
            'siteplan' => [
                'required' => 'Siteplan Wajib diisi',
                'file' => 'Masukkan File dengan benar',
                'image' => 'Silahkan Masukkan Siteplan sesuai dengan ketentuan yang berlaku',
                'mimes' => 'Silahkan Masukkan Siteplan sesuai dengan ketentuan yang berlaku',
                'max' => 'Ukuran Foto melebihi ketentuan'
            ],
            'f_gerbang' => [
                'required' => 'Foto Gerbang Wajib diisi',
                'file' => 'Masukkan File dengan benar',
                'image' => 'Silahkan Masukkan Foto sesuai dengan ketentuan yang berlaku',
                'mimes' => 'Yang anda masukkan bukan gambar',
                'max' => 'Ukuran Foto melebihi ketentuan'
            ],
            'f_posisi_tengah' => [
                'required' => 'Foto Posisi Tengah Lokasi Wajib diisi',
                'file' => 'Masukkan File dengan benar',
                'image' => 'Silahkan Masukkan Foto sesuai dengan ketentuan yang berlaku',
                'mimes' => 'Yang anda masukkan bukan gambar',
                'max' => 'Ukuran Foto melebihi ketentuan'
            ],
            'f_rumah' => [
                'required' => 'Foto Contoh Rumah Wajib diisi',
                'file' => 'Masukkan File dengan benar',
                'image' => 'Silahkan Masukkan Foto sesuai dengan ketentuan yang berlaku',
                'mimes' => 'Yang anda masukkan bukan gambar',
                'max' => 'Ukuran Foto melebihi ketentuan'
            ],
        ]);

        if ($request->hasFile('pdf')) {
            $pdf_name = 'pdf-imb-pbg-' . $request->post('nama_perumahan') . '-' . date('Ymd');
            $pdf = $request->file('pdf')->storeAs('pdf-imb', Str::of($pdf_name)->slug('-')  . '.' . $request->file('pdf')->getClientOriginalExtension());
        }
        if ($request->hasFile('siteplan')) {
            $siteplan_name = 'siteplan-' . $request->post('nama_perumahan') . today();
            $siteplan = $request->file('siteplan')->storeAs('siteplan', Str::of($siteplan_name)->slug('-')  . '.' . $request->file('siteplan')->getClientOriginalExtension());
        }
        if ($request->hasFile('f_gerbang')) {
            $f_gerbang_name = 'f-gerbang-' . $request->post('nama_perumahan') . today();
            $f_gerbang = $request->file('f_gerbang')->storeAs('foto-gerbang', Str::of($f_gerbang_name)->slug('-')  . '.' . $request->file('f_gerbang')->getClientOriginalExtension());
        }
        if ($request->hasFile('f_posisi_tengah')) {
            $f_posisi_tengah_name = 'f-posisi-tengah-' . $request->post('nama_perumahan') . today();
            $f_posisi_tengah = $request->file('pdf')->storeAs('foto-posisi-tengah', Str::of($f_posisi_tengah_name)->slug('-')  . '.' . $request->file('f_posisi_tengah')->getClientOriginalExtension());
        }
        if ($request->hasFile('f_rumah')) {
            $f_rumah_name = 'f-rumah-' . $request->post('nama_perumahan') . today();
            $f_rumah = $request->file('pdf')->storeAs('foto-rumah', Str::of($f_rumah_name)->slug('-')  . '.' . $request->file('f_rumah')->getClientOriginalExtension());
        }

        Perumahan::create([
            'nama_perumahan' => $request->post('nama_perumahan'),
            'slug' => Str::slug($request->post('nama_perumahan', '-')),
            'jenis_perumahan' => $request->post('jenis_perumahan'),
            'nomor_kolektif' => $request->post('nomor_kolektif'),
            'tanggal_terbit' => $request->post('tanggal_terbit'),
            'pdf_imb' => $pdf,
            'siteplan' => $siteplan,
            'dusun' => $request->post('dusun'),
            'desa' => $request->post('desa'),
            'kecamatan' => $request->post('kecamatan'),
            'kabupaten' => $request->post('kabupaten'),
            'propinsi' => $request->post('propinsi'),
            'gmap' => $request->post('gmap'),
            'f_gerbang' => $f_gerbang,
            'f_posisi_tengah' => $f_posisi_tengah,
            'f_rumah' => $f_rumah,
        ]);

        return redirect()->route('perumahan');
    }

    public function show(Perumahan $perumahan)
    {
        $spesifikasi = Spesifikasi::find(2);

        if (empty($spesifikasi)) {
            $data = [
                'action' => route('spesifikasi.store'),
                'method' => 'POST',
                'perumid' => $perumahan->id,
                'perumslug' => $perumahan->slug,
                // 'data' => null,
            ];
        } else {
            $data = [
                'action' => url('/spesifikasi' . '/' . $spesifikasi->id),
                'method' => 'PUT',
                'data' => $spesifikasi,
                'perumslug' => $perumahan->slug,
            ];
        }
        return view('back.perumahan.detail-perumahan', $data);
    }

    public function blok(Perumahan $perumahan)
    {
        $blok = Blok::where('perumahan_id', $perumahan->id)->get();
        $spek = Spesifikasi::where('perumahan_id', $perumahan->id)->get();
        $perumslug = $perumahan->slug;
        $perumid = $perumahan->id;
        return view('back.perumahan.blok.index', compact('blok', 'perumslug', 'spek', 'perumid'));
    }

    public function storeBlok(Request $request)
    {
        $blok = Blok::where(['perumahan_id' => $request->post('perumahan_id'), 'nama_blok' => $request->post('nama_blok')])->get();
        if ($blok->count() > 0) {
            toastr()->error('Nama Blok sudah terdaftar pada Perumahan ini.');
            return redirect()->back()->withInput();
        } else {
            DB::transaction(function () use ($request) {
                $blok_id = Blok::insertGetId([
                    'perumahan_id' => $request->post('perumahan_id'),
                    'nama_blok' => $request->post('nama_blok'),
                    'jlh_rumah' => $request->post('jlh_rumah'),
                ]);

                for ($i = 1; $i <= intval($request->post('jlh_rumah')); $i++) {
                    Rumah::create([
                        'perumahan_id' => $request->post('perumahan_id'),
                        'blok_id' => $blok_id,
                        'spesifikasi_id' => $request->post('spek'),
                        'status' => '1',
                    ]);
                }
            });
        }
        toastr()->success('Blok Perumahan Berhasil ditambahkan.');
        return redirect()->back();
    }

    public function deleteBlok($id)
    {
        $blok = Blok::find($id);
        $rumah = Rumah::where('blok_id', $id);

        if ($blok->delete()) {
            $rumah->delete();
            toastr()->success('Data Berhasil dihapus');
            return redirect()->back();
        } else {
            toastr()->error('Data Gagal dihapus');
            return redirect()->back();
        }
    }
}
