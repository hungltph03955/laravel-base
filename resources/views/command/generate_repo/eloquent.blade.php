/**
* {{$Module}}Repository class
* Author: hunglt
* Date: {{date('Y/m/d H:i')}}
*/

namespace App\Repositories;

use App\Models\{{$Module}};
use App\Repositories\Contracts\I{{$Module}}Repository;

class {{$Module}}Repository extends AbstractRepository implements I{{$Module}}Repository
{
     /**
     * Model name.
     *
     * @var string
     */
	  protected $modelName = {{$Module}}::class;
}
