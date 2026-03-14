<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['code'=>'BSIT','name'=>'BS Information Technology','department'=>'CIT','description'=>'Study of computing technology','units'=>180,'max_students'=>50,'enrolled_students'=>48],
            ['code'=>'BSCS','name'=>'BS Computer Science','department'=>'CIT','description'=>'Study of algorithms and computation','units'=>180,'max_students'=>45,'enrolled_students'=>42],
            ['code'=>'BSIS','name'=>'BS Information Systems','department'=>'CIT','description'=>'Study of information systems in organizations','units'=>180,'max_students'=>40,'enrolled_students'=>38],
            ['code'=>'BSECE','name'=>'BS Electronics Engineering','department'=>'COE','description'=>'Study of electronic systems','units'=>198,'max_students'=>40,'enrolled_students'=>35],
            ['code'=>'BSCE','name'=>'BS Civil Engineering','department'=>'COE','description'=>'Study of civil infrastructure','units'=>198,'max_students'=>40,'enrolled_students'=>40],
            ['code'=>'BSME','name'=>'BS Mechanical Engineering','department'=>'COE','description'=>'Study of mechanical systems','units'=>198,'max_students'=>35,'enrolled_students'=>30],
            ['code'=>'BSEd','name'=>'BS Education','department'=>'COEd','description'=>'Study of teaching and education','units'=>162,'max_students'=>50,'enrolled_students'=>47],
            ['code'=>'BSBA','name'=>'BS Business Administration','department'=>'CBA','description'=>'Study of business management','units'=>150,'max_students'=>55,'enrolled_students'=>52],
            ['code'=>'BSA','name'=>'BS Accountancy','department'=>'CBA','description'=>'Study of accounting principles','units'=>168,'max_students'=>45,'enrolled_students'=>43],
            ['code'=>'BSHRM','name'=>'BS Hotel & Restaurant Management','department'=>'CBA','description'=>'Study of hospitality management','units'=>156,'max_students'=>40,'enrolled_students'=>37],
            ['code'=>'BSN','name'=>'BS Nursing','department'=>'CN','description'=>'Study of nursing care','units'=>180,'max_students'=>60,'enrolled_students'=>58],
            ['code'=>'BSPHAR','name'=>'BS Pharmacy','department'=>'CN','description'=>'Study of pharmaceutical sciences','units'=>175,'max_students'=>35,'enrolled_students'=>33],
            ['code'=>'BSPSYCH','name'=>'BS Psychology','department'=>'CAS','description'=>'Study of human behavior','units'=>150,'max_students'=>50,'enrolled_students'=>45],
            ['code'=>'AB-COMM','name'=>'AB Communication','department'=>'CAS','description'=>'Study of communication arts','units'=>144,'max_students'=>45,'enrolled_students'=>41],
            ['code'=>'BSCRIM','name'=>'BS Criminology','department'=>'CC','description'=>'Study of crime and criminal justice','units'=>162,'max_students'=>50,'enrolled_students'=>49],
            ['code'=>'BSARCH','name'=>'BS Architecture','department'=>'COE','description'=>'Study of architectural design','units'=>210,'max_students'=>30,'enrolled_students'=>27],
            ['code'=>'BSFT','name'=>'BS Food Technology','department'=>'CAS','description'=>'Study of food science','units'=>165,'max_students'=>35,'enrolled_students'=>31],
            ['code'=>'BSENTREP','name'=>'BS Entrepreneurship','department'=>'CBA','description'=>'Study of entrepreneurship','units'=>150,'max_students'=>40,'enrolled_students'=>36],
            ['code'=>'BSMATH','name'=>'BS Mathematics','department'=>'CAS','description'=>'Study of mathematical theory','units'=>156,'max_students'=>30,'enrolled_students'=>24],
            ['code'=>'BSSTAT','name'=>'BS Statistics','department'=>'CAS','description'=>'Study of statistical analysis','units'=>156,'max_students'=>30,'enrolled_students'=>22],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}