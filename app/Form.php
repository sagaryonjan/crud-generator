<?php

namespace App;


use BadMethodCallException;
use Closure;
use Illuminate\Support\Arr;

class Form {

    /**
     * Dynamically handle calls to the class.
     *
     * @param  string  $type
     * @param  array   $value
     * @param  array   $attributes
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public static function __callStatic($type, $attributes)
    {
        $value = Arr::first($attributes);
        array_shift($attributes);
        $attributes = Arr::first($attributes);
        $tag = '<';


        if($type == 'textarea') {
            $tag .= $type.' ';
        } else {
            $tag .= 'input ';
            $attributes['type'] = $type;
            $attributes['value'] = $value;
        }
        $dataAttributes = array_map(function ($value, $key) {
            return $key . '="' . $value . '"';
        }, array_values($attributes), array_keys($attributes));

        $tag .= implode(' ', $dataAttributes);
        $tag .= '>';
        if($type == 'textarea') {
            if($value) {
                $tag .= $value;
            }
            $tag .='</textarea>';
        }

        return $tag;


    }



}