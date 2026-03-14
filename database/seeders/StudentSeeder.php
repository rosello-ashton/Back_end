<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $firstNames = ['Juan','Maria','Jose','Ana','Carlos','Rosa','Miguel','Carmen','Luis','Elena','Pedro','Isabel','Diego','Sofia','Ricardo','Luz','Antonio','Marisol','Fernando','Gloria','Alberto','Patricia','Roberto','Josefa','Manuel','Eduardo','Corazon','Francisco','Andres','Teresita','Ernesto','Benito','Rodrigo','Armando','Ronaldo','Maricel','Bryan','Kristine','Kevin','Joanne','Mark','Jasmine','Ryan','Christine','John','Mary','James','Grace','Michael','Faith','Paul','Hope','David','Joy','Daniel','Angel','Joshua','Princess','Matthew','Andrew','Joseph','Sweet'];

        $lastNames = ['Santos','Reyes','Cruz','Bautista','Ocampo','Garcia','Torres','Flores','Lim','Tan','Ramos','DelaCtuz','Gonzales','Lopez','Hernandez','Perez','Rivera','Villanueva','Castillo','Morales','Aquino','Mendoza','Diaz','Ramirez','Navarro','Velasco','Robles','Aguilar','Pascual','Domingo','Fernandez','Guevara','Soriano','Peralta','Salazar','Espinosa','Tolentino','Cabrera','Mercado','Lagman'];

        $courses = ['BSIT','BSCS','BSIS','BSECE','BSCE','BSME','BSEd','BSBA','BSA','BSHRM','BSN','BSPHAR','BSPSYCH','AB-COMM','BSCRIM','BSARCH','BSFT','BSENTREP','BSMATH','BSSTAT'];

        $addresses = ['Davao City','Tagum City','Digos City','Mati City','Panabo City','General Santos','Cotabato City','Cagayan de Oro','Iligan City','Butuan City'];

        $statuses = ['Active','Active','Active','Active','Inactive','Graduated','Dropped'];

        $usedEmails = [];
        $usedIds = [];

        for ($i = 1; $i <= 500; $i++) {
            $firstName = $firstNames[array_rand($firstNames)];
            $lastName = $lastNames[array_rand($lastNames)];
            $course = $courses[array_rand($courses)];
            $yearLevel = rand(1, 4);
            $status = $statuses[array_rand($statuses)];

            $baseEmail = strtolower(substr($firstName, 0, 1) . $lastName . rand(10, 999)) . '@skye.edu.ph';
            $baseEmail = str_replace(' ', '', $baseEmail);
            while (in_array($baseEmail, $usedEmails)) {
                $baseEmail = strtolower(substr($firstName, 0, 1) . $lastName . rand(100, 9999)) . '@skye.edu.ph';
                $baseEmail = str_replace(' ', '', $baseEmail);
            }
            $usedEmails[] = $baseEmail;

            $year = rand(2020, 2024);
            $studentId = $year . '-' . str_pad($i, 5, '0', STR_PAD_LEFT);
            while (in_array($studentId, $usedIds)) {
                $studentId = $year . '-' . str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT);
            }
            $usedIds[] = $studentId;

            $enrollmentDate = Carbon::create(rand(2022, 2024), rand(1, 12), rand(1, 28));

            Student::create([
                'first_name'      => $firstName,
                'last_name'       => $lastName,
                'email'           => $baseEmail,
                'student_id'      => $studentId,
                'gender'          => rand(0, 1) ? 'Male' : 'Female',
                'birthday'        => Carbon::create(rand(2000, 2006), rand(1, 12), rand(1, 28)),
                'course'          => $course,
                'year_level'      => $yearLevel,
                'status'          => $status,
                'enrollment_date' => $enrollmentDate,
                'address'         => $addresses[array_rand($addresses)],
            ]);
        }
    }
}