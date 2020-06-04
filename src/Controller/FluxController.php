<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Actions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DomCrawler\Crawler;

class FluxController extends AbstractController
{
    /**
     * @Route("/flux", name="flux")
     * Get Request and extract url, and type file (xml or json)
     * Construct URL
     * Filter datas
     */
    public function index(Request $request)
    {
        $response = null; 
        if($request->request->count() > 0){
            //get and build URL
            $url = $request->request->get('url');                           
            $typeFile = $request->request->get('type-file');
            $createUrl = $this->buildUrl($url, $typeFile);              
            $response = $this->goToFilter($createUrl, $url, $typeFile);
        }else $response = [null, null, null, null];

        return $this->render('flux/index.html.twig', [
            'controller_name' => 'FluxController',
            'response' => $response,
        ]);
    }
    /**
     *  Load datas from the distance file 
     * Call the right function to filter Actions
     * Return datas as a list of any Actions found
     */
    public function goToFilter($createUrl, $url, $typeFile){
        $errors = null;
        $datas = array();
        if($content = $this->loadDatas($createUrl)){/* */
            if(@json_decode($content, true) !== null){
                $datas = $this->filterActionsJSON($content);
            } else  $datas = $this->filterActionsXML($content);
            if(count($datas) == 0) $errors = "No item found...";
            dump($datas);
        } else $errors = "Url not found..."; 
        return array($datas, $url, $typeFile, $errors);
    }
    /**
     * Parse URL to build the specific URL such as:
     * URL without a main domain root
     * URL with https://www.brandalley.fr/ domain root 
     */
    public function buildUrl($url, $typeFile){
        $link["xml"] = "http://brandalley-frontapi-preview-frfr.sparkow.net/";
        $link["json"] = "http://brandalley-frontapi-preview-frfr.json.net/";
        $urlBrand = "https://www.brandalley.fr/";
        //URL for xml file
        $list = explode($urlBrand, $url);
        if(count($list) > 1){
            $url = $link[$typeFile].$list[1];
        }else{
            $list = explode("http", $url);
            if(count($list) == 1){
              $url = $link[$typeFile].$list[0];
           }
        }
        return $url;
    }
    /**
     * XML Filter
     * Find All tagName "Actions" 
     * With each Action get thier informations
     * Return that list
     */
    public function filterActionsXML( $content ){
        $crawler = new Crawler();
        $crawler->addXmlContent($content);
        $domElement = null;
        foreach($crawler as $domEl) $domElement = $domEl;
        $allActionsNodes = $domElement->getElementsByTagName("Actions");
        $i = 1;
        $datas = array();
        foreach($allActionsNodes as $actions){
            $data[] = $i;
            $data[] = $actions->getElementsByTagName("Id")[0]->nodeValue;
            $data[] = $actions->getElementsByTagName("Label")[0]->nodeValue;
            $data[] = $actions->getElementsByTagName("FrontLabel")[0]->nodeValue;
            $data[] = $actions->getElementsByTagName("Position")[0]->nodeValue;
            $data[] = $actions->getElementsByTagName("Priority")[0]->nodeValue;
            $data[] = $actions->getElementsByTagName("Metadata")[0]->firstChild->childNodes[1]->nodeValue;
            $data[] = $actions->getElementsByTagName("HtmlContent")[0]->nodeValue;

            $action = $this->createOneAction($data);
            array_push($datas, $action);
            $i++;
        }
        return $datas;
    }
    /**
     * JSON Filter
     * Find all "Actions" Key through the file
     * Get those informations and stock them for each "Actions"
     */
    public function filterActionsJSON( $content){
        //Convert to be load as json
        $json_content = json_decode($content);
        $allActions = array();
        $this->findActionsJson($json_content, "Actions", $allActions);
        $i = 1;
        $datas = array();
        //Create each action
        foreach($allActions as $actions){
            $data = array($i, $actions->Id, $actions->Label, $actions->FrontLabel, 
                            $actions->Position, $actions->Priority, $actions->Metadata,
                            $actions->HtmlContent);

            $action = $this->createOneAction($data);
            array_push($datas, $action);
            $i++;
        }
        return $datas;
    }
    /**
     * The Main methode to create One Action
     * It's useful for both XML and JSON filter
     */
    public function createOneAction($data){
        $action = new Actions();
            $action->setIndex($data[0]);
            $action->setId($data[1]);
            $action->setLabel($data[2]);
            $action->setFrontLabel($data[3]);
            $action->setPosition($data[4]);
            $action->setPriority($data[5]);
            $action->setBeginDate($data[6]);
            $action->setHtmlContent($data[7]);
        return $action;
    }
    /**
     * Methode to find Actions in a JSON file
     * Retrun a list of Actions found
     */
    public function findActionsJson($node, $index, &$actions) {
        foreach ($node as $key => $value) {
            if($key == $index){
                $actions[] = $value;
            }else if(is_object($value))
                    $this->findActionsJson($value, $index, $actions);
        }
    } 
    /**
     * Main methode file reader for XML and JSON files
     */
    public function loadDatas($url){
	    //user agent is very necessary, otherwise some websites like google.com wont give zipped content
            $opts = array(
              'http'=>array(
                'method'=>"GET",
                'header'=>"Accept-Encoding: gzip\r\n"
              )
            );
	    $context = stream_context_create($opts);
        $content = @file_get_contents($url ,false,$context);
        if ( $content === false) {
            return false;
        }else{
            //If http response header mentions that content is gzipped, then uncompress it
	        foreach($http_response_header as $c => $h){
	        	if(stristr($h, 'content-encoding') and stristr($h, 'gzip')){
	        		//Now lets uncompress the compressed data
	        		$content = gzinflate( substr($content,10,-8) );
	        	}
	        }
	        
        }
        return $content;
    }

}
