@extends('todo')

@section('content')


        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
            <div class="text-center border mt-5 p-2 shadow-lg">
                <h1 class="display-2 ">Todo App</h1>
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{route('todos.create')}}" method="POST">
                    @csrf
                    <div class="input-group mb-3 w-100">
                        <input name="title" value="{{old('title')}}" type="text" class="form-control" placeholder="Enter todo" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="button-addon2">ADD</button>
                        </div>
                    </div>
                    <span class="error-message text text-danger">{{ $errors->first('title') }}</span>
                </form>
                <h2 class=" pt-2">My todo list</h2>
                <div class="bg-white w-100 ">
                    @forelse ($todos as $todo)
                    <div class="w-100 d-flex align-items-center justify-content-between border mb-1">
                        <div class="p-4">
                            {{ $todo->title }}</div>
                        <div class="mr-4 d-flex align-items-center">
                            <a class="ml-2 text-warning" href="{{route('todos.edit', $todo->id)}}"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Are you sure you want to delete this item?');" class="ml-2 text-warning" href="{{route('todos.destroy', $todo->id)}}"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                    @empty
                    <p>Nothing todo</p>
                    @endforelse
                </div>
                <div class="h6 mt-3">{{ $todos->links() }}</div>

            </div>

        </div>



@endsection

