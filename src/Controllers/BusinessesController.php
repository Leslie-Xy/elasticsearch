<?php
/**
 * Created by PhpStorm.
 * User: whg
 * Date: 2019/7/17
 * Time: 14:59
 */
namespace Leslie\elasticsearch\Controllers;

use Cube\Ccp\Services\ccpService;
use Qiniu\Auth;
class BusinessesController extends BaseController
{

    public $ccpService;

    public function __construct(ccpService $ccpService)
    {
        $this->ccpService = $ccpService;
    }

    /**
     * 获取工程师授权业务列表
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBusinessesList()
    {
        $code = \Auth::user()->code;
        $businesses = $this->ccpService->getBusinessesList($code);
        return $this->success($businesses);
    }
}