<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    $rules = [
      'name' => 'required|max:255',
      'gender' => 'required|max:255|in:male,female',
      'country' => 'required|max:255'
    ];
    $this->validate($request, $rules);
    $author = Author::create($request->all());
    return $this->successResponse($author, Response::HTTP_CREATED);
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
