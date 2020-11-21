<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  use ApiResponser;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * return yhe list of author
   *
   * @return Illuminate\Http\Response
   */
  public function index()
  {
    $authors = Author::all();
    // return $authors;
    return $this->successResponse($authors);
  }

  /**
   * create new one author
   *
   * @return Illuminate\Http\Response
   */
  public function store(Request $request)
  {
  }

  /**
   * obtains 
   *
   * @return Illuminate\Http\Response
   */
  public function show($author)
  {
  }

  /**
   * obtains 
   *
   * @return Illuminate\Http\Response
   */
  public function update(Request $request, $author)
  {
  }
  /**
   * obtains 
   *
   * @return Illuminate\Http\Response
   */
  public function destroy($author)
  {
  }
}
