@extends('layouts.app')

@section('title', 'Data Absensi')

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
        
        .employee-badge {
            background: linear-gradient(135deg, var(--primary-light) 0%, #fff9d6 100%);
            color: var(--secondary-dark);
            border: 1px solid rgba(184, 178, 138, 0.3);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .date-badge {
            background: linear-gradient(135deg, var(--primary-medium) 0%, #e8e2bb 100%);
            color: var(--secondary-dark);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 500;
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
        
        /* Status Badge Styles */
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .status-hadir {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }
        
        .status-cuti {
            background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
            color: #0c5460;
        }
        
        .status-izin {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
        }
        
        .status-tidak_hadir {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
        }
        
        .time-badge {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        /* Pagination Styles */
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
        
        .empty-state {
            padding: 3rem 2rem;
            text-align: center;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            color: var(--primary-medium);
            margin-bottom: 1.5rem;
        }
        
        .filter-section {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
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
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-calendar-check me-3"></i>Manajemen Absensi</h1>
                    <p class="lead mb-0">Kelola data kehadiran dan absensi karyawan</p>
                </div>
                <div class="col-md-6">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="stats-card">
                                <h3 class="fw-bold">{{ $attendances->total() }}</h3>
                                <p class="mb-0 small">Total Absensi</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stats-card">
                                <h3 class="fw-bold">
                                    @php
                                        $uniqueEmployees = [];
                                        foreach ($attendances as $attendance) {
                                            if ($attendance->employee) {
                                                $uniqueEmployees[$attendance->employee->id] = true;
                                            }
                                        }
                                        echo count($uniqueEmployees);
                                    @endphp
                                </h3>
                                <p class="mb-0 small">Karyawan</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stats-card">
                                <h3 class="fw-bold">
                                    @php
                                        $hadirCount = 0;
                                        foreach ($attendances as $attendance) {
                                            if ($attendance->status === 'hadir') {
                                                $hadirCount++;
                                            }
                                        }
                                        echo $hadirCount;
                                    @endphp
                                </h3>
                                <p class="mb-0 small">Hadir</p>
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
                        <h5 class="card-title mb-0 fw-bold text-dark"><i class="bi bi-list-ul me-2"></i>Daftar Absensi</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="d-flex justify-content-end gap-3">
                            <div class="flex-grow-1">
                                <input type="text" class="form-control search-box" placeholder="Cari absensi...">
                            </div>
                            <a href="{{ route('attendances.create') }}" class="btn btn-primary-custom text-white">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Absensi
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="filter-section mx-3 mt-3">
                <div class="row g-3 align-items-center">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small">Filter Status</label>
                        <select class="form-select search-box">
                            <option value="">Semua Status</option>
                            <option value="hadir">Hadir</option>
                            <option value="cuti">Cuti</option>
                            <option value="izin">Izin</option>
                            <option value="tidak_hadir">Tanpa Keterangan</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small">Tanggal Mulai</label>
                        <input type="date" class="form-control search-box">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small">Tanggal Akhir</label>
                        <input type="date" class="form-control search-box">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold small text-white">.</label>
                        <button class="btn btn-primary-custom w-100">
                            <i class="bi bi-funnel me-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-custom">
                        <thead>
                            <tr>
                                <th class="ps-4">Karyawan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Waktu Masuk</th>
                                <th>Waktu Keluar</th>
                                <th class="text-center pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($attendances as $att)
                                <tr>
                                    <td class="ps-4">
                                        <span class="employee-badge">
                                            <i class="bi bi-person-circle"></i>
                                            {{ $att->employee->nama_lengkap ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="date-badge">
                                            <i class="bi bi-calendar-event"></i>
                                            {{ \Carbon\Carbon::parse($att->tanggal)->format('d M Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        @switch($att->status)
                                            @case('hadir') 
                                                <span class="status-badge status-hadir">
                                                    <i class="bi bi-check-circle"></i>Hadir
                                                </span> 
                                                @break
                                            @case('cuti') 
                                                <span class="status-badge status-cuti">
                                                    <i class="bi bi-airplane"></i>Cuti
                                                </span> 
                                                @break
                                            @case('izin') 
                                                <span class="status-badge status-izin">
                                                    <i class="bi bi-envelope-paper"></i>Izin
                                                </span> 
                                                @break
                                            @case('tidak_hadir') 
                                                <span class="status-badge status-tidak_hadir">
                                                    <i class="bi bi-x-circle"></i>Tanpa Keterangan
                                                </span> 
                                                @break
                                        @endswitch
                                    </td>
                                    <td>
                                        @if($att->waktu_masuk)
                                            <span class="time-badge">
                                                <i class="bi bi-clock me-1"></i>{{ $att->waktu_masuk }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($att->waktu_keluar)
                                            <span class="time-badge">
                                                <i class="bi bi-clock me-1"></i>{{ $att->waktu_keluar }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('attendances.show', $att->id) }}" 
                                               class="btn btn-info text-white action-btn" 
                                               data-bs-toggle="tooltip" 
                                               title="Detail Absensi">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('attendances.edit', $att->id) }}" 
                                               class="btn btn-warning action-btn" 
                                               data-bs-toggle="tooltip" 
                                               title="Edit Absensi">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('attendances.destroy', $att->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger action-btn"
                                                        data-bs-toggle="tooltip" 
                                                        title="Hapus Absensi"
                                                        onclick="return confirm('Yakin ingin menghapus data absensi ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="empty-state">
                                            <i class="bi bi-calendar-x empty-state-icon"></i>
                                            <h5>Belum ada data absensi</h5>
                                            <p class="mb-3">Mulai dengan menambahkan data absensi baru</p>
                                            <a href="{{ route('attendances.create') }}" class="btn btn-primary-custom text-white">
                                                <i class="bi bi-plus-circle me-2"></i>Tambah Absensi Pertama
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
            @if($attendances->count() > 0)
            <div class="card-footer bg-transparent border-0 py-3 text-center">
                <p class="pagination-info mb-2">
                    <i class="bi bi-info-circle me-1"></i>
                    Menampilkan {{ $attendances->firstItem() }} - {{ $attendances->lastItem() }} dari {{ $attendances->total() }} absensi
                </p>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-custom justify-content-center mb-0">
                        <!-- Previous Button -->
                        <li class="page-item {{ $attendances->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $attendances->previousPageUrl() }}" aria-label="Previous">
                                <i class="bi bi-chevron-left"></i>
                                <span class="d-none d-sm-inline ms-1">Previous</span>
                            </a>
                        </li>

                        <!-- Page Numbers -->
                        @php
                            $currentPage = $attendances->currentPage();
                            $lastPage = $attendances->lastPage();
                            $startPage = max($currentPage - 1, 1);
                            $endPage = min($currentPage + 1, $lastPage);
                            
                            if ($startPage > 1) {
                                echo '<li class="page-item"><a class="page-link" href="' . $attendances->url(1) . '">1</a></li>';
                                if ($startPage > 2) {
                                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }
                            }
                            
                            for ($page = $startPage; $page <= $endPage; $page++) {
                                $isActive = $page == $currentPage ? 'active' : '';
                                echo '<li class="page-item ' . $isActive . '"><a class="page-link" href="' . $attendances->url($page) . '">' . $page . '</a></li>';
                            }
                            
                            if ($endPage < $lastPage) {
                                if ($endPage < $lastPage - 1) {
                                    echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                }
                                echo '<li class="page-item"><a class="page-link" href="' . $attendances->url($lastPage) . '">' . $lastPage . '</a></li>';
                            }
                        @endphp

                        <!-- Next Button -->
                        <li class="page-item {{ $attendances->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $attendances->nextPageUrl() }}" aria-label="Next">
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