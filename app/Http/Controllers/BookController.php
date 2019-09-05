<?php

namespace App\Http\Controllers;

use App\Book;
use App\Exports\BooksExport;
use App\Imports\BooksImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('books')->with('books', $books);
    }

    /**
     * Import function
     */
    public function import(Request $request)
    {
        if ($request->file('imported_file')) {
            Excel::import(new BooksImport(), request()->file('imported_file'));
            return back();
        }
    }

    /**
     * Export function
     */
    public function export()
    {
        return Excel::download(new BooksExport(), 'books.xlsx');
    }

}
