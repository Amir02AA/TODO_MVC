<?php

namespace core;

abstract class Model
{
    public abstract function rules(): array;
    public function loadData($data){
        foreach ($data as $key=>$value){
            if (property_exists($this, $key))
                $this->{$key} = $value;
        }

    }

}