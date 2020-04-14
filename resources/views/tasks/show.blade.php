@extends("layouts.app")

@section("content")
    Task: {{ $task->task }}

    <div class="row">
        <a class="btn btn-danger mx-auto" href="{{route("tasks.index")}}"> Cancel </a>
        <a class="btn btn-primary mx-auto" href="{{ route("tasks.edit", $task->id)  }}"> Edit </a>
    </div>
@endsection
