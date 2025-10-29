@extends('layouts.app')

@section('title', 'Data Gaji Karyawan')

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
        
        .table-container {
            padding: 0;
        }
        
        .table-custom {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table-custom thead th {
            background: linear-gradient(135deg, var(--secondary-dark) 0%, #5a5433 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 1.2rem 1rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table-custom tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        }
        
        .table-custom tbody tr:last-child {
            border-bottom: none;
        }
        
        .table-custom tbody tr:hover {
            background: linear-gradient(90deg, rgba(184, 178, 138, 0.05) 0%, rgba(235, 229, 194, 0.1) 100%);
            transform: translateX(5px);
        }
        
        .table-custom tbody td {
            padding: 1.2rem 1rem;
            vertical-align: middle;
            border: none;
            font-weight: 500;
        }
        
        .employee-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .employee-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-dark) 0%, #a59e74 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .employee-details {
            display: flex;
            flex-direction: column;
        }
        
        .employee-name {
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .employee-id {
            font-size: 0.8rem;
            color: var(--text-light);
        }
        
        .period-badge {
            background: linear-gradient(135deg, var(--primary-medium) 0%, #e8e2bb 100%);
            color: var(--secondary-dark);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .salary-badge {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #a59e74 100%);
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
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(184, 178, 138, 0.4);
            background: linear-gradient(135deg, #a59e74 0%, var(--primary-dark) 100%);
            color: white;
        }
        
        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }
        
        .action-btn:hover {
            transform: scale(1.1);
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
        }
        
        .empty-state-icon {
            font-size: 4rem;
            color: var(--primary-medium);
            margin-bottom: 1.5rem;
        }
        
        .pagination-custom {
            margin: 0;
        }
        
        .pagination-custom .page-link {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            margin: 0 2px;
            color: var(--text-dark);
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            min-width: 40px;
            text-align: center;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .pagination-custom .page-link:hover {
            background-color: var(--primary-light);
            border-color: var(--primary-medium);
            color: var(--secondary-dark);
        }
        
        .pagination-custom .page-item.active .page-link {
            background: linear-gradient(135deg, var(--secondary-dark) 0%, #6b6548 100%);
            border-color: var(--secondary-dark);
            color: white;
        }
        
        .pagination-custom .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }
        
        @media (max-width: 768px) {
            .header-section {
                padding: 1.5rem;
            }
            
            .table-container {
                overflow-x: auto;
            }
            
            .stats-card {
                margin-bottom: 1rem;
            }
            
            .pagination-custom .page-link {
                padding: 0.4rem 0.6rem;
                min-width: 35px;
                font-size: 0.8rem;
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
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-currency-dollar me-3"></i>Manajemen Penggajian</h1>
                    <p class="lead mb-0">Kelola data gaji dan kompensasi karyawan</p>
                </div>
                <div class="col-md-6">
                    <div class="row text-center">
                        <div class="col-12">
                            <div class="stats-card">
                                <h3 class="fw-bold">{{ $salaries->total() }}</h3>
                                <p class="mb-0 small">Total Data Gaji</p>
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

        <!-- Main Content -->
        <div class="main-card">
            <!-- Card Header with Actions -->
            <div class="card-header-custom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="card-title mb-0 fw-bold text-dark"><i class="bi bi-list-ul me-2"></i>Daftar Penggajian</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="d-flex justify-content-end gap-3">
                            <div class="flex-grow-1">
                                <input type="text" class="form-control search-box" placeholder="Cari karyawan atau periode...">
                            </div>
                            <a href="{{ route('salaries.create') }}" class="btn btn-primary-custom text-white">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Data Gaji
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Karyawan</th>
                                <th>Periode</th>
                                <th class="text-end pe-4">Total Gaji</th>
                                <th class="text-center pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($salaries as $index => $salary)
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-semibold text-muted">
                                            {{ $salaries->firstItem() + $index }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="employee-info">
                                            <div class="employee-avatar">
                                                {{ substr($salary->employee->nama_lengkap ?? 'N/A', 0, 1) }}
                                            </div>
                                            <div class="employee-details">
                                                <span class="employee-name">
                                                    {{ $salary->employee->nama_lengkap ?? '-' }}
                                                </span>
                                                <span class="employee-id">
                                                    {{ $salary->employee->department->nama_departemen ?? 'No Dept' }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="period-badge">
                                            <i class="bi bi-calendar-month"></i>
                                            {{ $salary->periode }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <span class="salary-badge">
                                            <i class="bi bi-wallet2"></i>
                                            Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('salaries.show', $salary->id) }}" 
                                               class="btn btn-info text-white action-btn" 
                                               data-bs-toggle="tooltip" 
                                               title="Detail Gaji">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('salaries.edit', $salary->id) }}" 
                                               class="btn btn-warning action-btn" 
                                               data-bs-toggle="tooltip" 
                                               title="Edit Gaji">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger action-btn"
                                                        data-bs-toggle="tooltip" 
                                                        title="Hapus Data Gaji"
                                                        onclick="return confirm('Yakin ingin menghapus data gaji ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="bi bi-wallet empty-state-icon"></i>
                                            <h5>Belum ada data gaji</h5>
                                            <p class="mb-3">Mulai dengan menambahkan data gaji baru</p>
                                            <a href="{{ route('salaries.create') }}" class="btn btn-primary-custom text-white">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Data Gaji Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card Footer dengan Pagination -->
            @if($salaries->count() > 0)
            <div class="card-footer bg-transparent border-0 py-3 text-center">
                <p class="pagination-info mb-2">
                    <i class="bi bi-info-circle me-1"></i>
                    Menampilkan {{ $salaries->firstItem() }} - {{ $salaries->lastItem() }} dari {{ $salaries->total() }} gaji
                </p>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-custom justify-content-center mb-0">
                        <!-- Previous Button -->
                        <li class="page-item {{ $salaries->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $salaries->previousPageUrl() }}" aria-label="Previous">
                                <i class="bi bi-chevron-left"></i>
                                <span class="d-none d-sm-inline ms-1">Previous</span>
                            </a>
                        </li>

                        <!-- Page Numbers -->
                        @php
                            $currentPage = $salaries->currentPage();
                            $lastPage = $salaries->lastPage();
                            $startPage = max($currentPage - 1, 1);
                            $endPage = min($currentPage + 1, $lastPage);
                            
                            if ($startPage > 1) {
                                echo '<li class="page-item"><a class="page-link" href="' . $salaries->url(1) . '">1</a></li>';
                                if ($startPage > 2) {
                                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }
                            }
                            
                            for ($page = $startPage; $page <= $endPage; $page++) {
                                $isActive = $page == $currentPage ? 'active' : '';
                                echo '<li class="page-item ' . $isActive . '"><a class="page-link" href="' . $salaries->url($page) . '">' . $page . '</a></li>';
                            }
                            
                            if ($endPage < $lastPage) {
                                if ($endPage < $lastPage - 1) {
                                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }
                                echo '<li class="page-item"><a class="page-link" href="' . $salaries->url($lastPage) . '">' . $lastPage . '</a></li>';
                            }
                        @endphp

                        <!-- Next Button -->
                        <li class="page-item {{ $salaries->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $salaries->nextPageUrl() }}" aria-label="Next">
                                <span class="d-none d-sm-inline me-1">Next</span>
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            @endif
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
                const rows = document.querySelectorAll('.table-custom tbody tr');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    });
    </script>
</body>
</html>
@endsection