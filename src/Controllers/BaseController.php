<?php
/**
 * Created by PhpStorm.
 * User: xyz
 * Date: 2019-05-05
 * Time: 18:04
 */

namespace Leslie\elasticsearch\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
