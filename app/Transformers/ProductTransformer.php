<?php 
/**
* ProductTransformer class
* Author: trinhnv
* Date: 2019/05/09 16:18
*/

namespace App\Transformers;

use League\Fractal;
use App\Models\Product;

class ProductTransformer extends Fractal\TransformerAbstract
{
    public function transform(Product $item)
	{
		return $item->toArray();
	}
}
