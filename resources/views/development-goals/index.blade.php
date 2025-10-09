<x-layout :metaTitle="__('Цели развития')">
    <!-- Breadcrumbs -->
    <section class="bg-gray-100 py-3 border-b">
        <div class="max-w-7xl mx-auto px-4">
            <nav class="text-sm text-gray-500 flex flex-wrap items-center gap-x-2" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-shakarim-blue">{{ __('Главная страница') }}</a>
                <span>&#8250;</span>
                <a href="{{ route('menu.show', ['locale' => app()->getLocale(), 'menu' => 1]) }}" class="hover:text-shakarim-blue">{{ __('Университет') }}</a>
                <span>&#8250;</span>
                <span class="text-shakarim-blue font-semibold">{{ __('Цели развития') }}</span>
            </nav>
        </div>
    </section>

    <!-- Main Section -->
    <section class="bg-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Page Title -->
            <div class="mb-8 mt-2">
                <h1 class="text-2xl md:text-3xl font-heading font-bold text-shakarim-blue">
                    {{ __('Цели развития') }}
                </h1>
                <p class="text-gray-600 mt-2">{{ __('Цели устойчивого развития ООН в Шәкәрім Университет') }}</p>
            </div>

            <!-- Tab Navigation -->
            <div class="mb-6">
                <!-- Mobile horizontal tabs -->
                <div class="lg:hidden">
                    <div class="flex overflow-x-auto space-x-2 pb-2 border-b border-gray-200">
                        <button onclick="showDevTab('goals')" id="tab-goals" class="dev-tab-button active whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-bullseye mr-2"></i>{{ __('Цели ЦУР') }}
                        </button>
                        <button onclick="showDevTab('education')" id="tab-education" class="dev-tab-button whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-graduation-cap mr-2"></i>{{ __('Образование') }}
                        </button>
                        <button onclick="showDevTab('documents')" id="tab-documents" class="dev-tab-button whitespace-nowrap px-4 py-3 text-sm font-medium transition-colors border-b-2">
                            <i class="fas fa-file-pdf mr-2"></i>{{ __('Документы') }}
                        </button>
                    </div>
                </div>

                <!-- Desktop tabs -->
                <div class="hidden lg:block">
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8">
                            <button onclick="showDevTab('goals')" id="desktop-tab-goals" class="desktop-dev-tab-button active py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-bullseye mr-2"></i>{{ __('Цели устойчивого развития') }}
                            </button>
                            <button onclick="showDevTab('education')" id="desktop-tab-education" class="desktop-dev-tab-button py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-graduation-cap mr-2"></i>{{ __('Образование для УР') }}
                            </button>
                            <button onclick="showDevTab('documents')" id="desktop-tab-documents" class="desktop-dev-tab-button py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                                <i class="fas fa-file-pdf mr-2"></i>{{ __('Документы') }}
                            </button>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Tab Contents -->
            
            <!-- Tab 1: Goals (17 ЦУР) -->
            <div id="content-goals" class="dev-tab-content">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Левая панель - список целей -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow-lg p-6 sticky top-24 max-h-[80vh] overflow-y-auto">
                            <h2 class="text-xl font-bold text-gray-800 mb-6">{{ __('Список целей') }}</h2>
                            <div class="space-y-4">
                                @foreach($goals as $goal)
                                    <div class="goal-item cursor-pointer p-4 rounded-lg border hover:bg-gray-50 transition {{ $loop->first ? 'bg-blue-50 border-shakarim-blue' : 'border-gray-200' }}" 
                                         data-goal-id="{{ $goal->id }}">
                                        <div class="flex items-center space-x-4">
                                            @if($goal->thumbnail)
                                                <img src="{{ asset('storage/dev_goals/' . $goal->thumbnail) }}" 
                                                     alt="{{ $goal->title }}" 
                                                     class="w-16 h-16 object-cover rounded-lg">
                                            @endif
                                            <div class="flex-1">
                                                <h3 class="font-semibold text-gray-800 text-sm">{{ $goal->title }}</h3>
                                                <p class="text-gray-600 text-xs mt-1">{{ Str::limit(strip_tags($goal->content), 60) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Правая панель - контент цели -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-xl shadow-lg p-8">
                            <div id="goal-content">
                                @if($firstGoal)
                                    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ $firstGoal->title }}</h2>
                                    <div class="prose max-w-none">
                                        {!! $firstGoal->content !!}
                                    </div>
                                @else
                                    <p class="text-gray-500 text-center">{{ __('Цели развития не найдены') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 2: Education for SD -->
            <div id="content-education" class="dev-tab-content hidden">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Образование для устойчивого развития') }}</h2>
                    
                    <!-- Intro Text -->
                    <div class="prose max-w-none mb-8">
                        <div class="bg-blue-50 border-l-4 border-shakarim-blue p-6 rounded-r-lg my-6">
                            <h3 class="font-bold text-gray-800 mb-3">{{ __('Ключевые элементы образовательной политики:') }}</h3>
                            <ol class="space-y-3 text-gray-700">
                                <li>
                                    <strong>1. {{ __('Включение универсальных модулей об устойчивом развитии') }}</strong>
                                </li>
                                <li class="mt-4">
                                    <strong>2. {{ __('Реализация отдельных образовательных программ с фокусом на ЦУР') }}</strong>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <!-- Table Section -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('Образовательные программы по ЦУР') }}</h3>
                        <div class="overflow-x-auto shadow-md rounded-lg">
                            <table class="w-full border-collapse bg-white">
                                <thead>
                                    <tr class="bg-shakarim-blue text-white">
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">{{ __('ЦУР') }}</th>
                                        <th class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold">{{ __('Шифр и наименование ОП') }}</th>
                                        <th class="border border-gray-300 px-4 py-3 text-center text-sm font-semibold w-32">{{ __('Ссылка') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $currentGoalId = null;
                                    @endphp
                                    
                                    @forelse($educationProgramsFlat as $program)
                                        @php
                                            $isNewGoal = $currentGoalId !== $program->development_goal_id;
                                            $goalRowspan = $isNewGoal ? $educationProgramsFlat->where('development_goal_id', $program->development_goal_id)->count() : 0;
                                            if ($isNewGoal) {
                                                $currentGoalId = $program->development_goal_id;
                                            }
                                        @endphp
                                        
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            @if($isNewGoal)
                                                <td rowspan="{{ $goalRowspan }}" class="border border-gray-300 px-4 py-3 align-top bg-blue-50 font-medium text-sm">
                                                    {{ $program->developmentGoal->title }}
                                                </td>
                                            @endif
                                            
                                            <td class="border border-gray-300 px-4 py-3 text-sm">
                                                {{ $program->op }}
                                            </td>
                                            
                                            <td class="border border-gray-300 px-4 py-3 text-center">
                                                @if($program->link)
                                                    <a href="{{ $program->link }}" 
                                                    target="_blank"
                                                    class="inline-flex items-center px-3 py-1.5 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded text-xs transition-colors">
                                                        <i class="fas fa-external-link-alt mr-1"></i>
                                                        {{ __('Открыть') }}
                                                    </a>
                                                @else
                                                    <span class="text-gray-400 text-sm">—</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="border border-gray-300 px-4 py-8 text-center text-gray-500">
                                                {{ __('Образовательные программы не найдены') }}
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Documents -->
            <div id="content-documents" class="dev-tab-content hidden">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Документы') }}</h2>
                    
                    <!-- Regular Documents -->
                    @if($documents->count() > 0)
                        <div class="space-y-3 mb-8">
                            @foreach($documents as $doc)
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">{{ $doc->title }}</h3>
                                        <p class="text-xs text-gray-500">PDF {{ __('документ') }}</p>
                                    </div>
                                </div>
                                <a href="{{ $doc->getFileUrl() }}" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center px-4 py-2 bg-shakarim-blue hover:bg-shakarim-dark text-white rounded-lg transition text-sm">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    {{ __('Открыть') }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Reports Section (Expandable) -->
                    @if($reports->count() > 0)
                    <div class="mt-6">
                        <button onclick="toggleReports()" 
                                class="w-full flex items-center justify-between p-4 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition">
                            <div class="flex items-center">
                                <i class="fas fa-chart-line text-shakarim-blue mr-3 text-xl"></i>
                                <span class="font-semibold text-gray-800">{{ __('Отчеты о реализации политики устойчивого развития') }}</span>
                                <span class="ml-3 bg-shakarim-blue text-white text-xs px-2 py-1 rounded-full">{{ $reports->count() }}</span>
                            </div>
                            <i id="reports-icon" class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                        </button>
                        
                        <div id="reports-content" class="hidden mt-3 space-y-3 ml-4">
                            @foreach($reports as $report)
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-file-chart-line text-blue-500 text-2xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-medium text-gray-800">{{ $report->title }}</h3>
                                        <p class="text-xs text-gray-500">{{ __('Отчет') }} • PDF</p>
                                    </div>
                                </div>
                                <a href="{{ $report->getFileUrl() }}" 
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition text-sm">
                                    <i class="fas fa-external-link-alt mr-2"></i>
                                    {{ __('Открыть') }}
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Policies Section -->
                    @if(app()->getLocale() == 'en')
                    <div class="mt-8 space-y-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Sustainable Development Policies</h3>

                        <!-- 1. Modern Slavery Policy -->
                        <div>
                            <button onclick="togglePolicy('slavery')" 
                                    class="w-full flex items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition text-left">
                                <div class="flex items-center">
                                    <i class="fas fa-user-shield text-shakarim-blue mr-3 text-xl"></i>
                                    <span class="font-semibold text-gray-800">Modern Slavery Policy</span>
                                </div>
                                <i id="icon-slavery" class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                            </button>
                            
                            <div id="content-slavery" class="hidden mt-1 rounded-b-lg overflow-hidden">
                                <div class="p-6 bg-white border border-t-0 border-gray-200">
                                    <div class="text-gray-700 space-y-4 text-base">
                                        <p>Shakarim University interprets &lsquo;modern slavery&rsquo; as a crime that results in the violation of human rights and includes slavery, servitude, forced or compulsory labour and human trafficking.</p>
                                        <p>Accordingly, Shakarim University condemns modern slavery in all its forms, endeavours to protect and respect human rights and ensures that slavery and human trafficking have no place in Shakarim University's activities.</p>
                                        <p>Shakarim University works closely with the trade union body representing employees to develop and adopt appropriate employment policies and procedures and working conditions to prevent modern slavery.</p>
                                        <p>The activities of all structural units of Shakarim University are carried out in accordance with such values as ethics, the uniqueness of the personality of each employee and each student and the right to self-realisation and self-development, which exclude the possibility of modern slavery or human trafficking in the activities of Shakarim University.</p>
                                        <p>The University takes all appropriate measures to educate and inform staff about modern slavery and the corporate, social responsibility of Shakarim University in relation to this issue.</p>
                                        <p>As part of building partnerships, the University carries out due diligence to ensure that Shakarim University's partners exclude modern slavery in their operations in terms of the implementation of their policies, procedures and practices that fall within the scope of the partnership agreement.</p>
                                        <p>The University strictly complies with the principles of international law and the norms of the Republic of Kazakhstan legislation regarding forced and child labour. The University does not use child and forced labour and has zero tolerance for the use of child and forced labour.</p>
                                        
                                        <h4 class="text-lg font-bold pt-4">Scope and Purpose</h4>
                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                            <li>A strife of intrigued can be portrayed when a board part employment his or her position to impact university choices in arrange to buy and by advantage from exchange or deal.</li>
                                            <li>Purchases commissioned by the university from companies and associations in which it incorporates a coordinate or circuitous intrigued (shareholder or proprietor).</li>
                                            <li>Conflicts of intrigued emerge when the inclusion of university members in outside exercises essentially meddling with their essential commitments to the university: instructing, investigate and satisfaction of their individual commitments to students, colleagues and the university.</li>
                                        </ul>

                                        <h4 class="text-lg font-bold pt-4">Definitions</h4>
                                        <p class="font-semibold italic">Modern Slavery, Human Trafficking, and Child Labor</p>
                                        <p>The term `modern slavery` is an umbrella term covering numerous ill-defined hones. By and large included are human trafficking for sex, labor, or organs, constrained labor, fortified labor, descent-based labor, residential bondage, child labor, early (child), and constrained marriage. This list isn't comprehensive, and other shapes of present day subjugation and human trafficking incorporate the taking of babies and children for deal for appropriation, the entanglement of individuals in devout custom parts as well as those taken for devout customs that include shapes of human give up. Individuals who are casualties of present day subjugation and human trafficking are often among the foremost powerless in social orders. They include all ages, sexual orientations, ethnicities, and ideologies. The foremost helpless bunches incorporate outcasts and vagrants, minority bunches, ladies, children, and individuals encountering extraordinary poverty`.</p>
                                        <p class="italic">&lsquo;Employment Policy on the Exclusion of Modern Slavery&rsquo; ensures that every member of staff and student at Shakarim University has the right to be treated with respect and allows staff to disclose information without fear of punishment that they believe indicates abuse or illegal behaviour in the workplace. If instances of modern slavery or human trafficking are suspected, they must be reported. Employees may report confidentially and anonymously as follows:</p>
                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                            <li>University management and heads of structural units;</li>
                                            <li>to specialists in the department of the Centre for Monitoring the Quality of Education;</li>
                                            <li>or use any other acceptable method of informing Shakarim University employees.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Purchasing Policy -->
                        <div>
                            <button onclick="togglePolicy('purchasing')" 
                                    class="w-full flex items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition text-left">
                                <div class="flex items-center">
                                    <i class="fas fa-shopping-cart text-shakarim-blue mr-3 text-xl"></i>
                                    <span class="font-semibold text-gray-800">Purchasing Policy</span>
                                </div>
                                <i id="icon-purchasing" class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                            </button>
                            
                            <div id="content-purchasing" class="hidden mt-1 rounded-b-lg overflow-hidden">
                                <div class="p-6 bg-white border border-t-0 border-gray-200">
                                    <div class="text-gray-700 space-y-4 text-base">
                                        <h4 class="text-lg font-bold">General Provisions</h4>
                                        <p>The Sustainable Procurement Policy (hereinafter referred to as the Policy) is developed in the following areas in accordance with the legislation of the Republic of Kazakhstan, the NJSC Charter "Shakarim University" regulate the main relations at the organisation of Shakarim University procurement of goods, works and services necessary to ensure its activities.</p>
                                        <p><u><em>These Regulations have been developed in accordance with the following regulatory documents:</em></u></p>
                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                            <li>Civil Code of the Republic of Kazakhstan from 27.12.1994 № 268-XIII;</li>
                                            <li>Entrepreneurial Code of the Republic of Kazakhstan dated 29.10.2015 No. 375-V SAM;</li>
                                            <li>Law of the Republic of Kazakhstan dated 27.07.2007 No. 319-ІІІ "On Education."</li>
                                            <li>Law of the Republic of Kazakhstan from 18.02.2011 № 407-IV "On Science";</li>
                                            <li>Law of the Republic of Kazakhstan from04.12.2015 № 434-V "On the public procurement."</li>
                                            <li>Message of the President of the Republic of Kazakhstan to the people of Kazakhstan “Kazakhstan-2050 Strategy”.</li>
                                        </ul>

                                        <h4 class="text-lg font-bold pt-4">Purpose of procurement of Shakarim University</h4>
                                        <p>The purpose of procurement of Shakarim University is to ensure timely provision of its needs with goods, works and services on the basis of competitive and fair selection of suppliers and contractors on the most favourable terms.</p>
                                        <p>Shakarim University adheres to the policy of using transparent supplier selection procedures that ensure risk minimisation and cost-effective expenditure of funds for the purchase of goods, works and services.</p>
                                        <p>Shakarim University endeavours to achieve an appropriate balance between financial, environmental and social issues when procuring goods, services or work.</p>
                                        <p>Shakarim University is interested in building legitimate, sustainable and mutually beneficial partnerships with all stakeholders in accordance with the requirements of the legislation of the Republic of Kazakhstan.</p>

                                        <h4 class="text-lg font-bold pt-4">Shakarim University Procurement Principles</h4>
                                        <p>Shakarim University shall be guided by the following principles when carrying out procurement:</p>
                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                            <li>organisation of activities on placement of purchases for the supply of goods, works, services for the needs of Shakarim University in full compliance with the requirements of the legislation;</li>
                                            <li>increasing economic efficiency and social responsibility in procurement procedures;</li>
                                            <li>expanding opportunities for individual entrepreneurs and legal entities to participate in procurement;</li>
                                            <li>development of fair competition;</li>
                                            <li>ensuring publicity and transparency of procurement, ensuring openness of information by placing it in the unified information system;</li>
                                            <li>prevention of corruption and other abuses in procurement;</li>
                                            <li>compliance with basic health and safety standards;</li>
                                            <li>taking into account energy efficiency and innovative characteristics of purchased products.</li>
                                        </ul>

                                        <p><em><u>In the procurement process, Shakarim University seeks to give preference to suppliers and contractors who share the following business practice principles:</u></em></p>
                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                            <li>openness, equality and non-discrimination;</li>
                                            <li>ensuring a high level of competition;</li>
                                            <li>compliance with legislation and ethical standards for procurement activities the following activities are based on integrity, fairness and honesty in relationships with all stakeholders;</li>
                                            <li>compliance with occupational health and safety standards, protection environment, proper handling of hazardous substances, energy management quality and other standards adopted in the energy sector Shakarim University;</li>
                                            <li>commitment to a policy of improving management processes based on international standards, such as: ISO 9001 in the area of quality management, ISO 14001 in the field of environmental management, OHSAS 18001 in the field of employee health and safety, ISO 50001 in the field of energy management, "Guidelines on Social Management". responsibility" ISO 26000, AA 1000 in the field of interaction with Stakeholders, IFRS and GRI in the area of improvement financial and non-financial reporting process;</li>
                                            <li>consideration of environmental aspects, mitigation of negative impacts on environmental protection through modernisation of equipment and implementation of modern resource-saving, energy-efficient&nbsp;and&nbsp;more environmentally friendly programs. The use of the best practices in the field of environmental technologies, application of the best environmental practices management, as well as the formation of the necessary competences of staff in this area;</li>
                                            <li>acquisition of procurement items tending towards the minimum environmental impact, the production of which is carried out with a the use of environmentally friendly, recyclable raw materials.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Equality, Diversity and Inclusivity Policy -->
                        <div>
                            <button onclick="togglePolicy('edi')" 
                                    class="w-full flex items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg hover:bg-gray-100 transition text-left">
                                <div class="flex items-center">
                                    <i class="fas fa-users text-shakarim-blue mr-3 text-xl"></i>
                                    <span class="font-semibold text-gray-800">Equality, Diversity and Inclusivity Policy</span>
                                </div>
                                <i id="icon-edi" class="fas fa-chevron-down text-gray-600 transition-transform"></i>
                            </button>
                            
                            <div id="content-edi" class="hidden mt-1 rounded-b-lg overflow-hidden">
                                <div class="p-6 bg-white border border-t-0 border-gray-200">
                                    <div class="text-gray-700 space-y-4 text-base">
                                        <p>NJSC `University named after Shakarim&rsquo; was developed in accordance with the following Concept of Family and Gender Policy in the Republic of Kazakhstan until 2030.</p>
                                        <p>The implementation of the policy will contribute to the creation of conditions for the implementation of a favorable environment in which every employee and student has equal access to opportunities, participates in making decisions concerning their own lives without discrimination, regardless of origin, gender and health status. Shakarim University accepts diversity as a necessary condition for finding the best solutions to the country and global problems of the modern world.</p>
                                        
                                        <p><strong>To protect and improve equality, diversity and inclusion, Shakarim University's actions are aimed at:</strong></p>
                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                            <li>maintaining gender balance and creating equal business beliefs;</li>
                                            <li>achieving representation of women and men in equal positions and maintaining a balanced staff structure, including a diverse composition of human resources at all levels (senior management, middle and lower managers, faculty);</li>
                                            <li>ensuring equal representation of female and male in youth student organizations, the Council of Young Scientists Council, etc.;</li>
                                            <li>conducting scientific and sociological research in the field of gender, diversity and inclusion from an interdisciplinary perspective;</li>
                                            <li>introduction of equality, diversity and inclusion aspects in the development and implementation of educational programs University;</li>
                                        </ul>

                                        <p><strong>The University will give protection against unfair discrimination on the grounds of:</strong></p>
                                        <ul class="list-disc list-inside space-y-2 pl-4">
                                            <li>age</li>
                                            <li>disability</li>
                                            <li>ethnicity (including race, colour and nationality)</li>
                                            <li>gender</li>
                                            <li>gender reassignment</li>
                                            <li>marriage or civil partnership</li>
                                            <li>pregnancy or maternity</li>
                                            <li>religion, belief</li>
                                            <li>sexual orientation.</li>
                                        </ul>
                                        <p>The University recognizes that equality issues are complex, and that it has responsibilities to others, including, but not limited to, people with caring responsibilities and students who are leaving local authority care.</p>
                                        
                                        <h4 class="text-lg font-bold pt-4">Key Policy Principles:</h4>
                                        <p><strong>Non-Discrimination:</strong> Our university shall endeavor to create a safe and respectful environment where no one is discriminated against on the basis of race, ethnicity, gender, age, religion, disability, sexual orientation or other factors. All members of the community must be protected from any form of discrimination.</p>
                                        <p><strong>Equal Opportunities:</strong> to ensure equal opportunities for all members of the community in access to education, employment, professional development and opportunities to participate in decision-making, by eliminating systemic barriers and inequalities that may hinder the development of people from different groups.</p>
                                        <p><strong>Inclusive Education:</strong> to create educational programs that reflect the diversity of students and ensure their active participation in the learning process. Different learning styles, cultural backgrounds and needs of students should be taken into account so that everyone can reach their potential.</p>
                                        <p><strong>Promoting Diversity:</strong> to support diversity in its community by attracting and retaining students and staff from diverse backgrounds, experiences, cultures and opinions. This can be achieved through fair and objective admission, promotion and appointment processes.</p>
                                        <p><strong>Education and Awareness:</strong> to provide education and awareness of EDI principles to all members of the community. This may include training, seminars, conferences and other activities to raise awareness of the importance of equality, diversity and inclusion.</p>
                                        <p><strong>Monitoring and Evaluation:</strong> to monitor and evaluate its EDI efforts to ensure they are effective and to make necessary changes. Regular evaluations and feedback from students, staff and other stakeholders will help identify areas for improvement and develop specific actions.</p>
                                        
                                        <h4 class="text-lg font-bold pt-4">Consultation.</h4>
                                        <p>The University seeks to encourage the active engagement of students and staff in promoting equality, diversity and inclusion across a range of university functions, using feedback from students and employees, including potential complaints, to determine how the College's commitment to equity, diversity and inclusion can be more effectively achieved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Empty State -->
                    @if($documents->count() === 0 && $reports->count() === 0)
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <i class="fas fa-folder-open text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">
                                {{ __('Документы не найдены') }}
                            </h3>
                            <p class="text-gray-500">
                                {{ __('В настоящее время нет доступных документов') }}
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Tab styles */
        .dev-tab-button {
            color: #6b7280;
            border-color: transparent;
        }
        .dev-tab-button.active {
            color: #003163;
            border-color: #003163;
        }
        .dev-tab-button:hover:not(.active) {
            color: #003163;
            background-color: #f3f4f6;
        }

        .desktop-dev-tab-button {
            color: #6b7280;
            border-color: transparent;
        }
        .desktop-dev-tab-button.active {
            color: #003163;
            border-color: #003163;
        }
        .desktop-dev-tab-button:hover:not(.active) {
            color: #003163;
        }
        
        .dev-tab-content a {
            color: #0000EE;
        }

        /* Table responsive */
        @media (max-width: 768px) {
            table {
                font-size: 0.875rem;
            }
            th, td {
                padding: 0.5rem;
            }
        }
    </style>

    <script>
        // Tab switching
        function showDevTab(tabName) {
            document.querySelectorAll('.dev-tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            document.querySelectorAll('.dev-tab-button, .desktop-dev-tab-button').forEach(button => {
                button.classList.remove('active');
            });
            document.getElementById('content-' + tabName).classList.remove('hidden');
            const mobileBtn = document.getElementById('tab-' + tabName);
            const desktopBtn = document.getElementById('desktop-tab-' + tabName);
            if (mobileBtn) mobileBtn.classList.add('active');
            if (desktopBtn) desktopBtn.classList.add('active');
        }

        // Goals navigation (existing code)
        document.addEventListener('DOMContentLoaded', function() {
            const goalItems = document.querySelectorAll('.goal-item');
            const goalContent = document.getElementById('goal-content');

            const goalsData = {!! json_encode($goals->keyBy('id')->map(function($goal) {
                return [
                    'title' => $goal->title,
                    'content' => $goal->content
                ];
            })) !!};

            goalItems.forEach(item => {
                item.addEventListener('click', function() {
                    const goalId = this.dataset.goalId;
                    
                    goalItems.forEach(el => {
                        el.classList.remove('bg-blue-50', 'border-shakarim-blue');
                        el.classList.add('border-gray-200');
                    });
                    
                    this.classList.add('bg-blue-50', 'border-shakarim-blue');
                    this.classList.remove('border-gray-200');
                    
                    if (goalsData[goalId]) {
                        goalContent.innerHTML = `
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">${goalsData[goalId].title}</h2>
                            <div class="prose max-w-none">${goalsData[goalId].content}</div>
                        `;
                    }
                });
            });
        });

        // Toggle reports section
        function toggleReports() {
            const content = document.getElementById('reports-content');
            const icon = document.getElementById('reports-icon');
            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Toggle policy sections (NEW)
        function togglePolicy(policyName) {
            const content = document.getElementById('content-' + policyName);
            const icon = document.getElementById('icon-' + policyName);
            
            if (content && icon) {
                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            }
        }
    </script>
</x-layout>