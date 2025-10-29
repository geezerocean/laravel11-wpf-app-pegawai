@extends('layouts.app')

@section('title', 'Tambah Departemen Baru')

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
            max-width: 1000px;
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
        
        .form-section {
            padding: 2rem;
        }
        
        .form-group-custom {
            margin-bottom: 1.5rem;
        }
        
        .form-label-custom {
            font-weight: 600;
            color: var(--secondary-dark);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .form-control-custom {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            background: var(--white);
        }
        
        .form-control-custom:focus {
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(184, 178, 138, 0.2);
        }
        
        .form-select-custom {
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            background: var(--white);
        }
        
        .form-select-custom:focus {
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(184, 178, 138, 0.2);
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #a59e74 100%);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(184, 178, 138, 0.3);
            color: white;
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
        
        .btn-secondary-custom {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
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
        
        .required-field::after {
            content: " *";
            color: var(--accent-red);
        }
        
        .form-help-text {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-top: 0.25rem;
        }
        
        @media (max-width: 768px) {
            .header-section {
                padding: 1.5rem;
            }
            
            .form-section {
                padding: 1.5rem;
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
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-building-add me-3"></i>Tambah Departemen Baru</h1>
                    <p class="lead mb-0">Isi form berikut untuk menambahkan departemen baru</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary-custom">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-card">
            <!-- Card Header -->
            <div class="card-header-custom">
                <h5 class="card-title mb-0 fw-bold text-dark">
                    <i class="bi bi-building me-2"></i>Form Data Departemen
                </h5>
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="kode_departemen" class="form-label-custom">
                                    <i class="bi bi-hash"></i>Kode Departemen
                                </label>
                                <input type="text" 
                                       name="kode_departemen" 
                                       class="form-control form-control-custom" 
                                       value="{{ old('kode_departemen') }}"
                                       placeholder="Masukkan kode departemen">
                                @error('kode_departemen')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="nama_departemen" class="form-label-custom required-field">
                                    <i class="bi bi-building"></i>Nama Departemen
                                </label>
                                <input type="text" 
                                       name="nama_departemen" 
                                       class="form-control form-control-custom" 
                                       value="{{ old('nama_departemen') }}" 
                                       placeholder="Masukkan nama departemen"
                                       required>
                                @error('nama_departemen')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="lokasi" class="form-label-custom">
                                    <i class="bi bi-geo-alt"></i>Lokasi
                                </label>
                                <input type="text" 
                                       name="lokasi" 
                                       class="form-control form-control-custom" 
                                       value="{{ old('lokasi') }}"
                                       placeholder="Masukkan lokasi departemen">
                                @error('lokasi')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="jumlah_pegawai" class="form-label-custom">
                                    <i class="bi bi-people"></i>Jumlah Pegawai
                                </label>
                                <input type="number" 
                                       name="jumlah_pegawai" 
                                       class="form-control form-control-custom" 
                                       value="{{ old('jumlah_pegawai', 0) }}"
                                       placeholder="Masukkan jumlah pegawai">
                                @error('jumlah_pegawai')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label for="deskripsi" class="form-label-custom">
                            <i class="bi bi-card-text"></i>Deskripsi
                        </label>
                        <textarea name="deskripsi" 
                                  class="form-control form-control-custom" 
                                  rows="3" 
                                  placeholder="Masukkan deskripsi departemen">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('departments.index') }}" class="btn btn-secondary-custom">
                            <i class="bi bi-x-circle me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="bi bi-check-circle me-2"></i>Simpan Departemen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection