<?php

namespace Modules\Icommerceordertotal\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Icommerce\Entities\ShippingMethod;

class IcommerceordertotalSeeder extends Seeder
{
 

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        if(!is_module_enabled('Icommerceordertotal')){
            $this->command->alert("This module: Icommerceordertotal is DISABLED!! , please enable the module and then run the seed");
            exit();
        }

        $name = config('asgard.icommerceordertotal.config.shippingName');
        $shippingMethod =  app('Modules\Icommerceordertotal\Services\OrderTotalService')->getShippingMethod();
        
        //Validation if the module has been installed before
        if(!$shippingMethod){
          
            $options['init'] = "Modules\Icommerceordertotal\Http\Controllers\Api\IcommerceOrdertotalApiController";
            $options['mainimage'] = null;
            
            $options['orderTotalRanges'][0] = ['from' => 10000, 'to' => 50000, 'value' => 3000]; //Example

            $title = "icommerceordertotal::icommerceordertotals.single";
            $description = "icommerceordertotal::icommerceordertotals.description";

            $params = array(
                'name' => $name,
                'status' => 0,
                'options' => $options,
                'es' => ['title' => trans($title,[],'es'),'description' => trans($description,[],'es')],
                'en' => ['title' => trans($title,[],'en'),'description' => trans($description,[],'en')]
            );

            $shippingMethodCreated =  app('Modules\Icommerce\Repository\ShippingMethodRepository')->create($params);

        }
        
        
    }
    
}
