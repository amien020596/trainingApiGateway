<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;
    /**
     * bookService
     *
     * @var mixed
     */
    public $bookService;
    /**
     * authorService
     *
     * @var mixed
     */
    public $authorService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }


    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * create new one author
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorService->obtainAuthor($request->author_id);
        return $this->successResponse($this->bookService->createBook($request->all()), Response::HTTP_CREATED);
    }

    /**
     * obtains 
     *
     * @return Illuminate\Http\Response
     */
    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBook($book));
    }

    /**
     * obtains 
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $book));
    }

    /**
     * obtains 
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteBook($book));
    }
}
