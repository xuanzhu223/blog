<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    /**
     * 与模型关联的数据表。
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * 重定义主键
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['account','password'];

    /**
     * 不可批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];

}
