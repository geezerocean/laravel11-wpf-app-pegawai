@extends('layouts.app')

@section('title', 'Data Departemen')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-light: #f8f3d9;
            --primary-medium: #ebe5c2;
            --primary-dark: #b9b28a;
            --secondary-dark: #504b38;
            --accent-green: #27ae60;
            --accent-red: #e74c3c;
            --accent-blue: #3498db;
            --accent-orange: #e67e22;
            --text-dark: #2d3748;
            --text-light: #718096;
            --white: #ffffff;
        }
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            color: var(--text-dark);
        }
        
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .header-section {
            background: linear-gradient(135deg, var(--secondary-dark) 0%, #6b6548 100%);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(80, 75, 56, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .header-section::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .stats-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .main-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, var(--white) 0%, #f8f9fa 100%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.5rem 2rem;
        }
        
        /* Department Card Styles - FIXED TANPA KONTEN TERPOTONG */
        .department-cards-container {
            padding: 1.5rem;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .department-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.05);
            /* HAPUS HEIGHT FIXED - BIARKAN KONTEN NATURAL */
            display: flex;
            flex-direction: column;
            min-height: 280px; /* MINIMUM HEIGHT SAJA */
        }
        
        .department-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }
        
        .department-card-header {
            padding: 1.2rem;
            background: linear-gradient(135deg, var(--secondary-dark) 0%, #6b6548 100%);
            color: white;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .department-card-header::before {
            content: '';
            position: absolute;
            top: -15px;
            right: -15px;
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .department-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
        }
        
        .department-name {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
            color: white;
            line-height: 1.3;
        }
        
        .department-code {
            font-size: 0.75rem;
            opacity: 0.8;
            font-weight: 500;
        }
        
        .department-card-body {
            padding: 1.2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            /* BIARKAN KONTEN MENGATUR TINGGI SENDIRI */
        }
        
        .department-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.8rem;
            background: linear-gradient(135deg, var(--primary-light) 0%, #fff9d6 100%);
            border-radius: 10px;
            border: 1px solid rgba(184, 178, 138, 0.3);
            flex-shrink: 0;
        }
        
        .employee-count {
            text-align: center;
        }
        
        .count-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary-dark);
            line-height: 1;
        }
        
        .count-label {
            font-size: 0.7rem;
            color: var(--text-light);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .employee-icon {
            font-size: 1.8rem;
            color: var(--primary-dark);
            opacity: 0.8;
        }
        
        .department-info {
            margin-bottom: 1rem;
            /* HAPUS FLEX:1 - BIARKAN KONTEN NATURAL */
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.4rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 28px;
            height: 28px;
            background: var(--primary-medium);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-dark);
            font-size: 0.8rem;
            flex-shrink: 0;
        }
        
        .info-text {
            font-size: 0.8rem;
            color: var(--text-dark);
            font-weight: 500;
            line-height: 1.3;
        }
        
        /* TOMBOL AKSI - TETAP DI BAWAH */
        .department-actions {
            display: flex;
            gap: 0.4rem;
            justify-content: space-between;
            flex-shrink: 0;
            margin-top: auto; /* INI YANG PENTING - PUSH KE BAWAH */
        }
        
        .action-btn {
            flex: 1;
            padding: 0.6rem 0.4rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.75rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.3rem;
            text-decoration: none;
            min-height: 36px;
        }
        
        .action-btn:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
        
        /* Warna tombol flat color */
        .btn-view {
            background: #17a2b8;
            color: white;
        }
        
        .btn-edit {
            background: #0d6efd;
            color: white;
        }
        
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        
        .btn-success-custom {
            background: #b9b28a;
            border: none;
            border-radius: 12px;
            padding: 0.7rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(184, 178, 138, 0.3);
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-success-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(184, 178, 138, 0.4);
            background: #a59e74;
            color: white;
        }
        
        .search-box {
            background: var(--white);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            padding: 0.7rem 1rem;
            transition: all 0.3s ease;
        }
        
        .search-box:focus {
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(184, 178, 138, 0.2);
        }
        
        .empty-state {
            padding: 3rem 2rem;
            text-align: center;
            grid-column: 1 / -1;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            color: var(--primary-medium);
            margin-bottom: 1.5rem;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-section {
                padding: 1.5rem;
            }
            
            .department-cards-container {
                grid-template-columns: 1fr;
                padding: 1rem;
                gap: 1rem;
            }
            
            .department-actions {
                flex-direction: column;
                gap: 0.3rem;
            }
            
            .stats-card {
                margin-bottom: 1rem;
            }
        }
        
        @media (min-width: 769px) and (max-width: 1200px) {
            .department-cards-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (min-width: 1201px) {
            .department-cards-container {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container py-4">
        <!-- Header Section -->
        <div class="header-section">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-building me-3"></i>Manajemen Departemen</h1>
                    <p class="lead mb-0">Kelola data departemen perusahaan</p>
                </div>
                <div class="col-md-6">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="stats-card">
                                <h3 class="fw-bold">{{ $departments->count() }}</h3>
                                <p class="mb-0 small">Total Departemen</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-card">
                                <h3 class="fw-bold">
                                    @php
                                        $totalEmployees = 0;
                                        foreach ($departments as $department) {
                                            $totalEmployees += $department->employees_count ?? 0;
                                        }
                                        echo $totalEmployees;
                                    @endphp
                                </h3>
                                <p class="mb-0 small">Total Karyawan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Main Content -->
        <div class="main-card">
            <!-- Card Header with Actions -->
            <div class="card-header-custom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="card-title mb-0 fw-bold text-dark"><i class="bi bi-grid me-2"></i>Daftar Departemen</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="d-flex justify-content-end gap-3">
                            <div class="flex-grow-1">
                                <input type="text" class="form-control search-box" placeholder="Cari departemen...">
                            </div>
                            <a href="{{ route('departments.create') }}" class="btn btn-success-custom text-white">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Departemen
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Department Cards Section -->
            <div class="department-cards-container">
                @forelse($departments as $department)
                <div class="department-card" data-department-name="{{ strtolower($department->nama_departemen) }}">
                    <div class="department-card-header">
                        <div class="department-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3 class="department-name">{{ $department->nama_departemen }}</h3>
                        <div class="department-code">DEPT-{{ str_pad($department->id, 3, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    
                    <div class="department-card-body">
                        <div class="department-stats">
                            <div class="employee-count">
                                <div class="count-number">{{ $department->employees_count ?? 0 }}</div>
                                <div class="count-label">Karyawan</div>
                            </div>
                            <div class="employee-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                        
                        <div class="department-info">
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <div class="info-text">
                                    Dibuat: {{ $department->created_at->format('d M Y') }}
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="bi bi-clock"></i>
                                </div>
                                <div class="info-text">
                                    Diperbarui: {{ $department->updated_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="department-actions">
                            <a href="{{ route('departments.show', $department->id) }}" 
                               class="action-btn btn-view"
                               data-bs-toggle="tooltip" 
                               title="Lihat Detail Departemen">
                                <i class="bi bi-eye"></i>
                                <span>Lihat</span>
                            </a>
                            <a href="{{ route('departments.edit', $department->id) }}" 
                               class="action-btn btn-edit"
                               data-bs-toggle="tooltip" 
                               title="Edit Departemen">
                                <i class="bi bi-pencil"></i>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="action-btn btn-delete"
                                        data-bs-toggle="tooltip" 
                                        title="Hapus Departemen"
                                        onclick="return confirm('Yakin ingin hapus departemen {{ $department->nama_departemen }}?')">
                                    <i class="bi bi-trash"></i>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="bi bi-building empty-state-icon"></i>
                    <h5>Belum ada data departemen</h5>
                    <p class="mb-3">Mulai dengan menambahkan departemen baru</p>
                    <a href="{{ route('departments.create') }}" class="btn btn-success-custom text-white">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Departemen Pertama
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    // Initialize Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Search functionality
        const searchBox = document.querySelector('.search-box');
        if (searchBox) {
            searchBox.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const cards = document.querySelectorAll('.department-card');
                
                cards.forEach(card => {
                    const departmentName = card.getAttribute('data-department-name').toLowerCase();
                    if (departmentName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }
    });
    </script>
</body>
</html>
@endsection