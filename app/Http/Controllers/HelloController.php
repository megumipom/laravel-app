<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HelloController extends Controller
{
    //
    public function index(Request $request)
    {
        if(isset($request->id))
        {
            // $param = ['id' => $request->id];
            // $items = DB::select('select * from people where id =:id',$param);
            $id = $request->id;
            $items = DB::table(table: 'people')->where('id',$id)->get();
        } else {
            // $items = DB::select('select * from people');
            $items = DB::table('people')->get();
        }
        return view('hello.index',['items'=>$items]);
    }

    // public function post(Request $request)
    // {
    //     $validatedData = $request->validate( [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0,150',
    //     ], [
    //             'name.required' => '名前を入力してください。',
    //             'mail.email' => 'メールアドレスの形式が正しくありません。',
    //             'age.numeric' => '年齢は数値で入力してください。',
    //             'age.between' => '年齢は0から150の間で入力してください。',
    //     ]);
    //     return view('hello.index',['msg'=>'正しく入力されました！']);
    // }
    

    public function add(Request $request)
    {
        return view('hello.add',['msg'=>'フォームを入力：']);
    }

    public function create(Request $request)
    {
        #バリデーションチェック
        $request->validate( [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ], [
                'name.required' => '名前を入力してください。',
                'mail.email' => 'メールアドレスの形式が正しくありません。',
                'age.numeric' => '年齢は数値で入力してください。',
                'age.between' => '年齢は0から150の間で入力してください。',
        ]);

        #DBインサート
        $param_validated = [
            'name' => $request->input('name'),
            'mail' => $request->input('mail'),
            'age' => (int) $request->input('age'), // 年齢を整数にキャスト
        ];

        // DB::insert('insert into people (name,mail,age) values (:name, :mail, :age)',$param_validated);
        DB::table('people')->insert($param_validated);

        return view('hello.add',['msg'=>'正しく入力されました！']);
    }

    public function edit(Request $request)
    {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id',$param);
        $id = $request->id;
        $item = DB::table('people')->where('id',$id)->get();
        return view('hello.edit',['form'=>$item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            // 'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => (int) $request->age
        ];

        // DB::update('update people set name = :name,mail = :mail, age = :age where id =:id',$param);
        DB::table('people')->where('id',$request->id)->update($param);

        return redirect('/hello');
    }

    public function del(Request $request)
    {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id',$param);
        $item = DB::table('people')->where('id',$request->id)->get();
        return view('hello.del',['form'=>$item[0]]);
    }

    public function remove(Request $request)
    {
        // $param = ['id' => $request->id];
        // DB::delete('delete from people where id = :id',$param);
        $item = DB::table('people')->where('id',$request->id)->delete();
        return redirect('/hello');
    }
}
