<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RatingsApiController extends Controller
{
    /**
     * Получить данные о рейтингах (2023-2026)
     * GET /api/ratings?lang=kk
     */
    public function getRatings(Request $request)
    {
        $lang = $request->get('lang', 'kk');

        $data = [
            '2026' => [
                'title' => $lang === 'kk' ? '2026 рейтингтері' : ($lang === 'en' ? '2026 Ratings' : 'Рейтинги 2026'),
                'items' => [
                    [
                        'name' => 'QS World University Rankings 2026',
                        'description' => $this->getDesc($lang, 'world_2026'),
                        'achievement' => $lang === 'kk' ? 'Топ-18% үздік университеттер' : ($lang === 'en' ? 'Top 18% of the world' : 'Топ-18% лучших вузов мира')
                    ],
                    [
                        'name' => 'QS Asia University Rankings 2026',
                        'description' => $this->getDesc($lang, 'asia_2026'),
                        'achievement' => $lang === 'kk' ? '493-орын (Азия)' : ($lang === 'en' ? '493rd place (Asia)' : '493-е место (Азия)')
                    ],
                    [
                        'name' => 'QS Sustainability Rankings 2026',
                        'description' => $this->getDesc($lang, 'sust_2026'),
                        'stats' => [
                            'Social Impact (Central Asia)' => '5th place',
                            'Environmental Research (Central Asia)' => '1st place',
                            'Governance (Asia)' => '258th place'
                        ]
                    ]
                ]
            ],
            '2025' => [
                'title' => $lang === 'kk' ? '2025 рейтингтері' : ($lang === 'en' ? '2025 Ratings' : 'Рейтинги 2025'),
                'items' => [
                    [
                        'name' => 'QS Asia University Rankings 2025',
                        'achievement' => '#501-520'
                    ],
                    [
                        'name' => 'GreenMetric World University Rankings 2025',
                        'achievement' => '538th place global, Top 5 Kazakhstan'
                    ],
                    [
                        'name' => 'THE Impact Rankings 2025',
                        'description' => $lang === 'kk' ? 'БҰҰ-ның Тұрақты даму мақсаттарына үлес.' : ($lang === 'en' ? 'UN SDG contribution debut.' : 'Дебют в рейтинге ЦУР ООН.')
                    ]
                ]
            ],
            '2024' => [
                'title' => $lang === 'kk' ? '2024 рейтингтері' : ($lang === 'en' ? '2024 Ratings' : 'Рейтинги 2024'),
                'items' => [
                    [
                        'name' => 'QS Stars International Ranking 2024',
                        'achievement' => '4 Stars',
                        'details' => [
                            '5 Stars' => ['Teaching', 'Employability', 'Social Impact'],
                            '4 Stars' => ['Infrastructure', 'Academic Development']
                        ]
                    ],
                    [
                        'name' => 'National H-index 2024',
                        'achievement' => '19th place among 84 universities'
                    ]
                ]
            ]
        ];

        return response()->json([
            'success' => true,
            'language' => $lang,
            'data' => $data
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    private function getDesc($lang, $key) {
        $texts = [
            'world_2026' => [
                'kk' => '19 маусым 2025 жылы университет ресми түрде QS World Rankings тізіміне енді.',
                'ru' => '19 июня 2025 года университет был официально включен в QS World Rankings.',
                'en' => 'On June 19, 2025, the university was officially included in the QS World Rankings.'
            ],
            'asia_2026' => [
                'kk' => 'Азияның үздік 1529 жоғары оқу орнының арасында 493-орын.',
                'ru' => '493-е место среди 1529 лучших вузов Азии.',
                'en' => '493rd place among 1,529 best universities in Asia.'
            ],
            'sust_2026' => [
                'kk' => 'Тұрақты даму бойынша Орталық Азиядағы көшбасшылық позициялар.',
                'ru' => 'Лидирующие позиции в Центральной Азии по устойчивому развитию.',
                'en' => 'Leading positions in Central Asia for sustainable development.'
            ]
        ];
        return $texts[$key][$lang] ?? $texts[$key]['kk'];
    }
}