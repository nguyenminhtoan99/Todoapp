@extends('todo')

@section('content')

    {{-- <div class="container-fluid bg-primary"> --}}
        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
            <div class="text-center">
                <h1 class="display-2 ">Todo App</h1>
                <form action="{{route('todos.create')}}" method="POST">
                    @csrf
                    <div class="input-group mb-3 w-100">
                        <input name="title" type="text" class="form-control" placeholder="Enter todo" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="button-addon2">ADD</button>
                        </div>
                    </div>
                </form>
                <h2 class=" pt-2">My todo list</h2>
                <div class="bg-white w-100 ">
                    @forelse ($todos as $todo)
                    <div class="w-100 d-flex align-items-center justify-content-between bg-info">
                        <div class="p-4">
                            @if ($todo->completed==0)
                            <i class="fa fa-chevron-right"></i>
                            @else
                            <i class="fa fa-check"></i>
                            @endif
                            {{ $todo->title }}</div>

                        <div class="mr-4 d-flex align-items-center">
                            @if ($todo->completed==0)
                            <form action="{{route('todos.update', $todo->id)}}" method="POST">
                                @csrf
                                <input type="text" name="completed" value="1" hidden>
                                <button class="btn btn-success" >Mark it as completed</button>
                            </form>
                            @else
                            <form action="{{route('todos.update', $todo->id)}}" method="POST">
                                @csrf
                                <input type="text" name="completed" value="0" hidden>
                                <button class="btn btn-warning" >Mark it as uncompleted</button>
                            </form>
                            @endif
                            <a class="ml-2 text-warning" href="{{route('todos.edit', $todo->id)}}"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Are you sure you want to delete this item?');" class="ml-2 text-warning" href="{{route('todos.destroy', $todo->id)}}"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                    @empty
                    <p>Nothing todo</p>
                    @endforelse

                </div>
            </div>

        </div>
    {{-- </div> --}}


@endsection

