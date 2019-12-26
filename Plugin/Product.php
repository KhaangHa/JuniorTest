<?php
namespace Magenest\Junior\Plugin;
class Product{
    public function afterGetName($subject, $name){
        $addOn = '';
        $dayStart = $subject->getData('special_from_date');
        $dayEnd = $subject->getData('special_to_date');

        $validateStart = isset($dayStart) ? ($dayStart != null ? ($dayStart < date('Y-m-d') ? true : false) : true) : false;
        $validateEnd = isset($dayEnd) ? ($dayEnd != null ? ($dayEnd > date('Y-m-d') ? true : false) : true) : false;

        if($subject->getData('special_price') && $validateStart || $validateEnd)
            $addOn = "Special: ";
        return $addOn . $name;
    }


}