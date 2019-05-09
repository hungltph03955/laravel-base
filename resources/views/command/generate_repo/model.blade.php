/**
* {{$Module}}Model class
* Author: trinhnv
* Date: {{date('Y/m/d H:i')}}
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class {{$Module}} extends Model
{
	  protected $table = '{{$table}}';

	  protected $primaryKey = 'id';

      protected $fillable = [
          @foreach($list_column as $column)
              '{{$column}}',
          @endforeach
      ];
}
