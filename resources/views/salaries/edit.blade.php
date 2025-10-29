@extends('layouts.app')

@section('title', 'Edit Data Gaji')

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
        
        .btn-warning-custom {
            background: linear-gradient(135deg, var(--accent-orange) 0%, #d35400 100%);
            border: none;
            border-radius: 12px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(230, 126, 34, 0.3);
            color: white;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-warning-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(230, 126, 34, 0.4);
            background: linear-gradient(135deg, #d35400 0%, var(--accent-orange) 100%);
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
        
        .total-salary-card {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 15px;
            padding: 1.5rem;
            border-left: 4px solid var(--accent-blue);
            margin-bottom: 1.5rem;
        }
        
        .total-salary-label {
            font-weight: 600;
            color: #1565c0;
            margin-bottom: 0.5rem;
        }
        
        .total-salary-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0d47a1;
        }
        
        .salary-info-badge {
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
                    <h1 class="display-6 fw-bold mb-3"><i class="bi bi-cash-stack me-3"></i>Edit Data Gaji</h1>
                    <p class="lead mb-0">Perbarui informasi data gaji</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary-custom">
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
                            <i class="bi bi-wallet2 me-2"></i>Form Edit Data Gaji
                        </h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <span class="salary-info-badge">
                            <i class="bi bi-calendar-month"></i>
                            {{ $salary->periode }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group-custom">
                        <label for="employee_id" class="form-label-custom required-field">
                            <i class="bi bi-person-circle"></i>Nama Karyawan
                        </label>
                        <select name="employee_id" 
                                id="employee_id" 
                                class="form-select form-select-custom" 
                                required>
                            @foreach ($employees as $emp)
                                <option value="{{ $emp->id }}" {{ old('employee_id', $salary->employee_id) == $emp->id ? 'selected' : '' }}>
                                    {{ $emp->nama_lengkap }} 
                                    ({{ $emp->department->nama_departemen ?? 'N/A' }} - {{ $emp->position->nama_jabatan ?? 'N/A' }})
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group-custom">
                        <label for="periode" class="form-label-custom required-field">
                            <i class="bi bi-calendar-month"></i>Periode
                        </label>
                        <input type="text" 
                               name="periode" 
                               id="periode" 
                               class="form-control form-control-custom" 
                               value="{{ old('periode', $salary->periode) }}"
                               placeholder="Contoh: Oktober 2025"
                               required>
                        <div class="form-help-text">Format: Bulan Tahun (contoh: Oktober 2025)</div>
                        @error('periode')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Total Gaji Preview -->
                    <div class="total-salary-card">
                        <div class="total-salary-label">Total Gaji Bersih</div>
                        <div class="total-salary-value" id="totalGajiPreview">
                            Rp {{ number_format($salary->gaji_pokok + $salary->tunjangan - $salary->potongan, 0, ',', '.') }}
                        </div>
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
                                           value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
                                           required
                                           oninput="updateTotalGaji()">
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
                                           value="{{ old('tunjangan', $salary->tunjangan) }}"
                                           oninput="updateTotalGaji()">
                                </div>
                                @error('tunjangan')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <label for="potongan" class="form-label-custom">
                                    <i class="bi bi-dash-circle"></i>Potongan
                                </label>
                                <div class="salary-input-group">
                                    <span class="salary-prefix">Rp</span>
                                    <input type="number" 
                                           name="potongan" 
                                           id="potongan" 
                                           class="form-control form-control-custom salary-input" 
                                           value="{{ old('potongan', $salary->potongan) }}"
                                           oninput="updateTotalGaji()">
                                </div>
                                <div class="form-help-text">Masukkan jumlah potongan jika ada</div>
                                @error('potongan')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="{{ route('salaries.index') }}" class="btn btn-secondary-custom">
                            <i class="bi bi-x-circle me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-warning-custom">
                            <i class="bi bi-check-circle me-2"></i>Perbarui Data Gaji
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    function updateTotalGaji() {
        const gajiPokok = parseInt(document.getElementById('gaji_pokok').value) || 0;
        const tunjangan = parseInt(document.getElementById('tunjangan').value) || 0;
        const potongan = parseInt(document.getElementById('potongan').value) || 0;
        
        const totalGaji = gajiPokok + tunjangan - potongan;
        
        // Format angka dengan pemisah ribuan
        const formattedTotal = new Intl.NumberFormat('id-ID').format(totalGaji);
        document.getElementById('totalGajiPreview').textContent = `Rp ${formattedTotal}`;
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateTotalGaji();
    });
    </script>
</body>
</html>
@endsection