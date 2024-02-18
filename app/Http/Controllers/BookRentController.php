<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index() {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }
    
    public function store(Request $request) {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
    
        try {
            DB::beginTransaction();
    
            $book = Book::findOrFail($request->book_id);
    
            if ($book->status != 'in stock') {
                Session::flash('message', 'Buku sedang dipinjam');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }
    
            $user = User::findOrFail($request->user_id);
            $rentedBooksCount = RentLogs::where('user_id', $request->user_id)
                                        ->whereNull('actual_return_date')
                                        ->count();
    
            if ($rentedBooksCount >= 3) {
                Session::flash('message', 'User sudah mencapai limit pinjam');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }
    
            RentLogs::create($request->all());
    
            $book->status = 'not available';
            $book->save();
    
            DB::commit();
    
            Session::flash('message', 'Buku berhasil dipinjam');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-rent');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }
    
    public function returnBook() {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('return-book', ['users' => $users, 'books' => $books]);
    }
    public function saveReturnBook(Request $request) {
        $rent = RentLogs::where('user_id', $request->user_id)
                        ->where('book_id', $request->book_id)
                        ->whereNull('actual_return_date');
    
        $rentData = $rent->first();
        $countData = $rent->count();
    
        if($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();
    
            // Perbarui status buku menjadi 'in stock'
            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();
    
            Session::flash('message', 'Buku berhasil dikembalikan');
            Session::flash('alert-class', 'alert-success');
            return redirect('book-return');
        } else {
            Session::flash('message', 'Data peminjaman tidak ditemukan');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-return');
        }
    }
    
    
}
