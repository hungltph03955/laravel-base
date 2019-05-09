<?php 
/**
* ProductRepository class
* Author: trinhnv
* Date: 2019/05/09 16:18
*/

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\IProductRepository;

class ProductRepository extends AbstractRepository implements IProductRepository
{
     /**
     * Model name.
     *
     * @var  string
     */
	  protected $modelName = Product::class;
}
