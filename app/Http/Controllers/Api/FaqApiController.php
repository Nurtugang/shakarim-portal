<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqApiController extends Controller
{
    /**
     * Получить полный список FAQ (14 вопросов на 3 языках)
     * GET /api/faq?lang=kk
     */
    public function getFaq(Request $request)
    {
        $lang = $request->get('lang', 'kk');

        $faqData = [
            'kk' => [
                ['id' => 1, 'question' => 'Университетке түсу үшін қандай құжаттар қажет?', 'answer' => 'Білімі туралы құжат (Аттестат) – түпнұсқасы, ҰБТ сертификаты, 075 нысандағы медициналық анықтама, Вакцинация паспорты (063), жеке куәлік көшірмесі, Фото 3*4 (6 дана), А5 конверт, Файл қалтасы.'],
                ['id' => 2, 'question' => 'Университет жатақхана береді ме және тұру құны қанша?', 'answer' => 'Иә, университет қала сыртындағы студенттерге жатақханадан орын береді. Тұру құны бөлменің түріне байланысты. Толық ақпаратты Студенттерді әлеуметтік қолдау орталығында білуге болады.'],
                ['id' => 3, 'question' => 'Өз университетіңізге басқа университеттен ауысуға бола ма?', 'answer' => 'Иә, басқа жоғары оқу орындарынан ауысуға болады. Процесс өтініш беруді, транскриптті және алдыңғы университеттен академиялық сертификатты ұсынуды қамтиды.'],
                ['id' => 4, 'question' => 'Өткен жылы мемлекеттік гранттардың өту баллдары қандай болды?', 'answer' => 'Өту баллдары жыл сайын өзгереді. Статистиканы веб-сайттан немесе қабылдау комиссиясынан алуға болады.'],
                ['id' => 5, 'question' => 'Құжаттарды тапсыру мерзімі қандай?', 'answer' => 'Әдетте құжаттарды қабылдау 20 маусымда басталып, 25 тамызға дейін жалғасады.'],
                ['id' => 6, 'question' => 'Сіздің университетте оқу құны қанша?', 'answer' => 'Бакалавриат: жылына 550-670 мың теңге. Магистратура: 650 000 теңге. Докторантура: 1 400 000 теңге.'],
                ['id' => 7, 'question' => 'Түлектерге жұмысқа орналасу үшін қандай мүмкіндіктер бар?', 'answer' => 'Университет жетекші кәсіпорындармен ынтымақтастықта. Жұмыспен қамту және мансап бөлімі бос орындар жәрмеңкесін өткізіп, жұмыс табуға көмектеседі.'],
                ['id' => 8, 'question' => 'Университет қандай студенттік өмірді ұсынады?', 'answer' => 'Спорт секциялары (футбол, баскетбол), шығармашылық үйірмелер (би, вокал, театр), дебат клубтары және волонтерлік қозғалыстар бар.'],
                ['id' => 9, 'question' => 'Екінші жоғары білім алуға бола ма?', 'answer' => 'Иә, диплом болған жағдайда болады. Оқу мерзімі мен шарттары таңдаған мамандыққа байланысты.'],
                ['id' => 10, 'question' => 'Университетте әскери кафедра бар ма?', 'answer' => 'Жоқ, өкінішке орай, біздің университетте әскери кафедра жоқ.'],
                ['id' => 11, 'question' => 'Халықаралық студенттер алмасу бағдарламалары бар ма?', 'answer' => 'Иә, академиялық ұтқырлық бағдарламалары және шетелдік серіктес университеттермен алмасу мүмкіндіктері бар.'],
                ['id' => 12, 'question' => 'Университетте докторантура (PhD) бағдарламалары бар ма?', 'answer' => 'Иә, бірқатар мамандықтар бойынша докторантура бағдарламалары ұсынылады.'],
                ['id' => 13, 'question' => 'Ерекше білім беру қажеттіліктері бар студенттерге қолдау көрсетіле ме?', 'answer' => 'Иә, инклюзивті орта құрылған. Жеке кеңестер, бейімделген материалдар мен техникалық қолдау көрсетіледі.'],
                ['id' => 14, 'question' => 'Қандай қосымша білім беру бағдарламалары бар?', 'answer' => 'Тіл курстары, кәсіби тренингтер және бағдарламалық қамтамасыз етумен жұмыс істеу курстары ұсынылады.'],
            ],
            'ru' => [
                ['id' => 1, 'question' => 'Какие документы необходимы для поступления?', 'answer' => 'Аттестат (оригинал), сертификат ЕНТ, медсправка 075, прививочный паспорт 063, копия удостоверения, фото 3*4 (6 шт), конверт А5, скоросшиватель.'],
                ['id' => 2, 'question' => 'Предоставляет ли университет общежитие?', 'answer' => 'Да, иногородним студентам предоставляются места. Стоимость зависит от условий. Подробности на сайте в разделе "Общежития".'],
                ['id' => 3, 'question' => 'Можно ли перевестись из другого вуза?', 'answer' => 'Да, перевод возможен при соответствии учебных программ. Требуется заявление, транскрипт и справка из предыдущего вуза.'],
                ['id' => 4, 'question' => 'Какие проходные баллы на грант были в прошлом году?', 'answer' => 'Баллы меняются ежегодно. Статистику по специальностям можно найти на сайте или в приемной комиссии.'],
                ['id' => 5, 'question' => 'Какие сроки подачи документов?', 'answer' => 'Прием документов обычно начинается 20 июня и продолжается до 25 августа.'],
                ['id' => 6, 'question' => 'Стоимость обучения в вашем ВУЗе?', 'answer' => 'Бакалавриат: 550-670 тыс. тенге в год. Магистратура: 650 000 тенге. Докторантура: 1 400 000 тенге.'],
                ['id' => 7, 'question' => 'Какие возможности для трудоустройства есть у выпускников?', 'answer' => 'Университет сотрудничает с ведущими предприятиями. Действует Отдел трудоустройства и карьеры, организующий ярмарки вакансий.'],
                ['id' => 8, 'question' => 'Какую студенческую жизнь предлагает университет?', 'answer' => 'Спортивные секции, творческие кружки (танцы, вокал, театр), дебатные клубы и волонтерские движения.'],
                ['id' => 9, 'question' => 'Можно ли получить второе высшее образование?', 'answer' => 'Да, при наличии диплома о высшем образовании. Сроки зависят от выбранной специальности.'],
                ['id' => 10, 'question' => 'Есть ли в университете военная кафедра?', 'answer' => 'Нет, к сожалению, в нашем университете отсутствует военная кафедра.'],
                ['id' => 11, 'question' => 'Есть ли программы обмена студентами?', 'answer' => 'Да, доступны программы академической мобильности и обмена с зарубежными вузами-партнерами.'],
                ['id' => 12, 'question' => 'Есть ли программы докторантуры (PhD)?', 'answer' => 'Да, университет предлагает программы докторантуры по ряду специальностей.'],
                ['id' => 13, 'question' => 'Как поддерживаются студенты с особыми потребностями?', 'answer' => 'Создана инклюзивная среда: индивидуальные консультации и адаптивные учебные материалы.'],
                ['id' => 14, 'question' => 'Какие курсы повышения квалификации предлагаются?', 'answer' => 'Языковые курсы, профессиональные тренинги и курсы по работе с ПО.'],
            ],
            'en' => [
                ['id' => 1, 'question' => 'What documents are required for admission?', 'answer' => 'School Certificate (original), UNT certificate, medical form 075, vaccination passport, ID copy, 6 photos (3*4), A5 envelope, file folder.'],
                ['id' => 2, 'question' => 'Does the university provide a dormitory?', 'answer' => 'Yes, for out-of-town students. Cost varies by room type. Details on the website in the "Dormitories" section.'],
                ['id' => 3, 'question' => 'Is it possible to transfer from another university?', 'answer' => 'Yes, based on curriculum compatibility. Application, transcript, and academic certificate are required.'],
                ['id' => 4, 'question' => 'What were the passing scores for grants last year?', 'answer' => 'Scores change annually. Statistics are available on the website or at the admissions office.'],
                ['id' => 5, 'question' => 'What are the deadlines for applications?', 'answer' => 'Acceptance usually starts on June 20 and continues until August 25.'],
                ['id' => 6, 'question' => 'What is the cost of studying?', 'answer' => 'Bachelor: 550,000-670,000 KZT/year. Master: 650,000 KZT. PhD: 1,400,000 KZT.'],
                ['id' => 7, 'question' => 'What employment opportunities are available?', 'answer' => 'The university cooperates with leading companies. The Career Department helps with job searches and job fairs.'],
                ['id' => 8, 'question' => 'What student life does the university offer?', 'answer' => 'Sports sections, creative clubs (dance, vocals, theater), debate clubs, and volunteer movements.'],
                ['id' => 9, 'question' => 'Can I get a second higher education?', 'answer' => 'Yes, with an existing degree. Terms depend on the chosen specialty.'],
                ['id' => 10, 'question' => 'Is there a military department?', 'answer' => 'No, unfortunately, there is no military department at our university.'],
                ['id' => 11, 'question' => 'Are there international exchange programs?', 'answer' => 'Yes, academic mobility and exchange programs with partner universities are available.'],
                ['id' => 12, 'question' => 'Does the university offer PhD programs?', 'answer' => 'Yes, the university offers PhD programs in several specializations.'],
                ['id' => 13, 'question' => 'How are students with special needs supported?', 'answer' => 'Inclusive environment, individual consultations, and adaptive learning materials are provided.'],
                ['id' => 14, 'question' => 'What additional education programs are offered?', 'answer' => 'Language courses, professional skills training, and software courses.'],
            ]
        ];

        $result = $faqData[$lang] ?? $faqData['kk'];

        return response()->json([
            'success' => true,
            'language' => $lang,
            'data' => $result
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}