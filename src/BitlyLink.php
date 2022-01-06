<?php
namespace NoamanMahmoud\BitlyLink;

class Bitly {

    const token = "6378ea9e9cf276c540b8e9ad786d1004d83d5357";

    /**  public function bitly Short Link . */
    public static function bitlyShortLink($url= "")
    {
        if (empty($url)){

            throw new \Exception('pleas set url ');
        }

        global $response;

        $curl = curl_init();

        $data = [
            "domain"   => "bit.ly",
            "long_url" => $url,
        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-ssl.bitly.com/v4/shorten',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => json_encode($data),
            CURLOPT_HTTPHEADER     => [
                'Authorization: Bearer ' . config('Bitly.token'),
                'Content-Type: application/json'
            ],
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);

    }

    /**  public function getLink . */
    public static function getLink()
    {
        global $response;
        $data = json_decode($response);

        return $data->link;
    }
}