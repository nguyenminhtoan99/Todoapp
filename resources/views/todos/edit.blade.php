@extends('todo')

@section('content')

<div class="w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="text-center border mt-5 p-2 shadow-lg">
        <h1 class="display-2 ">Edit todo</h1>
        <form action="{{route('todos.update', $todo->id)}}" method="POST">
            @csrf
            <div class="input-group mb-3 w-100">
                <input value="{{$todo->title}}" name="title" type="text" class="form-control" placeholder="Enter todo" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">EDIT</button>
                </div>
            </div>
            <span class="error-message text text-danger">{{ $errors->first('title') }}</span>
        </form>
    </div>
</div>
@endsection
