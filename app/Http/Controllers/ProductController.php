<?php 
/**
* ProductController
* Author: trinhnv
* Date: 2019/05/09 16:18
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\RESTActions;
use App\Traits\ParseRequestSearchAdmin;
use Illuminate\Http\Request;
use App\Repositories\Contracts\IProductRepository;
use App\Transformers\ProductTransformer;

class ProductController extends Controller
{
    use RESTActions;
    use ParseRequestSearchAdmin;

    public function __construct(IProductRepository $repository, ProductTransformer $transformer)
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
