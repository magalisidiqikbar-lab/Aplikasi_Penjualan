@extends('adminlte::auth.login')

{{-- Tambahkan Judul Custom --}}
@section('title', 'QuantumMart | Login')

{{-- Bagian ini tetap menggunakan bawaan AdminLTE agar logika login tidak error --}}

<style>
    /* 1. Pasang Background Foto ke Body */
    body.login-page {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                          url('https://images.unsplash.com/photo-1557821552-17105176677c?q=80&w=2064&auto=format&fit=crop') !important; 
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        background-attachment: fixed !important;
        height: 100vh !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    /* 2. Percantik Kotak Login (Glassmorphism) */
    .login-box {
        margin-top: 0 !important;
    }

    .login-box .card {
        background: rgba(255, 255, 255, 0.9) !important; /* Transparansi */
        backdrop-filter: blur(10px) !important; /* Efek Blur */
        border-radius: 20px !important;
        border: none !important;
        box-shadow: 0 15px 35px rgba(0,0,0,0.4) !important;
        overflow: hidden;
    }

    /* 3. Menghias Logo QuantumMart */
    .login-logo a {
        color: #ffffff !important;
        font-weight: bold !important;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.5) !important;
        font-size: 2.2rem !important;
    }

    /* 4. Tombol Login agar lebih bulat */
    .btn-primary {
        background-color: #007bff !important;
        border: none !important;
        border-radius: 50px !important;
        padding: 8px 20px !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
    }

    .btn-primary:hover {
        background-color: #0056b3 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 5px 15px rgba(0,123,255,0.4) !important;
    }

    /* 5. Input Field agar lebih rapi */
    .form-control {
        border-radius: 10px !important;
        border: 1px solid #ddd !important;
    }

    .input-group-text {
        border-radius: 0 10px 10px 0 !important;
        background-color: transparent !important;
    }
</style>

@section('js')
    <script>
        console.log('QuantumMart Login Page Ready!');
    </script>
@stop