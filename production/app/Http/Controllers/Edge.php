<?php

class Edge extends Unit
{
    public $inputNode;
    public $outputNode;
    public $duplex;
    public $distance;

    public function __constructor($entity, $properties){
        parent::__constructor($entity, $properties);
        $this->inputNode = null;
        $this->outputNode = null;
        $this->duplex = false;
        $this->distance = 1;
    }

    public function linkToNode($node, $direction){
        if($direction <= 0){
            array_push($node->inputEdges, $this);
        }
        if($direction >= 0){
            array_push($node->outputEdges, $this);
        }

        array_push($node->edges, $this);

        return true;
    }

    public function linkNodes($inputNode, $outputNode, $duplex){
        $this->unlink();

        $this->inputNode = $inputNode;
        $this->outputNode = $outputNode;
        $this->duplex = $duplex;

        if($duplex){
            $this->linkToNode($inputNode, 0);
            $this->linkToNode($outputNode, 0);
            return $this;
        }

        $this->linkToNode($inputNode, 1);
        $this->linkToNode($outputNode, -1);
    }

    public function setDistance($distance){
        $this->distance(abs(floatval($distance) || 0));
        return $this;
    }

    public function setWeight($weight){
        $this->distance(1 / abs(floatval($distance) || 0));
        return $this;
    }

    public function oppositeNode($node){
        if($this->inputeNode === $node){
            return $this->outputNode;
        }
        else if($this->outputNode === $node){
            return $this->inputNode;
        }

        return;
    }

    public function unlink(){
        $pos;
        $inNode = $this->inputeNode;
        $outNode = $this->outputNode;

        if(!($inNode && $outNode)){
            return;
        }

        
    }
}