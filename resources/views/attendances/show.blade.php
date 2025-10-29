@extends('layouts.app')

@section('title', 'Detail Absensi')

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
        
        .time-badge {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-weight: 600;
            color: var(--text-dark);
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
        
        /* Status Badge Styles */
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
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
        
        .attendance-summary {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 15px;
            padding: 2rem;
            border-left: 4px solid var(--accent-blue);
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(33, 150, 243, 0.2);
        }
        
        .summary-item:last-child {
            border-bottom: none;
        }
        
        .summary-label {
            font-weight: 500;
            color: #1565c0;
        }
        
        .summary-value {
            font-weight: 600;
            color: #0d47a1;
        }
        
        .working-hours {
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent-blue);
            text-align: center;
            margin: 1rem 0;
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
            
            .working-hours {
                font-size: 1.5rem;
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
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-calendar-check me-3"></i>Detail Absensi</h1>
                    <p class="lead mb-0">Informasi lengkap mengenai kehadiran karyawan</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('attendances.index') }}" class="btn btn-secondary-custom">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning-custom">
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
                            <i class="bi bi-info-circle me-2"></i>Informasi Kehadiran
                        </h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="date-badge">
                            <i class="bi bi-calendar-event"></i>
                            {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Detail Content -->
            <div class="p-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="detail-card">
                            <!-- Informasi Karyawan -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-person-circle"></i>
                                    KARYAWAN
                                </div>
                                <div class="detail-value">
                                    <span class="employee-badge">
                                        <i class="bi bi-person-badge"></i>
                                        {{ $attendance->employee->nama_lengkap ?? '-' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Status Kehadiran -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-clipboard-check"></i>
                                    STATUS KEHADIRAN
                                </div>
                                <div class="detail-value">
                                    @switch($attendance->status)
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
                                </div>
                            </div>
                            
                            <!-- Waktu Masuk -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-clock"></i>
                                    WAKTU MASUK
                                </div>
                                <div class="detail-value">
                                    @if($attendance->waktu_masuk)
                                        <span class="time-badge">
                                            <i class="bi bi-box-arrow-in-right"></i>
                                            {{ $attendance->waktu_masuk }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Waktu Keluar -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-clock"></i>
                                    WAKTU KELUAR
                                </div>
                                <div class="detail-value">
                                    @if($attendance->waktu_keluar)
                                        <span class="time-badge">
                                            <i class="bi bi-box-arrow-right"></i>
                                            {{ $attendance->waktu_keluar }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Informasi Sistem -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-database"></i>
                                    INFORMASI SISTEM
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="fw-semibold text-muted small">Dibuat Pada</div>
                                        <div class="fw-bold">{{ $attendance->created_at->format('d M Y H:i') }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="fw-semibold text-muted small">Diperbarui Pada</div>
                                        <div class="fw-bold">{{ $attendance->updated_at->format('d M Y H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="attendance-summary h-100">
                            <h5 class="fw-bold text-center mb-4" style="color: #1565c0;">
                                <i class="bi bi-graph-up me-2"></i>Ringkasan
                            </h5>
                            
                            @if($attendance->status === 'hadir' && $attendance->waktu_masuk && $attendance->waktu_keluar)
                                @php
                                    $waktuMasuk = \Carbon\Carbon::createFromFormat('H:i:s', $attendance->waktu_masuk);
                                    $waktuKeluar = \Carbon\Carbon::createFromFormat('H:i:s', $attendance->waktu_keluar);
                                    $selisihJam = $waktuKeluar->diffInHours($waktuMasuk);
                                    $selisihMenit = $waktuKeluar->diffInMinutes($waktuMasuk) % 60;
                                @endphp
                                
                                <div class="working-hours">
                                    {{ $selisihJam }}j {{ $selisihMenit }}m
                                </div>
                                <div class="text-center text-muted mb-4">Total Jam Kerja</div>
                                
                                <div class="summary-item">
                                    <span class="summary-label">Mulai Kerja</span>
                                    <span class="summary-value">{{ $attendance->waktu_masuk }}</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Selesai Kerja</span>
                                    <span class="summary-value">{{ $attendance->waktu_keluar }}</span>
                                </div>
                                <div class="summary-item">
                                    <span class="summary-label">Status</span>
                                    <span class="summary-value">Hadir Tepat Waktu</span>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="bi bi-clock-history display-4 mb-3" style="color: #90a4ae;"></i>
                                    <p class="mb-2 fw-semibold" style="color: #546e7a;">Informasi Jam Kerja</p>
                                    <p class="small text-muted">
                                        @if($attendance->status !== 'hadir')
                                            Tidak tersedia untuk status {{ $attendance->status }}
                                        @else
                                            Data waktu tidak lengkap
                                        @endif
                                    </p>
                                </div>
                            @endif
                            
                            <!-- Quick Actions -->
                            <div class="mt-4 pt-3 border-top">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning-custom">
                                        <i class="bi bi-pencil me-2"></i>Edit Absensi
                                    </a>
                                    <a href="{{ route('attendances.index') }}" class="btn btn-secondary-custom">
                                        <i class="bi bi-list-ul me-2"></i>Lihat Semua Absensi
                                    </a>
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