<?php

namespace Modules\Icommerceordertotal\Services;

use Modules\Icommerce\Repositories\ShippingMethodRepository;

class OrderTotalService
{

	private $shippingMethod;
	
	public function __construct(
       ShippingMethodRepository $shippingMethod
    ){
        $this->shippingMethod = $shippingMethod;
    }

    /*
    * Get shipping method by name
    */
	public function getShippingMethod()
    {

        $shippingName = config('asgard.icommerceordertotal.config.shippingName');
        
        $params = ['filter' => ['field' => 'name']];
        $shippingMethod = $this->shippingMethod->getItem($shippingName,json_decode(json_encode($params)));

        return $shippingMethod;

	}

   
}