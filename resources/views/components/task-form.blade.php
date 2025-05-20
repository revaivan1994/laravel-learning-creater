<form action="{{ route('tasks.store', $project) }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="task-name" class="form-label">Новая задача</label>
        <input type="text" name="name" id="task-name" class="form-control @error('name') is-invalid @enderror" placeholder="Введите название задачи">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
