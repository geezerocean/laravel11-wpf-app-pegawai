@extends('layouts.app')

@section('title', 'Detail Departemen - ' . ($department->nama_departemen ?? 'Unknown'))

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
        
        .detail-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--secondary-dark) 0%, #6b6548 100%);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(80, 75, 56, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .page-header::before {
            content: '';
            position: absolute;
            top: -30%;
            right: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }
        
        .detail-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, var(--white) 0%, #f8f9fa 100%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.5rem 2rem;
        }
        
        .info-section {
            padding: 2rem;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1rem;
            background: rgba(248, 243, 217, 0.1);
            border-radius: 12px;
            border-left: 4px solid var(--primary-dark);
            transition: all 0.3s ease;
        }
        
        .info-item:hover {
            background: rgba(248, 243, 217, 0.2);
            transform: translateX(5px);
        }
        
        .info-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--secondary-dark) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        
        .info-content {
            flex: 1;
        }
        
        .info-label {
            font-size: 0.85rem;
            color: var(--text-light);
            font-weight: 500;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .info-value {
            font-size: 1rem;
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0;
        }
        
        .empty-value {
            color: var(--text-light);
            font-style: italic;
        }
        
        .description-card {
            grid-column: 1 / -1;
            background: linear-gradient(135deg, var(--primary-light) 0%, #fff9d6 100%);
            border: 1px solid rgba(184, 178, 138, 0.3);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1rem;
        }
        
        .description-content {
            font-size: 0.95rem;
            line-height: 1.6;
            color: var(--text-dark);
        }
        
        .btn-custom-secondary {
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
        
        .btn-custom-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
            background: linear-gradient(135deg, #5a6268 0%, #6c757d 100%);
            color: white;
        }
        
        .btn-edit {
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
        
        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(184, 178, 138, 0.4);
            background: linear-gradient(135deg, #a59e74 0%, var(--primary-dark) 100%);
            color: white;
        }
        
        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .employee-count-badge {
            background: linear-gradient(135deg, var(--accent-blue) 0%, #2980b9 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-custom-secondary, .btn-edit {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="detail-container py-4">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-6 fw-bold mb-2">
                        <i class="bi bi-building me-3"></i>Detail Departemen
                    </h1>
                    <p class="lead mb-0">Informasi lengkap data departemen</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('departments.index') }}" class="btn btn-custom-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="detail-card">
            <!-- Card Header -->
            <div class="card-header-custom">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-building me-2"></i>{{ $department->nama_departemen ?? 'Departemen' }}
                        </h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="employee-count-badge">
                            <i class="bi bi-people-fill"></i>
                            {{ $department->employees_count ?? 0 }} Karyawan
                        </span>
                    </div>
                </div>
            </div>

            <!-- Information Section -->
            <div class="info-section">
                <div class="info-grid">
                    <!-- Basic Information -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-hash"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Kode Departemen</div>
                            <div class="info-value {{ empty($department->kode_departemen) ? 'empty-value' : '' }}">
                                {{ $department->kode_departemen ?? '- Tidak Tersedia -' }}
                            </div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Nama Departemen</div>
                            <div class="info-value">{{ $department->nama_departemen ?? '-' }}</div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Lokasi</div>
                            <div class="info-value {{ empty($department->lokasi) ? 'empty-value' : '' }}">
                                {{ $department->lokasi ?? '- Tidak Tersedia -' }}
                            </div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Jumlah Karyawan</div>
                            <div class="info-value">
                                <span class="fw-bold text-primary">{{ $department->employees_count ?? 0 }}</span> 
                                <span class="text-muted">karyawan</span>
                            </div>
                        </div>
                    </div>

                    <!-- Timestamp Information -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-calendar-plus"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Dibuat Pada</div>
                            <div class="info-value">
                                {{ $department->created_at ? $department->created_at->format('d M Y H:i') : '-' }}
                            </div>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Diperbarui Pada</div>
                            <div class="info-value">
                                {{ $department->updated_at ? $department->updated_at->format('d M Y H:i') : '-' }}
                            </div>
                        </div>
                    </div>

                    <!-- Description Card -->
                    @if(!empty($department->deskripsi))
                    <div class="description-card">
                        <div class="info-item" style="border-left: none; background: transparent; padding: 0;">
                            <div class="info-icon" style="background: var(--secondary-dark);">
                                <i class="bi bi-card-text"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Deskripsi Departemen</div>
                                <div class="description-content">
                                    {{ $department->deskripsi }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="card-footer bg-light py-3 d-flex justify-content-center gap-2">
                <a href="{{ route('departments.index') }}" class="btn btn-custom-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar
                </a>
                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-edit">
                    <i class="bi bi-pencil me-2"></i>Edit Data Karyawan
                </a>
            </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection