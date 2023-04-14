<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model {
    use HasFactory;

    public static function rules() {

    }

    public static function attributes() {

    }

    public static function attributeLabels() {

    }

    public static function sortAttributes() {
        return [
            'id',
            'user_id',
            'title',
            'created_at' => function ($query, $direction , $attributes) {
                return $query->orderBy('created_at', $direction);
            }
        ];
    }

    public static function filterAttributes() {
        return [
            'id',
            'user_id'=> 'between',
            'title' => 'like',
            'created_at' => 'dateBetween',
            'alias' => function ($query, $attributes) {
                if ($attributes['alias'] == '1') {
                    $query->where('id', 5);
                }
                return $query;
            }
        ];
    }

    /*
    public static function setAttributes($attributes,$scenario = 'default'){

    }

    public static function validate($scenario = 'default'){

    }
    */
}
