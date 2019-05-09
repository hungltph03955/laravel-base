<?php 
/**
* ProductClassController
* Author: trinhnv
* Date: 2019/05/09 16:28
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\RESTActions;
use App\Traits\ParseRequestSearchAdmin;
use Illuminate\Http\Request;
use App\Repositories\Contracts\IProductClassRepository;
use App\Transformers\ProductClassTransformer;

class ProductClassController extends Controller
{
    use RESTActions;
    use ParseRequestSearchAdmin;

    public function __construct(IProductClassRepository $repository, ProductClassTransformer $transformer)
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
