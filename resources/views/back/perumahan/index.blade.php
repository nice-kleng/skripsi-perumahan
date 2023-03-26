@extends('back.layout.app')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Data Perumahan
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="{{ route('add-perumahan') }}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Buat Lokasi Baru
                    </a>
                    <a href="{{ route('add-perumahan') }}" class="btn btn-primary d-sm-none btn-icon"
                        aria-label="Buat Lokasi Baru">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            @forelse ($perumahan as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <!-- Photo -->
                    <div class="img-responsive img-responsive-21x21 card-img-top"
                        style="background-image: url({{ asset('storage/' . $item->f_gerbang) }})">
                    </div>
                    {{-- <img src="{{ asset('/storage' . '/' . $item->f_gerbang) }}" alt=""> --}}
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->nama_perumahan }}</h3>
                        <div class="justify-content-beetwen">
                            <p>Kode Lokasi : {{ $item->kode_lokasi }}</p>
                            <a href="{{ url('/detail-perumahan') . '/' . $item->slug }}"
                                class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-body">
                        <p class="fw-bold">Belum ada perumahan yang didaftarkan</p>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script></script>
@endpush