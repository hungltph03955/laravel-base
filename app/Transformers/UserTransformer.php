<?php 
/**
* UserTransformer class
* Author: trinhnv
* Date: 2018/01/14 16:26
*/

namespace App\Transformers;

use League\Fractal;
use App\Models\User;

class UserTransformer extends Fractal\TransformerAbstract
{
    public function transform(User $item)
	{
		return $item->toArray();
	}
}
