<?php
require 'APICall.php';

/**
 * Class of the major sections for the index page.
 */
class Field {
  
  /**
   * Stores the title of the field.
   * 
   * @var string
   */
  public $title;
  
  /**
   * Stores the id attribute of the field.
   * 
   * @var string
   */
  public $id;
  
  /**
   * Stores the title of the field in HTML format complete with classes.
   * 
   * @var string
   */
  public $displayTitle;
  
  /**
   * Stores a list of sub-field links in HTML format.
   * 
   * @var string
   */
  public $fieldServices;
  
  /**
   * Stores the image link of the field object.
   * 
   * @var string
   */
  public $image;
  
  /**
   * Stores the link of "Explore More" button.
   * 
   * @var string
   */
  public $link;
  
  /**
   * Stores an array of the icons present in the field object.
   * 
   * @var array
   */
  public $icons = [];

  /**
   * Field constructor function. Used to initialise the field title and id.
   *
   * @param string $title 
   * The title of the field object.
   * @param string $id  
   * The id of the field object.
   */
  function __construct(string $title, string $id) {
    $this->title = $title;
    $this->id = $id;
  }

  /**
   * Function to get the image property of the object.
   * 
   * @return string
   * Returns the URL for the image.
   */
  function getImage() {
    return $this->image;
  }

  /**
   * Function to get the title of the object in HTML format. 
   *
   * @return string
   */
  function getDisplayTitle() {
    return $this->displayTitle;
  }

  /**
   * Function to get the sub-field links of the object in HTML format.  
   *
   * @return string
   */
  function getServices() {
    return $this->fieldServices;
  }
  
  /**
   * Function to get the link for the "Explore More" button. 
   *
   * @return string
   */
  function getLink() {
    return $this->link;
  }
}

/**
 * Function to process the data for the webpage from the receive JSON response.
 *
 * @return array
 */
function process() {
  $main = new APICall('https://www.innoraft.com/jsonapi/node/services');
  $main->callAPI();
  $mainResponse = $main->getData();
  $objArr = [];
  for ($i = 0; $i < count($mainResponse['data']); $i++) {
    $dataAttr = $mainResponse['data'][$i]['attributes'];
    $dataRel = $mainResponse['data'][$i]['relationships'];
    $fieldServicesRaw = $dataAttr['field_services']['value'];
    $domain = 'https://www.innoraft.com';

    if ($fieldServicesRaw !== NULL && $i > 11) {

      $title = $dataAttr['title'];
      // Performing another API call for getting the field object image.
      $image = $dataRel['field_image']['links']['related']['href'];
      $fieldImg = new APICall($image);
      $fieldImg->callAPI();
      $imageData = $fieldImg->getData();
      $imageLink = $domain . $imageData['data']['attributes']['uri']['url'];
      // Storing the link for the "Explore More" button.
      $link = $domain . $dataAttr['path']['alias'];
      // Storing the title in HTML format.
      $displayTitle = $dataAttr['field_secondary_title']['value'];
      $id = $mainResponse['data'][$i]['id'];
      // Performing another API call for getting the field icons API data.
      $iconPage = $dataRel['field_service_icon']['links']['related']['href'];
      $iconAPI = new APICall($iconPage);
      $iconAPI->callAPI();
      $iconData = $iconAPI->getData();
      // Creating a new Field Object and setting the data. 
      $field = new Field($title, $id);
      $field->fieldServices = $fieldServicesRaw;
      $field->image = $imageLink;
      $field->displayTitle = $displayTitle;
      $field->link = $link;
      // Loop to traverse the icons API data nodes to fetch each of the icons through each of their APIs.
      for ($j = 0; $j < count($iconData['data']); $j++) {
        $iconURL = $iconData['data'][$j]['relationships']['field_media_image']['links']['related']['href'];
        $icon = new APICall($iconURL);
        $icon->callAPI();
        $iconVal = $icon->getData();
        // Store the received icon link.
        $iconLink = $domain . $iconVal['data']['attributes']['uri']['url'];
        // Pushing the link to the icons array.
        array_push($field->icons, $iconLink);
      }

      // Add last field to the start of the array of field objects.
      if ($i === count($mainResponse['data']) - 1) {
        array_unshift($objArr, $field);
      }
      // Push all other fields to the array of field objects.
      else {
        array_push($objArr, $field);
      }
    }
  }
  return $objArr;
}
