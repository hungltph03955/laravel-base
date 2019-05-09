<?php 
/**
* UserModel class
* Author: trinhnv
* Date: 2018/01/14 16:26
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	  protected $table = 'users';

	  protected $primaryKey = 'id';

      protected $fillable = [
                        'id',
                        'name',
                        'email',
                        'password',
                        'remember_token',
                        'created_at',
                        'updated_at',
                ];
}
