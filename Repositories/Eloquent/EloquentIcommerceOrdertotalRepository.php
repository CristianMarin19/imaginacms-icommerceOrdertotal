<?php

namespace Modules\Icommerceordertotal\Repositories\Eloquent;

use Modules\Icommerceordertotal\Repositories\IcommerceOrdertotalRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentIcommerceOrdertotalRepository extends EloquentBaseRepository implements IcommerceOrdertotalRepository
{

    function calculate($parameters,$conf){
         
        $orderTotal = $parameters['products']['total'];
        $orderValuesRanges = $conf->orderTotalRanges;

        $shippingValue = 0;
        //Check each range
        foreach ($orderValuesRanges as $key => $range) {

            //\Log::info("Range: ".json_encode($range));
        
            //Case - Between - Desde xxx Hasta xxx
            if(isset($range->from) && isset($range->to)){
                if($orderTotal>=$range->from && $orderTotal<=$range->to){
                     $shippingValue = $range->value; 
                     break;
                }
            }else{
                //Case - From - Mayores a
                if(isset($range->from) && $orderTotal>$range->from){
                    $shippingValue = $range->value;
                }else{
                    //Case - to - Menores a 
                    if(isset($range->to) && $orderTotal<$range->to){
                        $shippingValue = $range->value;
                    }
                }
            }   
              
        }

        //============= Standart Response
        $response["status"] = "success";
        $response["items"] = null;    

        //============= Final Price
        $response["price"] = $shippingValue;
        $response["priceshow"] = true;

        return $response;

    }

}
