<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;



/**
 * BookService
 */
class BookService
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
    $this->baseUri = config('services.books.base_uri');
  }
}
