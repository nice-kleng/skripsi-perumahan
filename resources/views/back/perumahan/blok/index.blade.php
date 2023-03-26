@extends('back.layout.app')
@section('content')

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
                    <div class="card-body">
                        <h2 class="mb-4">Spesifikasi Rumah</h2>
                        {{-- <h3 class="card-title">Profile Details</h3> --}}
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#modal-large">Tambah Blok</button>
                        <table class="table" id="tblblok">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Blok</th>
                                    <th>Jumlah Rumah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blok as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_blok }}</td>
                                    <td>{{ $item->jlh_rumah }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-delete{{ $item->id }}">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                {{-- MODAL DELETE --}}
                                <div class="modal modal-blur fade" id="modal-delete{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="modal-title">Are you sure?</div>
                                                <div>Data akan dihapus secara permanen.</div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ url('/delete-blok') . '/' . $item->id }}"
                                                    method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="button" class="btn btn-link link-secondary me-auto"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-large" data-backdrop="static" data-keyboard="false" tabindex="-1"
    role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Large modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tambah-blok') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Blok</label>
                        <input type="hidden" name="perumahan_id" value="{{ $perumid }}">
                        <input type="text" name="nama_blok" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Spesifikasi Rumah</label>
                        <select name="spek" class="form-control">
                            <option value="">--Pilih Spek--</option>
                            @foreach ($spek as $item)
                            <option value="{{ $item->id }}">{{ $item->tipe }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jumlah Rumah</label>
                        <input type="text" name="jlh_rumah" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#tblblok').DataTable();
    });
</script>
@endpush