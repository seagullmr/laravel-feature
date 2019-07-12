<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);
        // 生成数据集合
        $users = factory(User::class)
            ->times(10)
            ->make();
        // 让隐藏字段可见，并将数据集合转换为数组
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库
        User::query()->insert($user_array);
        // 将第一条数据更新为自己
        $user = User::query()->find(1);
        $user->name = 'seagull';
        $user->email = 'seagullmr@163.com';
        $user->save();
    }
}
