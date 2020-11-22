<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;
use Illuminate\Support\Facades\Log;

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

  /**
   * obtainAuthors
   * obtain the full list of author from the author service
   *
   * @return void
   */
  public function obtainAuthors()
  {
    return $this->performRequest('GET', 'authors');
  }
  /**
   * createAuthor
   *
   * @param  mixed $data
   * @return void
   */
  public function createAuthor($data)
  {
    return $this->performRequest('POST', 'authors', $data);
  }

  public function obtainAuthor($author)
  {
    return $this->performRequest('GET', "authors/{$author}");
  }
}
