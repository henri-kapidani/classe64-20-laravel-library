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
        // $books = Book::all(); // tutte le colonne
        // $books = Book::all(['title', 'price']); // limita le colonne
        $books = Book::where('price', '>', 50)->get(['title', 'price']);
        // dd($books);

        return view('list', compact('books'));
    }
}
