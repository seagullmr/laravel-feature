<?php
// 模型基类: php artisan make:model Models/Model
namespace App\Models;

use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * App\Models\Model
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Model query()
 * @mixin \Eloquent
 */
class Model extends EloquentModel
{

}