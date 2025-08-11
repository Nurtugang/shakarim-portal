<x-layout>

<div>
    <h1>{{ $structure->{'title_'.app()->getLocale()} }}</h1>
    
    <div>
        <img src="{{ $structure->filteredData->getPhoto() }}" alt="{{ $structure->filteredData->leader_name }}" style="width: 150px; height: 200px; object-fit: cover;">
        <h3>{{ $structure->filteredData->leader_name }}</h3>
        <p>{{ $structure->filteredData->leader_position }}</p>
        
        <div>
            <p>Телефон: {{ $structure->filteredData->phone }}</p>
            @if($structure->filteredData->phone_2)
                <p>Телефон 2: {{ $structure->filteredData->phone_2 }}</p>
            @endif
            <p>Email: {{ $structure->filteredData->email }}</p>
            <p>Адрес: {{ $structure->filteredData->address }}</p>
            <p>Кабинет: {{ $structure->filteredData->cabinet }}</p>
        </div>
    </div>

    @if($structure->filteredData->data)
        @foreach($structure->filteredData->data as $item)
            <div>
                <h3>{{ $item['title'] ?? 'Заголовок' }}</h3>
                <div>{!! $item['text'] ?? 'Текст не указан' !!}</div>
            </div>
        @endforeach
    @endif

    @if($structure->employees->count() > 0)
        <div>
            <h3>Сотрудники</h3>
            
            @foreach($structure->employees as $employee)
                <div>
                    <img src="{{ $employee->getPhoto() }}" alt="{{ $employee->{'fullname_'.app()->getLocale()} }}" style="width: 80px; height: 100px; object-fit: cover;">
                    <h4>{{ $employee->{'fullname_'.app()->getLocale()} }}</h4>
                    <p>{{ $employee->{'position_'.app()->getLocale()} }}</p>
                </div>
            @endforeach
        </div>
    @endif

</div>

</x-layout>