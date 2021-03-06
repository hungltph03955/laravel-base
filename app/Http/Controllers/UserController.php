<?php 
/**
* UserController
* Author: trinhnv
* Date: 2018/01/14 16:26
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\RESTActions;
use App\Traits\ParseRequestSearchAdmin;
use Illuminate\Http\Request;
use App\Repositories\Contracts\IUserRepository;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    use RESTActions;
    use ParseRequestSearchAdmin;

    public function __construct(IUserRepository $repository, UserTransformer $transformer)
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
