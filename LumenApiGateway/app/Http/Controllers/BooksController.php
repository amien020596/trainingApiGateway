<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\BookService;

class BooksController extends Controller
{
    use ApiResponser;
    /**
     * bookService
     *
     * @var mixed
     */
    public $bookService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }


    /**
     * index
     *
     * @return void
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
