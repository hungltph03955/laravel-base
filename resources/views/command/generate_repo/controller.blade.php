/**
* {{$Module}}Controller
* Author: trinhnv
* Date: {{date('Y/m/d H:i')}}
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\RESTActions;
use App\Traits\ParseRequestSearchAdmin;
use Illuminate\Http\Request;
use App\Repositories\Contracts\I{{$Module}}Repository;
use App\Transformers\{{$Module}}Transformer;

class {{$Module}}Controller extends Controller
{
    use RESTActions;
    use ParseRequestSearchAdmin;

    public function __construct(I{{$Module}}Repository $repository, {{$Module}}Transformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    public function index(Request $request)
    {
        $criteria = $this->parseRequest($request);
        $collections = $this->repository->findBy($criteria);
        return $this->respondTransformer($collections);
    }
}
