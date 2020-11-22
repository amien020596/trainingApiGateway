<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait ConsumeExternalService
{
  /**
   * performRequest
   *
   * @param  mixed $method
   * @param  mixed $requestUrl
   * @param  mixed $formParams
   * @param  mixed $headers
   * @return void
   */
  public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
  {
    $client = new Client([
      'base_uri' => $this->baseUri
    ]);
    $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);
    Log::debug("client", [$response]);
    return $response->getBody()->getContents();
  }
}
