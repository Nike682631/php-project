<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model 
{

    protected $fillable = [
        'published',
        'title',
        'description',
         'position',
         'published',
        // 'featured',
        // 'publish_start_date',
        // 'publish_end_date',
    ];

    // uncomment and modify this as needed if you use the HasTranslation trait
     public $translatedAttributes = [
         'title',
         'description',
//         'active',
     ];
    
    // uncomment and modify this as needed if you use the HasSlug trait
     public $slugAttributes = [
         'title',
     ];

    // add checkbox fields names here (published toggle is itself a checkbox)
    public $checkboxes = [
        'published'
    ];

    // uncomment and modify this as needed if you use the HasMedias trait
    // public $mediasParams = [
    //     'cover' => [
    //         'default' => [
    //             [
    //                 'name' => 'landscape',
    //                 'ratio' => 16 / 9,
    //             ],
    //             [
    //                 'name' => 'portrait',
    //                 'ratio' => 3 / 4,
    //             ],
    //         ],
    //         'mobile' => [
    //             [
    //                 'name' => 'mobile',
    //                 'ratio' => 1,
    //             ],
    //         ],
    //     ],
    // ];
}
