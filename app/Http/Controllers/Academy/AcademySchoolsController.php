<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class AcademySchoolsController extends Controller
{
    // Маппинг факультетов с их ID и логотипами
    private $faculties = [
        [
            'id' => 1,
            'logo' => 'schools/logo/ТИЗМ.png',
            'url' => 'https://rse.faculty.shakarim.kz',
            'instagram' => 'shakarim_food_engineering',
        ],
        [
            'id' => 4,
            'logo' => 'schools/logo/ВжАШЗМ.png',
            'url' => 'https://rsvma.faculty.shakarim.kz',
            'instagram' => 'shakarim_vet_agriculture',
        ],
        [
            'id' => 10,
            'logo' => 'schools/logo/ФжХҒЗМ.png',
            'url' => 'https://rspcs.faculty.shakarim.kz',
            'instagram' => 'shakarim_phys_chem',
        ],
        [
            'id' => 7,
            'logo' => 'schools/logo/ББЖМ.png',
            'url' => 'https://gse.faculty.shakarim.kz',
            'instagram' => 'shakarim_education',
        ],
        [
            'id' => 8,
            'logo' => 'schools/logo/Stem.png',
            'url' => 'https://gspms.faculty.shakarim.kz',
            'instagram' => 'shakarim_stem',
        ],
        [
            'id' => 9,
            'logo' => 'schools/logo/СжЖҒЖМ.png',
            'url' => 'https://gsns.faculty.shakarim.kz',
            'instagram' => 'shakarim_sports_nat_sciences',
        ],
        [
            'id' => 11,
            'logo' => 'schools/logo/ЦТжҚЖМ.png',
            'url' => 'https://gsaic.faculty.shakarim.kz',
            'instagram' => 'shakarim_digtech_civil_eng',
        ],
        [
            'id' => 12,
            'logo' => 'schools/logo/БжКЖМ.png',
            'url' => 'https://gsb.faculty.shakarim.kz',
            'instagram' => 'shakarim_business_com',
        ],
    ];

    public function index()
    {
        $locale = app()->getLocale();
        $lang = $locale === 'kz' ? 'kz' : ($locale === 'en' ? 'en' : 'ru');
        
        // Кешируем результат на 6 часов (21600 секунд)
        $schools = Cache::remember("schools_data_{$lang}", 21600, function () use ($lang) {
            $schoolsData = [];
            $apiUrl = env('SHAKARIM_API_URL') . '/site/faculties';
            
            // Параллельные запросы с оптимизацией
            $responses = Http::pool(fn ($pool) => 
                collect($this->faculties)->map(fn ($faculty) => 
                    $pool->as($faculty['id'])
                        ->timeout(2)
                        ->retry(1, 100) // 1 повторная попытка с задержкой 100ms
                        ->connectTimeout(1)
                        ->withHeaders([
                            'Accept' => 'application/json',
                            'Connection' => 'keep-alive'
                        ])
                        ->get($apiUrl, [
                            'facultyid' => $faculty['id'],
                            'lang' => $lang
                        ])
                )
            );
            
            foreach ($this->faculties as $faculty) {
                try {
                    $response = $responses[$faculty['id']];
                    
                    // Проверяем, что это успешный Response, а не Exception
                    if ($response instanceof \Illuminate\Http\Client\Response && $response->successful()) {
                        $data = $response->json();
                        $schoolsData[] = [
                            'name' => $data['facname'] ?? '',
                            'logo' => $faculty['logo'],
                            'url' => $faculty['url'] . '/' . $lang,
                            'email' => $data['email'] ?? '',
                            'phone' => $data['phone'] ?? '',
                            'instagram' => $faculty['instagram'] ?? '',
                            'students' => (int)($data['colstud'] ?? 0),
                            'teachers' => (int)($data['ppscount'] ?? 0),
                            'programs' => (int)($data['opcount'] ?? 0),
                            'departments' => (int)($data['colcaf'] ?? 0),
                        ];
                    } else {
                        $schoolsData[] = $this->getDefaultSchoolData($faculty, $lang);
                    }
                } catch (\Exception $e) {
                    Log::error('Error fetching faculty data: ' . $e->getMessage());
                    $schoolsData[] = $this->getDefaultSchoolData($faculty, $lang);
                }
            }
            
            return $schoolsData;
        });
        
        return view('academy.schools.index', compact('schools'));
    }
    
    private function getDefaultSchoolData($faculty, $lang)
    {
        return [
            'name' => 'Загрузка...',
            'logo' => $faculty['logo'],
            'url' => $faculty['url'] . '/' . $lang,
            'email' => '',
            'phone' => '',
            'instagram' => $faculty['instagram'] ?? '',
            'students' => 0,
            'teachers' => 0,
            'programs' => 0,
            'departments' => 0,
        ];
    }
}
