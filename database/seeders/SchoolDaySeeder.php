<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolDay;
use Carbon\Carbon;

class SchoolDaySeeder extends Seeder
{
    public function run(): void
    {
        $holidays = [
            '2024-01-01' => "New Year's Day",
            '2024-01-29' => 'Chinese New Year',
            '2024-02-25' => 'EDSA Revolution Anniversary',
            '2024-03-28' => 'Maundy Thursday',
            '2024-03-29' => 'Good Friday',
            '2024-03-30' => 'Black Saturday',
            '2024-04-09' => 'Araw ng Kagitingan',
            '2024-05-01' => 'Labor Day',
            '2024-06-12' => 'Independence Day',
            '2024-08-21' => 'Ninoy Aquino Day',
            '2024-08-26' => 'National Heroes Day',
            '2024-11-01' => "All Saints Day",
            '2024-11-02' => "All Souls Day",
            '2024-11-30' => 'Bonifacio Day',
            '2024-12-08' => 'Feast of Immaculate Conception',
            '2024-12-24' => 'Christmas Eve',
            '2024-12-25' => 'Christmas Day',
            '2024-12-30' => 'Rizal Day',
            '2024-12-31' => "New Years Eve",
        ];

        $events = [
            '2024-02-14' => 'Valentines Day Activity',
            '2024-03-15' => 'Foundation Day',
            '2024-04-01' => 'Enrollment Period',
            '2024-05-15' => 'Sports Fest Day 1',
            '2024-05-16' => 'Sports Fest Day 2',
            '2024-06-03' => 'First Day of Classes',
            '2024-07-04' => 'General Assembly',
            '2024-08-12' => 'Career Fair',
            '2024-09-06' => 'University Week Day 1',
            '2024-09-07' => 'University Week Day 2',
            '2024-10-25' => 'Midterm Examinations Start',
            '2024-11-15' => 'Foundation Anniversary',
            '2024-12-20' => 'Christmas Party',
        ];

        $totalStudents = 500;
        $start = Carbon::create(2024, 1, 1);
        $end = Carbon::create(2024, 12, 31);

        for ($date = $start->copy(); $date <= $end; $date->addDay()) {
            $dateStr = $date->format('Y-m-d');
            $dayOfWeek = $date->dayOfWeek;

            if ($dayOfWeek === 0 || $dayOfWeek === 6) {
                SchoolDay::create([
                    'date' => $dateStr,
                    'type' => 'Weekend',
                    'event_name' => null,
                    'total_students' => 0,
                    'present_students' => 0,
                    'absent_students' => 0,
                    'attendance_rate' => 0,
                ]);
                continue;
            }

            if (isset($holidays[$dateStr])) {
                SchoolDay::create([
                    'date' => $dateStr,
                    'type' => 'Holiday',
                    'event_name' => $holidays[$dateStr],
                    'total_students' => 0,
                    'present_students' => 0,
                    'absent_students' => 0,
                    'attendance_rate' => 0,
                ]);
                continue;
            }

            if (isset($events[$dateStr])) {
                $present = rand(380, 490);
                $rate = round(($present / $totalStudents) * 100, 2);
                SchoolDay::create([
                    'date' => $dateStr,
                    'type' => 'Event',
                    'event_name' => $events[$dateStr],
                    'total_students' => $totalStudents,
                    'present_students' => $present,
                    'absent_students' => $totalStudents - $present,
                    'attendance_rate' => $rate,
                ]);
                continue;
            }

            $present = rand(420, 490);
            $rate = round(($present / $totalStudents) * 100, 2);
            SchoolDay::create([
                'date' => $dateStr,
                'type' => 'School Day',
                'event_name' => null,
                'total_students' => $totalStudents,
                'present_students' => $present,
                'absent_students' => $totalStudents - $present,
                'attendance_rate' => $rate,
            ]);
        }
    }
}