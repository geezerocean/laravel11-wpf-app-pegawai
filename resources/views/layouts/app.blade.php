<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Neo Culture Technology Corp.</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-cream: #f8f3d9;
            --color-light-beige: #ebe5c2;
            --color-beige: #b9b28a;
            --color-dark-brown: #504b38;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--color-cream);
            color: var(--color-dark-brown);
        }

        .navbar {
            background: linear-gradient(90deg, var(--color-dark-brown), var(--color-beige));
            padding: 0.8rem 1rem;
            box-shadow: 0 2px 10px rgba(80, 75, 56, 0.2);
        }

        .navbar-brand {
            font-weight: 600;
            color: var(--color-cream) !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid var(--color-light-beige);
        }

        .nav-link {
            color: var(--color-light-beige) !important;
            margin: 0 6px;
            font-weight: 500;
            transition: 0.3s;
            border-radius: 4px;
            padding: 8px 12px !important;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--color-cream) !important;
            background-color: rgba(80, 75, 56, 0.3);
            border-bottom: 2px solid var(--color-light-beige);
        }

        .content {
            min-height: calc(100vh - 140px);
            padding: 2rem 0;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(80, 75, 56, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
            background-color: white;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(80, 75, 56, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--color-beige), var(--color-dark-brown));
            color: white;
            border-radius: 12px 12px 0 0 !important;
            font-weight: 600;
            padding: 1rem 1.25rem;
        }

        .btn-primary {
            background-color: var(--color-dark-brown);
            border-color: var(--color-dark-brown);
            color: var(--color-cream);
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--color-beige);
            border-color: var(--color-beige);
            color: var(--color-dark-brown);
        }

        .btn-outline-primary {
            border-color: var(--color-dark-brown);
            color: var(--color-dark-brown);
        }

        .btn-outline-primary:hover {
            background-color: var(--color-dark-brown);
            border-color: var(--color-dark-brown);
            color: var(--color-cream);
        }

        .stat-card {
            text-align: center;
            padding: 1.5rem;
            border-radius: 12px;
            background: white;
            box-shadow: 0 4px 15px rgba(80, 75, 56, 0.1);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--color-dark-brown);
            margin: 0.5rem 0;
        }

        .stat-label {
            color: var(--color-beige);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        .stat-icon {
            font-size: 2rem;
            color: var(--color-beige);
            margin-bottom: 0.5rem;
        }

        footer {
            text-align: center;
            padding: 1.5rem 0;
            font-size: 0.9rem;
            color: var(--color-beige);
            background-color: var(--color-light-beige);
            border-top: 1px solid var(--color-beige);
            margin-top: 50px;
        }

        footer strong {
            color: var(--color-dark-brown);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: var(--color-beige);
            border-radius: 10px;
        }
        
        /* Dashboard header */
        .dashboard-header {
            margin-bottom: 2rem;
        }
        
        .dashboard-title {
            color: var(--color-dark-brown);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .dashboard-subtitle {
            color: var(--color-beige);
            font-weight: 500;
        }
        
        /* Table styling */
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th {
            background-color: var(--color-light-beige);
            color: var(--color-dark-brown);
            font-weight: 600;
            border: none;
            padding: 1rem;
        }
        
        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--color-light-beige);
        }
        
        .table tbody tr:hover {
            background-color: rgba(235, 229, 194, 0.3);
        }

        /* Alert styling */
        .alert-info {
            background-color: var(--color-light-beige);
            border-color: var(--color-beige);
            color: var(--color-dark-brown);
        }

        /* Badge styling */
        .badge-primary {
            background-color: var(--color-dark-brown);
            color: var(--color-cream);
        }

        /* Form styling */
        .form-control:focus {
            border-color: var(--color-beige);
            box-shadow: 0 0 0 0.2rem rgba(185, 178, 138, 0.25);
        }

        /* Pagination styling */
        .page-link {
            color: var(--color-dark-brown);
            border-color: var(--color-beige);
        }

        .page-link:hover {
            background-color: var(--color-light-beige);
            border-color: var(--color-beige);
            color: var(--color-dark-brown);
        }

        .page-item.active .page-link {
            background-color: var(--color-dark-brown);
            border-color: var(--color-dark-brown);
            color: var(--color-cream);
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- 🔹 Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            {{-- Logo dan Nama Perusahaan --}}
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-nct.png') }}" alt="Logo NCT Corp" width="50" height="50">
                Neo Culture Technology Corp.
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('employees*') ? 'active' : '' }}" href="{{ route('employees.index') }}">Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('departments*') ? 'active' : '' }}" href="{{ route('departments.index') }}">Departemen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('positions*') ? 'active' : '' }}" href="{{ route('positions.index') }}">Jabatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('attendances*') ? 'active' : '' }}" href="{{ route('attendances.index') }}">Absensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('salaries*') ? 'active' : '' }}" href="{{ route('salaries.index') }}">Gaji</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- 🔹 Konten Halaman --}}
    <main class="content">
        <div class="container">
            

            {{-- Konten Utama --}}
            @yield('content')
        </div>
    </main>

    {{-- 🔹 Footer --}}
    <footer>
        <p class="mb-0">&copy; {{ date('Y') }} <strong>Neo Culture Technology Corp.</strong>. All rights reserved.</p>
        <small>Developed by Riza</small>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script Tambahan --}}
    @stack('scripts')
</body>
</html>