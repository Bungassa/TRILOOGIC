@extends('layout.auth')

@section('content')
<!-- Start Login Section -->
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
                                <i class="fa-solid fa-spa cs_fs_24"></i>
                            </div>
                            <div>
                                <h4 class="cs_fs_18 fw-medium mb-1">Terapis Berpengalaman</h4>
                                <p class="cs_fs_14 m-0">Profesional dan bersertifikat</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center cs_mb_20">
                            <div class="cs_feature_icon cs_mr_15">
                                <i class="fa-solid fa-clock cs_fs_24"></i>
                            </div>
                            <div>
                                <h4 class="cs_fs_18 fw-medium mb-1">Jam Operasional</h4>
                                <p class="cs_fs_14 m-0">Setiap hari 08:00 - 22:00</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="cs_feature_icon cs_mr_15">
                                <i class="fa-solid fa-heart cs_fs_24"></i>
                            </div>
                            <div>
                                <h4 class="cs_fs_18 fw-medium mb-1">Layanan Berkualitas</h4>
                                <p class="cs_fs_14 m-0">Pijat dan refleksi terbaik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="col-lg-6">
                <div class="cs_login_form_wrapper">
                    <div class="cs_login_card bg-white cs_rounded_15 shadow-lg cs_pt_50 cs_pb_50 cs_pl_40 cs_pr_40">
                        <div class="cs_login_header text-center cs_mb_40">
                            <h3 class="cs_fs_20 text-accent fw-normal cs_lh_base cs_mb_10">Selamat Datang Kembali</h3>
                            <h2 class="cs_fs_36 cs_fs_lg_30 m-0">Masuk ke Akun Anda</h2>
                            <p class="cs_fs_16 text-secondary cs_mt_10">Lanjutkan perjalanan relaksasi Anda bersama kami</p>
                        </div>

                        @if(session('error'))
                        <div class="alert alert-danger cs_mb_30 border-0 rounded-3">
                            <i class="fa-solid fa-exclamation-circle cs_mr_10"></i>
                            {{ session('error') }}
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success cs_mb_30 border-0 rounded-3">
                            <i class="fa-solid fa-check-circle cs_mr_10"></i>
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('login.post') }}" method="POST" class="cs_login_form">
                            @csrf

                            <div class="cs_form_fields">
                                <!-- Email Field -->
                                <div class="cs_form_group cs_mb_30">
                                    <label for="email" class="cs_form_label cs_fs_14 fw-medium cs_mb_10">
                                        Email atau Nomor Telepon
                                    </label>
                                    <div class="cs_input_wrapper position-relative">
                                        <input type="text"
                                            id="email"
                                            name="email"
                                            class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_14 cs_pb_14 cs_pl_15 cs_pr_15 bg-light"
                                            placeholder="Masukkan email atau nomor telepon"
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

                                <!-- Password Field -->
                                <div class="cs_form_group cs_mb_30">
                                    <label for="password" class="cs_form_label cs_fs_14 fw-medium cs_mb_10">
                                        Password
                                    </label>
                                    <div class="cs_input_wrapper position-relative">
                                        <input type="password"
                                            id="password"
                                            name="password"
                                            class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_14 cs_pb_14 cs_pl_15 cs_pr_50 bg-light"
                                            placeholder="Masukkan password"
                                            required>
                                        <button type="button" class="cs_toggle_password position-absolute end-0 top-50 translate-middle-y bg-transparent border-0 text-muted cs_pt_10 cs_pb_10 cs_pr_15 d-flex align-items-center justify-content-center" style="right: 15px;">
                                            <i class="fa-solid fa-eye cs_fs_14" id="toggleIcon"></i>
                                        </button>
                                    </div>
                                    @if($errors->has('password'))
                                    <div class="cs_error_message text-danger cs_fs_12 cs_mt_5">
                                        <i class="fa-solid fa-exclamation-circle cs_mr_5"></i>
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Form Options -->
                            <div class="cs_form_options d-flex align-items-center justify-content-between cs_mb_35 cs_pt_5">
                                <a href="{{ route('password.request') }}" class="cs_forgot_link text-accent cs_fs_14 text-decoration-none fw-medium">
                                    Lupa password?
                                </a>
                            </div>

                            <!-- Submit Button -->
                            <div class="cs_form_submit">
                                <button type="submit" class="cs_btn_login w-100 cs_btn cs_style_1 cs_fs_16 cs_rounded_10 cs_pt_15 cs_pb_15 overflow-hidden position-relative border-0">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-sign-in-alt cs_mr_10"></i>
                                        Masuk Sekarang
                                    </span>
                                </button>
                            </div>
                        </form>

                        <div class="cs_login_footer text-center cs_pt_30 cs_mt_30 border-top">
                            <p class="cs_fs_14 text-secondary m-0">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="text-accent fw-medium text-decoration-none">
                                    Daftar sekarang
                                    <i class="fa-solid fa-arrow-right cs_ml_5"></i>
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>
<!-- End Login Section -->

<style>
    /* Login Page Styles */
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

    /* Branding Section */
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

    /* Login Card */
    .cs_login_card {
        max-width: 480px;
        margin: 0 auto;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Form Styles */
    .cs_form_fields {
        margin-bottom: 20px;
    }

    .cs_form_group {
        margin-bottom: 30px;
    }

    .cs_form_label {
        color: #495057;
        font-weight: 600;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        font-size: 14px;
        line-height: 1.4;
    }

    .cs_form_control {
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
        font-size: 15px;
        line-height: 1.5;
        height: 52px;
    }

    .cs_form_control:focus {
        border-color: #825449;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(171, 111, 110, 0.15);
        outline: none;
    }

    .cs_form_control::placeholder {
        color: #6c757d;
        font-weight: 400;
    }

    .cs_input_wrapper {
        position: relative;
    }

    .cs_input_icon {
        color: #6c757d;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cs_toggle_password {
        cursor: pointer;
        transition: all 0.3s ease;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cs_toggle_password:hover {
        background-color: rgba(171, 111, 110, 0.1);
        color: #825449;
    }

    .cs_error_message {
        display: flex;
        align-items: center;
        margin-top: 6px;
        font-size: 12px;
        line-height: 1.4;
    }

    /* Form Options */
    .cs_form_options {
        padding-top: 5px;
        margin-bottom: 35px;
    }

    .cs_checkbox_wrapper {
        display: flex;
        align-items: center;
    }

    .cs_checkbox_input {
        width: 18px;
        height: 18px;
        margin-right: 8px;
        cursor: pointer;
        border: 2px solid #dee2e6;
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .cs_checkbox_input:checked {
        background-color: #825449;
        border-color: #825449;
    }

    .cs_checkbox_input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(171, 111, 110, 0.25);
    }

    .cs_checkbox_label {
        cursor: pointer;
        user-select: none;
        color: #6c757d;
        font-size: 14px;
        line-height: 1.4;
        margin-bottom: 0;
    }

    /* Submit Button */
    .cs_form_submit {}

    .cs_btn_login {
        background: linear-gradient(135deg, #825449 0%, #825449 100%);
        border: none;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        height: 52px;
        font-size: 16px;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
    }

    .cs_btn_login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(171, 111, 110, 0.3);
        background: linear-gradient(135deg, #825449 0%, #e1bdb5 100%);
    }

    .cs_btn_login:active {
        transform: translateY(0);
    }

    .cs_btn_login span {
        position: relative;
        z-index: 1;
    }

    .cs_forgot_link {
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .cs_forgot_link:hover {
        color: #e1bdb5;
        text-decoration: underline;
    }

    /* Footer Styles */
    .cs_login_footer {
        border-top: 1px solid #e9ecef;
    }

    .cs_login_footer a {
        transition: all 0.3s ease;
    }

    .cs_login_footer a:hover {
        color: #825449;
        transform: translateX(3px);
    }

    /* Alert Styles */
    .alert {
        padding: 15px 20px;
        margin-bottom: 25px;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .cs_login_page {
            background: linear-gradient(135deg, #e1bdb5 0%, #825449 100%);
        }

        .cs_login_card {
            margin: 20px;
            max-width: none;
        }
    }

    @media (max-width: 576px) {
        .cs_login_card {
            margin: 10px;
            padding: 30px 20px !important;
        }

        .cs_login_header h2 {
            font-size: 28px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('.cs_toggle_password');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (togglePassword && passwordInput && toggleIcon) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle icon
                toggleIcon.classList.toggle('fa-eye');
                toggleIcon.classList.toggle('fa-eye-slash');
            });
        }
    });
</script>
@endsection