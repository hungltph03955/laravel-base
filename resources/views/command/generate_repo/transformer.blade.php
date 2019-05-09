/**
* {{$Module}}Transformer class
* Author: trinhnv
* Date: {{date('Y/m/d H:i')}}
*/

namespace App\Transformers;

use League\Fractal;
use App\Models\{{$Module}};

class {{$Module}}Transformer extends Fractal\TransformerAbstract
{
    public function transform({{$Module}} $item)
	{
		return $item->toArray();
	}
}
