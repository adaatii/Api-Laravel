<?php

namespace App\Http\Controllers\Closeds\Backoffice;

use App\Services\Closeds\Backoffice\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function __construct(Request $request)
    {
        $this->service = (new UserService())->setData($request->all());
    }
}
