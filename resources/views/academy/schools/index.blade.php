<x-layout :metaTitle="__('Высшие/Исследовательские школы')">
   <!-- Breadcrumbs and Section -->
   <section class="bg-gray-100 py-3 border-b">
       <div class="max-w-7xl mx-auto px-4">
           <nav class="text-sm text-gray-500 flex items-center space-x-2" aria-label="Breadcrumb">
               <a href="#" class="hover:text-shakarim-blue">Главная страница</a>
               <span class="mx-1">&#8250;</span>
               <a href="#" class="hover:text-shakarim-blue">Академия</a>
               <span class="mx-1">&#8250;</span>
               <span class="text-shakarim-blue font-semibold">Высшие/Исследовательские школы</span>
           </nav>
       </div>
   </section>
   <section class="bg-white py-8">
       <div class="max-w-7xl mx-auto px-4">
           <h1 class="text-3xl md:text-4xl font-heading font-bold text-shakarim-blue mb-8">Высшие/Исследовательские школы</h1>
           
           <!-- Main Content -->
           <div class="main-content">
               <!-- Карточки школ -->
               <div class="space-y-6 md:space-y-8">
                   
                   <!-- Исследовательская школа пищевой инженерии -->
                   <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                       <div class="p-4 md:p-6">
                           <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                               <!-- Фото декана с именем -->
                               <div class="flex-shrink-0 mx-auto lg:mx-0">
                                   <div class="w-48 h-64 bg-shakarim-dark rounded-lg overflow-hidden">
                                       <img src="{{ Storage::url('schools/deans/nurymkhan_gulnur_nesiptayevna.webp') }}" alt="Нұрымхан Гүлнұр Несіптайқызы" class="w-full h-3/4 object-cover">
                                       <div class="h-1/4 bg-shakarim-dark p-3 flex flex-col justify-center">
                                           <h3 class="text-sm font-semibold text-white leading-tight text-center">Нұрымхан Гүлнұр Несіптайқызы</h3>
                                           <p class="text-xs text-gray-300 text-center">Декан</p>
                                       </div>
                                   </div>
                               </div>
                               
                               <!-- Основная информация -->
                               <div class="flex-1 min-w-0">
                                   <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                       <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">Исследовательская школа пищевой инженерии</h4>
                                       <a href="https://rse.faculty.shakarim.kz/ru" target="_blank" class="lg:flex-shrink-0">
                                           <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                               Перейти
                                           </button>
                                       </a>
                                   </div>
                                   
                                   <!-- Контакты -->
                                   <div class="mb-6">
                                       <div class="flex flex-col space-y-3">
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-phone mr-3 text-shakarim-blue w-4"></i>
                                               <span>+7 (708) 367-72-37</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-envelope mr-3 text-shakarim-blue w-4"></i>
                                               <span>engineering_research_school@shakarim.kz</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fab fa-instagram mr-3 text-shakarim-blue w-4"></i>
                                               <span>shakarim.ishpi</span>
                                           </div>
                                       </div>
                                   </div>
                                   
                                   <!-- Статистика -->
                                   <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">263</div>
                                           <div class="text-sm text-gray-600">Обучающихся</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">34</div>
                                           <div class="text-sm text-gray-600">ППС</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">10</div>
                                           <div class="text-sm text-gray-600">Образовательных программ</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">3</div>
                                           <div class="text-sm text-gray-600">Кафедр</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- Исследовательская школа ветеринарии и сельского хозяйства -->
                   <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                       <div class="p-4 md:p-6">
                           <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                               <div class="flex-shrink-0 mx-auto lg:mx-0">
                                   <div class="w-48 h-64 bg-shakarim-dark rounded-lg overflow-hidden">
                                       <img src="{{ Storage::url('schools/deans/suleimenov_shingys_kairatovich.webp') }}" alt="Сулейменов Шынгыс Кайратович" class="w-full h-3/4 object-cover">
                                       <div class="h-1/4 bg-shakarim-dark p-3 flex flex-col justify-center">
                                           <h3 class="text-sm font-semibold text-white leading-tight text-center">Сулейменов Шынгыс Кайратович</h3>
                                           <p class="text-xs text-gray-300 text-center">Декан</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="flex-1 min-w-0">
                                   <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                       <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">Исследовательская школа ветеринарии и сельского хозяйства</h4>
                                       <a href="https://rsvma.faculty.shakarim.kz/ru" target="_blank" class="lg:flex-shrink-0">
                                           <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                               Перейти
                                           </button>
                                       </a>
                                   </div>
                                   <div class="mb-6">
                                       <div class="flex flex-col space-y-3">
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-phone mr-3 text-shakarim-blue w-4"></i>
                                               <span>+7 7787774434</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-envelope mr-3 text-shakarim-blue w-4"></i>
                                               <span>vet_agriculture_research@shakarim.kz</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fab fa-instagram mr-3 text-shakarim-blue w-4"></i>
                                               <span>shakarim_vaa_rsh</span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">706</div>
                                           <div class="text-sm text-gray-600">Обучающихся</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">47</div>
                                           <div class="text-sm text-gray-600">ППС</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">11</div>
                                           <div class="text-sm text-gray-600">Образовательных программ</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">2</div>
                                           <div class="text-sm text-gray-600">Кафедр</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- Исследовательская школа физических и химических наук -->
                   <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                       <div class="p-4 md:p-6">
                           <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                               <div class="flex-shrink-0 mx-auto lg:mx-0">
                                   <div class="w-48 h-64 bg-shakarim-dark rounded-lg overflow-hidden">
                                       <img src="{{ Storage::url('schools/deans/kabdrakhimova_gaukhar_danilova.webp') }}" alt="Кабдрахимова Гаухар Даниловна" class="w-full h-3/4 object-cover">
                                       <div class="h-1/4 bg-shakarim-dark p-3 flex flex-col justify-center">
                                           <h3 class="text-sm font-semibold text-white leading-tight text-center">Кабдрахимова Гаухар Даниловна</h3>
                                           <p class="text-xs text-gray-300 text-center">Декан</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="flex-1 min-w-0">
                                   <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                       <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">Исследовательская школа физических и химических наук</h4>
                                       <a href="https://rspcs.faculty.shakarim.kz/ru" target="_blank" class="lg:flex-shrink-0">
                                           <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                               Перейти
                                           </button>
                                       </a>
                                   </div>
                                   <div class="mb-6">
                                       <div class="flex flex-col space-y-3">
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-phone mr-3 text-shakarim-blue w-4"></i>
                                               <span>+7 (747) 312-30-13</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-envelope mr-3 text-shakarim-blue w-4"></i>
                                               <span>phys_chem_research_school@shakarim.kz</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fab fa-instagram mr-3 text-shakarim-blue w-4"></i>
                                               <span>shakarim.fizhim</span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">380</div>
                                           <div class="text-sm text-gray-600">Обучающихся</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">26</div>
                                           <div class="text-sm text-gray-600">ППС</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">10</div>
                                           <div class="text-sm text-gray-600">Образовательных программ</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">2</div>
                                           <div class="text-sm text-gray-600">Кафедр</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- Высшая школа образования -->
                   <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                       <div class="p-4 md:p-6">
                           <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                               <div class="flex-shrink-0 mx-auto lg:mx-0">
                                   <div class="w-48 h-64 bg-shakarim-dark rounded-lg overflow-hidden">
                                       <img src="{{ Storage::url('schools/deans/kasymova_asem_alenovna.webp') }}" alt="Касымова Асем Аленовна" class="w-full h-3/4 object-cover">
                                       <div class="h-1/4 bg-shakarim-dark p-3 flex flex-col justify-center">
                                           <h3 class="text-sm font-semibold text-white leading-tight text-center">Касымова Асем Аленовна</h3>
                                           <p class="text-xs text-gray-300 text-center">Декан</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="flex-1 min-w-0">
                                   <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                       <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">Высшая школа образования</h4>
                                       <a href="https://gse.faculty.shakarim.kz/ru" target="_blank" class="lg:flex-shrink-0">
                                           <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                               Перейти
                                           </button>
                                       </a>
                                   </div>
                                   <div class="mb-6">
                                       <div class="flex flex-col space-y-3">
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-phone mr-3 text-shakarim-blue w-4"></i>
                                               <span>+77778543877</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-envelope mr-3 text-shakarim-blue w-4"></i>
                                               <span>education_school@shakarim.kz</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fab fa-instagram mr-3 text-shakarim-blue w-4"></i>
                                               <span>shakarim_vsho</span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">1278</div>
                                           <div class="text-sm text-gray-600">Обучающихся</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">104</div>
                                           <div class="text-sm text-gray-600">ППС</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">21</div>
                                           <div class="text-sm text-gray-600">Образовательных программ</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">7</div>
                                           <div class="text-sm text-gray-600">Кафедр</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- Высшая школа STEM - образования -->
                   <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                       <div class="p-4 md:p-6">
                           <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                               <div class="flex-shrink-0 mx-auto lg:mx-0">
                                   <div class="w-48 h-64 bg-shakarim-dark rounded-lg overflow-hidden">
                                       <img src="{{ Storage::url('schools/deans/satymbekov_maksatbek_nurgaliuli.webp') }}" alt="Сатымбеков Максатбек Нургалиулы" class="w-full h-3/4 object-cover">
                                       <div class="h-1/4 bg-shakarim-dark p-3 flex flex-col justify-center">
                                           <h3 class="text-sm font-semibold text-white leading-tight text-center">Сатымбеков Максатбек Нургалиулы</h3>
                                           <p class="text-xs text-gray-300 text-center">Декан</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="flex-1 min-w-0">
                                   <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                       <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">Высшая школа STEM - образования</h4>
                                       <a href="https://gspms.faculty.shakarim.kz/ru" target="_blank" class="lg:flex-shrink-0">
                                           <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                               Перейти
                                           </button>
                                       </a>
                                   </div>
                                   <div class="mb-6">
                                       <div class="flex flex-col space-y-3">
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-phone mr-3 text-shakarim-blue w-4"></i>
                                               <span>+7 (775) 792 33 34</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-envelope mr-3 text-shakarim-blue w-4"></i>
                                               <span>phys_math_school@shakarim.kz</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fab fa-instagram mr-3 text-shakarim-blue w-4"></i>
                                               <span>shakarim_fizmat</span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">393</div>
                                           <div class="text-sm text-gray-600">Обучающихся</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">25</div>
                                           <div class="text-sm text-gray-600">ППС</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">9</div>
                                           <div class="text-sm text-gray-600">Образовательных программ</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">2</div>
                                           <div class="text-sm text-gray-600">Кафедр</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- Высшая школа спорта и естественных наук -->
                   <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                       <div class="p-4 md:p-6">
                           <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                               <div class="flex-shrink-0 mx-auto lg:mx-0">
                                   <div class="w-48 h-64 bg-shakarim-dark rounded-lg overflow-hidden">
                                       <img src="{{ Storage::url('schools/deans/mukaev_zhandos_toleubekovich.webp') }}" alt="Мукаев Жандос Толеубекович" class="w-full h-3/4 object-cover">
                                       <div class="h-1/4 bg-shakarim-dark p-3 flex flex-col justify-center">
                                           <h3 class="text-sm font-semibold text-white leading-tight text-center">Мукаев Жандос Толеубекович</h3>
                                           <p class="text-xs text-gray-300 text-center">Декан</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="flex-1 min-w-0">
                                   <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                       <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">Высшая школа спорта и естественных наук</h4>
                                       <a href="https://gsns.faculty.shakarim.kz/ru" target="_blank" class="lg:flex-shrink-0">
                                           <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                               Перейти
                                           </button>
                                       </a>
                                   </div>
                                   <div class="mb-6">
                                       <div class="flex flex-col space-y-3">
                                           <div
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-phone mr-3 text-shakarim-blue w-4"></i>
                                               <span>+7 (777) 706-23-85</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-envelope mr-3 text-shakarim-blue w-4"></i>
                                               <span>natural_sciences_school@shakarim.kz</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fab fa-instagram mr-3 text-shakarim-blue w-4"></i>
                                               <span>shakarim_vshen</span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">600</div>
                                           <div class="text-sm text-gray-600">Обучающихся</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">36</div>
                                           <div class="text-sm text-gray-600">ППС</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">10</div>
                                           <div class="text-sm text-gray-600">Образовательных программ</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">2</div>
                                           <div class="text-sm text-gray-600">Кафедр</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- Высшая школа цифровых технологий и строительства -->
                   <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                       <div class="p-4 md:p-6">
                           <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                               <div class="flex-shrink-0 mx-auto lg:mx-0">
                                   <div class="w-48 h-64 bg-shakarim-dark rounded-lg overflow-hidden">
                                       <img src="{{ Storage::url('schools/deans/kozhakhmetova_dinara_oshanovna.webp') }}" alt="Кожахметова Динара Ошановна" class="w-full h-3/4 object-cover">
                                       <div class="h-1/4 bg-shakarim-dark p-3 flex flex-col justify-center">
                                           <h3 class="text-sm font-semibold text-white leading-tight text-center">Кожахметова Динара Ошановна</h3>
                                           <p class="text-xs text-gray-300 text-center">Декан</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="flex-1 min-w-0">
                                   <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                       <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">Высшая школа цифровых технологий и строительства</h4>
                                       <a href="https://gsaic.faculty.shakarim.kz/ru" target="_blank" class="lg:flex-shrink-0">
                                           <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                               Перейти
                                           </button>
                                       </a>
                                   </div>
                                   <div class="mb-6">
                                       <div class="flex flex-col space-y-3">
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-phone mr-3 text-shakarim-blue w-4"></i>
                                               <span>+7 (775) 433-44-95</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-envelope mr-3 text-shakarim-blue w-4"></i>
                                               <span>ai_construction_school@shakarim.kz</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fab fa-instagram mr-3 text-shakarim-blue w-4"></i>
                                               <span>shakarim_vsh_iis</span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">527</div>
                                           <div class="text-sm text-gray-600">Обучающихся</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">37</div>
                                           <div class="text-sm text-gray-600">ППС</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">12</div>
                                           <div class="text-sm text-gray-600">Образовательных программ</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">3</div>
                                           <div class="text-sm text-gray-600">Кафедр</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

                   <!-- Высшая школа бизнеса и коммуникации -->
                   <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                       <div class="p-4 md:p-6">
                           <div class="flex flex-col lg:flex-row lg:items-start space-y-6 lg:space-y-0 lg:space-x-6">
                               <div class="flex-shrink-0 mx-auto lg:mx-0">
                                   <div class="w-48 h-64 bg-shakarim-dark rounded-lg overflow-hidden">
                                       <img src="{{ Storage::url('schools/deans/zeynullina_aigul_zhumagaliyevna.webp') }}" alt="Зейнуллина Айгуль Жумагалиевна" class="w-full h-3/4 object-cover">
                                       <div class="h-1/4 bg-shakarim-dark p-3 flex flex-col justify-center">
                                           <h3 class="text-sm font-semibold text-white leading-tight text-center">Зейнуллина Айгуль Жумагалиевна</h3>
                                           <p class="text-xs text-gray-300 text-center">Декан</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="flex-1 min-w-0">
                                   <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between mb-6 space-y-4 lg:space-y-0">
                                       <h4 class="text-xl font-bold text-gray-800 leading-tight lg:flex-1 lg:pr-4">Высшая школа бизнеса и коммуникации</h4>
                                       <a href="https://gsb.faculty.shakarim.kz/ru" target="_blank" class="lg:flex-shrink-0">
                                           <button class="bg-shakarim-blue hover:bg-shakarim-dark text-white px-6 py-3 rounded-lg font-medium transition-colors w-full lg:w-auto">
                                               Перейти
                                           </button>
                                       </a>
                                   </div>
                                   <div class="mb-6">
                                       <div class="flex flex-col space-y-3">
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-phone mr-3 text-shakarim-blue w-4"></i>
                                               <span>+7 (702) 945-67-89</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fas fa-envelope mr-3 text-shakarim-blue w-4"></i>
                                               <span>business_school@shakarim.kz</span>
                                           </div>
                                           <div class="flex items-center text-sm text-gray-600">
                                               <i class="fab fa-instagram mr-3 text-shakarim-blue w-4"></i>
                                               <span>shakarim_bjm</span>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-users text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">449</div>
                                           <div class="text-sm text-gray-600">Обучающихся</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-chalkboard-teacher text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">31</div>
                                           <div class="text-sm text-gray-600">ППС</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-graduation-cap text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">9</div>
                                           <div class="text-sm text-gray-600">Образовательных программ</div>
                                       </div>
                                       <div class="text-center">
                                           <div class="flex justify-center mb-2">
                                               <i class="fas fa-building text-2xl text-shakarim-blue"></i>
                                           </div>
                                           <div class="text-2xl font-bold text-shakarim-blue">2</div>
                                           <div class="text-sm text-gray-600">Кафедр</div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
</x-layout>