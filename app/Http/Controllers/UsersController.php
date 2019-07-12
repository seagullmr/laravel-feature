<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Transformers\UserTransformer;
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
}
