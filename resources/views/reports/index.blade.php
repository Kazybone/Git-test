<!DOCTYPE html>
<html>
<head>
    <title>Список заявлений</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-4">
        <h1>Список заявлений</h1>
        
        <a href="{{ route('reports.create') }}" class="btn btn-primary mb-3">Создать заявление</a>
        <div>
            <span>Сортировка по дате создания</span>
            <a href="{{ route('reports.index', ['sort' => 'asc', 'status'=> $status]) }}">Сначала старые</a>
            <a href="{{ route('reports.index', ['sort' => 'desc', 'status'=> $status]) }}">Сначала новые</a>
        </div>
        <div>
            <p>Фильтрация по статусу</p>
            <ul>
                @foreach($statuses as $status)
                <li>
                   <a href="{{ route('reports.index', ['sort' => $sort, 'status' => $status->id]) }}">
    {{ $status->name }}
</a>

                </li>
                @endforeach
            </ul>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($reports->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Номер автомобиля</th>
                        <th>Описание</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->number }}</td>
                        <td>{{ $report->description }}</td>
                        <td>{{ $report->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('reports.show', $report) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            
                            <form action="{{ route('reports.destroy', $report) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Вы уверены?')">Удалить</button>
                            </form>
                        </td>
                        <td>{{ $report->status->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        @else
            <div class="alert alert-info">
                Заявлений пока нет. <a href="{{ route('reports.create') }}">Создайте первое заявление</a>.
            </div>
        @endif
        <div class="mt-6">
    {{ $reports->links() }}
</div>
    </div>
</body>
</html>