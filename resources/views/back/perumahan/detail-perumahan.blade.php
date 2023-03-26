@extends('back.layout.app')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Account Settings
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="row g-0">
                <div class="col-2 d-none d-md-block border-end">
                    <div class="card-body">
                        <h4 class="subheader">Data Perumahan</h4>
                        <div class="list-group list-group-transparent">
                            <a href="{{ url('/detail-perumahan') . '/' . $perumslug }}"
                                class="list-group-item list-group-item-action d-flex align-items-center">Spesifikasi</a>
                            <a href="{{ url('/detail-perumahan') . '/' . $perumslug . '/blok-perumahan' }}"
                                class="list-group-item list-group-item-action d-flex align-items-center active">Blok</a>
                        </div>
                    </div>
                </div>
                <div class="col d-flex flex-column">
                    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method($method)
                        <div class="card-body">
                            <h2 class="mb-4">Spesifikasi Rumah</h2>
                            {{-- <h3 class="card-title">Profile Details</h3> --}}
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Tipe Rumah</label>
                                    <input type="hidden" name="perumahan_id"
                                        value="{{ old('perumahan_id', $data->perumahan_id ?? $perumid) }}">
                                    <input type="text" name="tipe" class="form-control"
                                        value="{{ old('tipe', $data->tipe ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Harga</label>
                                    <input type="text" name="harga" class="form-control"
                                        value="{{ old('harga', $data->harga ?? '') }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Luas Bangunan</label>
                                    <input type="text" name="l_bangunan" class="form-control"
                                        value="{{ old('l_bangunan', $data->l_bangunan ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Luas Lahan</label>
                                    <input type="text" name="l_lahan" class="form-control"
                                        value="{{ old('l_lahan', $data->l_lahan ?? '') }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Jumlah Kamar Tidur</label>
                                    <input type="text" name="k_tidur" class="form-control"
                                        value="{{ old('k_tidur', $data->k_tidur ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jumlah Kamar Mandi</label>
                                    <input type="text" name="k_mandi" class="form-control"
                                        value="{{ old('k_mandi', $data->k_mandi ?? '') }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4 col-xs-6 mb-3">
                                    <label class="form-label">Detail Atap</label>
                                    <input type="text" name="atap" class="form-control"
                                        value="{{ old('atap', $data->atap ?? '') }}">
                                </div>
                                <div class="col-md-4 col-xs-6 mb-3">
                                    <label class="form-label">Detail Dinding</label>
                                    <input type="text" name="dinding" class="form-control"
                                        value="{{ old('dinding', $data->dinding ?? '') }}">
                                </div>
                                <div class="col-md-4 col-xs-6 mb-3">
                                    <label class="form-label">Detail Lantai & Pondasi</label>
                                    <input type="text" name="lantai_pondasi" class="form-control"
                                        value="{{ old('lantai_pondasi', $data->lantai_pondasi ?? '') }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    @if (!empty($data->f_depan))
                                    <img src="{{ asset('storage/' . $data->f_depan) }}" class="img-fluid" alt=""
                                        id="preview-f-depan">
                                    @else
                                    <img src="" class="img-fluid" alt="" id="preview-f-depan">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if (!empty($data->f_denah))
                                    <img src="{{ asset('storage/' . $data->f_denah) }}" class="img-fluid" alt=""
                                        id="preview-f-denah">
                                    @else
                                    <img src="" class="img-fluid" alt="" id="preview-f-denah">
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Foto Depan Rumah </label>
                                    <input type="file" name="f_depan" id="fdepan" class="form-control">
                                    <input type="hidden" name="f_depan_lama" class="form-control"
                                        value="{{ old('f_denah_lama', $data->f_depan ?? '') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gambar Denah Rumah</label>
                                    <input type="file" name="f_denah" id="fdenah" class="form-control">
                                    <input type="hidden" name="f_denah_lama" class="form-control"
                                        value="{{ old('f_denah_lama', $data->f_denah ?? '') }}">
                                </div>
                            </div>
                            {{-- <div class="btn-list justify-content-end mb-5">
                                <a href="#" class="btn">
                                    Cancel
                                </a>
                                <a href="#" class="btn btn-primary">
                                    Submit
                                </a>
                            </div> --}}
                        </div>
                        <div class="card-footer bg-transparent mt-auto">
                            {{-- <div class="mt-2 pb-5">
                                <table class="table" id="tblspek">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tipe Rmah</th>
                                            <th>Harga</th>
                                            <th>Luas Bangunan</th>
                                            <th>Luas Lahan</th>
                                            <th>Jumlah Kamar Tidur</th>
                                            <th>Jumlah Kamar Mandi</th>
                                            <th>Detail Atap</th>
                                            <th>Detail Dinding</th>
                                            <th>Detail Lantai & Pondasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($spesifikasi as $item)
                                        <tr></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> --}}
                            <div class="btn-list justify-content-end">
                                <a href="#" class="btn">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#tblspek').DataTable({
            responsive:true,
        });

        $('#fdepan').change(function (e) { 
            e.preventDefault();
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-f-depan').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#fdenah').change(function (e) { 
            e.preventDefault();
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-f-denah').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endpush