<?php 
/**
* ProductModel class
* Author: trinhnv
* Date: 2019/05/09 16:18
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	  protected $table = 'product';

	  protected $primaryKey = 'id';

      protected $fillable = [
                        'id',
                        'name',
                        'price',
                        'description',
                ];
}
