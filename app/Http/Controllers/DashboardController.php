<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\SchoolDay;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function summary()
    {
        return response()->json([
            'total_students' => Student::count(),
            'active_students' => Student::where('status', 'Active')->count(),
            'total_courses' => Course::count(),
            'active_courses' => Course::where('status', 'Active')->count(),
            'school_days' => SchoolDay::where('type', 'School Day')->count(),
            'avg_attendance' => round(SchoolDay::where('type', 'School Day')->avg('attendance_rate') ?? 0, 1),
        ]);
    }

    public function enrollmentTrends()
    {
        $data = Student::select(
            DB::raw('strftime("%Y", enrollment_date) as year'),
            DB::raw('strftime("%m", enrollment_date) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->groupBy('year', 'month')
        ->orderBy('year')
        ->orderBy('month')
        ->get();

        $months = ['01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun',
                   '07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec'];

        $formatted = $data->map(function($item) use ($months) {
            return [
                'label' => ($months[$item->month] ?? $item->month) . ' ' . $item->year,
                'month' => $item->month,
                'year' => $item->year,
                'count' => $item->count,
            ];
        });

        return response()->json($formatted);
    }

    public function courseDistribution()
    {
        $data = Student::select('course', DB::raw('COUNT(*) as count'))
            ->groupBy('course')
            ->orderByDesc('count')
            ->get();

        return response()->json($data);
    }

    public function attendanceTrends()
    {
        $data = SchoolDay::where('type', 'School Day')
            ->select(
                DB::raw('strftime("%m", date) as month'),
                DB::raw('strftime("%Y", date) as year'),
                DB::raw('AVG(attendance_rate) as avg_rate'),
                DB::raw('SUM(present_students) as total_present'),
                DB::raw('COUNT(*) as days')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $months = ['01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun',
                   '07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec'];

        $formatted = $data->map(function($item) use ($months) {
            return [
                'label' => $months[$item->month] ?? $item->month,
                'month' => $item->month,
                'year' => $item->year,
                'avg_rate' => round($item->avg_rate, 1),
                'total_present' => $item->total_present,
                'school_days' => $item->days,
            ];
        });

        return response()->json($formatted);
    }

    public function recentActivity()
    {
        $recent = SchoolDay::where('type', 'School Day')
            ->orderByDesc('date')
            ->limit(10)
            ->get();

        return response()->json($recent);
    }
}