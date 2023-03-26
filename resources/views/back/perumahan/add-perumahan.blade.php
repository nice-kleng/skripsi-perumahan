@extends('back.layout.app')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Tambah Perumahan
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('store-perumahan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label">Nama Perumahan</label>
                                    <input type="text" name="nama_perumahan" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Jenis Perumahan</label>
                                    <select name="jenis_perumahan" id="jenis_perumahan" class="form-control">
                                        <option value="Rumah Tapak">Rumah Tapak</option>
                                        <option value="Rumah Susun">Rumah Susun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label">Provinsi</label>
                                    <select name="propinsi" id="propinsi" class="form-control">
                                        <option value="">--Pilih Provinsi--</option>
                                        @foreach ($propinsi as $item)
                                        <option value="{{ $item->nama }}" data-id="{{ $item->id }}">{{ $item->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Kabupaten</label>
                                    <select name="kabupaten" id="kabupaten" class="form-control" disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label">Kecamatan</label>
                                    <select name="kecamatan" id="kecamatan" class="form-control" disabled>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Desa</label>
                                    <select name="desa" id="desa" class="form-control" disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label class="form-label">Dusun</label>
                                    <select name="dusun" id="dusun" class="form-control" disabled>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Link Google Map</label>
                                    <input type="text" name="gmap" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label class="form-label">Nomor IMB/PBG Kolektif</label>
                                    <input type="text" class="form-control" name="nomor_kolektif">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label">Tanggal terbit IMB/PBG</label>
                                    <input type="date" class="form-control" name="tanggal_terbit">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 col-xs-6 mb-2">
                                    <label class="form-label">PDF IMB/PBG Asli (berwarna)</label>
                                    <input type="file" class="form-control @error('pdf') is-invalid @enderror"
                                        name="pdf">
                                    <div class="invalid-feedback">@error('pdf')
                                        {{ $message }}
                                        @enderror</div>
                                    <small class="form-hint">*Masukan salah satu IMB/PBG unit untuk kondisi IMB/PBG
                                        induk
                                        yang sudah pecah untuk sampling</small>
                                    <small class="form-hint">*Tulisan pada foto harus bisa terbaca dengan jelas, ukuran
                                        file
                                        maksimal 10MB</small>
                                </div>
                                <div class="col-md-6 col-xs-6 mb-2">
                                    <label class="form-label">Siteplan</label>
                                    <input type="file" class="form-control  @error('siteplan') is-invalid @enderror"
                                        name="siteplan">
                                    <div class="invalid-feedback">@error('siteplan')
                                        {{ $message }}
                                        @enderror</div>
                                    <small class="form-hint">*Tulisan pada foto harus bisa terbaca dengan jelas, ukuran
                                        file
                                        maksimal 10MB</small>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-4 col-xs-6 mb-2">
                                    <label class="form-label">Foto Gerbang/Jalan Utama</label>
                                    <input type="file" name="f_gerbang" id="f_gerbang"
                                        class="form-control @error('f_gerbang') is-invalid @enderror">
                                    <div class="invalid-feedback">@error('f_gerbang')
                                        {{ $message }}
                                        @enderror</div>
                                </div>
                                <div class="col-md-4 col-xs-6 mb-2">
                                    <label class="form-label">Foto Posisi Tengah Lokasi</label>
                                    <input type="file" name="f_posisi_tengah" id="f_posisi_tengah"
                                        class="form-control @error('f_posisi_tengah') is-invalid @enderror">
                                    <div class="invalid-feedback">@error('f_posisi_tengah')
                                        {{ $message }}
                                        @enderror</div>
                                </div>
                                <div class="col-md-4 col-xs-6 mb-2">
                                    <label class="form-label">Foto Contoh Rumah/Salah Satu Kavling</label>
                                    <input type="file" name="f_rumah" id="f_rumah"
                                        class="form-control @error('f_rumah') is-invalid @enderror">
                                    <div class="invalid-feedback">@error('f_rumah')
                                        {{ $message }}
                                        @enderror</div>
                                </div>
                            </div>
                            <div class="row mb-4 mt-5 text-center">
                                <div class="col-sm-6 col-lg-4 mb-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Foto Gerbang/Jalan Utama</h3>
                                        </div>
                                        <!-- Photo -->
                                        <div class="img-responsive img-responsive-21x21 card-img-bottom"
                                            id="preview-gerbang">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 mb-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Foto Posisi Tengah Lokasi</h3>
                                        </div>
                                        <!-- Photo -->
                                        <div class="img-responsive img-responsive-21x21 card-img-bottom"
                                            id="preview-posisi-tengah">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4 mb-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Foto Contoh Rumah/Salah Satu Kavling</h3>
                                        </div>
                                        <!-- Photo -->
                                        <div class="img-responsive img-responsive-21x21 card-img-bottom"
                                            id="preview-rumah">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col">
                                    <a href="" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Buat</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#f_gerbang').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                // $('#preview-image-before-upload').attr('style', e.target.result);
                $('#preview-gerbang').removeAttr('style');
                $('#preview-gerbang').css({"background-image": "url("+ e.target.result +")"});
            }
            reader.readAsDataURL(this.files[0]); 
        });
        $('#f_posisi_tengah').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                // $('#preview-image-before-upload').attr('style', e.target.result);
                $('#preview-posisi-tengah').removeAttr('style');
                $('#preview-posisi-tengah').css({"background-image": "url("+ e.target.result +")"});
            }
            reader.readAsDataURL(this.files[0]); 
        });
        $('#f_rumah').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                // $('#preview-image-before-upload').attr('style', e.target.result);
                $('#preview-rumah').removeAttr('style');
                $('#preview-rumah').css({"background-image": "url("+ e.target.result +")"});
            }
            reader.readAsDataURL(this.files[0]); 
        });

        $('#propinsi').on('change', function () {
            let propinsi_id = $('#propinsi option:selected').data('id');
            $.ajax({
                type: "get",
                url: "{{ route('api-kabupaten') }}",
                data: {
                    propinsi_id:propinsi_id
                },
                dataType: "json",
                success: function (response) {
                    $('#kabupaten').html(response);
                    $('#kabupaten').removeAttr('disabled');
                }
            });
        });
        
        $('#kabupaten').on('change', function () {
            let kabupaten_id = $('#kabupaten option:selected').data('id');
            $.ajax({
                type: "get",
                url: "{{ route('api-kecamatan') }}",
                data: {
                    kabupaten_id:kabupaten_id
                },
                dataType: "json",
                success: function (response) {
                    $('#kecamatan').html(response);
                    $('#kecamatan').removeAttr('disabled');
                }
            });
        });

        $('#kecamatan').on('change', function () {
            let kecamatan_id = $('#kecamatan option:selected').data('id');
            $.ajax({
                type: "get",
                url: "{{ route('api-desa') }}",
                data: {
                    kecamatan_id:kecamatan_id
                },
                dataType: "json",
                success: function (response) {
                    $('#desa').html(response);
                    $('#desa').removeAttr('disabled');
                }
            });
        });

        $('#desa').on('change', function () {
            let desa_id = $('#desa option:selected').data('id');
            $.ajax({
                type: "get",
                url: "{{ route('api-dusun') }}",
                data: {
                    desa_id:desa_id
                },
                dataType: "json",
                success: function (response) {
                    $('#dusun').html(response);
                    $('#dusun').removeAttr('disabled');
                }
            });
        });
    });
</script>
@endsection