<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        $slugs = [];
        $titles = [
            'Shirt On Hanger (Wash & Press )',
            'Shirt',
            'Pants/Shorts',
            'Top /Blouse',
            'Jacket/ Blazer',
            'Skirt',
            'Long Skirt',
            'Sweater',
            '3/4 Sweater/ long Sweater',
            'Outer Jacket',
            'Sweat shirt',
            'Jumpsuit',
            'Dress',
            'Long Dress',
            'Dress/Gown-Evening',
            '2 PCS Suit',
            'Vest',
            'Down/Winter Vest',
            'Coat',
            'Full Coat',
            'Scarf',
            'Tie',
            'Robe',
            'Down half Jacket',
            'Down 3/4 Jacket/ Full Jacket',
            'Pillow Case',
            'Blanket',
            'Comforter',
            'Down comforter',
            'Tablecloth'
        ];

        $titles2 =[
            'Wash & Fold',
            'Bleach for White',
            'Hang Dry Per Piece',
            'Bath Mat + Weight',
            'Small Pillow + Weight',
            'Large Pillow + Weight',
            'Sleeping Bag + Weight',
            'Mattress Pad ( Twin / Full Size ) + Weight',
            'Mattress Pad ( Queen / King Size ) + Weight',
            'Blanket ( Twin / Full Size ) + Weight',
            'Blanket ( Queen / King Size ) + Weight',
            'Comforter ( Twin / Full Size ) + Weight',
            'Comforter ( Queen / King Size ) + Weight',
            'Down Comforter ( Twin / Full Size ) + Weight' ,
            'Down Comforter ( Queen / King Size ) + Weight',
            'Laundry bag'
        ];


        $otherTitles = [
            'Preferred Laundry Detergent',
            'Preferred Laundry Detergent - Tide',
            'Preferred Laundry Detergent - Gain',
            'Preferred Laundry Detergent - Sensative Skin Detergent',
            'Preferred Laundry Detergent - Draft (Baby Detergent)',
            'Preferred Laundry Detergent - I will Provide',
            'Softener - Fregnance',
            'Softener - Unscented',
            'Softener - Unscented',
            'Softener - Downy',
            'Softener - Gain',
            'Softener - Suavited',
            'Wash Cycle - Heavy Soil',
            'Wash Cycle - Extra Rinse',
            'Laundry Sanitizing - (Kill 99.9% of Bacteria) $0.20/LB Additional',
            'Dry Temprature - High',
            'Dry Temprature - Medium',
            'Wash Cycle - Low',
            'Missed Pick Up/ Delivery'
        ];

        foreach($otherTitles as $index=>$item){
            $slugs[$index] = Str::slug($item, '-').'.jpg';
        }
        return $slugs;
    }
}
