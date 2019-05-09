<?php 
/**
* UserRepository class
* Author: trinhnv
* Date: 2018/01/14 16:26
*/

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\IUserRepository;

class UserRepository extends AbstractRepository implements IUserRepository
{
     /**
     * Model name.
     *
     * @var  string
     */
	  protected $modelName = User::class;
}
