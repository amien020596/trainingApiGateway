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
  /**
   * obtainBooks
   *
   * @return void
   */
  public function obtainBooks()
  {
    return $this->performRequest('GET', 'books');
  }
  /**
   * createBooks
   *
   * @param  mixed $data
   * @return void
   */
  public function createBook($data)
  {
    return $this->performRequest('POST', 'books', $data);
  }
  /**
   * obtainBook
   *
   * @param  mixed $book
   * @return void
   */
  public function obtainBook($book)
  {
    return $this->performRequest('GET', "books/{$book}");
  }
  /**
   * editBook
   *
   * @param  mixed $data
   * @param  mixed $book
   * @return void
   */
  public function editBook($data, $book)
  {
    return $this->performRequest('PUT', "books/{$book}", $data);
  }
  /**
   * deleteBook
   *
   * @param  mixed $book
   * @return void
   */
  public function deleteBook($book)
  {
    return $this->performRequest('DELETE', "books/{$book}");
  }
}
