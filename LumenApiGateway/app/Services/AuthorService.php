<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;


/**
 * AuthorService
 */
class AuthorService
{
  use ConsumeExternalService;

  /**
   * baseUri
   *
   * @var mixed
   */
  public $baseUri;

  /**
   * __construct
   *
   * @return void
   */
  public function __construct()
  {
    $this->baseUri = config('services.authors.base_uri');
  }
}
