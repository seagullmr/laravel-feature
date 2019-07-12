<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Transformers\UserTransformer;

class DingosController extends Controller
{
    public function resArray()
    {
        $array = [
            'name' => '响应数组格式',
            'description' => '用于查看 Dingo 返回数组的形式'
        ];
        return $this->response->array($array);
    }

    /**
     * $ mkdir app/Transformers
     * $ touch app/Transformers/UserTransformer.php
     */
    public function transformer($id)
    {
        $user = User::query()->findOrFail($id);
        return $this->response->item($user, new UserTransformer());
    }

}
