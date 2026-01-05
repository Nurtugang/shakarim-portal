<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoubleDegreeApiController extends Controller
{
    /**
     * Получить данные по программам двойного диплома
     * GET /api/double-degree?lang=kk
     */
    public function getPrograms(Request $request)
    {
        $lang = $request->get('lang', 'kk');
        if (!in_array($lang, ['kk', 'ru', 'en'])) $lang = 'kk';

        $baseUrl = asset('storage/images/');

        $data = [
            'kk' => [
                'sidebar_title' => 'Қосдипломды білім бағдарламасы',
                'tabs' => [
                    [
                        'title' => 'Жалпы ақпарат',
                        'content' => 'Шәкәрім университетіндегі қос дипломдық бағдарлама — қазақстандық жоғары білімнің халықаралық білім кеңістігіне интеграциясын дамытудың маңызды бағыты.',
                        'image' => $baseUrl . '/WhatsApp Image 2025-12-11 at 09.32.13.jpeg'
                    ],
                    [
                        'title' => 'KYUNGDONG UNIVERSITY',
                        'country' => 'Оңтүстік Корея',
                        'model' => '2+2 (Бакалавриат)',
                        'programs' => [
                            '6В06105 - Smart Computing',
                            '6В04106 - Business Administration',
                            '6В04107 - Hotel Management'
                        ],
                        'requirements' => 'IELTS 5.5, GPA 75%+',
                        'language' => 'Ағылшын'
                    ],
                    [
                        'title' => 'UNIVERSITY OF ECONOMY (WSG)',
                        'country' => 'Польша',
                        'model' => '1+1+1+1 (Бакалавриат)',
                        'programs' => ['Manager of Sports and Recreation'],
                        'language' => 'Орысша'
                    ],
                    [
                        'title' => 'ТОМСК ПОЛИТЕХНИКАЛЫҚ УНИВЕРСИТЕТІ',
                        'country' => 'Ресей',
                        'model' => '1+1 (Магистратура)',
                        'programs' => ['7М05302 - Техникалық физика'],
                        'language' => 'Орысша'
                    ],
                    [
                        'title' => 'NORTHWEST A&F UNIVERSITY',
                        'country' => 'Қытай',
                        'model' => '1+2 (Магистратура)',
                        'programs' => ['7M08201 - Мал шаруашылығы өнімдерінің технологиясы'],
                        'language' => 'Ағылшын'
                    ],
                    [
                        'title' => 'ТИАУШМИ',
                        'country' => 'Өзбекстан',
                        'model' => '2+2 (Бакалавриат)',
                        'programs' => ['Су ресурстары'],
                        'language' => 'Орысша'
                    ]
                ]
            ],
            'ru' => [
                'sidebar_title' => 'Программа двойного диплома',
                'tabs' => [
                    [
                        'title' => 'Общая информация',
                        'content' => 'Программа двойного диплома в Университете Шакарима — одно из важнейших направлений интеграции казахстанского образования в мировое пространство.',
                        'image' => $baseUrl . '/WhatsApp Image 2025-12-11 at 09.32.13.jpeg'
                    ],
                    [
                        'title' => 'KYUNGDONG UNIVERSITY',
                        'country' => 'Южная Корея',
                        'model' => '2+2 (Бакалавриат)',
                        'programs' => [
                            '6В06105 - Smart Computing',
                            '6В04106 - Business Administration',
                            '6В04107 - Hotel Management'
                        ],
                        'requirements' => 'IELTS 5.5, GPA 75%+',
                        'language' => 'Английский'
                    ],
                    [
                        'title' => 'UNIVERSITY OF ECONOMY (WSG)',
                        'country' => 'Польша',
                        'model' => '1+1+1+1 (Бакалавриат)',
                        'programs' => ['Менеджер спорта и рекреации'],
                        'language' => 'Русский'
                    ],
                    [
                        'title' => 'ТОМСКИЙ ПОЛИТЕХНИЧЕСКИЙ УНИВЕРСИТЕТ',
                        'country' => 'Россия',
                        'model' => '1+1 (Магистратура)',
                        'programs' => ['7М05302 - Техническая физика'],
                        'language' => 'Русский'
                    ],
                    [
                        'title' => 'NORTHWEST A&F UNIVERSITY',
                        'country' => 'Китай',
                        'model' => '1+2 (Магистратура)',
                        'programs' => ['7M08201 - Технология производства продуктов животноводства'],
                        'language' => 'Английский'
                    ],
                    [
                        'title' => 'НИУ «ТИИИМСХ»',
                        'country' => 'Узбекистан',
                        'model' => '2+2 (Бакалавриат)',
                        'programs' => ['Водные ресурсы'],
                        'language' => 'Русский'
                    ]
                ]
            ],
            'en' => [
                'sidebar_title' => 'Double Degree Programs',
                'tabs' => [
                    [
                        'title' => 'General Information',
                        'content' => 'The double degree program at Shakarim University is a key direction for integrating Kazakhstani higher education into the international space.',
                        'image' => $baseUrl . '/WhatsApp Image 2025-12-11 at 09.32.13.jpeg'
                    ],
                    [
                        'title' => 'KYUNGDONG UNIVERSITY',
                        'country' => 'South Korea',
                        'model' => '2+2 (Bachelor)',
                        'programs' => [
                            '6В06105 - Smart Computing',
                            '6В04106 - Business Administration',
                            '6В04107 - Hotel Management'
                        ],
                        'requirements' => 'IELTS 5.5, GPA 75%+',
                        'language' => 'English'
                    ],
                    [
                        'title' => 'UNIVERSITY OF ECONOMY (WSG)',
                        'country' => 'Poland',
                        'model' => '1+1+1+1 (Bachelor)',
                        'programs' => ['Manager of Sports and Recreation'],
                        'language' => 'Russian'
                    ],
                    [
                        'title' => 'TOMSK POLYTECHNIC UNIVERSITY',
                        'country' => 'Russia',
                        'model' => '1+1 (Master)',
                        'programs' => ['7М05302 - Technical Physics'],
                        'language' => 'Russian'
                    ],
                    [
                        'title' => 'NORTHWEST A&F UNIVERSITY',
                        'country' => 'China',
                        'model' => '1+2 (Master)',
                        'programs' => ['7M08201 - Technology of livestock products production'],
                        'language' => 'English'
                    ],
                    [
                        'title' => 'TIIAME National Research University',
                        'country' => 'Uzbekistan',
                        'model' => '2+2 (Bachelor)',
                        'programs' => ['Water Resources'],
                        'language' => 'Russian'
                    ]
                ]
            ]
        ];

        $result = $data[$lang] ?? $data['kk'];

        return response()->json([
            'success' => true,
            'language' => $lang,
            'data' => $result
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}