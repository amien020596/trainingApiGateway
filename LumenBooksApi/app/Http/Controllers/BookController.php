<?php

namespace App\Http\Controllers;

use App\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
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
        $books = Book::all();
        return $this->successResponse($books);
    }

    /**
     * create new one author
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1'
        ];
        $this->validate($request, $rules);
        $books = Book::create($request->all());
        return $this->successResponse($books, Response::HTTP_CREATED);
    }

    /**
     * obtains 
     *
     * @return Illuminate\Http\Response
     */
    public function show($book)
    {
        $books = Book::findOrFail($book);
        return $this->successResponse($books);
    }

    /**
     * obtains 
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'min:1',
            'author_id' => 'min:1'
        ];
        $this->validate($request, $rules);
        $books = Book::findOrFail($book);

        $books->fill($request->all());
        if ($books->isClean()) {
            return $this->errorResponse('at least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $books->save();
        return $this->successResponse($books);
    }

    /**
     * obtains 
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($book)
    {
        $books = Book::findOrFail($book);
        $books->delete();
        return $this->successResponse($books);
    }
}
