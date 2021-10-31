<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\Page;

class PageRepository extends ModuleRepository
{
    

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
