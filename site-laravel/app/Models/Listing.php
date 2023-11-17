<?php

namespace App\Models;

use PhpParser\Node\Stmt\Foreach_;

class Listing {
    public static function all(){
       return [



        [
        'id'=> 1,
        'title'=> "Liating One",
        'description' => 'lorem ipsumsdsdsd sdfsdf'
    ],
    [
            'id'=> 2,
            'title'=> "Listing Two",
            'description' => 'lorem ipsumsdsdsd sdfsdf sdadsad'
    ]
    ] ;
    }

    public static function find($id){
        $listings = self::all();
    
        foreach ($listings as $listing) {
           if($listing['id'] == $id){
            return $listing;
           }
        }
     
}
}