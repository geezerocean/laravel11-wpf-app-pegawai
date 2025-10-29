@extends('layouts.app')

@section('title', 'Tambah Karyawan Baru')

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
        
        .btn-success-custom {
            background: linear-gradient(135deg, var(--accent-green) 0%, #219653 100%);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-success-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
            background: linear-gradient(135deg, #219653 0%, var(--accent-green) 100%);
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
        
        .form-section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--secondary-dark);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-light);
            display: flex;
            align-items: center;
            gap: 0.5rem;
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
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-person-plus me-3"></i>Tambah Karyawan Baru</h1>
                    <p class="lead mb-0">Isi form berikut untuk menambahkan data karyawan baru</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary-custom">
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
                    <i class="bi bi-person-badge me-2"></i>Form Data Karyawan
                </h5>
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    
                    <!-- Informasi Pribadi -->
                    <div class="mb-4">
                        <h5 class="form-section-title">
                            <i class="bi bi-person-vcard"></i>Informasi Pribadi
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom required-field">
                                        <i class="bi bi-person"></i>Nama Lengkap
                                    </label>
                                    <input type="text" 
                                           class="form-control form-control-custom" 
                                           name="nama_lengkap" 
                                           value="{{ old('nama_lengkap') }}"
                                           placeholder="Masukkan nama lengkap karyawan"
                                           required>
                                    @error('nama_lengkap')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom required-field">
                                        <i class="bi bi-envelope"></i>Email
                                    </label>
                                    <input type="email" 
                                           class="form-control form-control-custom" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           placeholder="Masukkan alamat email"
                                           required>
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom required-field">
                                        <i class="bi bi-telephone"></i>Nomor Telepon
                                    </label>
                                    <input type="tel" 
                                           class="form-control form-control-custom" 
                                           name="nomor_telepon" 
                                           value="{{ old('nomor_telepon') }}"
                                           placeholder="Masukkan nomor telepon"
                                           required>
                                    @error('nomor_telepon')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom">
                                        <i class="bi bi-geo-alt"></i>Alamat
                                    </label>
                                    <textarea class="form-control form-control-custom" 
                                              name="alamat" 
                                              rows="3" 
                                              placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Pekerjaan -->
                    <div class="mb-4">
                        <h5 class="form-section-title">
                            <i class="bi bi-briefcase"></i>Informasi Pekerjaan
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom required-field">
                                        <i class="bi bi-building"></i>Departemen
                                    </label>
                                    <select class="form-select form-select-custom" name="department_id" required>
                                        <option value="">Pilih Departemen</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                {{ $department->nama_departemen }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom required-field">
                                        <i class="bi bi-person-badge"></i>Jabatan
                                    </label>
                                    <select class="form-select form-select-custom" name="position_id" required>
                                        <option value="">Pilih Jabatan</option>
                                        @foreach($positions as $position)
                                            <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                                {{ $position->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position_id')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom required-field">
                                        <i class="bi bi-calendar"></i>Tanggal Bergabung
                                    </label>
                                    <input type="date" 
                                           class="form-control form-control-custom" 
                                           name="tanggal_bergabung" 
                                           value="{{ old('tanggal_bergabung') }}"
                                           required>
                                    @error('tanggal_bergabung')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom">
                                        <i class="bi bi-calendar-check"></i>Tanggal Keluar
                                    </label>
                                    <input type="date" 
                                           class="form-control form-control-custom" 
                                           name="tanggal_keluar" 
                                           value="{{ old('tanggal_keluar') }}">
                                    <div class="form-help-text">Kosongkan jika karyawan masih aktif</div>
                                    @error('tanggal_keluar')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Lainnya -->
                    <div class="mb-4">
                        <h5 class="form-section-title">
                            <i class="bi bi-info-circle"></i>Informasi Lainnya
                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom">
                                        <i class="bi bi-gender-ambiguous"></i>Jenis Kelamin
                                    </label>
                                    <select class="form-select form-select-custom" name="jenis_kelamin">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-custom">
                                    <label class="form-label-custom">
                                        <i class="bi bi-card-text"></i>Status Karyawan
                                    </label>
                                    <select class="form-select form-select-custom" name="status">
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                        <option value="leave" {{ old('status') == 'leave' ? 'selected' : '' }}>Cuti</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary-custom">
                            <i class="bi bi-x-circle me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-success-custom">
                            <i class="bi bi-check-circle me-2"></i>Simpan Data
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