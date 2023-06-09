<?php

namespace App\Models;

use App\El\HasActiveAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;
    use HasActiveAttributes;

    public static function rules() {

    }


    /**
     * @return string []
     */
    public static function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User',
            'title' => 'Title',
            'content' => 'Контент',
            'created_at' => 'Дата создания',
            'published' => 'Опубликовано',
        ];
    }

    public static function sortAttributes() {
        return [
            'id',
            'user_id',
            'title',
            'created_at' => function ($query, $direction, $attributes) {
                return $query->orderBy('created_at', $direction);
            }
        ];
    }

    public static function filterAttributes() {
        return [
            'id',
            'user_id',
            'title' => 'like',
            //ToDo Period
            'created_at' => 'between',
            'alias' => function ($query, $attributes) {
                if ($attributes['alias'] == '1') {
                    $query->where('id', 5);
                }
                return $query;
            }
        ];
    }


}
