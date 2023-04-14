<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class QueryBuilder {
    public static function build(Builder $query, $attributes) {
        $model = $query->getModel();

        $attributes = array_filter($attributes);
        //build where conditions
        $filterAttributes = [];
        foreach ($model::filterAttributes() as $key => $value) {
            if (is_numeric($key)) {
                $filterAttributes[$value] = '=';
            } else {
                $filterAttributes[$key] = $value;
            }
        }
        foreach ($attributes as $attribute => $value) {
            $currentCondition = $filterAttributes[$attribute] ?? false;
            if ($currentCondition) {
                if (is_callable($currentCondition)) {
                    $query = call_user_func($currentCondition, $query, $attributes);
                    continue;
                }
                if ($currentCondition == 'between') {
                    //by convention attributes are named {{field}}_from and {{field}}_to
                    $from = 0;
                    $to = 0;
                    continue;
                }
                if ($currentCondition == 'dateBetween') {
                    //by convention attributes are named {{field}}_from and {{field}}_to
                    $fromDate = new \Illuminate\Support\Carbon();
                    $toDate = new \Illuminate\Support\Carbon();
                    continue;
                }
                $query->where($attribute, $currentCondition, $value);
            }
        };
        //build sorting
        $sortAttributes = [];
        foreach ($model::sortAttributes() as $key => $value) {
            if (is_numeric($key)) {
                $sortAttributes[$value] = '';
            } else {
                $sortAttributes[$key] = $value;
            }
        }
        $sortAttribute = $attributes['sort'] ?? false;
        if ($sortAttribute) {
            $direction = 'asc';
            if (Str::startsWith($sortAttribute, '-')) {
                $direction = 'desc';
                $sortAttribute = Str::after($sortAttribute, '-');
            }
            if (in_array($sortAttribute, array_keys($sortAttributes))) {
                if ($sortAttributes[$sortAttribute] == '') {
                    $query->orderBy($sortAttribute, $direction);
                }
                if (is_callable($sortAttributes[$sortAttribute])) {
                    $query = call_user_func($sortAttributes[$sortAttribute], $query, $direction, $attributes);
                }
            }
        }
        return $query;
    }
}
