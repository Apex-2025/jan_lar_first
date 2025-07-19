@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit task: {{ $task->name }}
        </div>

        <div class="panel-body">
            <!-- Отображение ошибок проверки ввода -->
            @include('common.errors')

            <!-- Форма новой задачи -->
            <form action="{{ route ('task.update', $task->id) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Имя задачи -->
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name', $task->name) }}">
                    </div>
                </div>

                <!-- Кнопка редагування задачи -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-pencil"></i> Update task
                        </button>
                        <a href="{{ route('task.index') }}" class="btn btn-secondary">
                            <i class="fa fa-btn fa-times"></i>Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>


@endsection