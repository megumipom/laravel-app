<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    //
    public function index(Request $request){
        // $items = Board::all();
        $items = Board::with('person')->get();
        return view('board.index',['items'=>$items]);
    }

    public function add(Request $request){
        return view('board.add');
    }

    public function create(Request $request){
        // 入力項目をBoardテーブルに登録
        $request->validate(Board::$rules);

        $board = new Board();
        $board->person_id = $request->person_id;
        $board->title = $request->title;
        $board->message = $request->message;
        $board->save();

        return redirect('/board');

    }

}
