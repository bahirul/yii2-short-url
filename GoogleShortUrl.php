<?php
namespace app\components;

use yii\base\component;

class GoogleShortUrl extends Component
{
    
    public function shortUrl($longUrl) {

        $apiParams = json_encode(['longUrl' => $longUrl]);
        $curl = curl_init();        
        curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_HTTPHEADER,['Content-type:application/json']);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $apiParams);
        $curl_response = curl_exec($curl);
        $json_decode_response = json_decode($curl_response, TRUE);
        curl_close($curl);

        return $json_decode_response['id'];
    }

    public function expandUrl($shortUrl){
    	$expand_api_url = 'https://www.googleapis.com/urlshortener/v1/url?shortUrl='.$shortUrl;
    	$get_json = json_decode(file_get_contents($expand_api_url),TRUE);
    	$json_response = $get_json['longUrl'];

    	return $json_response;
    }

}

