<?php
require 'apicall.php';
$main = new APIcall('https://www.innoraft.com/jsonapi/node/services');
$main -> call_api();
$mainResponse = $main -> get_data();

class Field
{
    public $title;
    public $id;
    public $displayTitle;
    public $field_services;
    public $image;
    public $link;
    public $icons = [];

    function __construct($title, $id)
    {
        $this -> title = $title;
        $this -> id = $id;
    }
    function get_image(){
        return $this -> image;
    }

    function get_displayTitle(){
        return $this -> displayTitle;
    }

    function get_services(){
        return $this -> field_services;
    }
    function get_link(){
        return $this -> link;
    }
}

$objArr = [];
for ($i = 0; $i < count($mainResponse['data']); $i++) {
    $dataAttr = $mainResponse['data'][$i]['attributes'];
    $dataRel = $mainResponse['data'][$i]['relationships'];
    $field_services = $dataAttr['field_services']['value'];
    
    if ($field_services !== NULL && $i > 11) {

        $title = $dataAttr['title'];
        
        $image = $dataRel['field_image']['links']['related']['href'];
        $fieldImg = new APIcall($image);
        $fieldImg -> call_api();
        $imageData = $fieldImg -> get_data();
        $imageLink = 'https://www.innoraft.com' . $imageData['data']['attributes']['uri']['url'];

        $link = 'https://www.innoraft.com' . $dataAttr['path']['alias'];

        $displayTitle = $dataAttr['field_secondary_title']['value'];
        $id = $mainResponse['data'][$i]['id'];

        $iconPage = $dataRel['field_service_icon']['links']['related']['href'];
        $iconAPI = new APIcall($iconPage);
        $iconAPI -> call_api();
        $iconData = $iconAPI -> get_data();
        
        $x = new Field($title, $id);
        $x -> field_services = $field_services;
        $x -> image = $imageLink;
        $x -> displayTitle = $displayTitle;
        $x -> link = $link;

        for($j = 0; $j < count($iconData['data']); $j++){
            $iconURL = $iconData['data'][$j]['relationships']['field_media_image']['links']['related']['href'];
            $icon = new APIcall($iconURL);
            $icon -> call_api();
            $iconVal = $icon -> get_data();

            $iconLink = 'https://www.innoraft.com' . $iconVal['data']['attributes']['uri']['url'];
            array_push($x -> icons, $iconLink);
        }
        
        
        if ($i === count($mainResponse['data'])-1) {
            array_unshift($objArr,$x);
        }
        else{
            array_push($objArr, $x);
        }
    }
}
