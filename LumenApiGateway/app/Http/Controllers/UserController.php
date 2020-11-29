<?php

namespace App\Http\Controllers;

use App\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
   * return yhe list of User
   *
   * @return Illuminate\Http\Response
   */
  public function index()
  {
    $Users = User::all();
    // return $Users;
    return $this->validResponse($Users);
  }

  /**
   * create new one User
   *
   * @return Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $rules = [
      'name' => 'required|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8|confirmed'
    ];
    $this->validate($request, $rules);
    $validFields = $request->all();
    $validFields['password'] = Hash::make($request->input('password'));
    $User = User::create($validFields);
    return $this->validResponse($User, Response::HTTP_CREATED);
  }

  /**
   * obtains 
   *
   * @return Illuminate\Http\Response
   */
  public function show($User)
  {
    $User = User::findOrFail($User);
    return $this->validResponse($User);
  }

  /**
   * obtains 
   *
   * @return Illuminate\Http\Response
   */
  public function update(Request $request, $User)
  {
    $rules = [
      'name' => 'max:255',
      'email' => 'email|unique:users,email,' . $User,
      'password' => 'min:8|confirmed'
    ];

    $this->validate($request, $rules);
    $User = User::findOrFail($User);

    $validFields = $request->all();
    if ($request->has('password')) {
      $validFields['password'] = Hash::make($request->input('password'));
    }

    $User->fill($validFields);
    if ($User->isClean()) {
      return $this->errorResponse('at least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $User->save();
    return $this->validResponse($User);
  }
  /**
   * obtains 
   *
   * @return Illuminate\Http\Response
   */
  public function destroy($User)
  {
    $User = User::findOrFail($User);
    $User->delete();
    return $this->validResponse($User);
  }
  /**
   * me
   *
   * @param  mixed $request
   * @return void
   */
  public function me(Request $request)
  {
    return $this->validResponse($request->user());
    // return "test";
  }
  /**
   * me
   *
   * @param  mixed $request
   * @return void
   */
  public function test()
  {
    return "test";
    // return "test";
  }
}
