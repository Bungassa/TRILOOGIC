@extends('layout.auth')

@section('content')
    <!-- Start Register Section -->
    <section class="cs_register_page position-relative min-vh-100 d-flex align-items-center background-filled" data-src="assets/img/register_bg.jpg">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <!-- Left Side - Branding Info -->
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="cs_register_branding text-white text-center">
                        <h1 class="cs_fs_48 cs_mb_20">Bergabung dengan Kami</h1>
                        <p class="cs_fs_18 cs_mb_30">Daftar sekarang dan nikmati layanan refleksi dan pijat kesehatan premium</p>
                        <div class="cs_brand_features">
                            <div class="d-flex align-items-center cs_mb_20">
                                <div class="cs_feature_icon cs_mr_15">
                                    <i class="fa-solid fa-user-plus cs_fs_24"></i>
                                </div>
                                <div>
                                    <h4 class="cs_fs_18 fw-medium mb-1">Pendaftaran Mudah</h4>
                                    <p class="cs_fs_14 m-0">Proses registrasi cepat dan sederhana</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center cs_mb_20">
                                <div class="cs_feature_icon cs_mr_15">
                                    <i class="fa-solid fa-shield-alt cs_fs_24"></i>
                                </div>
                                <div>
                                    <h4 class="cs_fs_18 fw-medium mb-1">Data Aman</h4>
                                    <p class="cs_fs_14 m-0">Informasi pribadi terlindungi</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="cs_feature_icon cs_mr_15">
                                    <i class="fa-solid fa-gift cs_fs_24"></i>
                                </div>
                                <div>
                                    <h4 class="cs_fs_18 fw-medium mb-1">Bonus Member</h4>
                                    <p class="cs_fs_14 m-0">Dapatkan penawaran eksklusif</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Side - Register Form -->
                <div class="col-lg-6">
                    <div class="cs_register_form_wrapper">
                        <div class="cs_register_card bg-white cs_rounded_15 shadow-lg cs_pt_80 cs_pb_50 cs_pl_40 cs_pr_40">
                            <div class="cs_register_header text-center cs_mb_50 cs_mt_20">
                                <h3 class="cs_fs_20 text-accent fw-normal cs_lh_base cs_mb_10">Buat Akun Baru</h3>
                                <h2 class="cs_fs_36 cs_fs_lg_30 m-0">Daftar Sekarang</h2>
                                <p class="cs_fs_16 text-secondary cs_mt_10">Mulai perjalanan relaksasi Anda bersama Ekky Refleksi Family</p>
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
                            
                            <form action="{{ route('register.post') }}" method="POST" class="cs_register_form">
                                @csrf
                                
                                <div class="cs_form_fields cs_mt_40">
                                    <!-- Name Field -->
                                    <div class="cs_form_group cs_mb_30">
                                        <label for="name" class="cs_form_label cs_fs_14 fw-medium cs_mb_12">
                                            Nama Lengkap
                                        </label>
                                        <div class="cs_input_wrapper position-relative">
                                            <input type="text" 
                                                   id="name" 
                                                   name="name" 
                                                   class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_15 cs_pb_15 cs_pl_15 cs_pr_15 bg-light" 
                                                   placeholder="Masukkan nama lengkap" 
                                                   value="{{ old('name') }}" 
                                                   required>
                                        </div>
                                        @if($errors->has('name'))
                                            <div class="cs_error_message text-danger cs_fs_12 cs_mt_8 d-flex align-items-center">
                                                <i class="fa-solid fa-exclamation-circle cs_mr_6"></i>
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Email Field -->
                                    <div class="cs_form_group cs_mb_30">
                                        <label for="email" class="cs_form_label cs_fs_14 fw-medium cs_mb_12">
                                            Email
                                        </label>
                                        <div class="cs_input_wrapper position-relative">
                                            <input type="email" 
                                                   id="email" 
                                                   name="email" 
                                                   class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_15 cs_pb_15 cs_pl_15 cs_pr_15 bg-light" 
                                                   placeholder="Masukkan email" 
                                                   value="{{ old('email') }}" 
                                                   required>
                                        </div>
                                        @if($errors->has('email'))
                                            <div class="cs_error_message text-danger cs_fs_12 cs_mt_8 d-flex align-items-center">
                                                <i class="fa-solid fa-exclamation-circle cs_mr_6"></i>
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Phone Field -->
                                    <div class="cs_form_group cs_mb_30">
                                        <label for="phone" class="cs_form_label cs_fs_14 fw-medium cs_mb_12">
                                            Nomor Telepon <span class="text-muted fw-normal"></span>
                                        </label>
                                        <div class="cs_input_wrapper position-relative">
                                            <input type="tel" 
                                                   id="phone" 
                                                   name="phone" 
                                                   class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_15 cs_pb_15 cs_pl_15 cs_pr_15 bg-light" 
                                                   placeholder="Masukkan nomor telepon" 
                                                   value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    
                                    <!-- Password Field -->
                                    <div class="cs_form_group cs_mb_30">
                                        <label for="password" class="cs_form_label cs_fs_14 fw-medium cs_mb_12">
                                            Password
                                        </label>
                                        <div class="cs_input_wrapper position-relative">
                                            <input type="password" 
                                                   id="password" 
                                                   name="password" 
                                                   class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_15 cs_pb_15 cs_pl_15 cs_pr_55 bg-light" 
                                                   placeholder="Masukkan password (minimal 8 karakter)" 
                                                   required>
                                            <button type="button" class="cs_toggle_password position-absolute end-0 top-50 translate-middle-y bg-transparent border-0 text-muted cs_pt_12 cs_pb_12 cs_pr_18 d-flex align-items-center justify-content-center" style="right: 18px;">
                                                <i class="fa-solid fa-eye cs_fs_14" id="togglePasswordIcon"></i>
                                            </button>
                                        </div>
                                        @if($errors->has('password'))
                                            <div class="cs_error_message text-danger cs_fs_12 cs_mt_8 d-flex align-items-center">
                                                <i class="fa-solid fa-exclamation-circle cs_mr_6"></i>
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Password Confirmation Field -->
                                    <div class="cs_form_group cs_mb_30">
                                        <label for="password_confirmation" class="cs_form_label cs_fs_14 fw-medium cs_mb_12">
                                            Konfirmasi Password
                                        </label>
                                        <div class="cs_input_wrapper position-relative">
                                            <input type="password" 
                                                   id="password_confirmation" 
                                                   name="password_confirmation" 
                                                   class="cs_form_control form-control cs_fs_15 cs_rounded_10 border-0 cs_pt_15 cs_pb_15 cs_pl_15 cs_pr_55 bg-light" 
                                                   placeholder="Ulangi password" 
                                                   required>
                                            <button type="button" class="cs_toggle_password_confirm position-absolute end-0 top-50 translate-middle-y bg-transparent border-0 text-muted cs_pt_12 cs_pb_12 cs_pr_18 d-flex align-items-center justify-content-center" style="right: 18px;">
                                                <i class="fa-solid fa-eye cs_fs_14" id="toggleConfirmIcon"></i>
                                            </button>
                                        </div>
                                        @if($errors->has('password_confirmation'))
                                            <div class="cs_error_message text-danger cs_fs_12 cs_mt_8 d-flex align-items-center">
                                                <i class="fa-solid fa-exclamation-circle cs_mr_6"></i>
                                                {{ $errors->first('password_confirmation') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                                                 
                                {{-- <!-- Terms and Conditions -->
                                <div class="cs_form_options cs_mb_35 cs_pt_10">
                                    <div class="cs_checkbox_wrapper d-flex align-items-start">
                                        <input type="checkbox" name="terms" id="terms" class="cs_checkbox_input me-3 mt-1" required>
                                        <label for="terms" class="cs_checkbox_label cs_fs_14 text-secondary mb-0">
                                            Saya membaca dan menyetujui <a href="#" class="text-accent text-decoration-none fw-medium">syarat dan ketentuan</a> yang berlaku
                                        </label>
                                    </div>
                                </div> --}}
                                
                                <!-- Submit Button -->
                                <div class="cs_form_submit cs_mb_30">
                                    <button type="submit" class="cs_btn_register w-100 cs_btn cs_style_1 cs_fs_16 fw-bold cs_rounded_12 cs_pt_16 cs_pb_16 overflow-hidden position-relative border-0">
                                        <span class="d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-user-plus cs_mr_12"></i>
                                            Daftar Sekarang
                                        </span>
                                    </button>
                                </div>
                            </form>
                            
                            <div class="cs_register_footer text-center cs_pt_30 cs_mt_30 border-top">
                                <p class="cs_fs_14 text-secondary m-0">
                                    Sudah punya akun? 
                                    <a href="{{ url('login') }}" class="text-accent fw-medium text-decoration-none">
                                        Masuk di sini
                                        <i class="fa-solid fa-arrow-right cs_ml_5"></i>
                                    </a>
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register Section -->
    
    <style>
    /* Register Page Styles */
    .cs_register_page {
        background: linear-gradient(135deg, #D79F9E 0%, #AB6F6E 100%);
        position: relative;
        overflow: hidden;
    }
    
    .cs_register_page::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
        z-index: 1;
    }
    
    .cs_register_page > .container {
        position: relative;
        z-index: 2;
    }
    
    /* Branding Section */
    .cs_register_branding {
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
    
    /* Register Card */
    .cs_register_card {
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
        margin-bottom: 12px;
        font-size: 14px;
        line-height: 1.4;
    }
    
    .cs_form_control {
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
        font-size: 15px;
        line-height: 1.5;
        height: 56px;
        border-radius: 10px;
    }
    
    .cs_form_control:focus {
        border-color: #AB6F6E;
        background-color: #fff;
        box-shadow: 0 0 0 4px rgba(171, 111, 110, 0.15);
        outline: none;
        transform: translateY(-1px);
    }
    
    .cs_form_control::placeholder {
        color: #6c757d;
        font-weight: 400;
        font-size: 14px;
    }
    
    .cs_input_wrapper {
        position: relative;
    }
    
    .cs_toggle_password, .cs_toggle_password_confirm {
        cursor: pointer;
        transition: all 0.3s ease;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .cs_toggle_password:hover, .cs_toggle_password_confirm:hover {
        background-color: rgba(171, 111, 110, 0.1);
        color: #AB6F6E;
        transform: scale(1.05);
    }
    
    .cs_error_message {
        display: flex;
        align-items: center;
        margin-top: 8px;
        font-size: 12px;
        line-height: 1.4;
        padding: 6px 12px;
        background-color: rgba(220, 53, 69, 0.05);
        border-radius: 6px;
        border-left: 3px solid #dc3545;
    }
    
    /* Form Options */
    .cs_form_options {
        padding-top: 10px;
        margin-bottom: 35px;
    }
    
    .cs_checkbox_wrapper {
        display: flex;
        align-items: flex-start;
    }
    
    .cs_checkbox_input {
        width: 20px;
        height: 20px;
        margin-right: 12px;
        margin-top: 1px;
        cursor: pointer;
        border: 2px solid #dee2e6;
        border-radius: 4px;
        transition: all 0.2s ease;
        flex-shrink: 0;
    }
    
    .cs_checkbox_input:checked {
        background-color: #AB6F6E;
        border-color: #AB6F6E;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='white' d='M4.5 10.5L8 14l7.5-7.5' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3e%3c/svg%3e");
        background-size: 12px;
        background-position: center;
        background-repeat: no-repeat;
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
        line-height: 1.5;
        margin-bottom: 0;
    }
    
    .cs_checkbox_label a {
        color: #AB6F6E;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .cs_checkbox_label a:hover {
        text-decoration: underline;
        color: #D79F9E;
    }
    
    /* Submit Button */
    .cs_form_submit {
        margin-bottom: 30px;
    }
    
    .cs_btn_register {
        background: linear-gradient(135deg, #AB6F6E 0%, #C48989 100%);
        border: none;
        color: white;
        font-weight: 700;
        transition: all 0.3s ease;
        height: 60px;
        font-size: 16px;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(171, 111, 110, 0.2);
    }
    
    .cs_btn_register:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(171, 111, 110, 0.4);
        background: linear-gradient(135deg, #C48989 0%, #D79F9E 100%);
    }
    
    .cs_btn_register:active {
        transform: translateY(-1px);
    }
    
    .cs_btn_register span {
        position: relative;
        z-index: 1;
    }
    
    /* Footer Styles */
    .cs_register_footer {
        border-top: 1px solid #e9ecef;
    }
    
    .cs_register_footer a {
        transition: all 0.3s ease;
    }
    
    .cs_register_footer a:hover {
        color: #AB6F6E;
        transform: translateX(3px);
    }
    
    /* Responsive */
    @media (max-width: 991px) {
        .cs_register_page {
            background: linear-gradient(135deg, #D79F9E 0%, #AB6F6E 100%);
        }
        
        .cs_register_card {
            margin: 20px;
            max-width: none;
        }
    }
    
    @media (max-width: 576px) {
        .cs_register_card {
            margin: 10px;
            padding: 30px 20px !important;
        }
        
        .cs_register_header h2 {
            font-size: 28px;
        }
    }
    </style>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const togglePassword = document.querySelector('.cs_toggle_password');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('togglePasswordIcon');
        
        if (togglePassword && passwordInput && toggleIcon) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                toggleIcon.classList.toggle('fa-eye');
                toggleIcon.classList.toggle('fa-eye-slash');
            });
        }
        
        // Toggle confirm password visibility
        const toggleConfirmPassword = document.querySelector('.cs_toggle_password_confirm');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const toggleConfirmIcon = document.getElementById('toggleConfirmIcon');
        
        if (toggleConfirmPassword && confirmPasswordInput && toggleConfirmIcon) {
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);
                toggleConfirmIcon.classList.toggle('fa-eye');
                toggleConfirmIcon.classList.toggle('fa-eye-slash');
            });
        }
    });
    </script>
@endsection
