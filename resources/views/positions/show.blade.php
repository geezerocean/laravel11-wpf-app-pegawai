@extends('layouts.app')

@section('title', 'Detail Jabatan')

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
            max-width: 1200px;
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
        
        .detail-card {
            background: var(--white);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .detail-item {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .detail-item:hover {
            background: linear-gradient(90deg, rgba(184, 178, 138, 0.03) 0%, rgba(235, 229, 194, 0.05) 100%);
        }
        
        .detail-item:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: var(--secondary-dark);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .detail-value {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 0;
        }
        
        .badge-custom {
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
        
        .department-badge {
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
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-secondary-custom {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            border: none;
            border-radius: 12px;
            padding: 0.7rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-secondary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
            background: linear-gradient(135deg, #5a6268 0%, #6c757d 100%);
            color: white;
        }
        
        .btn-warning-custom {
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
            border: none;
            border-radius: 12px;
            padding: 0.7rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
            color: #212529;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-warning-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 193, 7, 0.4);
            background: linear-gradient(135deg, #e0a800 0%, #ffc107 100%);
            color: #212529;
        }
        
        .description-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            border-left: 4px solid var(--primary-dark);
        }
        
        .description-text {
            line-height: 1.6;
            color: var(--text-dark);
            margin-bottom: 0;
        }
        
        @media (max-width: 768px) {
            .header-section {
                padding: 1.5rem;
            }
            
            .detail-item {
                padding: 1.25rem;
            }
            
            .detail-label {
                font-size: 0.85rem;
            }
            
            .detail-value {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container py-4">
        <!-- Header Section -->
        <div class="header-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-person-badge me-3"></i>Detail Jabatan</h1>
                    <p class="lead mb-0">Informasi lengkap mengenai jabatan {{ $position->nama_jabatan }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('positions.index') }}" class="btn btn-secondary-custom">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning-custom">
                            <i class="bi bi-pencil me-2"></i>Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-card">
            <!-- Card Header -->
            <div class="card-header-custom">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-info-circle me-2"></i>Informasi Jabatan
                        </h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="badge-custom">
                            <i class="bi bi-hash"></i>
                            {{ $position->kode_jabatan }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Detail Content -->
            <div class="p-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="detail-card">
                            <!-- Identitas Jabatan -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-person-badge"></i>
                                    NAMA JABATAN
                                </div>
                                <div class="detail-value">
                                    {{ $position->nama_jabatan }}
                                </div>
                            </div>
                            
                            <!-- Departemen -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-building"></i>
                                    DEPARTEMEN
                                </div>
                                <div class="detail-value">
                                    @if($position->department)
                                        <span class="department-badge">
                                            <i class="bi bi-building"></i>
                                            {{ $position->department->nama_departemen }}
                                        </span>
                                    @else
                                        <span class="text-muted">- Tidak Ada -</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Level Jabatan -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-bar-chart"></i>
                                    LEVEL JABATAN
                                </div>
                                <div class="detail-value">
                                    {{ $position->level_jabatan ?? '-' }}
                                </div>
                            </div>
                            
                            <!-- Informasi Gaji -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-currency-dollar"></i>
                                    INFORMASI GAJI
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="fw-semibold text-muted small">Gaji Pokok</div>
                                        <div class="salary-badge">
                                            <i class="bi bi-cash"></i>
                                            Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <div class="fw-semibold text-muted small">Tunjangan</div>
                                        <div class="salary-badge">
                                            <i class="bi bi-wallet2"></i>
                                            Rp {{ number_format($position->tunjangan ?? 0, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Total Kompensasi -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-calculator"></i>
                                    TOTAL KOMPENSASI
                                </div>
                                <div class="detail-value">
                                    @php
                                        $totalKompensasi = $position->gaji_pokok + ($position->tunjangan ?? 0);
                                    @endphp
                                    <div class="salary-badge" style="background: linear-gradient(135deg, #cce7ff 0%, #99ceff 100%); color: #004085;">
                                        <i class="bi bi-graph-up"></i>
                                        Rp {{ number_format($totalKompensasi, 0, ',', '.') }} / bulan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="detail-card h-100">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-card-text"></i>
                                    DESKRIPSI PEKERJAAN
                                </div>
                                <div class="mt-3">
                                    @if($position->deskripsi_pekerjaan)
                                        <div class="description-box">
                                            <p class="description-text">{{ $position->deskripsi_pekerjaan }}</p>
                                        </div>
                                    @else
                                        <div class="text-center py-4">
                                            <i class="bi bi-file-text display-4 text-muted mb-3"></i>
                                            <p class="text-muted mb-0">Tidak ada deskripsi pekerjaan</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Quick Actions -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-lightning"></i>
                                    AKSI CEPAT
                                </div>
                                <div class="mt-3">
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning-custom">
                                            <i class="bi bi-pencil me-2"></i>Edit Jabatan
                                        </a>
                                        <a href="{{ route('positions.index') }}" class="btn btn-secondary-custom">
                                            <i class="bi bi-list-ul me-2"></i>Lihat Semua Jabatan
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Information -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="detail-card">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-clock"></i>
                                    INFORMASI SISTEM
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-3 mb-3">
                                        <div class="fw-semibold text-muted small">Dibuat Pada</div>
                                        <div class="fw-bold">{{ $position->created_at->format('d M Y H:i') }}</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="fw-semibold text-muted small">Diperbarui Pada</div>
                                        <div class="fw-bold">{{ $position->updated_at->format('d M Y H:i') }}</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="fw-semibold text-muted small">Status</div>
                                        <div>
                                            <span class="badge bg-success">
                                                <i class="bi bi-check-circle me-1"></i>Aktif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <div class="fw-semibold text-muted small">ID</div>
                                        <div class="fw-bold text-muted">#{{ $position->id }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection