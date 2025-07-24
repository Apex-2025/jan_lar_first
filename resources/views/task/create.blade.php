@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Сreate a new task:</h4>
        </div>
        <div class="panel-body">
            @include('common.errors')

            <!-- Форма новой задачи -->
            <form action="{{ route ('task.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Имя задачи -->
                <div class="form-group">
                    <label for="task" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task" class="form-control" value="{{ old('name') }}">
                    </div>
                </div>

                <!-- Кнопка добавления задачи -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus"></i> Add task
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