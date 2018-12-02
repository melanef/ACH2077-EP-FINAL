<?php

namespace ACH2077\SPTrans\API;
require 'vendor/autoload.php';
use GuzzleHttp\Client as HttpClient;

class Client
{
    const BASE_URL = "http://api.olhovivo.sptrans.com.br/v0";
    private $spTransToken = "";

    public function __construct($token)
    {
        $this->spTransToken = $token;
        $this->login($token);
    }

    public function getHost()
    {
        return trim(self::BASE_URL, '/');
    }

    private function login($token)
    {
        $response = $this->request('POST', "/Login/Autenticar", [
            "token" => $token
        ]);
        if (false === json_decode($response->getBody()))
            throw new \Exception('Authorization did not succeed.');
        if (false === $response->hasHeader('Set-Cookie'))
            throw new \Exception('Authorization succeed, but no credential was sent.');
        
        $this->apiCredential = $response->getHeader('Set-Cookie')[0];
    }

    public function getBusLine($param)
    {
        $response = $this->request('GET', '/Linha/Buscar', [
            'termosBusca' => $param
        ]);


        return json_decode($response->getBody());
    }

    public function getBusPositionByLineCode($lineCode)
    {
        $response = $this->request('GET', '/Posicao', [
            'codigoLinha' => $lineCode
        ]);
        return json_decode($response->getBody());
    }

    public function getStopsByLineCode($lineCode)
    {
        $response = $this->request('GET', '/Parada/Buscar', [
            'termosBusca' => $lineCode
        ]);
        return json_decode($response->getBody());
    }

    private function request($method, $resource, $queryString)
    {
        $resource = trim($resource, '/');
        $url      = "{$this->getHost()}/$resource";
        $httpClient  = new \GuzzleHttp\Client();
        $httpRequest = new \GuzzleHttp\Psr7\Request($method, $url);
        $params = ['query' => $queryString];
        if ($this->apiCredential)
            $params['headers'] = ['Cookie' => $this->apiCredential];
        return $httpClient->send($httpRequest, $params);
    }
}


function test($client)
{

        // Linha de onibus
        $line = $client->getBusLine(6414);
        var_dump($line);
        $lineCode = $line[0]->CodigoLinha;

        // Posições de onibus de uma linha
        $positions = $client->getBusPositionByLineCode($lineCode);
        var_dump($positions);
}
test($client)

?>