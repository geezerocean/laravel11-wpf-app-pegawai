@extends('layouts.app')

@section('title', 'Edit Data Jabatan')

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
        
        .salary-input-group {
            position: relative;
        }
        
        .salary-prefix {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-weight: 500;
        }
        
        .salary-input {
            padding-left: 40px;
        }
        
        .position-info-badge {
            background: linear-gradient(135deg, var(--primary-light) 0%, #fff9d6 100%);
            color: var(--secondary-dark);
            border: 1px solid rgba(184, 178, 138, 0.3);
            padding: 0.75rem 1rem;
            border-radius: 10px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 768px) {
            .header-section {
                padding: 1.5rem;
            }
            
            .form-section {
                padding: 1.5rem;
            }
            
            .salary-prefix {
                left: 10px;
                font-size: 0.9rem;
            }
            
            .salary-input {
                padding-left: 35px;
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
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-person-badge-gear me-3"></i>Edit Data Jabatan</h1>
                    <p class="lead mb-0">Perbarui informasi data jabatan</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary-custom">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
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
                            <i class="bi bi-person-badge me-2"></i>Form Edit Data Jabatan
                        </h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="position-info-badge">
                            <i class="bi bi-person-badge"></i>
                            {{ $position->nama_jabatan }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <form action="{{ route('positions.update', $position->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="kode_jabatan" class="form-label-custom required-field">
                                    <i class="bi bi-hash"></i>Kode Jabatan
                                </label>
                                <input type="text" 
                                       name="kode_jabatan" 
                                       id="kode_jabatan" 
                                       class="form-control form-control-custom" 
                                       value="{{ old('kode_jabatan', $position->kode_jabatan) }}" 
                                       placeholder="Masukkan kode jabatan"
                                       required>
                                @error('kode_jabatan')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="nama_jabatan" class="form-label-custom required-field">
                                    <i class="bi bi-person-badge"></i>Nama Jabatan
                                </label>
                                <input type="text" 
                                       name="nama_jabatan" 
                                       id="nama_jabatan" 
                                       class="form-control form-control-custom" 
                                       value="{{ old('nama_jabatan', $position->nama_jabatan) }}" 
                                       placeholder="Masukkan nama jabatan"
                                       required>
                                @error('nama_jabatan')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label for="department_id" class="form-label-custom required-field">
                            <i class="bi bi-building"></i>Departemen
                        </label>
                        <select name="department_id" 
                                id="department_id" 
                                class="form-select form-select-custom" 
                                required>
                            <option value="">-- Pilih Departemen --</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id', $position->department_id) == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->nama_departemen }}
                                </option>
                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="gaji_pokok" class="form-label-custom required-field">
                                    <i class="bi bi-currency-dollar"></i>Gaji Pokok
                                </label>
                                <div class="salary-input-group">
                                    <span class="salary-prefix">Rp</span>
                                    <input type="number" 
                                           name="gaji_pokok" 
                                           id="gaji_pokok" 
                                           class="form-control form-control-custom salary-input" 
                                           value="{{ old('gaji_pokok', $position->gaji_pokok) }}" 
                                           placeholder="0"
                                           required>
                                </div>
                                @error('gaji_pokok')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="tunjangan" class="form-label-custom">
                                    <i class="bi bi-plus-circle"></i>Tunjangan
                                </label>
                                <div class="salary-input-group">
                                    <span class="salary-prefix">Rp</span>
                                    <input type="number" 
                                           name="tunjangan" 
                                           id="tunjangan" 
                                           class="form-control form-control-custom salary-input" 
                                           value="{{ old('tunjangan', $position->tunjangan) }}" 
                                           placeholder="0">
                                </div>
                                @error('tunjangan')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label for="level_jabatan" class="form-label-custom">
                            <i class="bi bi-bar-chart"></i>Level Jabatan
                        </label>
                        <select name="level_jabatan" 
                                id="level_jabatan" 
                                class="form-select form-select-custom">
                            <option value="">-- Pilih Level --</option>
                            <option value="Junior" {{ old('level_jabatan', $position->level_jabatan) == 'Junior' ? 'selected' : '' }}>Junior</option>
                            <option value="Mid" {{ old('level_jabatan', $position->level_jabatan) == 'Mid' ? 'selected' : '' }}>Mid</option>
                            <option value="Senior" {{ old('level_jabatan', $position->level_jabatan) == 'Senior' ? 'selected' : '' }}>Senior</option>
                            <option value="Manager" {{ old('level_jabatan', $position->level_jabatan) == 'Manager' ? 'selected' : '' }}>Manager</option>
                        </select>
                        @error('level_jabatan')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group-custom">
                        <label for="deskripsi_pekerjaan" class="form-label-custom">
                            <i class="bi bi-card-text"></i>Deskripsi Pekerjaan
                        </label>
                        <textarea name="deskripsi_pekerjaan" 
                                  id="deskripsi_pekerjaan" 
                                  class="form-control form-control-custom" 
                                  rows="4" 
                                  placeholder="Masukkan deskripsi pekerjaan untuk jabatan ini">{{ old('deskripsi_pekerjaan', $position->deskripsi_pekerjaan) }}</textarea>
                        @error('deskripsi_pekerjaan')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('positions.index') }}" class="btn btn-secondary-custom">
                            <i class="bi bi-x-circle me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="bi bi-check-circle me-2"></i>Perbarui Jabatan
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