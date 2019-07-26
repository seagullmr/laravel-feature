<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Transformers\UserTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(User $user)
    {
        $users = $user->query()->paginate(5);
        return $this
            ->response
            ->paginator($users, new UserTransformer())
            ->setMeta(['superman'=> [
                'name' => 'seagull',
                'sex' => '男',
                'description' => '高富帅',
            ]]);
    }

    public function show($id)
    {
        $user = User::query()->findOrFail($id);
        return $this->response->array($user->toArray());
    }

    public function search(User $user)
    {
        $list = $user::query()->whereBetween('updated_at', ['1995-03-26', Carbon::today()])->get();
        return $this->response->array($list->toArray());
    }
}
