@extends('back.layout.app')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Penjualan
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
                    <h4 class="card-title">Form Penjualan</h4>
                    <div class="card-body">
                        <form action="{{ route('add-penjualan') }}" method="POST">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <label class="form-label">Perumahan</label>
                                    <select name="perumahan" id="perumahan" class="form-control">
                                        <option value="">--Pilih Perumahan--</option>
                                        @foreach ($perumahan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_perumahan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Rumah</label>
                                    <select name="rumah" id="rumah" class="form-control" disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <h4 class="card-title">Data Pembeli</h4>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">NIK</label>
                                    <input type="text" name="nik" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Tempat, Tanggal Lahir</label>
                                    <input type="text" name="ttl" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Alamat Lengkap</label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">DP Pembelian</label>
                                    <input type="text" name="dp" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#perumahan').on('change', function () {
            let perumahan_id = $('#perumahan option:selected').val();
            $.ajax({
                type: "get",
                url: "{{ route('api-rumah') }}",
                data: {
                    perumahan_id: perumahan_id,
                },
                dataType: "json",
                success: function (response) {
                    $('#rumah').html(response);
                    $('#rumah').removeAttr('disabled');
                }
            });
        });
    });
</script>
@endpush