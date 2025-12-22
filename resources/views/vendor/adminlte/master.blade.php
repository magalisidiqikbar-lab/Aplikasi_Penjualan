<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QuantumMart | Premium Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Nunito', sans-serif; }

        /* 1. Perbaikan Login: Posisi Tengah & Gambar Tajam */
        .login-page, .register-page {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://images.unsplash.com/photo-1557821552-17105176677c?q=80&w=1920') !important;
            background-size: cover !important;
            background-position: center !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 100vh !important;
        }

        /* 2. Background Dashboard */
        .content-wrapper {
            background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), 
                        url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=1920') !important;
            background-size: cover !important;
            background-attachment: fixed !important;
        }

        /* 3. PERBAIKAN TEKS HILANG: Paksa semua teks label jadi HITAM */
        label, .col-form-label, h1, h2, h3, h4, h5, h6, .text-dark {
            color: #1a1a1a !important; 
            font-weight: 700 !important;
            text-shadow: none !important;
        }

        /* 4. Kotak (Card) Melengkung Mewah - TIDAK TRANSPARAN agar teks jelas */
        .login-box .card, .card {
            border: none !important;
            border-radius: 25px !important; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
            background: #ffffff !important; /* Putih solid agar teks terlihat jernih */
        }

        /* 5. Sidebar & Navigasi Blue Premium */
        .main-sidebar { background-color: #1e293b !important; }
        .nav-link.active { 
            background: linear-gradient(45deg, #007bff, #00c6ff) !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 12px rgba(0,123,255,0.3) !important;
        }

        /* 6. Form Input Modern */
        .form-control { 
            border-radius: 10px !important; 
            border: 1px solid #cbd5e1 !important;
            color: #334155 !important;
        }
        .btn-primary { 
            border-radius: 12px !important;
            background: linear-gradient(to right, #007bff, #0056b3) !important;
            border: none !important;
            padding: 10px 20px !important;
        }
    </style>

    @yield('adminlte_css')
</head>
<body class="@yield('classes_body')" @yield('body_data')>

    @yield('body')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    
    @yield('adminlte_js')
</body>
</html>