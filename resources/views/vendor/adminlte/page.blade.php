@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <style>
        /* 1. Mengubah Warna Background Utama (Sama seperti Login) */
        .content-wrapper {
            background-color: #f4f6f9 !important; /* Abu-abu sangat muda bersih */
        }

        /* 2. Custom Navbar (Bagian Atas) */
        .main-header {
            border-bottom: 1px solid #dee2e6 !important;
            box-shadow: 0 2px 4px rgba(0,0,0,.04) !important;
        }

        /* 3. Tampilan Sidebar yang Lebih Modern */
        .main-sidebar {
            box-shadow: 4px 0 10px rgba(0,0,0,0.05) !important;
        }
        .nav-sidebar .nav-link.active {
            background-color: #007bff !important;
            box-shadow: 0 4px 12px rgba(0,123,255,.3) !important;
            border-radius: 8px;
        }

        /* 4. MENGUBAH SEMUA CARD (Kotak Konten) agar seperti Login */
        .card {
            border: none !important;
            border-radius: 15px !important; /* Sudut tumpul konsisten */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05) !important; /* Shadow halus */
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: transparent !important;
            border-bottom: 1px solid #f2f2f2 !important;
            padding: 1.25rem !important;
        }

        .card-title {
            font-weight: 700 !important;
            color: #334155 !important;
        }

        /* 5. Merapikan Tombol-Tombol di Seluruh Halaman */
        .btn {
            border-radius: 10px !important; /* Bulat rapi */
            padding: 0.5rem 1rem !important;
            font-weight: 600 !important;
            transition: all 0.2s;
        }
        
        .btn-primary {
            box-shadow: 0 4px 6px rgba(0,123,255,.2) !important;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 12px rgba(0,123,255,.3) !important;
        }

        /* 6. Mempercantik Tampilan Tabel */
        .table thead th {
            background-color: #f8fafc;
            border-top: none !important;
            border-bottom: 2px solid #edf2f7 !important;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: #64748b;
        }

        /* 7. Breadcrumb Minimalis */
        .breadcrumb {
            background-color: transparent !important;
            padding: 0 !important;
            margin-bottom: 1rem !important;
        }
    </style>
@stop

@section('body')
    <div class="wrapper">
        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper', '') }}">
            
            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header', 'container-fluid') }}">
                    @yield('content_header')
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content', 'container-fluid') }}">
                    @yield('content')
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop