<?php

namespace Modules\Icommerceordertotal\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface IcommerceOrdertotalRepository extends BaseRepository
{

    public function calculate($parameters,$conf);
    
}
