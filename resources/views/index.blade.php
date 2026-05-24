@extends('layout.layout')



@section('content')

<x-header />

<style>
  /* Fix sub-pixel rendering gap (garis hitam) on Swiper Slider */
  .swiper-slide {
    margin-right: -1px !important;
  }
  .cs_hero .cs_swiper_parallax_bg {
    width: calc(100% + 2px) !important;
    left: -1px !important;
  }
  .cs_parallax_slider .swiper-wrapper {
    background-color: transparent !important;
  }
</style>

@if(isset($pendingTestimoniCount) && $pendingTestimoniCount > 0)
    <div class="testimoni-reminder-sticky" style="position: fixed; bottom: 20px; left: 20px; z-index: 9999; max-width: 320px;">
        <div class="alert alert-warning border-0 shadow-lg d-flex align-items-center mb-0" style="border-radius: 15px; background: white; border-left: 5px solid #C48989 !important;">
            <div class="me-3 fs-3" style="color: #C48989;">
                <i class="fa-solid fa-star-half-stroke"></i>
            </div>
            <div>
                <h6 class="fw-bold mb-1" style="color: #333;">Testimoni Wajib!</h6>
                <p class="small mb-2 text-muted">Anda memiliki <strong>{{ $pendingTestimoniCount }}</strong> pesanan yang butuh penilaian.</p>
                <a href="{{ route('profile') }}#orders" class="btn btn-sm text-white fw-bold w-100" style="border-radius: 8px; background-color: #C48989;">Berikan Sekarang</a>
            </div>
            <button type="button" class="btn-close ms-2 small" onclick="this.parentElement.parentElement.remove()" style="font-size: 10px;"></button>
        </div>
    </div>
@endif

<!-- Start Hero Section -->

<!-- End Header Section -->



<!-- Start Hero -->

<section class="cs_hero_1-wrap position-relative cs_hero_slider" style="background-color: transparent;">

  <div class="cs_swiper_parallax_slider_wrap">

    <div class="cs_parallax_slider_disabled">

      <div class="swiper-wrapper">

        <div class="swiper-slide swiper-slide-active" style="width: 100%;">

          <div class="cs_hero cs_style_1 d-flex align-items-center justify-content-center background-filled position-relative overflow-hidden">

            <figure class="cs_swiper_parallax_bg" data-src="{{ asset('assets/img/hero_slider_1.jpeg') }}">

              <img src="{{ asset('assets/img/hero_slider_1.jpeg') }}" alt="Slider" class="cs_entity_img">

              <div class="bg-primary opacity-75 position-absolute w-100 h-100 start-0 top-0"></div>

            </figure>

            <div class="container">

              <div class="cs_hero_text position-relative cs_zindex_5 d-inline-block">

                <h2 class="text-white cs_mb_5 fw-normal cs_fs_18">Ekky Family Refleksi</h2>

                <h1 class="text-white cs_mb_16 cs_fs_60 cs_fs_lg_46">

                  Refleksi Nyaman Untuk<br>Kesehatan Tubuh Anda

                </h1>

                <p class="text-white cs_mb_20">

                  Nikmati pengalaman refleksi dan pijat kesehatan yang <br>menyenangkan dan menyegarkan di Ekky Family Refleksi. <br> Kami hadir untuk membantu anda mencapai relaksasi optimal <br> dan meningkatkan kesehatan tubuh.

                </p>

                <div class="cs_hero_btn">

                  <a href="{{ route('pemesanan') }}" class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>Pesan Sekarang</span></a>

                </div>

              </div>

            </div>

          </div>

        </div>


      </div>

      <!-- If we need navigation buttons -->

      <div class="cs_slider_navigation d-flex cs_row_gap_15 flex-column position-absolute

          cs_zindex_4">

      </div>

      <div class="cs_hero_shape_1 position-absolute bottom-0 d-flex align-items-end h-100 cs_zindex_1">

        <svg width="434" height="759" viewBox="0 0 434 759" fill="none" xmlns="http://www.w3.org/2000/svg">

          <path d="M240 0H660L430 759H0L240 0Z" fill="url(#paint0_linear_81_287)" />

          <defs>

            <linearGradient id="paint0_linear_81_287" x1="145" y1="256.5" x2="484" y2="738" gradientUnits="userSpaceOnUse">

              <stop offset="0" stop-color="#D9D9D9" stop-opacity="0" />

              <stop offset="1" stop-color="#C48989" />

            </linearGradient>

          </defs>

        </svg>

      </div>

      <div class="cs_hero_shape_2 position-absolute start-0 cs_zindex_1">

        <svg width="572" height="572" viewBox="0 0 572 572" fill="none" xmlns="http://www.w3.org/2000/svg">

          <path d="M572 -6.10352e-05L6.10352e-05 572L1.10293e-05 -1.10293e-05L572 -6.10352e-05Z" fill="url(#paint0_linear_81_258)" fill-opacity="0.7" />

          <defs>

            <linearGradient id="paint0_linear_81_258" x1="388.254" y1="307.69" x2="-127.973" y2="-227.83" gradientUnits="userSpaceOnUse">

              <stop offset="0.0457759" stop-color="#18191D" stop-opacity="0" />

              <stop offset="0.514455" stop-color="#C48989" stop-opacity="0.35" />

            </linearGradient>

          </defs>

        </svg>

      </div>

    </div>

  </div>

  <div class="cs_social_btns d-flex flex-column cs_column_gap_15 cs_row_gap_15 cs_transition_5 position-absolute cs_zindex_5 ">

    <a href="https://www.instagram.com/ekky.family.refleksi/" class="d-flex align-items-center justify-content-center cs_height_35 cs_width_35 text-white rounded-circle"><i class="fa-brands fa-instagram"></i></a>

    <a href="https://www.tiktok.com/@ekky.family.refleksi" class="d-flex align-items-center justify-content-center cs_height_35 cs_width_35 text-white rounded-circle"><i class="fa-brands fa-tiktok"></i></a>

  </div>

</section>

<!-- End Hero -->



<!-- Animated Text -->

<div class="cs_moving_wrap background-filled text-uppercase text-white d-flex align-items-center" data-src="{{ asset('assets/img/moving_text_shape.png') }}">

  <div class="cs_moving_text cs_fs_30 cs_fs_lg_26 d-flex align-items-center text-nowrap">

    <span>Ekky Family Refleksi</span>

    <span>EkkyFam Smart Service</span>

    <span>Ekky Family Refleksi </span>

    <span>EkkyFam Smart Service</span>

  </div>

  <div class="cs_moving_text cs_fs_30 d-flex align-items-center text-nowrap">

    <span>Ekky Family Refleksi</span>

    <span>EkkyFam Smart Service</span>

    <span>Ekky Family Refleksi </span>

    <span>EkkyFam Smart Service</span>

  </div>

  <div class="cs_moving_text cs_fs_30 d-flex align-items-center text-nowrap">

    <span>Ekky Family Refleksi</span>

    <span>EkkyFam Smart Service</span>

    <span>Ekky Family Refleksi </span>

    <span>Ekky Family Refleksi</span>

  </div>

</div>

<!-- End Animated Text -->



<!-- Start Service Section -->

<section class="background-filled cs_pt_133 cs_pt_lg_75 cs_pb_140 cs_pb_lg_80 cs_gray_bg" data-src="{{ asset('assets/img/services_bg.png') }}">

  <div class="container">

    <div class="cs_section_heading cs_style_1 d-flex align-items-center cs_mb_60 cs_mb_lg_40 cs_column_gap_15 cs_row_gap_15">

      <div class="cs_section_heading_in">

        <h3 class="cs_fs_20 cs_fs_lg_18 text-accent fw-normal cs_lh_base cs_mb_10 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">Layanan</h3>

        <h2 class="cs_fs_48 cs_fs_lg_36 m-0">Layanan Kami </h2>

      </div>

      <div class="cs_section_heading_right">

        <p class="cs_section_text m-0">Kami menyediakan berbagai layanan refleksi dan pijat kesehatan yang dirancang untuk memberikan kenyamanan serta membantu menjaga kebugaran tubuh Anda.</p>

      </div>

    </div>

    <div class="row">

      @isset($layanans)

      @foreach($layanans as $layanan)

      <div class="col-xl-3 col-md-6 mb-4">

        <div class="cs_service cs_style_1 cs_pt_25 cs_pl_25 cs_pr_25 cs_pb_15 bg-white cs_transition_4 shadow h-100 d-flex flex-column">

          <h2 class="cs_lh_base cs_fs_20 cs_fs_lg_18 m-0 mb-4">{{ $layanan->nama }}</h2>

          <p class="cs_mb_24 flex-grow-1">{{ $layanan->deskripsi }}</p>

          <div class="cs_service_price mb-3">
            <span class="text-accent fw-bold cs_fs_18">Rp {{ number_format($layanan->harga, 0, ',', '.') }}</span>
          </div>

          <div class="cs_service_thumb position-relative cs_rounded_5 mt-auto">

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

      @endisset

    </div>

    <div class="cs_service_1-info  text-center cs_mt_40 d-flex justify-content-center align-items-center flex-wrap">

      <h4 class="fw-normal m-0">Rasakan relaksasi terbaik dan segarkan tubuh Anda sekarang juga</h4>

      <a href="{{ url('service') }}" class="cs_btn cs_style_1 cs_fs_16  overflow-hidden cs_fs_16 cs_rounded_25 cs_pl_20 cs_pr_20 cs_pt_7 cs_pb_7 wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s"><span>Temukan Layanan Lainnya</span></a>

    </div>

  </div>

</section>

<!-- End Service Section -->



<!-- Start About Section -->

<section class="cs_pt_135 cs_pt_lg_75 cs_pb_140 cs_pb_lg_80 position-relative">

  <div class="container">

    <div class="row">

      <div class="col-lg-12">

        <div class="cs_about cs_style_1">

          <div class="cs_section_heading cs_style_1 d-flex align-items-center cs_mb_15">

            <div class="cs_section_heading_in">

              <h3 class="cs_fs_20 cs_fs_lg_18 text-accent fw-normal cs_lh_base cs_mb_10 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">Tentang Kami</h3>

              <h2 class="cs_fs_48 cs_fs_lg_36 cs_mb_20">Bersama kami <span class="text-accent">Ekky Family Refleksi</span> rasakan perawatan tubuh yang nyaman dan profesional</h2>

              <p class="m-0">Ekky Famiily Refleksi adalah pusat layanan refleksi dan pijat kesehatan yang berkomitmen untuk memberikan pengalaman relaksasi terbaik bagi keluarga anda. Dengan terapis berpengalaman dan suasana yang nyaman, kami siap membantu anda memanjakan tubuh dan pikiran</p>

            </div>

          </div>

         

          <div class="row cs_mb_15">

            <div class="col-lg-6">

              <div class="cs_about-icon-box position-relative cs_mb_25">

                <span class="position-absolute cs_height_20 cs_width_20 top-0 start-0 cs_mt_5 bg-accent text-white cs_fs_10 d-flex align-items-center justify-content-center cs_rounded_30"><i class="fa-solid fa-angles-right"></i></span>

                <h3 class="cs_fs_16 cs_pl_35 cs_mb_12 cs_lh_lg">Service Center</h3>

                <p class="m-0">Layanan pijat yang tersedia di tempat kami, didukung suasana yang bersih dan tenang untuk memberikan pengalaman relaksasi terbaik </p>

              </div>

            </div>

            <div class="col-lg-6">

              <div class="cs_about-icon-box position-relative cs_mb_25">

                <span class="position-absolute cs_height_20 cs_width_20 top-0 start-0 cs_mt_5 bg-accent text-white cs_fs_10 d-flex align-items-center justify-content-center cs_rounded_30"><i class="fa-solid fa-angles-right"></i></span>

                <h3 class="cs_fs_16 cs_pl_35 cs_mb_12 cs_lh_lg">Home Service</h3>

                <p class="m-0">Layanan pijat yang tersedia di tempat kami dengan fasilitas yang nyaman dan suasana yang mendukung relaksasis</p>

              </div>

            </div>

          </div>

          <div class="d-flex align-items-center cs_row_gap_20 cs_column_gap_30 cs_column_gap_lg_20 flex-wrap">
                <a href="{{ url('pemesanan') }}" class="cs_btn cs_style_1 cs_fs_16 cs_rounded_5 cs_pl_30 cs_pr_30 cs_pt_10 cs_pb_10 overflow-hidden"><span>Pesan Sekarang</span></a>
                <a href="https://www.instagram.com/reel/DSZ-U3FE7_O/?igsh=eWN1eGEydjNvZGVm" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center">
                  <span class="cs_player_btn cs_width_45 cs_height_45 rounded-circle d-flex align-items-center justify-content-center text-white bg-primary position-relative cs_pl_5">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1.71401 16C1.61636 16 1.51868 15.9748 1.43054 15.9246C1.25251 15.8231 1.14258 15.6339 1.14258 15.4285V0.570579C1.14258 0.365193 1.25251 0.176009 1.43054 0.0744495C1.61022 -0.026561 1.82844 -0.0243301 2.00475 0.0783627L14.5762 7.50735C14.7503 7.6106 14.8569 7.79755 14.8569 7.99957C14.8569 8.20159 14.7503 8.38855 14.5762 8.49179L2.00475 15.9207C1.9149 15.9732 1.81443 16 1.71401 16ZM2.28544 1.57172V14.4274L13.1621 7.99957L2.28544 1.57172Z" fill="white"/>
                    </svg>   
                  </span>
                  <span class="cs_ml_15">Lihat Video</span>               
                </a>
           </div>

        </div>

      </div>

    </div>

  </div>

  <div class="cs_section_shape-1 position-absolute semi_rotate">

    <svg width="182" height="177" viewBox="0 0 182 177" fill="none" xmlns="http://www.w3.org/2000/svg">

      <path d="M94.4478 96.1115C106.99 105.211 120.6 111.159 132.748 112.86C132.823 112.871 132.894 112.876 132.967 112.886L150.387 27.5688C151.002 24.552 147.98 22.0838 145.148 23.2887L63.8438 57.8735C67.5196 70.1011 78.6592 84.6548 94.4478 96.1115Z" fill="#888888" fill-opacity="0.2" />

      <path d="M128.155 120.487C115.612 118.057 102.053 111.863 89.5833 102.815C72.3806 90.3334 60.5954 75.0018 56.1891 61.1295L14.8513 78.7143C11.6218 80.0876 11.7968 84.724 15.1212 85.8483L74.9037 106.09C78.4203 107.281 81.3895 109.706 83.2572 112.915L115.015 167.46C116.78 170.492 121.358 169.74 122.061 166.301L131.308 121.013C130.265 120.863 129.215 120.692 128.155 120.487Z" fill="#888888" fill-opacity="0.2" />

      <path d="M129.41 114.012C116.866 111.583 103.307 105.387 90.8381 96.3405C61.4995 75.0532 47.8833 45.4701 59.84 28.9897C71.7975 12.512 104.146 16.278 133.483 37.5651C143.082 44.5285 151.409 52.7615 157.564 61.3736C158.895 63.2352 158.464 65.8208 156.603 67.1511C154.742 68.4799 152.156 68.0495 150.827 66.1896C145.184 58.2942 137.505 50.7138 128.621 44.2672C103.894 26.326 75.466 21.5559 66.5447 33.8531C57.6235 46.1491 70.9766 71.6938 95.7041 89.6352C108.246 98.7348 121.848 104.686 134.005 106.383C145.234 107.955 153.677 105.705 157.78 100.049C162.059 94.1524 160.568 86.183 158.563 80.5345C157.799 78.3788 158.926 76.0123 161.081 75.2472C163.236 74.4823 165.604 75.6089 166.369 77.7657C170.142 88.3972 169.474 98.04 164.484 104.915C158.497 113.168 147.265 116.603 132.859 114.587C131.719 114.43 130.568 114.237 129.41 114.012Z" fill="#888888" fill-opacity="0.2" />

    </svg>

  </div>

</section>

<!-- End About Section -->



<!-- Start Why Choose Us -->

<section class="position-relative cs_iconbox_2_wrap cs_pt_135 cs_pt_lg_75 cs_pb_100 cs_pb_lg_40 overflow-hidden" style="background-color: #18191D;">

  <div class="container">

    <div class="row">

      <div class="col-xl-6">

        <div class="position-relative cs_zindex_3">

          <div class="cs_section_heading cs_style_1 d-flex align-items-center cs_mb_60 cs_mb_lg_40 cs_column_gap_15 cs_row_gap_15">

            <div class="cs_section_heading_in">

              <h3 class="cs_fs_20 cs_fs_lg_18 text-accent fw-normal cs_lh_base cs_mb_10 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">Kenapa Memilih Kami?</h3>

              <h2 class="cs_fs_48 cs_fs_lg_36 cs_mb_20 text-white">Pilihan terbaik <span class="text-accent">untuk <br>relaksasi</span> dan kesehatan <br>tubuh anda</h2>

              <p class="text-white m-0">Kami mengutamakan kenyamanan dan kepuasan pelanggan dengan layanan dari terapis berpengalaman <br> Didukung suasana yang bersih dan tenang untuk memberikan pengalaman relaksasi terbaik</p>

            </div>

          </div>

          <div class="row">

            <div class="col-sm-6">

              <div class="cs_iconbox cs_style_1 d-flex align-items-center cs_mb_40">

                <div class="cs_iconbox_icon d-flex align-items-center justify-content-center cs_height_70 cs_width_70 cs_rounded_10 flex-none cs_mr_20 bg-accent cs_transition_4 wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">

                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M36.8436 1.9563H3.15638C1.41593 1.9563 0 3.37223 0 5.11268V27.3739C0 29.1144 1.41593 30.5303 3.15638 30.5303H14.5176V36.2336H10.2438C9.74407 36.2336 9.33882 36.6387 9.33882 37.1386C9.33882 37.6384 9.74407 38.0435 10.2438 38.0435H29.7561C30.2558 38.0435 30.6611 37.6384 30.6611 37.1386C30.6611 36.6387 30.2558 36.2336 29.7561 36.2336H25.4824V30.5303H36.8435C38.5839 30.5303 39.9999 29.1144 39.9999 27.3739V5.11268C40 3.37223 38.5841 1.9563 36.8436 1.9563ZM3.15638 3.76625H36.8436C37.5861 3.76625 38.19 4.37024 38.19 5.11268V24.8078H1.80995V5.11268C1.80995 4.37024 2.41394 3.76625 3.15638 3.76625ZM23.6725 36.2336H16.3275V30.5303H23.6725V36.2336ZM36.8436 28.7204H3.15638C2.41394 28.7204 1.80995 28.1164 1.80995 27.3739V26.6177H38.19V27.3739C38.19 28.1164 37.5861 28.7204 36.8436 28.7204Z" fill="white" />

                    <path d="M13.944 19.3833H26.0566C26.5563 19.3833 26.9616 18.9782 26.9616 18.4784V10.0957C26.9616 9.59583 26.5563 9.19067 26.0566 9.19067H13.944C13.4443 9.19067 13.0391 9.59583 13.0391 10.0957V18.4784C13.0391 18.9781 13.4443 19.3833 13.944 19.3833ZM14.849 11.0006H25.1516V17.5734H14.849V11.0006Z" fill="white" />

                    <path d="M28.738 11.0006H29.3716C29.8714 11.0006 30.2766 10.5955 30.2766 10.0957C30.2766 9.59583 29.8714 9.19067 29.3716 9.19067H28.738C28.2383 9.19067 27.833 9.59583 27.833 10.0957C27.833 10.5955 28.2382 11.0006 28.738 11.0006Z" fill="white" />

                    <path d="M26.0563 8.31902C26.5561 8.31902 26.9613 7.91386 26.9613 7.41404V6.78047C26.9613 6.28065 26.5561 5.87549 26.0563 5.87549C25.5566 5.87549 25.1514 6.28065 25.1514 6.78047V7.41404C25.1514 7.91386 25.5565 8.31902 26.0563 8.31902Z" fill="white" />

                    <path d="M28.738 19.3834H29.3716C29.8714 19.3834 30.2766 18.9783 30.2766 18.4785C30.2766 17.9786 29.8714 17.5735 29.3716 17.5735H28.738C28.2383 17.5735 27.833 17.9786 27.833 18.4785C27.833 18.9783 28.2382 19.3834 28.738 19.3834Z" fill="white" />

                    <path d="M26.0563 20.2549C25.5566 20.2549 25.1514 20.66 25.1514 21.1599V21.7934C25.1514 22.2933 25.5566 22.6984 26.0563 22.6984C26.5561 22.6984 26.9613 22.2933 26.9613 21.7934V21.1599C26.9613 20.66 26.5561 20.2549 26.0563 20.2549Z" fill="white" />

                    <path d="M10.6286 11.0006H11.2623C11.762 11.0006 12.1673 10.5955 12.1673 10.0957C12.1673 9.59583 11.762 9.19067 11.2623 9.19067H10.6286C10.1289 9.19067 9.72363 9.59583 9.72363 10.0957C9.72363 10.5955 10.1289 11.0006 10.6286 11.0006Z" fill="white" />

                    <path d="M13.944 8.31902C14.4438 8.31902 14.849 7.91386 14.849 7.41404V6.78047C14.849 6.28065 14.4438 5.87549 13.944 5.87549C13.4443 5.87549 13.0391 6.28065 13.0391 6.78047V7.41404C13.0391 7.91386 13.4443 8.31902 13.944 8.31902Z" fill="white" />

                    <path d="M10.6286 19.3834H11.2623C11.762 19.3834 12.1673 18.9783 12.1673 18.4785C12.1673 17.9786 11.762 17.5735 11.2623 17.5735H10.6286C10.1289 17.5735 9.72363 17.9786 9.72363 18.4785C9.72363 18.9783 10.1289 19.3834 10.6286 19.3834Z" fill="white" />

                    <path d="M13.944 22.6984C14.4438 22.6984 14.849 22.2933 14.849 21.7934V21.1599C14.849 20.66 14.4438 20.2549 13.944 20.2549C13.4443 20.2549 13.0391 20.66 13.0391 21.1599V21.7934C13.0391 22.2933 13.4443 22.6984 13.944 22.6984Z" fill="white" />

                  </svg>

                </div>

                <div>

                  <h2 class="text-white m-0 cs_fs_20 cs_fs_lg_18 cs_lh_base">Therapist Berpengalaman</h2>

                </div>

              </div>

            </div>

            <div class="col-sm-6">

              <div class="cs_iconbox cs_style_1 d-flex align-items-center cs_mb_40">

                <div class="cs_iconbox_icon d-flex align-items-center justify-content-center cs_height_70 cs_width_70 cs_rounded_10 flex-none cs_mr_20 bg-accent cs_transition_4 wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">

                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <g clip-path="url(#clip0_81_544)">

                      <path d="M39.1734 1.5156C39.1376 1.35251 39.0563 1.19738 38.9295 1.07058C38.8027 0.943877 38.6476 0.862423 38.4845 0.826673C34.4271 -0.135122 30.2842 -0.258028 26.4114 0.459857C26.4098 0.460129 26.4081 0.460491 26.4064 0.460762C25.9304 0.549185 25.458 0.650279 24.9907 0.764044C21.6828 1.56918 18.6142 3.01553 15.9643 5.00293C15.9218 5.02981 15.8816 5.06013 15.8443 5.09344C14.9868 5.74498 14.1735 6.45382 13.4113 7.21605C10.2697 10.3577 8.03857 14.3618 6.9593 18.7953C5.95632 22.9152 5.9413 27.4034 6.91196 31.808L0.2651 38.4549C-0.0883215 38.8083 -0.088412 39.3814 0.2651 39.7349C0.441766 39.9116 0.673458 40 0.90506 40C1.13666 40 1.36836 39.9116 1.54502 39.7349L8.19197 33.088C12.5967 34.0585 17.0848 34.0435 21.2047 33.0407C25.6382 31.9615 29.6424 29.7304 32.784 26.5887C34.9728 24.3999 36.7197 21.7924 37.9429 18.9127C37.9679 18.8656 37.989 18.816 38.0054 18.7643C38.5093 17.5562 38.9216 16.3009 39.236 15.0094C40.2755 10.7394 40.2538 6.0737 39.1734 1.5156ZM27.4801 2.1246C30.362 1.67244 33.397 1.70575 36.4652 2.25484L27.4801 11.2399V2.1246ZM14.6913 8.49597C14.9684 8.21875 15.2519 7.95022 15.5421 7.68957V10.3272C15.5421 10.8269 15.9473 11.2322 16.4472 11.2322C16.9471 11.2322 17.3522 10.8269 17.3522 10.3272V6.22991C19.8185 4.44805 22.6406 3.18451 25.6699 2.47712V13.0501L17.3522 21.3678V13.7198C17.3522 13.2201 16.9471 12.8148 16.4472 12.8148C15.9473 12.8148 15.5421 13.2201 15.5421 13.7198V23.1779L8.45018 30.2697C6.96744 21.9836 9.24581 13.9415 14.6913 8.49597ZM31.504 25.3087C26.0586 30.7542 18.0165 33.0326 9.73019 31.5497L21.886 19.3939H35.7228C34.6504 21.5779 33.2376 23.5752 31.504 25.3087ZM36.5174 17.5838H23.6962L37.7452 3.53485C38.6283 8.47008 38.1772 13.3187 36.5174 17.5838Z" fill="white" />

                    </g>

                    <defs>

                      <clipPath id="clip0_81_544">

                        <rect width="40" height="40" fill="white" />

                      </clipPath>

                    </defs>

                  </svg>

                </div>

                <div>

                  <h2 class="text-white m-0 cs_fs_20 cs_fs_lg_18 cs_lh_base">Tempat Nyaman dan Bersih</h2>

                </div>

              </div>

            </div>

            <div class="col-sm-6">

              <div class="cs_iconbox cs_style_1 d-flex align-items-center cs_mb_40">

                <div class="cs_iconbox_icon d-flex align-items-center justify-content-center cs_height_70 cs_width_70 cs_rounded_10 flex-none cs_mr_20 bg-accent cs_transition_4 wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">

                  <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M27.9115 4.33891V0.904977C27.9115 0.405249 27.5064 0 27.0065 0H1.52509C1.02528 0 0.620117 0.405249 0.620117 0.904977V35.7798C0.620117 36.2795 1.02528 36.6848 1.52509 36.6848H1.6393C2.05478 38.5783 3.74446 40 5.76084 40H22.7709C24.7873 40 26.4769 38.5783 26.8923 36.6848H27.0065C27.5064 36.6848 27.9115 36.2795 27.9115 35.7798V29.0186C34.3129 28.5536 39.3792 23.1967 39.3792 16.6788C39.3792 10.161 34.3129 4.80398 27.9115 4.33891ZM27.0065 27.2415C26.5067 27.2415 26.1016 27.6468 26.1016 28.1465V34.8749H12.3034C11.8036 34.8749 11.3984 35.2802 11.3984 35.7799C11.3984 36.2796 11.8036 36.6849 12.3034 36.6849H25.0041C24.6455 37.5665 23.7798 38.19 22.7709 38.19H5.76084C4.75179 38.19 3.88618 37.5665 3.52754 36.6848H8.80111C9.30093 36.6848 9.70609 36.2795 9.70609 35.7798C9.70609 35.2801 9.30093 34.8748 8.80111 34.8748H2.43007V1.80995H26.1016V5.21113C26.1016 5.71086 26.5067 6.11611 27.0065 6.11611C32.8308 6.11611 37.5693 10.8545 37.5693 16.6788C37.5693 22.5032 32.8309 27.2415 27.0065 27.2415Z" fill="white" />

                    <path d="M27.0065 7.9812C26.5067 7.9812 26.1016 8.38645 26.1016 8.88618V24.4714C26.1016 24.9712 26.5067 25.3764 27.0065 25.3764C31.8024 25.3764 35.7041 21.4747 35.7041 16.6788C35.7041 11.883 31.8024 7.9812 27.0065 7.9812ZM27.9115 23.5073V9.85043C31.2833 10.2949 33.8941 13.1877 33.8941 16.6788C33.8941 20.17 31.2834 23.0628 27.9115 23.5073Z" fill="white" />

                    <path d="M20.3347 25.6729C19.9431 25.6729 19.6096 25.9215 19.4836 26.2697C19.1355 26.3957 18.8867 26.7292 18.8867 27.1208C18.8867 27.6205 19.2919 28.0258 19.7917 28.0258H20.3347C20.8345 28.0258 21.2397 27.6205 21.2397 27.1208V26.5778C21.2397 26.078 20.8345 25.6729 20.3347 25.6729Z" fill="white" />

                    <path d="M16.7933 26.2158H15.7653C15.2655 26.2158 14.8604 26.6211 14.8604 27.1208C14.8604 27.6205 15.2655 28.0258 15.7653 28.0258H16.7933C17.2931 28.0258 17.6983 27.6205 17.6983 27.1208C17.6983 26.6211 17.2931 26.2158 16.7933 26.2158Z" fill="white" />

                    <path d="M12.7669 26.2158H11.739C11.2391 26.2158 10.834 26.6211 10.834 27.1208C10.834 27.6205 11.2391 28.0258 11.739 28.0258H12.7669C13.2667 28.0258 13.6719 27.6205 13.6719 27.1208C13.6719 26.6211 13.2667 26.2158 12.7669 26.2158Z" fill="white" />

                    <path d="M9.0481 26.2694C8.92204 25.9213 8.58855 25.6726 8.19697 25.6726C7.69715 25.6726 7.29199 26.0779 7.29199 26.5776V27.1206C7.29199 27.6203 7.69715 28.0255 8.19697 28.0255H8.73996C9.23977 28.0255 9.64493 27.6203 9.64493 27.1206C9.64493 26.729 9.39615 26.3955 9.0481 26.2694Z" fill="white" />

                    <path d="M8.19697 19.8089C8.69679 19.8089 9.10195 19.4037 9.10195 18.9039V17.781C9.10195 17.2812 8.69679 16.876 8.19697 16.876C7.69715 16.876 7.29199 17.2812 7.29199 17.781V18.9039C7.29199 19.4037 7.69715 19.8089 8.19697 19.8089Z" fill="white" />

                    <path d="M8.19697 15.4105C8.69679 15.4105 9.10195 15.0052 9.10195 14.5055V13.3825C9.10195 12.8828 8.69679 12.4775 8.19697 12.4775C7.69715 12.4775 7.29199 12.8828 7.29199 13.3825V14.5055C7.29199 15.0053 7.69715 15.4105 8.19697 15.4105Z" fill="white" />

                    <path d="M8.19697 24.2074C8.69679 24.2074 9.10195 23.8021 9.10195 23.3024V22.1794C9.10195 21.6797 8.69679 21.2744 8.19697 21.2744C7.69715 21.2744 7.29199 21.6797 7.29199 22.1794V23.3024C7.29199 23.8022 7.69715 24.2074 8.19697 24.2074Z" fill="white" />

                    <path d="M8.73996 8.65918H8.19697C7.69715 8.65918 7.29199 9.06443 7.29199 9.56416V10.1071C7.29199 10.6069 7.69715 11.0121 8.19697 11.0121C8.58855 11.0121 8.92204 10.7634 9.0481 10.4153C9.39615 10.2892 9.64493 9.95574 9.64493 9.56416C9.64493 9.06434 9.23977 8.65918 8.73996 8.65918Z" fill="white" />

                    <path d="M12.7669 8.65918H11.739C11.2391 8.65918 10.834 9.06443 10.834 9.56416C10.834 10.0639 11.2391 10.4691 11.739 10.4691H12.7669C13.2667 10.4691 13.6719 10.0639 13.6719 9.56416C13.6719 9.06443 13.2667 8.65918 12.7669 8.65918Z" fill="white" />

                    <path d="M16.7933 8.65918H15.7653C15.2655 8.65918 14.8604 9.06443 14.8604 9.56416C14.8604 10.0639 15.2655 10.4691 15.7653 10.4691H16.7933C17.2931 10.4691 17.6983 10.0639 17.6983 9.56416C17.6983 9.06443 17.2931 8.65918 16.7933 8.65918Z" fill="white" />

                    <path d="M20.3347 8.65918H19.7917C19.2919 8.65918 18.8867 9.06443 18.8867 9.56416C18.8867 9.95574 19.1355 10.2893 19.4836 10.4153C19.6096 10.7634 19.9431 11.0121 20.3347 11.0121C20.8345 11.0121 21.2397 10.6069 21.2397 10.1071V9.56416C21.2397 9.06434 20.8345 8.65918 20.3347 8.65918Z" fill="white" />

                    <path d="M20.3347 16.876C19.8348 16.876 19.4297 17.2812 19.4297 17.781V18.9039C19.4297 19.4037 19.8348 19.8089 20.3347 19.8089C20.8345 19.8089 21.2396 19.4037 21.2396 18.9039V17.781C21.2396 17.2812 20.8345 16.876 20.3347 16.876Z" fill="white" />

                    <path d="M20.3347 12.4775C19.8348 12.4775 19.4297 12.8828 19.4297 13.3825V14.5055C19.4297 15.0052 19.8348 15.4105 20.3347 15.4105C20.8345 15.4105 21.2396 15.0052 21.2396 14.5055V13.3825C21.2396 12.8827 20.8345 12.4775 20.3347 12.4775Z" fill="white" />

                    <path d="M20.3347 21.2744C19.8348 21.2744 19.4297 21.6797 19.4297 22.1794V23.3024C19.4297 23.8021 19.8348 24.2074 20.3347 24.2074C20.8345 24.2074 21.2396 23.8021 21.2396 23.3024V22.1794C21.2396 21.6797 20.8345 21.2744 20.3347 21.2744Z" fill="white" />

                  </svg>

                </div>

                <div>

                  <h2 class="text-white m-0 cs_fs_20 cs_fs_lg_18 cs_lh_base">Harga Terjangkau</h2>

                </div>

              </div>

            </div>

            <div class="col-sm-6">

              <div class="cs_iconbox cs_style_1 d-flex align-items-center cs_mb_40">

                <div class="cs_iconbox_icon d-flex align-items-center justify-content-center cs_height_70 cs_width_70 cs_rounded_10 flex-none cs_mr_20 bg-accent cs_transition_4 wow zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">

                  <svg width="34" height="40" viewBox="0 0 34 40" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M16.2012 35.1591V36.3801C16.2012 36.8799 16.6064 37.2851 17.1061 37.2851C17.6059 37.2851 18.0111 36.8799 18.0111 36.3801V35.1591C18.0111 34.6593 17.6059 34.2542 17.1061 34.2542C16.6064 34.2542 16.2012 34.6593 16.2012 35.1591Z" fill="white" />

                    <path d="M31.1066 4.58742H30.5865V3.17611C30.5865 1.4248 29.1617 0 27.4104 0H4.75042C2.99911 0 1.57431 1.4248 1.57431 3.17611V4.58751H1.10517C0.605444 4.58751 0.200195 4.99267 0.200195 5.49249C0.200195 5.99231 0.605444 6.39747 1.10517 6.39747H1.57431V7.80878C1.57431 9.56009 2.99911 10.9849 4.75042 10.9849H27.4105C29.1618 10.9849 30.5866 9.56009 30.5866 7.80878V6.39738H31.1067C31.5044 6.39738 31.9902 6.81819 31.9902 7.30932V11.7605C31.9902 12.3235 31.5037 12.9028 30.9492 13.0001L18.7389 15.1427C17.3157 15.3925 16.2008 16.72 16.2008 18.165V21.1112H13.6185C13.3526 21.1112 13.1 21.2281 12.9282 21.431C12.7562 21.6338 12.6821 21.9021 12.7257 22.1644L13.4967 26.8063V37.3982C13.4967 38.8329 14.6638 40 16.0985 40H18.1132C19.5479 40 20.715 38.8329 20.715 37.3982V26.8062L21.486 22.1643C21.5295 21.902 21.4555 21.6338 21.2835 21.431C21.1117 21.2281 20.8592 21.1111 20.5932 21.1111H18.011V18.1649C18.011 17.6019 18.4974 17.0226 19.052 16.9253L31.2622 14.7828C32.6854 14.533 33.8003 13.2055 33.8003 11.7605V7.30932C33.8 5.85937 32.5414 4.58742 31.1066 4.58742ZM28.7766 7.80878C28.7766 8.56208 28.1638 9.17493 27.4104 9.17493H4.75042C3.99712 9.17493 3.38427 8.56208 3.38427 7.80878V3.17611C3.38427 2.42281 3.99703 1.80995 4.75042 1.80995H27.4105C28.1638 1.80995 28.7767 2.42281 28.7767 3.17611V7.80878H28.7766ZM18.9171 26.5834C18.909 26.6325 18.9049 26.682 18.9049 26.7317V37.3982C18.9049 37.8348 18.5497 38.19 18.113 38.19H16.0983C15.6616 38.19 15.3064 37.8348 15.3064 37.3982V27.6367H16.19C16.6897 27.6367 17.0949 27.2315 17.0949 26.7317C17.0949 26.2319 16.6897 25.8267 16.19 25.8267H15.1686L14.6861 22.9212H19.5254L18.9171 26.5834Z" fill="white" />

                  </svg>

                </div>

                <div>

                  <h2 class="text-white m-0 cs_fs_20 cs_fs_lg_18 cs_lh_base">Mudah Melakukan Pemesanan Online</h2>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="col-xl-6"></div>

    </div>

  </div>



  <div class="cs_iconbox_right-img position-absolute cs_zindex_1 bottom-0 end-0 background-filled" data-src="{{ asset('assets/img/why_choose_us_right_img.jpeg') }}"></div>

  <div class="cs_iconbox_logo position-absolute semi_rotate">

    <svg width="191" height="197" viewBox="0 0 191 197" fill="none" xmlns="http://www.w3.org/2000/svg">

      <path d="M100.397 107.26C113.305 117.648 127.237 124.564 139.602 126.736C139.678 126.749 139.75 126.756 139.825 126.77L155.856 32.5327C156.421 29.2004 153.306 26.3917 150.454 27.6622L68.5886 64.126C72.5569 77.7763 84.1472 94.1815 100.397 107.26Z" fill="#888888" fill-opacity="0.2" />

      <path d="M134.283 136.497C121.573 133.528 107.766 126.385 95.0023 116.124C77.395 101.968 65.2019 84.7963 60.4863 69.405L19.093 87.8249C15.8591 89.2634 16.1251 94.3774 19.5029 95.6938L80.2458 119.392C83.8188 120.786 86.8631 123.528 88.8105 127.109L121.922 187.961C123.762 191.345 128.37 190.622 129.013 186.848L137.475 137.15C136.42 136.96 135.357 136.747 134.283 136.497Z" fill="#888888" fill-opacity="0.2" />

      <path d="M135.873 127.406C123.172 124.44 109.376 117.306 96.6244 107.06C66.6205 82.949 52.3161 50.0723 64.0597 32.2106C75.8041 14.3519 108.507 19.2476 138.51 43.3581C148.326 51.2452 156.884 60.5001 163.258 70.1219C164.637 72.2018 164.251 75.0376 162.4 76.4586C160.549 77.878 157.932 77.3443 156.556 75.2663C150.711 66.4452 142.82 57.9237 133.733 50.622C108.446 30.3012 79.6787 24.3911 70.9164 37.7191C62.1543 51.0456 76.1154 79.4713 101.404 99.7925C114.23 110.099 128.065 116.965 140.36 119.115C151.717 121.106 160.191 118.825 164.221 112.695C168.424 106.304 166.766 97.4981 164.635 91.2345C163.822 88.8441 164.914 86.2656 167.073 85.4735C169.232 84.6816 171.642 85.9765 172.455 88.3683C176.466 100.157 175.977 110.755 171.077 118.207C165.196 127.151 153.932 130.671 139.362 128.118C138.21 127.918 137.045 127.679 135.873 127.406Z" fill="#888888" fill-opacity="0.2" />

    </svg>

  </div>

</section>

<!-- End Why Choose Us -->



<!-- Start Testimonial Section -->

<section class="background-filled cs_pt_140 cs_pt_lg_75 cs_pb_135 cs_pb_lg_75" data-src="{{ asset('assets/img/testimonial_bg.jpeg') }}">

  <div class="cs_testimonial_slider cs_gap_30">

    <div class="container">

      <div class="row">

        <div class="col-lg-4 cs_mb_lg_40">

          <div class="cs_section_heading cs_style_1 d-flex align-items-center cs_mb_30">

            <div class="cs_section_heading_in">

              <h3 class="cs_fs_20 cs_fs_lg_18 text-accent fw-normal cs_lh_base cs_mb_10 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.2s">Testimoni</h3>

              <h2 class="cs_fs_48 cs_fs_lg_36 cs_mb_20">Apa Kata Mereka?</h2>

              <p class="m-0">Berikut adalah ulasan dari para pelanggan kami yang telah merasakan manfaat dari layanan refleksi dan pijat kesehatan kami.</p>

            </div>

          </div>

          <div class="d-flex cs_column_gap_15">

            <div class="cs_slider_prev filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4">

              <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">

                <path d="M0.461063 4.4077H19.538C19.7649 4.4077 19.9482 4.22437 19.9482 3.99745C19.9482 3.77052 19.7649 3.58719 19.538 3.58719H1.45209L3.94183 1.09745C4.10209 0.937189 4.10209 0.676933 3.94183 0.516677C3.78158 0.35642 3.52132 0.35642 3.36106 0.516677L0.170038 3.7077C0.0520878 3.82565 0.0174732 4.00129 0.0815754 4.15514C0.145678 4.3077 0.295677 4.4077 0.461063 4.4077Z" fill="black" />

                <path d="M3.65549 7.60253C3.76062 7.60253 3.86575 7.56278 3.94524 7.48202C4.10549 7.32176 4.10549 7.0615 3.94524 6.90125L0.750365 3.70637C0.590108 3.54612 0.329853 3.54612 0.169597 3.70637C0.00934029 3.86663 0.00934029 4.12689 0.169597 4.28714L3.36447 7.48202C3.44524 7.56278 3.55036 7.60253 3.65549 7.60253Z" fill="black" />

              </svg>

            </div>

            <div class="cs_slider_next filter cs_height_45 cs_width_45 bg-white rounded-circle d-flex align-items-center justify-content-center bg-accent-hover cs_transition_4">

              <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">

                <path d="M19.5389 4.4077H0.462014C0.235091 4.4077 0.0517578 4.22437 0.0517578 3.99745C0.0517578 3.77052 0.235091 3.58719 0.462014 3.58719H18.5479L16.0582 1.09745C15.8979 0.937189 15.8979 0.676933 16.0582 0.516677C16.2184 0.35642 16.4787 0.35642 16.6389 0.516677L19.83 3.7077C19.9479 3.82565 19.9825 4.00129 19.9184 4.15514C19.8543 4.3077 19.7043 4.4077 19.5389 4.4077Z" fill="#18191D" />

                <path d="M16.3445 7.60253C16.2394 7.60253 16.1342 7.56278 16.0548 7.48202C15.8945 7.32176 15.8945 7.0615 16.0548 6.90125L19.2496 3.70637C19.4099 3.54612 19.6701 3.54612 19.8304 3.70637C19.9907 3.86663 19.9907 4.12689 19.8304 4.28714L16.6355 7.48202C16.5548 7.56278 16.4496 7.60253 16.3445 7.60253Z" fill="#18191D" />

              </svg>

            </div>

          </div>

        </div>

        <div class="col-lg-8">

          <div class="cs_slider_activate">

            @if(isset($testimonis) && $testimonis->count() > 0)
              @foreach($testimonis as $t)
              <div class="cs_slide">
                <div class="cs_testimonial cs_style_1 cs_pt_20">
                  <div class="cs_testimonial_in bg-white shadow-sm cs_pl_30 cs_pr_30 cs_pb_27 cs_pt_1 cs_rounded_10">
                    <div class="cs_testimonial_img cs_mb_15">
                      <div class="cs_height_75 cs_width_75 rounded-circle bg-light d-flex align-items-center justify-content-center fs-2 text-muted mx-auto">
                        <i class="fa-solid fa-user"></i>
                      </div>
                    </div>
                    <div class="cs_rating text-accent cs_mb_15 mx-auto text-center" data-rating="{{ $t->rating }}">
                      <div class="cs_rating_percentage mx-auto"></div>
                    </div>
                    <p class="cs_mb_14 text-center">"{{ $t->pesan }}"</p>
                    <h3 class="cs_fs_18 cs_mb_2 cs_lh_base text-center">{{ $t->user->name }}</h3>
                    <p class="m-0 cs_fs_14 cs_lh_base text-center">{{ $t->transaksi->layanan->nama }}</p>
                  </div>
                </div>
              </div>
              @endforeach
            @endif

          </div>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- End Testimonial Section -->

@endsection