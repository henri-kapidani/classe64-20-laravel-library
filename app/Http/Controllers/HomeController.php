<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    public function index() {
        $data = [
            'pageName'  => 'Homepage',
            'pageTitle' => 'Sono la homepage'
        ];
        return view('home', $data);
    }

    public function news() {
        $title = 'Sono la pagina delle news';
        return view('news', compact('title'));
    }

    public function list() {
        $books = Book::all(); // tutte le colonne
		dump($books); // stampa i dati come oggetto collection
        $books->dump(); // stampa i dati come array

        $books = Book::all(['title', 'price']); // limita le colonne
		  dump($books);
        $books = Book::where('price', '>', 50)->get(['title', 'price']);
        dump($books);

        // Restituisce un solo libro, non una collection di libri!
        $book = Book::where('price', '>', 50)->first(['title', 'price']);
        dump($book);
        // $book->id; $book->title

        $books = Book::where('price', '<', 50)->orderBy('price', 'asc')->get();
        dump($books);
        $books = Book::where('price', '<', 50)->orderBy('price', 'asc')->limit(1)->get();
        dump($books);

        // return view('list', compact('books'));
    }
}
