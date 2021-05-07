<?php

namespace App\Repositories\todo;

use App\Repositories\BaseRepository;
use App\Repositories\todo\TodoRepositoryInterface;
use App\Http\Requests\TodoRequest;

use Illuminate\Support\Facades\Auth;

class TodoRepository extends BaseRepository implements TodoRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Todo::class;
    }

    public function getTodo()
    {
        return $this->model->where(['user_id' => Auth::user()->id])->simplePaginate(5);
    }

    public function storeTodo(TodoRequest $request)
    {
        $user = Auth::user();
        $todo = $this->model->insert([
            'title' => $request->title,
            'user_id' => $user->id,
        ]);
        return $todo;
    }


}
