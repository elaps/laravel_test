<?php

namespace App\El;

trait HasActiveAttributes {
    public static function attributeLabel($attribute):string{
        $attributeLabels = self::attributeLabels();
        if (!isset($attributeLabels[$attribute])){
            return $attribute;
        }
        return $attributeLabels[$attribute];
    }
}
