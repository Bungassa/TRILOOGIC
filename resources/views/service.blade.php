@extends('layout.layout')

@section('content')

  <x-header pageTitle="Layanan" breadcrumbItem="Layanan" />

    <!-- Start Service Section -->
    <section class="cs_pt_140 cs_pt_lg_80 cs_pb_115 cs_pb_lg_55">
      <div class="container">
        <div class="cs_section_heading cs_style_1 text-center cs_mb_60 cs_mb_lg_40">
          <div class="cs_section_heading_in">
            <h3 class="cs_fs_20 text-accent fw-normal cs_lh_base wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">Layanan</h3>
            <h2 class="cs_fs_48 cs_fs_lg_36 m-0">Layanan Kami</h2>
          </div>
        </div>
        <div class="row">
          @foreach($layanans as $layanan)
          <div class="col-xl-3 col-md-6">
            <div class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow cs_mb_25">
              <h2 class="cs_lh_base cs_fs_20 m-0 mb-4">{{ $layanan->nama }}</h2>
              <p class="cs_mb_24">{{ $layanan->deskripsi }}</p>
              <div class="cs_service_price mb-3">
                <span class="text-accent fw-bold cs_fs_18">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</span>
              </div>
              <div class="cs_service_thumb position-relative cs_rounded_5">
                @if($layanan->gambar)
                  @php
                    $imagePath = str_starts_with($layanan->gambar, 'assets/') ? asset($layanan->gambar) : asset('storage/' . $layanan->gambar);
                  @endphp
                  <div class="cs_service_thumb-in position-relative-in background-filled h-100" style="background-image: url('{{ $imagePath }}'); background-size: cover; background-position: center;"></div>
                @else
                  <div class="cs_service_thumb-in position-relative-in background-filled h-100" data-src="{{ asset('assets/img/service_default.jpg') }}"></div>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="cs_service_1-info text-center cs_mt_40 d-flex justify-content-center align-items-center flex-wrap">
          <a href="{{ route('pemesanan') }}" class="cs_btn cs_style_1 cs_fs_16 overflow-hidden cs_fs_16 cs_rounded_25 cs_pl_20 cs_pr_20 cs_pt_7 cs_pb_7 wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s"><span>Pesan Sekarang</span></a>
        </div>
      </div>
    </section>
    <!-- End Service Section -->
   
    @endsection