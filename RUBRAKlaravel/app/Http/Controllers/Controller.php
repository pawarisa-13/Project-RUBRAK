<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
<<<<<<< Updated upstream
=======
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Storage;
>>>>>>> Stashed changes

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
