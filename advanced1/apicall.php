<?php

class APIcall
{
    public $url;
    public $data;
    function __construct($url)
    {
        $this->url = $url;
    }
    function call_api()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this -> url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $resp = curl_exec($ch);
        if ($e = curl_error($ch)) {
            echo $e;
        } else {
            $this->data = json_decode($resp, true);
        }

        curl_close($ch);
    }
    function get_data()
    {
        return $this -> data;
    }
}
