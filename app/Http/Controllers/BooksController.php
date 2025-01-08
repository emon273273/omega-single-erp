<?php

namespace App\Http\Controllers;

use App\Models\books;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Validation\ValidationException;
use \Illuminate\Database\Eloquent\ModelNotFoundException;

class BooksController extends Controller
{
    // all books info
    public function getAllEmon()
    {
        

        $book=books::all();
        //dd($book[0]->id);

        dd($book);
        return response()->json();
    }

    // book store to my data base
    public function createSingleEmon(Request $request)
    {
        try {

            $validatedData = $request->validate([
                "id" => "required",
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'isbn' => 'required|string|unique:books,isbn',
                'description' => 'required|string|max:1000',
                'published_at' => 'nullable|date',
                'genre' => 'required|string',
                'pages' => 'nullable|integer',
            ]);


            $book = books::create($validatedData);


            return response()->json([
                'message' => 'Book created successfully!',
                'data' => $book,
            ], 201);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        }
    }


    //find book by id
    public function getSingleEmon($id)
    {
        try {

            $findonebook = books::findOrFail($id);
            return response()->json([
                'message' => 'Book retrieved successfully!',
                'data' => $findonebook,
            ], 200);
        } catch (ModelNotFoundException $e) {

            return response()->json([
                'message' => 'Book not found.',
            ], 404);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'An unexpected error occurred.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    //update book 
    public function updateSingleEmon(Request $request, $id)
    {
        try {

            $bookid = books::findOrFail($id);


            $validatedData = $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'author' => 'sometimes|required|string|max:255',
                'isbn' => 'sometimes|required|string|unique:books,isbn,' . $id,
                'description' => 'sometimes|required|string|max:1000',
                'published_at' => 'nullable|date',
                'genre' => 'sometimes|required|string',
                'pages' => 'nullable|integer',
            ]);

            // Update the book
            $bookid->update($validatedData);

            // Return success response
            return response()->json([
                'message' => 'Book updated successfully!',
                'data' => $bookid,
            ], 200);
        } catch (ModelNotFoundException $e) {

            return response()->json([
                'message' => 'Book not found.',
            ], 404);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {

            return response()->json([
                'message' => 'An unexpected error occurred.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // delete book

    public function deleteSingleEmon($id)
    {
        try {

            $deletebook = books::findOrFail($id);


            $deletebook->delete();


            return response()->json([
                "message" => "Book deleted successfully.",
                "book" => $deletebook,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->json([
                "message" => "Book not found.",
            ], 404);
        } catch (\Exception $e) {

            return response()->json([
                "message" => "An unexpected error occurred.",
                "error" => $e->getMessage(),
            ], 500);
        }
    }
}
