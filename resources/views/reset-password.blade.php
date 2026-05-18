@extends('layout.auth')

@section('content')
<!-- Start Reset Password Section -->
<section class="cs_login_page position-relative min-vh-100 d-flex align-items-center background-filled" data-src="assets/img/login_bg.jpg">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <!-- Left Side - Branding Info -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="cs_login_branding text-white text-center">
                    <h1 class="cs_fs_48 cs_mb_20">Ekky Family Refleksi</h1>
                    <p class="cs_fs_18 cs_mb_30">Langkah terakhir untuk mengamankan kembali akun Anda</p>
                    <div class="cs_brand_features">
                        <div class="d-flex align-items-center cs_mb_20">
                            <div class="cs_feature_icon cs_mr_15">
                                <i class="fa-solid fa-lock-open cs_fs_24"></i>
                            </div>
                            <div>
                                <h4 class="cs_fs_18 fw-medium mb-1">Password Baru</h4>
                                <p class="cs_fs_14 m-0">Gunakan kombinasi password yang kuat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Reset Password Form -->
            <div class="col-lg-6">
                <div class="cs_login_form_wrapper">
                    <div class="cs_login_card bg-white cs_rounded_15 shadow-lg cs_pt_50 cs_pb_50 cs_pl_40 cs_pr_40">
                        <div class="cs_login_header text-center cs_mb_40">
                            <h3 class="cs_fs_20 text-accent fw-normal cs_lh_base cs_mb_10">Reset Password</h3>
                            <h2 class="cs_fs_36 cs_fs_lg_30 m-0">Buat Password Baru</h2>
                            <p class="cs_fs_16 text-secondary cs_mt_10">Silakan atur ulang password akun Anda</p>
                        </div>

                        @if(session('error'))
                        <div class="alert alert-danger cs_mb_30 border-0 rounded-3">
                            <i class="fa-solid fa-exclamation-circle cs_mr_10"></i>
                            {{ session('error') }}
                        </div>
                        @endif

                        <form action="{{ route('password.update') }}" method="POST" class="cs_login_form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="cs_form_fields">
                                <!-- Email Field (Required for security) -->
                                <div class="cs_form_group cs_mb_30">
                                    <label for="email" class="cs_form_label cs_fs_14 fw-medium cs_mb_10">
                                        Alamat Email
                                    </label>
                                    <div class="cs_input_wrapper position-relative">
                                        <input type="email"
                                            id="email"
                                            name="email"
                                            class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_14 cs_pb_14 cs_pl_15 cs_pr_15 bg-light"
                                            placeholder="Konfirmasi email Anda"
                                            value="{{ old('email', session('reset_email')) }}"
                                            {{ session('reset_email') ? 'readonly' : '' }}
                                            required autofocus>
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
                                        Password Baru
                                    </label>
                                    <div class="cs_input_wrapper position-relative">
                                        <input type="password"
                                            id="password"
                                            name="password"
                                            class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_14 cs_pb_14 cs_pl_15 cs_pr_50 bg-light"
                                            placeholder="Masukkan password baru"
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

                                <!-- Confirm Password Field -->
                                <div class="cs_form_group cs_mb_30">
                                    <label for="password_confirmation" class="cs_form_label cs_fs_14 fw-medium cs_mb_10">
                                        Konfirmasi Password Baru
                                    </label>
                                    <div class="cs_input_wrapper position-relative">
                                        <input type="password"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_14 cs_pb_14 cs_pl_15 cs_pr_15 bg-light"
                                            placeholder="Ulangi password baru"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="cs_form_submit">
                                <button type="submit" class="cs_btn_login w-100 cs_btn cs_style_1 cs_fs_16 cs_rounded_10 cs_pt_15 cs_pb_15 overflow-hidden position-relative border-0">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-save cs_mr_10"></i>
                                        Simpan Password Baru
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Reset Password Section -->

<style>
    /* Reuse Login Styles */
    .cs_login_page {
        background: linear-gradient(135deg, #D79F9E 0%, #AB6F6E 100%);
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
        border-color: #AB6F6E;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(171, 111, 110, 0.15);
        outline: none;
    }

    .cs_form_control[readonly] {
        background-color: #f1f3f5 !important;
        cursor: not-allowed;
        opacity: 0.8;
    }

    .cs_btn_login {
        background: linear-gradient(135deg, #AB6F6E 0%, #C48989 100%);
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
        background: linear-gradient(135deg, #C48989 0%, #D79F9E 100%);
    }

    @media (max-width: 991px) {
        .cs_login_card {
            margin: 20px;
            max-width: none;
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
                toggleIcon.classList.toggle('fa-eye');
                toggleIcon.classList.toggle('fa-eye-slash');
            });
        }
    });
</script>
@endsection