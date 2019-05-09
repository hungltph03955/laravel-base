<?php 
/**
* ProductClassRepository class
* Author: trinhnv
* Date: 2019/05/09 16:28
*/

namespace App\Repositories;

use App\Models\ProductClass;
use App\Repositories\Contracts\IProductClassRepository;

class ProductClassRepository extends AbstractRepository implements IProductClassRepository
{
     /**
     * Model name.
     *
     * @var  string
     */
	  protected $modelName = ProductClass::class;
}
