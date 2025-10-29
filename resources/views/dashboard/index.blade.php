@extends('layouts.app')

@section('content')
<style>
    :root {
        --color-cream: #f8f3d9;
        --color-light-beige: #ebe5c2;
        --color-beige: #b9b28a;
        --color-dark-brown: #504b38;
    }

    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(80, 75, 56, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(80, 75, 56, 0.15);
    }

    .card-body {
        padding: 1.5rem;
    }

    .stat-card {
        text-align: center;
        padding: 1.5rem;
        border-radius: 12px;
        background: white;
        box-shadow: 0 4px 15px rgba(80, 75, 56, 0.1);
        transition: transform 0.3s;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--color-dark-brown);
        margin: 0.5rem 0;
    }

    .stat-label {
        color: var(--color-beige);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
    }

    .stat-icon {
        font-size: 2rem;
        color: var(--color-beige);
        margin-bottom: 0.5rem;
    }

    .company-header {
        background: linear-gradient(135deg, var(--color-light-beige), var(--color-cream));
        border: 1px solid var(--color-beige);
        border-radius: 16px;
    }

    .table > :not(caption) > * > * {
        padding: 0.8rem 1rem;
    }

    .table thead th {
        background-color: var(--color-light-beige);
        color: var(--color-dark-brown);
        font-weight: 600;
        border: none;
    }

    .table tbody tr:hover {
        background-color: rgba(235, 229, 194, 0.3);
    }

    .badge {
        font-size: 0.75rem;
        border-radius: 10px;
        font-weight: 500;
    }

    .badge-hadir {
        background-color: var(--color-beige);
        color: var(--color-dark-brown);
    }

    .badge-izin {
        background-color: var(--color-light-beige);
        color: var(--color-dark-brown);
    }

    .badge-cuti {
        background-color: #e9d8a6;
        color: var(--color-dark-brown);
    }

    .badge-tidak-hadir {
        background-color: #ee9b00;
        color: white;
    }

    .card-body h5 {
        font-weight: 600;
        color: var(--color-dark-brown);
    }

    .text-primary {
        color: var(--color-dark-brown) !important;
    }

    .text-muted {
        color: var(--color-beige) !important;
    }

    .announcement-item {
        background-color: rgba(248, 243, 217, 0.3);
        border-radius: 12px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        border-left: 4px solid var(--color-beige);
        transition: all 0.3s ease;
    }

    .announcement-item:hover {
        background-color: rgba(235, 229, 194, 0.4);
        transform: translateX(5px);
    }

    .announcement-item:last-child {
        margin-bottom: 0;
    }

    .announcement-title {
        font-weight: 600;
        color: var(--color-dark-brown);
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .announcement-content {
        color: var(--color-dark-brown);
        font-size: 0.85rem;
        line-height: 1.4;
        margin-bottom: 0;
    }

    .announcement-date {
        font-size: 0.75rem;
        color: var(--color-beige);
        margin-top: 0.5rem;
    }
</style>

<div class="container py-4">

    {{-- 🔹 Header Perusahaan --}}
    <div class="d-flex align-items-center mb-4 p-4 company-header shadow-sm">
        <img src="{{ asset('images/logo-nct.png') }}" alt="Logo" width="80" height="80" class="me-3 rounded-circle border" style="border-color: var(--color-beige) !important;">
        <div>
            <h3 class="fw-bold mb-0 text-primary">Neo Culture Technology Corp.</h3>
            <small class="text-muted">Sistem Manajemen Pegawai — Dashboard Utama</small>
        </div>
    </div>

    {{-- 🔹 Statistik Singkat --}}
    <div class="row g-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number">{{ $totalEmployees }}</div>
                <div class="stat-label">Total Pegawai</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">🏢</div>
                <div class="stat-number">{{ $totalDepartments }}</div>
                <div class="stat-label">Total Departemen</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">💼</div>
                <div class="stat-number">{{ $totalPositions }}</div>
                <div class="stat-label">Total Jabatan</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon">📊</div>
                <div class="stat-number">{{ $todayAttendances }}</div>
                <div class="stat-label">Absensi Hari Ini</div>
            </div>
        </div>
    </div>

    {{-- 🔹 Grafik dan Aktivitas --}}
    <div class="row mt-5">
        <div class="col-md-8">
            {{-- Grafik Kehadiran --}}
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3 text-primary">Statistik Kehadiran Pegawai</h5>
                    <canvas id="attendanceChart" height="120"></canvas>
                </div>
            </div>

            {{-- Aktivitas Terbaru --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3 text-primary">Aktivitas Terbaru</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Pegawai</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Waktu Masuk</th>
                                    <th>Waktu Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentAttendances as $item)
                                    <tr>
                                        <td>{{ $item->employee->nama_lengkap ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                        <td>
                                            <span class="badge badge-{{ $item->status === 'hadir' ? 'hadir' : ($item->status === 'izin' ? 'izin' : ($item->status === 'cuti' ? 'cuti' : 'tidak-hadir')) }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $item->waktu_masuk ?? '-' }}</td>
                                        <td>{{ $item->waktu_keluar ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            <div class="py-3">
                                                <i class="fas fa-clipboard-list fa-2x mb-3" style="color: var(--color-beige);"></i>
                                                <p class="mb-0">Belum ada aktivitas.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar Kanan --}}
        <div class="col-md-4">
            {{-- Info Sistem --}}
            <div class="card mb-4">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-users fa-3x" style="color: var(--color-beige);"></i>
                    </div>
                    <h6 class="fw-semibold text-primary">Sistem Manajemen Pegawai</h6>
                    <p class="text-muted small mt-3">
                        Pantau, kelola, dan analisis data pegawai perusahaan Anda dengan mudah dan cepat.
                    </p>
                </div>
            </div>

            {{-- Pengumuman --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="fw-semibold mb-3 text-primary">Pengumuman</h5>
                    <div class="announcement-item">
                        <div class="announcement-title">Libur Nasional</div>
                        <div class="announcement-content">
                            Tanggal 17 Agustus 2023 akan diliburkan dalam rangka memperingati Hari Kemerdekaan RI.
                        </div>
                        <div class="announcement-date">
                            <i class="far fa-calendar me-1"></i>Diposting: 10 Agustus 2023
                        </div>
                    </div>
                    
                    <div class="announcement-item">
                        <div class="announcement-title">Pelatihan Karyawan</div>
                        <div class="announcement-content">
                            Akan diadakan pelatihan leadership untuk level manager pada tanggal 25 Agustus 2023.
                        </div>
                        <div class="announcement-date">
                            <i class="far fa-calendar me-1"></i>Diposting: 5 Agustus 2023
                        </div>
                    </div>
                    
                    <div class="announcement-item">
                        <div class="announcement-title">Update Sistem</div>
                        <div class="announcement-content">
                            Akan dilakukan maintenance sistem pada Minggu, 20 Agustus 2023 pukul 22:00 - 02:00 WIB.
                        </div>
                        <div class="announcement-date">
                            <i class="far fa-calendar me-1"></i>Diposting: 1 Agustus 2023
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<script>
    const ctx = document.getElementById('attendanceChart').getContext('2d');
    const attendanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Hadir', 'Cuti', 'Izin', 'Tidak Hadir'],
            datasets: [{
                label: 'Jumlah',
                data: [12, 2, 1, 3],
                backgroundColor: [
                    'var(--color-beige)',
                    'var(--color-light-beige)',
                    '#e9d8a6',
                    '#ee9b00'
                ],
                borderRadius: 10,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(80, 75, 56, 0.1)'
                    },
                    ticks: {
                        color: 'var(--color-dark-brown)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: 'var(--color-dark-brown)'
                    }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'var(--color-dark-brown)',
                    titleColor: 'var(--color-cream)',
                    bodyColor: 'var(--color-cream)'
                }
            }
        }
    });
</script>
@endsection