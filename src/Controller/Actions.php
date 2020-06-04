<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class Actions extends AbstractController
{
    private $index;
    private $id;
    private $label;
    private $frontLabel;
    private $position;
    private $priority;
    private $beginDate;
    private $htmlContent;

    /**
     * @Route("/extract/data", name="extract_data")
     */
    public function setIndex($value){
        $this->index = $value;
    }
    public function getIndex(){
        return $this->index;
    }

    public function setId($value){
        $this->id = $value;
    }
    public function getId(){
        return $this->id;
    }

    public function setLabel($value){
        $this->label = $value;
    }
    public function getLabel(){
        return $this->label;
    }

    public function setFrontLabel($value){
        $this->frontLabel = $value;
    }
    public function getFrontLabel(){
        return $this->frontLabel;
    }

    public function setPosition($value){
        $this->position = $value;
    }
    public function getPosition(){
        return $this->position;
    }

    public function setPriority($value){
        $this->priority = $value;
    }
    public function getPriority(){
        return $this->priority;
    }

    public function setBeginDate($value){
        $this->beginDate = $value;
    }
    public function getBeginDate(){
        return $this->beginDate;
    }

    public function setHtmlContent($value){
        $this->htmlContent = $value;
    }
    public function getHtmlContent(){
        return $this->htmlContent;
    }
    
}
