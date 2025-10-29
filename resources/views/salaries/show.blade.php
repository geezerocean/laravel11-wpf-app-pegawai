@extends('layouts.app')

@section('title', 'Detail Gaji Karyawan')

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
        
        .position-badge {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: #1565c0;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .period-badge {
            background: linear-gradient(135deg, #f3e5f5 0%, #e1bee7 100%);
            color: #7b1fa2;
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
        
        .total-salary-badge {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
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
        
        .btn-danger-custom {
            background: linear-gradient(135deg, var(--accent-red) 0%, #c0392b 100%);
            border: none;
            border-radius: 12px;
            padding: 0.7rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-danger-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
            background: linear-gradient(135deg, #c0392b 0%, var(--accent-red) 100%);
            color: white;
        }
        
        .salary-summary {
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
        
        .employee-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-dark) 0%, #a59e74 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 1rem;
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
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-currency-dollar me-3"></i>Detail Gaji Karyawan</h1>
                    <p class="lead mb-0">Informasi lengkap mengenai penggajian karyawan</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('salaries.index') }}" class="btn btn-secondary-custom">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
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
                            <i class="bi bi-info-circle me-2"></i>Informasi Gaji
                        </h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="period-badge">
                            <i class="bi bi-calendar-month"></i>
                            {{ $salary->periode }}
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
                                        {{ $salary->employee->nama_lengkap ?? 'Nama Tidak Diketahui' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Departemen -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-building"></i>
                                    DEPARTEMEN
                                </div>
                                <div class="detail-value">
                                    @if($salary->employee->department)
                                        <span class="department-badge">
                                            <i class="bi bi-building"></i>
                                            {{ $salary->employee->department->nama_departemen }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Jabatan -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-person-badge"></i>
                                    JABATAN
                                </div>
                                <div class="detail-value">
                                    @if($salary->employee->position)
                                        <span class="position-badge">
                                            <i class="bi bi-person-badge"></i>
                                            {{ $salary->employee->position->nama_jabatan }}
                                        </span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Gaji Pokok -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-cash"></i>
                                    GAJI POKOK
                                </div>
                                <div class="detail-value">
                                    <span class="salary-badge">
                                        <i class="bi bi-currency-dollar"></i>
                                        Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Tunjangan -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-plus-circle"></i>
                                    TUNJANGAN
                                </div>
                                <div class="detail-value">
                                    <span class="salary-badge">
                                        <i class="bi bi-plus-circle"></i>
                                        Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Potongan -->
                            <div class="detail-item">
                                <div class="detail-label">
                                    <i class="bi bi-dash-circle"></i>
                                    POTONGAN
                                </div>
                                <div class="detail-value">
                                    <span class="salary-badge" style="background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%); color: #dc2626;">
                                        <i class="bi bi-dash-circle"></i>
                                        Rp {{ number_format($salary->potongan, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="salary-summary h-100">
                            <div class="text-center mb-4">
                                <div class="employee-avatar mx-auto">
                                    {{ substr($salary->employee->nama_lengkap ?? 'N/A', 0, 1) }}
                                </div>
                                <h5 class="fw-bold mb-1">{{ $salary->employee->nama_lengkap ?? 'Nama Tidak Diketahui' }}</h5>
                                <p class="text-muted mb-0">{{ $salary->employee->position->nama_jabatan ?? '-' }}</p>
                            </div>
                            
                            <div class="text-center mb-4">
                                <span class="total-salary-badge">
                                    <i class="bi bi-wallet2"></i>
                                    Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                                </span>
                                <div class="text-muted mt-2">Total Gaji Bersih</div>
                            </div>
                            
                            <div class="summary-item">
                                <span class="summary-label">Gaji Pokok</span>
                                <span class="summary-value">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Tunjangan</span>
                                <span class="summary-value">+ Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Potongan</span>
                                <span class="summary-value" style="color: #dc2626;">- Rp {{ number_format($salary->potongan, 0, ',', '.') }}</span>
                            </div>
                            
                            <!-- Quick Actions -->
                            <div class="mt-4 pt-3 border-top">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning-custom">
                                        <i class="bi bi-pencil me-2"></i>Edit Data Gaji
                                    </a>
                                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-danger-custom w-100"
                                                onclick="return confirm('Yakin ingin menghapus data gaji ini?')">
                                            <i class="bi bi-trash me-2"></i>Hapus Data
                                        </button>
                                    </form>
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