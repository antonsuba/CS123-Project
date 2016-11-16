<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Unit
{
    public $entity;
    public $properties;

    public function __construct($entity, $properties)
    {
        $this->entity = $entity + '';
        $this->load($properties);
    }

    public function load($properties){
        $p = new stdClass();

        $objectVars = get_object_vars($properties);

        $limit = count($objectVars);
        for($i = 0; $i < $limit; $i++){
            $p[$i] = $properties[$i];
        }

        $this->properties = p;
        return $this;
    }

    public function set($property, $value){
        return $this->property = $value;
    }

    public function unset($property){
        unset($this->properties[$property]);
        return $this->properties;
    }

    public function has($property){
        return property_exists($this->properties, $property);
    }

    public function get($property){
        return $this->properties[properties];
    }
}