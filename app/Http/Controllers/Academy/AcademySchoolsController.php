<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AcademySchoolsController extends Controller
{
    private $faculties = [
        ['id' => 1,  'logo' => 'schools/logo/ТИЗМ.png',  'url' => 'https://rse.faculty.shakarim.kz',    'instagram' => 'shakarim_food_engineering'],
        ['id' => 4,  'logo' => 'schools/logo/ВжАШЗМ.png', 'url' => 'https://rsvma.faculty.shakarim.kz',   'instagram' => 'shakarim_vet_agriculture'],
        ['id' => 10, 'logo' => 'schools/logo/ФжХҒЗМ.png',  'url' => 'https://rspcs.faculty.shakarim.kz',  'instagram' => 'shakarim_phys_chem'],
        ['id' => 7,  'logo' => 'schools/logo/ББЖМ.png',   'url' => 'https://gse.faculty.shakarim.kz',    'instagram' => 'shakarim_education'],
        ['id' => 8,  'logo' => 'schools/logo/Stem.png',   'url' => 'https://gspms.faculty.shakarim.kz',  'instagram' => 'shakarim_stem'],
        ['id' => 9,  'logo' => 'schools/logo/СжЖҒЖМ.png', 'url' => 'https://gsns.faculty.shakarim.kz',   'instagram' => 'shakarim_sports_nat_sciences'],
        ['id' => 11, 'logo' => 'schools/logo/ЦТжҚЖМ.png', 'url' => 'https://gsaic.faculty.shakarim.kz',  'instagram' => 'shakarim_digtech_civil_eng'],
        ['id' => 12, 'logo' => 'schools/logo/БжКЖМ.png',  'url' => 'https://gsb.faculty.shakarim.kz',    'instagram' => 'shakarim_business_com'],
    ];

    public function index()
    {
        $locale = app()->getLocale();
        $lang = $locale === 'kk' ? 'kz' : ($locale === 'en' ? 'en' : 'ru');

        $apiUrl = env('SHAKARIM_API_URL') . '/site/faculties/info.php';
        $schools = [];

        foreach ($this->faculties as $faculty) {

            try {
                $response = Http::timeout(5)->connectTimeout(3)->get($apiUrl, [
                    'facultyid' => $faculty['id'],
                    'lang'      => $lang
                ]);

                // Не успешный ответ API
                if (!$response->successful()) {
                    $schools[] = $this->getDefaultSchoolData($faculty, $lang);
                    continue;
                }

                // Успешный ответ
                $data = $response->json();

                $schools[] = [
                    'name'        => $data['name'] ?? '',
                    'logo'        => $faculty['logo'],
                    'url'         => $faculty['url'] . '/' . $lang,
                    'email'       => $data['email'] ?? '',
                    'phone'       => $data['phone'] ?? '',
                    'instagram'   => $faculty['instagram'] ?? '',
                    'students'    => (int)($data['students'] ?? 0),
                    'teachers'    => (int)($data['teachers'] ?? 0),
                    'programs'    => (int)($data['programs'] ?? 0),
                    'departments' => (int)($data['departments'] ?? 0),
                ];

            } catch (\Throwable $e) {
                Log::error("Faculty {$faculty['id']} request failed: " . $e->getMessage());
                $schools[] = $this->getDefaultSchoolData($faculty, $lang);
            }
        }

        return view('academy.schools.index', compact('schools'));
    }

    private function getDefaultSchoolData($faculty, $lang)
    {
        return [
            'name'        => '...',
            'logo'        => $faculty['logo'],
            'url'         => $faculty['url'] . '/' . $lang,
            'email'       => '',
            'phone'       => '',
            'instagram'   => $faculty['instagram'] ?? '',
            'students'    => 0,
            'teachers'    => 0,
            'programs'    => 0,
            'departments' => 0,
        ];
    }
}
