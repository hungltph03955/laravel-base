<?php 
/**
* ProductClassModel class
* Author: trinhnv
* Date: 2019/05/09 16:28
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductClass extends Model
{
	  protected $table = 'product_class';

	  protected $primaryKey = 'id';

      protected $fillable = [
                        'id',
                        'name',
                        'price',
                        'description',
                ];
}
