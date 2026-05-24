@extends('layout.auth')

@section('content')
<!-- Start Forgot Password Section -->
<section class="cs_login_page position-relative min-vh-100 d-flex align-items-center background-filled" data-src="assets/img/login_bg.jpg">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <!-- Left Side - Branding Info -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="cs_login_branding text-white text-center">
                    <h1 class="cs_fs_48 cs_mb_20">Ekky Family Refleksi</h1>
                    <p class="cs_fs_18 cs_mb_30">Pusat layanan refleksi dan pijat kesehatan profesional untuk keluarga Anda</p>
                    <div class="cs_brand_features">
                        <div class="d-flex align-items-center cs_mb_20">
                            <div class="cs_feature_icon cs_mr_15">
                                <i class="fa-solid fa-key cs_fs_24"></i>
                            </div>
                            <div>
                                <h4 class="cs_fs_18 fw-medium mb-1">Keamanan Akun</h4>
                                <p class="cs_fs_14 m-0">Pulihkan akses ke akun Anda dengan aman</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="cs_feature_icon cs_mr_15">
                                <i class="fa-solid fa-arrow-right-to-bracket cs_fs_24"></i>
                            </div>
                            <div>
                                <h4 class="cs_fs_18 fw-medium mb-1">Akses Langsung</h4>
                                <p class="cs_fs_14 m-0">Atur ulang password Anda secara instan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Forgot Password Form -->
            <div class="col-lg-6">
                <div class="cs_login_form_wrapper">
                    <div class="cs_login_card bg-white cs_rounded_15 shadow-lg cs_pt_50 cs_pb_50 cs_pl_40 cs_pr_40">
                        <div class="cs_login_header text-center cs_mb_40">
                            <h3 class="cs_fs_20 text-accent fw-normal cs_lh_base cs_mb_10">Lupa Password?</h3>
                            <h2 class="cs_fs_36 cs_fs_lg_30 m-0">Verifikasi Email</h2>
                            <p class="cs_fs_16 text-secondary cs_mt_10">Masukkan email Anda untuk lanjut membuat password baru</p>
                        </div>

                        @if(session('error'))
                        <div class="alert alert-danger cs_mb_30 border-0 rounded-3">
                            <i class="fa-solid fa-exclamation-circle cs_mr_10"></i>
                            {{ session('error') }}
                        </div>
                        @endif

                        @if(session('status'))
                        <div class="alert alert-success cs_mb_30 border-0 rounded-3">
                            <i class="fa-solid fa-check-circle cs_mr_10"></i>
                            {{ session('status') }}
                        </div>
                        @endif

                        <form action="{{ route('password.email') }}" method="POST" class="cs_login_form">
                            @csrf

                            <div class="cs_form_fields">
                                <!-- Email Field -->
                                <div class="cs_form_group cs_mb_30">
                                    <label for="email" class="cs_form_label cs_fs_14 fw-medium cs_mb_10">
                                        Alamat Email
                                    </label>
                                    <div class="cs_input_wrapper position-relative">
                                        <input type="email"
                                            id="email"
                                            name="email"
                                            class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_14 cs_pb_14 cs_pl_15 cs_pr_15 bg-light"
                                            placeholder="Masukkan email terdaftar"
                                            value="{{ old('email') }}"
                                            required>
                                    </div>
                                    @if($errors->has('email'))
                                    <div class="cs_error_message text-danger cs_fs_12 cs_mt_5">
                                        <i class="fa-solid fa-exclamation-circle cs_mr_5"></i>
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="cs_form_submit">
                                <button type="submit" class="cs_btn_login w-100 cs_btn cs_style_1 cs_fs_16 cs_rounded_10 cs_pt_15 cs_pb_15 overflow-hidden position-relative border-0">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-arrow-right cs_mr_10"></i>
                                        Lanjut ke Reset Password
                                    </span>
                                </button>
                            </div>
                        </form>

                        <div class="cs_login_footer text-center cs_pt_30 cs_mt_30 border-top">
                            <p class="cs_fs_14 text-secondary m-0">
                                Kembali ke
                                <a href="{{ route('login') }}" class="text-accent fw-medium text-decoration-none">
                                    Halaman Login
                                    <i class="fa-solid fa-arrow-left cs_ml_5"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Forgot Password Section -->

<style>
    /* Reuse Login Styles */
    .cs_login_page {
        background: linear-gradient(135deg, #e1bdb5 0%, #825449 100%);
        position: relative;
        overflow: hidden;
    }

    .cs_login_page::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 1;
    }

    .cs_login_page>.container {
        position: relative;
        z-index: 2;
    }

    .cs_login_branding {
        padding: 40px;
    }

    .cs_brand_features {
        max-width: 400px;
        margin: 0 auto;
    }

    .cs_feature_icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .cs_login_card {
        max-width: 480px;
        margin: 0 auto;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .cs_form_group {
        margin-bottom: 30px;
    }

    .cs_form_label {
        color: #495057;
        font-weight: 600;
        display: block;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .cs_form_control {
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
        font-size: 15px;
        height: 52px;
    }

    .cs_form_control:focus {
        border-color: #825449;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(171, 111, 110, 0.15);
        outline: none;
    }

    .cs_btn_login {
        background: linear-gradient(135deg, #825449 0%, #825449 100%);
        border: none;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        height: 52px;
        font-size: 16px;
    }

    .cs_btn_login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(171, 111, 110, 0.3);
        background: linear-gradient(135deg, #825449 0%, #e1bdb5 100%);
    }

    .cs_login_footer {
        border-top: 1px solid #e9ecef;
    }

    .cs_login_footer a {
        transition: all 0.3s ease;
    }

    .cs_login_footer a:hover {
        color: #825449;
    }

    @media (max-width: 991px) {
        .cs_login_card {
            margin: 20px;
            max-width: none;
        }
    }
</style>
@endsection