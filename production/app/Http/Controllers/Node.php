<?php

class Node extends Unit
{
    public $edges;
    public $inputEdges;
    public $outputEdges;

    public function __constructor($entity, $properties){
        parent::__constructor($entity, $properties);
        $this->edges = [];
        $this->inputEdges = [];
        $this->outputEdges = [];
    }

    public function unlink(){
        $edges = $this->edges;

        for($i = 0, $length = count($edges); $i < $length; $i++){
            $edges[i]->unlink();
        }

        return true;
    }
}