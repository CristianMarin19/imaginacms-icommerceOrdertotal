<?php

namespace Modules\Icommerceordertotal\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Repositories
use Modules\Icommerceordertotal\Repositories\IcommerceOrdertotalRepository;
use Modules\Icommerce\Repositories\ShippingMethodRepository;

class IcommerceOrdertotalApiController extends BaseApiController
{

    private $icommerceordertotal;
    private $orderTotalService;
   
    public function __construct(
        IcommerceOrdertotalRepository $icommerceordertotal
    ){
        $this->icommerceordertotal = $icommerceordertotal;
        $this->orderTotalService = app('Modules\Icommerceordertotal\Services\OrderTotalService');
    }
    
     /**
     * Init data
     * @param Requests request
     * @param Requests array products - items (object)
     * @param Requests array products - total
     * @return mixed
     */
    public function init(Request $request){

        try {

            $shippingMethod = $this->orderTotalService->getShippingMethod();

            //Calculate
            $response = $this->icommerceordertotal->calculate($request->all(),$shippingMethod->options);

          } catch (\Exception $e) {
            //Message Error
            $status = 500;
            $response = [
              'errors' => $e->getMessage()
            ];
        }

        return response()->json($response, $status ?? 200);

    }
    
    

}