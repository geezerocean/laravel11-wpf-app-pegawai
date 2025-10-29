<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();
        $totalPositions = Position::count();
        $todayAttendances = Attendance::whereDate('tanggal', today())->count();

        $recentAttendances = Attendance::with('employee')
            ->latest('tanggal')
            ->take(5)
            ->get();

        $newEmployees = Employee::latest('tanggal_masuk')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalEmployees',
            'totalDepartments',
            'totalPositions',
            'todayAttendances',
            'recentAttendances',
            'newEmployees'
        ));
    }
}
