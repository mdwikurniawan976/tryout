<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::latest()->paginate(3);
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required|min:3',
            'sinopsis' => 'required|min:10',
            'cover' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:2048'
        ]);


        $cover = $request->file('cover');
        $cover->storeAs('public/cover', $cover->hashName());


        Book::create([
            'judul' => $request->judul,
            'sinopsis' => $request->sinopsis,
            'cover' => $cover->hashName()
        ]);


        return redirect()->route('books.index')->with('success','data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $request->validate([
            'judul' => 'required|min:3',
            'sinopsis' => 'required|min:10',
            'cover' => 'image|mimes:png,jpg,jpeg,svg,webp|max:2048'
        ]);

        if($request->hasFile('cover')){
            $cover = $request->file('cover');
            $cover->storeAs('public/cover', $cover->hashName());
            Storage::delete('public/cover/'. $book->cover);

            $book->update([
                'judul' => $request->judul,
                'sinopsis' => $request->sinopsis,
                'cover' => $cover->hashName()
            ]);
        }else{
            $book->update([
                'judul' => $request->judul,
                'sinopsis' => $request->sinopsis,
            ]);
        }
        


        return redirect()->route('books.index')->with('success','data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        Storage::delete('public/cover/'. $book->cover);
        $book->delete();
        return redirect()->route('books.index')->with('success','data berhasil dihapus');
    }
}
