<?php
namespace App\Repositories\todo;

use App\Repositories\RepositoryInterface;
use App\Http\Requests\TodoRequest;


interface TodoRepositoryInterface extends RepositoryInterface
{
    //ví dụ: lấy 5 sản phầm đầu tiên
    public function getTodo();

    public function storeTodo(TodoRequest $request);
}
