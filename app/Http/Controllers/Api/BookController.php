<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookType;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     *  get allbooks
     */
    public function getAllbooks()
    {
        $books = Book::get()->toJson(JSON_PRETTY_PRINT);
        return response($books, 200);

    }
    /**
     *  get allTypesBook
     */
    public function getAllTypesbook()
    {
        $bookTypes = BookType::get()->toJson(JSON_PRETTY_PRINT);
        return response($bookTypes, 200);

    }
/**
 * get book
 *
 */
    public function getBook($id)
    {
        if (Book::where('id', $id)->exists()) {
            $book = Book::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($book, 200);
        } else {
            return response()->json([
                "message" => "Book not found",
            ], 404);
        }

    }
    /**
     * create book
     */
    public function createBook(Request $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();
        return response()->json([
            "message" => "Book record created",
        ], 201);

    }
    /**
     * update book
     */
    public function updateBook(Request $request, $id)
    {
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);

            $book->name = is_null($request->name) ? $book->name : $book->name;
            $book->author = is_null($request->author) ? $book->author : $book->author;
            $book->save();

            return response()->json([
                "message" => "records updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "Book not found",
            ], 404);
        }
    }
/**
 *
 * delete book
 */
    public function deleteBook($id)
    {
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->delete();

            return response()->json([
                "message" => "records deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "Book not found",
            ], 404);
        }
    }
/**
 * get bookType
 *
 */
    public function getBookType($id)
    {
        if (BookType::where('id', $id)->exists()) {
            $bookType = BookType::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($bookType, 200);
        } else {
            return response()->json([
                "message" => "BookType not found",
            ], 404);
        }

    }
/**
 * create bookType
 */
    public function createBookType(Request $request)
    {  
        $bookType = new BookType;
        $bookType->name = $request->name;
        $bookType->details = $request->details;
       
        $bookType->save();
        return response()->json([
            "message" => "BookType record created",
        ], 201);

    }
    /**
     * update bookType details
     */
    public function updateBookType(Request $request, $id)
    {
        if (BookType::where('id', $id)->exists()) {
            $bookType = BookType::find($id);

            $bookType->name = is_null($request->name) ? $bookType->name : $bookType->name;
            $bookType->details = is_null($request->author) ? $bookType->details : $bookType->details;
            $bookType->save();

            return response()->json([
                "message" => "records updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "BookType not found",
            ], 404);
        }
    }

    /**
     * delete bookType
     */
    public function deleteBookType($id)
    {
        if (BookType::where('id', $id)->exists()) {
            $bookType = BookType::find($id);
            $bookType->delete();

            return response()->json([
                "message" => "records deleted",
            ], 202);
        } else {
            return response()->json([
                "message" => "BookType not found",
            ], 404);
        }
    }
/**
 *  get details book by typebook
 */
public function getdetailsBook($id)
{if (BookType::where('id_book', $id)->exists()) {
    $bookType = BookType::where('id_book', $id)->get()->toJson(JSON_PRETTY_PRINT);
    return response($bookType, 200);
} else {
    return response()->json([
        "message" => "BookType not found",
    ], 404);
}

}

}
