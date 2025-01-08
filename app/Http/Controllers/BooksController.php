<?php

namespace App\Http\Controllers;

use App\Models\books;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    // all books info
    public function allbook(){

        return response()->json(books::all());
    }

    // book store to my data base
    public function storebook(Request $request)
{
    $validatedData = $request->validate([
        "id"=>"required",
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'isbn' => 'required|string|unique:books,isbn',
        'description' => 'required|string|max:1000',
        'published_at' => 'nullable|date',
        'genre' => 'required|string',
        'pages' => 'nullable|integer',
    ]);

    
    $book = books::create($request->all());

        return response()->json($book, 201);

   
}

//find book by id
public function show($id){

    $findonebook=books::findOrFail($id);
    return response()->json($findonebook);
}
public function updatebook(Request $request,$id){
        $bookid=books::find($id);
    if (!$bookid) {
        return response()->json(['message' => 'Book not found'], 404);
    }
    $bookid->update($request->all());
    return response()->json($bookid,200);

    // $validatedData = $request->validate([
    //     'id'=>"required",
    //     'title' => 'required|string|max:255',
    //     'author' => 'required|string|max:255',
    //     'isbn' => 'required|string|unique:books,isbn',
    //     'description' => 'required|string|max:1000',
    //     'published_at' => 'nullable|date',
    //     'genre' => 'required|string',
    //     'pages' => 'nullable|integer',
    // ]);


}

public function deletebook($id){

    $deletebook=books::findOrFail($id);
    $result=$deletebook->delete();
    return response()->json(["message=>books deleted successfully","book"=>$result]);
}
    
}
