<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AcademyApiController extends Controller
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

    /**
     * Получить список всех школ (факультетов) с данными из внешнего API
     * GET /api/academy/schools?lang=kk
     */
    public function getSchools(Request $request)
    {
        $locale = $request->get('lang', 'kk');
        // Сопоставление языков для внешнего API
        $lang = $locale === 'kk' ? 'kz' : ($locale === 'en' ? 'en' : 'ru');

        $apiUrl = 'https://api.semgu.kz/site/faculties/info.php';
        $schools = [];

        foreach ($this->faculties as $faculty) {
            try {
                $response = Http::timeout(5)->get($apiUrl, [
                    'facultyid' => $faculty['id'],
                    'lang'      => $lang
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $schools[] = [
                        'id'          => $faculty['id'],
                        'name'        => $data['name'] ?? '...',
                        'logo'        => asset('storage/' . $faculty['logo']), // Полная ссылка на картинку
                        'url'         => $faculty['url'] . '/' . $lang,
                        'email'       => $data['email'] ?? '',
                        'phone'       => $data['phone'] ?? '',
                        'instagram'   => $faculty['instagram'],
                        'stats' => [
                            'students'    => (int)($data['students'] ?? 0),
                            'teachers'    => (int)($data['teachers'] ?? 0),
                            'programs'    => (int)($data['programs'] ?? 0),
                            'departments' => (int)($data['departments'] ?? 0),
                        ]
                    ];
                } else {
                    $schools[] = $this->getDefaultData($faculty, $lang);
                }
            } catch (\Throwable $e) {
                Log::error("API Error for Faculty {$faculty['id']}: " . $e->getMessage());
                $schools[] = $this->getDefaultData($faculty, $lang);
            }
        }

        return response()->json([
            'success' => true,
            'language' => $locale,
            'data' => $schools
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    private function getDefaultData($faculty, $lang)
    {
        return [
            'id'          => $faculty['id'],
            'name'        => '...',
            'logo'        => asset('storage/' . $faculty['logo']),
            'url'         => $faculty['url'] . '/' . $lang,
            'email'       => '',
            'phone'       => '',
            'instagram'   => $faculty['instagram'],
            'stats' => [
                'students' => 0, 'teachers' => 0, 'programs' => 0, 'departments' => 0
            ]
        ];
    }
}