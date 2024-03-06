<?php
require 'apicall.php';
$main = new APIcall('https://www.innoraft.com/jsonapi/node/services');
$main->call_api();
$mainResponse = $main->get_data();

/**
 * Class Field
 * 
 * Class of the major sections (services) for the index page.
 */
class Field
{
  
  /**
   * @var string $title Stores the title of the field.
   */
  public $title;
  
  /**
   * @var string $id Stores the id attribute of the field.
   */
  public $id;
  
  /**
   * @var string $displayTitle Stores the title of the field in HTML format complete with classes.
   */
  public $displayTitle;
  
  /**
   * @var string $field_services Stores a list of sub-field links in HTML format.
   */
  public $field_services;
  
  /**
   * @var string $image Stores the image link of the field object.
   */
  public $image;
  
  /**
   * @var string $link Stores the link of "Explore More" button.
   */
  public $link;
  
  /**
   * @var array $link Stores an array of the icons present in the field object.
   */
  public $icons = [];

  /**
   * Field constructor function.
   *
   * @param string $title The title of the field object.
   * @param string $id  The id of the field object.
   */
  function __construct($title, $id)
  {
    $this->title = $title;
    $this->id = $id;
  }

  /**
   * Function to get the image property of the object.
   * 
   * @return string
   */
  function get_image()
  {
    return $this->image;
  }

  /**
   * Function to get the title of the object in HTML format. 
   *
   * @return string
   */
  function get_displayTitle()
  {
    return $this->displayTitle;
  }

  /**
   * Function to get the sub-field links of the object in HTML format.  
   *
   * @return string
   */
  function get_services()
  {
    return $this->field_services;
  }
  
  /**
   * Function to get the link for the "Explore More" button. 
   *
   * @return void
   */
  function get_link()
  {
    return $this->link;
  }
}

$objArr = [];
for ($i = 0; $i < count($mainResponse['data']); $i++) {
  $dataAttr = $mainResponse['data'][$i]['attributes'];
  $dataRel = $mainResponse['data'][$i]['relationships'];
  $field_services = $dataAttr['field_services']['value'];

  if ($field_services !== NULL && $i > 11) {

    $title = $dataAttr['title'];
    // Performing another API call for getting the field object image.
    $image = $dataRel['field_image']['links']['related']['href'];
    $fieldImg = new APIcall($image);
    $fieldImg->call_api();
    $imageData = $fieldImg->get_data();
    $imageLink = 'https://www.innoraft.com' . $imageData['data']['attributes']['uri']['url'];
    // Storing the link for the "Explore More" button.
    $link = 'https://www.innoraft.com' . $dataAttr['path']['alias'];
    // Storing the title in HTML format.
    $displayTitle = $dataAttr['field_secondary_title']['value'];
    $id = $mainResponse['data'][$i]['id'];
    // Performing another API call for getting the field icons API data.
    $iconPage = $dataRel['field_service_icon']['links']['related']['href'];
    $iconAPI = new APIcall($iconPage);
    $iconAPI->call_api();
    $iconData = $iconAPI->get_data();
    // Creating a new Field Object and setting the data. 
    $x = new Field($title, $id);
    $x->field_services = $field_services;
    $x->image = $imageLink;
    $x->displayTitle = $displayTitle;
    $x->link = $link;
    // Loop to traverse the icons API data nodes to fetch each of the icons through each of their APIs.
    for ($j = 0; $j < count($iconData['data']); $j++) {
      $iconURL = $iconData['data'][$j]['relationships']['field_media_image']['links']['related']['href'];
      $icon = new APIcall($iconURL);
      $icon->call_api();
      $iconVal = $icon->get_data();
      // Store the received icon link.
      $iconLink = 'https://www.innoraft.com' . $iconVal['data']['attributes']['uri']['url'];
      // Pushing the link to the icons array.
      array_push($x->icons, $iconLink);
    }

    // Add last field to the start of the array of field objects.
    if ($i === count($mainResponse['data']) - 1) {
      array_unshift($objArr, $x);
    }
    // Push all other fields to the array of field objects.
    else {
      array_push($objArr, $x);
    }
  }
}
