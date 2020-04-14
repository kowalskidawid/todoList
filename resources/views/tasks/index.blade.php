@extends("layouts.app")

@section("content")
    <h2> Twoje zadania </h2>
    <table class="table">
        <thead>
            <tr>
                <th> LP.  </th>
                <th> Zadanie </th>
                <th> Zrobione </th>
                <th> Zobacz </th>
                <th> Edytuj </th>
                <th> Usuń </th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            @foreach($tasks as $task)
                <td>
                    <td> {{ $index }} </td>
                    <td> {{ $task->task  }} </td>
                    <td> <input type="checkbox"  @if($task->make) checked @endif disabled> </td>
                    <td> <a class="btn btn-primary" href="{{route("tasks.show", $task->id )}}"> Zobacz </a> </td>
                    <td> <a class="btn btn-secondary" href = "{{route("tasks.edit", $task->id )}}"> Edytuj </a> </td>
                    <td>
                        <form action="{{ route("tasks.destroy", $task->id ) }}" method="post">
                            @csrf
                            @method("delete")
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                <?php $index++ ?>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <a href= "{{ route("tasks.create")  }}" class="ml-auto btn btn-primary"> Create task </a>
    </div>
@endsection
