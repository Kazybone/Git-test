<!DOCTYPE html>
<html>
<head>
    <title>Редактирование заявления</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-4">
        <h1>Редактирование заявления</h1>
        
        <a href="{{ route('reports.index') }}" class="btn btn-secondary mb-3">← Назад к списку</a>

        <form action="{{ route('reports.update', $report) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="number" class="form-label">Номер автомобиля:</label>
                <input type="text" class="form-control @error('number') is-invalid @enderror" 
                       id="number" name="number" 
                       value="{{ old('cnumber', $report->number) }}" required>
                @error('number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание заявки:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="5" required>{{ old('description', $report->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">статус заявки</label>
                <input type="text" class="form-control @error('number') is-invalid @enderror" 
                       id="status" name="status" 
                       value="{{ old('cnumber', $report->number) }}" required>
                @error('number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Обновить</button>
        </form>
    </div>
</body>
</html>