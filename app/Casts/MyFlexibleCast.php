<?php

namespace App\Casts;

use Whitecube\NovaFlexibleContent\Value\FlexibleCast;

class MyFlexibleCast extends FlexibleCast
{
    protected $layouts = [
        'content1' => \App\Nova\Flexible\Layouts\Content1Layout::class,
        'video' => \App\Nova\Flexible\Layouts\VideoLayout::class,
    ];
}
