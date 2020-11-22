<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    use ApiResponser;
    /**
     * authorService
     *
     * @var mixed
     */
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->$authorService = $authorService;
    }

    /**
     * return yhe list of author
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
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
    public function show($book)
    {
    }

    /**
     * obtains 
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
    }

    /**
     * obtains 
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($book)
    {
    }
}
