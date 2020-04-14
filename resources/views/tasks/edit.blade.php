@extends("layouts.app")

@section("content")
    <h2>What do you have to do?</h2>
    <form action="{{route("tasks.update", $task->id)}}" method="post">
        @method("PATCH")
        @csrf
        <div class="form-group row">
            <label for="task" class="control-label col-sm-4">
                Task:
            </label>
            <input type="text" name="task" id = "task" class="form-control col-sm-8" value="{{ $task->task }}">
        </div>

        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="make" id="make" @if($task->make) checked @endif value="1">
            <label for="make" class="custom-control-label"> Done: </label>
        </div>

        <div class="mt-2 row">
            <a href="/" class="btn btn-danger mx-auto"> Cancel </a>
            <input type="submit" value="Save" class="btn-success btn mx-auto">
        </div>
    </form>
@endsection
