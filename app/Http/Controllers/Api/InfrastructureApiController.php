<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfrastructureApiController extends Controller
{
    public function getInfrastructure(Request $request)
    {
        $lang = $request->get('lang', 'kk');
        if (!in_array($lang, ['kk', 'ru', 'en'])) $lang = 'kk';

        $baseUrl = asset('storage/carousel/');
        $pageUrl = asset('storage/pages/');

        $translate = function($kk, $ru, $en) use ($lang) {
            if ($lang === 'ru') return $ru;
            if ($lang === 'en') return $en;
            return $kk;
        };

        $data = [
            // 1. УЧЕБНЫЕ КОРПУСА (6 КОРПУСОВ + ЦЕНТР)
            'study_buildings' => [
                'title' => $translate('Оқу ғимараттары', 'Учебные корпуса', 'Academic Buildings'),
                'items' => [
                    [
                        'name' => $translate('Бас ғимарат', 'Главный корпус', 'Main Building'),
                        'address' => $translate('Глинка к. 20a', 'ул. Глинки 20а', '20a Glinka str.'),
                        'image' => $pageUrl . '/aa598816-554f-4fdc-ab9b-3ae2621a3e30.webp',
                        'virtual_tour' => 'http://tury.shakarim.kz/7%20%d0%ba%d0%be%d1%80%d0%bf%d1%83%d1%81/'
                    ],
                    [
                        'name' => $translate('№9 Оқу ғимараты', 'Учебный корпус №9', 'Academic Building №9'),
                        'address' => $translate('Физкультурная к. 4', 'ул. Физкультурная 4', '4 Fizkulturnaya str.'),
                        'image' => $pageUrl . '/d2761ff8-c568-4644-b0be-3a8ed89c9a75.webp',
                        'virtual_tour' => 'http://tury.shakarim.kz/9%20%d0%ba%d0%be%d1%80%d0%bf%d1%83%d1%81/'
                    ],
                    [
                        'name' => $translate('№3 Оқу ғимараты', 'Учебный корпус №3', 'Academic Building №3'),
                        'address' => $translate('Қашаған к. 2', 'ул. Кашагана 2', '2 Kashagan str.'),
                        'image' => $pageUrl . '/e42914df-4154-49a8-8557-fac68be5538e.webp',
                        'virtual_tour' => 'http://tury.shakarim.kz/3%20%d0%ba%d0%be%d1%80%d0%bf%d1%83%d1%81/'
                    ],
                    [
                        'name' => $translate('№5 Оқу ғимараты', 'Учебный корпус №5', 'Academic Building №5'),
                        'address' => 'Шугаев к. 159/3a',
                        'image' => $pageUrl . '/0abe81a6-c7af-442f-9e18-68d4621c5f77.webp',
                        'virtual_tour' => 'http://tury.shakarim.kz/5%20%d0%ba%d0%be%d1%80%d0%bf%d1%83%d1%81/'
                    ],
                    [
                        'name' => $translate('№6 Оқу ғимараты', 'Учебный корпус №6', 'Academic Building №6'),
                        'address' => 'Шугаев к. 159/3б',
                        'image' => $pageUrl . '/9fa70bde-e806-418c-8916-4d73cbbc8c43.webp',
                        'virtual_tour' => 'http://tury.shakarim.kz/6%20%d0%ba%d0%be%d1%80%d0%bf%d1%83%d1%81/'
                    ],
                    [
                        'name' => $translate('№8 Оқу ғимараты', 'Учебный корпус №8', 'Academic Building №8'),
                        'address' => 'Шугаев к. 159/3',
                        'image' => $pageUrl . '/d44d9e47-9ea3-4488-b207-3e850e081869.webp',
                        'virtual_tour' => 'http://tury.shakarim.kz/8%20%d0%ba%d0%be%d1%80%d0%bf%d1%83%d1%81/'
                    ]
                ]
            ],

            // 2. ОБЩЕЖИТИЯ (5 ШТУК + ТУРЫ + ФОТО)
            'dorms' => [
                'title' => $translate('Студенттер үйлері', 'Общежития', 'Dormitories'),
                'items' => [
                    [
                        'name' => $translate('Жатақхана №1', 'Общежитие №1', 'Dormitory №1'),
                        'address' => 'Физкультурная к. 2a',
                        'virtual_tour' => 'http://tury.shakarim.kz/%d0%9e%d0%b1%d1%89%d0%b5%d0%b6%d0%b8%d1%82%d0%b8%d0%b5%20%e2%84%961/',
                        'images' => [$baseUrl.'/01K9RWMQKBPVYYEK854STYPSQS.webp', $baseUrl.'/01K9RWMQSZGXN37FHZWWM9S0ZB.webp', $baseUrl.'/01K9RWMR0T5JMAEKBPBASK64Q5.webp']
                    ],
                    [
                        'name' => $translate('Жатақхана (Шұғаев)', 'Общежитие (Шугаева)', 'Dormitory (Shugayev)'),
                        'address' => 'Шугаев к. 159',
                        'virtual_tour' => 'http://tury.shakarim.kz/%d0%9d%d0%be%d0%b2%d0%be%d0%b5%20%d0%be%d0%b1%d1%89%d0%b5%d0%b6%d0%b8%d1%82%d0%b8%d0%b5/',
                        'images' => [$baseUrl.'/01K9RWPZPEQAJ5086BYFS091XS.webp']
                    ],
                    [
                        'name' => $translate('Жатақхана №3', 'Общежитие №3', 'Dormitory №3'),
                        'address' => 'Найманбаев к. 263',
                        'images' => [$baseUrl.'/01K9RWS3CGMB9WRB8DC3J57B0N.webp']
                    ],
                    ['name' => $translate('Жатақхана №4', 'Общежитие №4', 'Dormitory №4'), 'images' => [$baseUrl.'/01K9RWTSBKAKRGZBVDVRRJJVC8.webp']],
                    ['name' => $translate('Жатақхана №5', 'Общежитие №5', 'Dormitory №5'), 'images' => [$baseUrl.'/01K9RWWCX1FJ15PRY35VWAC98Q.webp']]
                ]
            ],

            // 3. СПОРТ (С ТУРАМИ)
            'sports' => [
                'title' => $translate('Спорт нысандары', 'Спортивные объекты', 'Sports Facilities'),
                'items' => [
                    [
                        'name' => $translate('Спорт кешені', 'Спорткомплекс', 'Sports Complex'),
                        'address' => 'Физкультурная к. 4б',
                        'virtual_tour' => 'http://tury.shakarim.kz/sports-complex',
                        'image' => $pageUrl . '/fa261823-86e8-4638-aa4e-b3fb936067d6.webp'
                    ],
                    [
                        'name' => $translate('Спорт кешені (Қашаған)', 'Спорткомплекс (Кашаган)', 'Sports Complex (Kashagan)'),
                        'address' => 'Қашаған к. 1',
                        'virtual_tour' => 'http://tury.shakarim.kz/sports-complex-from-kashaganov/',
                        'image' => $pageUrl . '/c68d81c6-5934-4590-a2a5-52a53adb4002.webp'
                    ]
                ]
            ],

            // 4. СТОЛОВЫЕ (ВСЕ 5 + 4 ФОТО В КАРУСЕЛИ)
            'canteens' => [
                'title' => $translate('Асханалар', 'Столовые', 'Canteens'),
                'list' => [
                    ['building' => $translate('№3 оқу ғимараты', 'Учебный корпус №3', 'Building №3'), 'seats' => 50, 'area' => '95.6'],
                    ['building' => $translate('№5 оқу ғимараты', 'Учебный корпус №5', 'Building №5'), 'seats' => 12, 'area' => '64.4'],
                    ['building' => $translate('№7 оқу ғимараты', 'Учебный корпус №7', 'Building №7'), 'seats' => 40, 'area' => '125.3'],
                    ['building' => $translate('№8 оқу ғимараты', 'Учебный корпус №8', 'Building №8'), 'seats' => 25, 'area' => '75.6'],
                    ['building' => $translate('№9 оқу ғимараты', 'Учебный корпус №9', 'Building №9'), 'seats' => 44, 'area' => '100'],
                ],
                'images' => [
                    $baseUrl . '/01KBF0SXX6FTRFDZ48Z60KB9T3.webp',
                    $baseUrl . '/01KC97KE6Q8E0ND7HE5NTT1N7B.webp',
                    $baseUrl . '/01KC97KEEVDZQH69YVNN2CR5CC.webp',
                    $baseUrl . '/01KC97KEPHWVG6JEDPMVB3MCRZ.webp'
                ]
            ],

            // 5. IT / ТИД
            'it_infrastructure' => [
                'computers' => [
                    'title' => $translate('Компьютерлік сыныптар', 'Компьютерные классы', 'Computer Classes'),
                    'total' => 1150,
                    'available' => 469,
                    'images' => [$baseUrl.'/01KC8R6JP6PJQSKKD4N3K6DJFM.webp', $baseUrl.'/01KC8R6MM83X74RCBDFB8408DW.webp', $baseUrl.'/01KC9A5D8364Z534YDWV85MZT8.webp']
                ],
                'coworking' => [
                    'title' => $translate('Коворкингтер', 'Коворкинги', 'Coworking Spaces'),
                    'images' => [$baseUrl.'/01KBF0JEHWH2FKXP4M09ZZQE0C.webp', $baseUrl.'/01KC6T1RK8V2GMKP6VWQE967HS.webp', $baseUrl.'/01KC6T1RXYRVP9YGZFMVG8VT23.webp']
                ]
            ],

            // 6. МЕДИЦИНА
            'medical' => [
                'title' => $translate('Медициналық пункттер', 'Медицинские пункты', 'Medical Centers'),
                'items' => [
                    ['name' => $translate('№3 оқу корпусы', 'Учебный корпус №3', 'Building №3'), 'address' => 'Қашғани к. 1'],
                    ['name' => $translate('№8 оқу корпусы', 'Учебный корпус №8', 'Building №8'), 'address' => 'Шугаев к. 159'],
                    ['name' => $translate('№1 спорт кешені', 'Спорткомплекс №1', 'Sports Complex №1'), 'address' => 'Физкультурная к. 4'],
                ],
                'images' => [$baseUrl.'/01KB51HY5VMGNAN4R8W4X7VGEM.webp', $baseUrl.'/01KB51HYBF23SSXSNSMKQTN16W.webp', $baseUrl.'/01KB51HYG4K71M0572ECBKKYSK.webp']
            ]
        ];

        return response()->json(['success' => true, 'data' => $data], 200, [], JSON_UNESCAPED_UNICODE);
    }
}