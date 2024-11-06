<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function index(Request $request){
        $items = Person::all();
        return view('person.index',['items'=>$items]);
    }

    public function find(Request $request){
        return view('person.find',['input'=>'']);
    }
    public function search(Request $request){
        // $item = Person::find($request->input);
        // $item = Person::where('name',$request->input)->first();
        $min = $request->input * 1;
        $max = $min + 10;

        // $item = Person::nameEqual($request->input)->first();
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find',$param);
    }

    public function edit(Request $request){

        $person = Person::find($request->id);
        return view('person.edit',['form' => $person]);
    }

    public function update(Request $request){

        #バリデーションチェック
        $request->validate( [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ], params: [
            'name.required' => '名前を入力してください。',
            'mail.email' => 'メールアドレスの形式が正しくありません。',
            'age.numeric' => '年齢は数値で入力してください。',
            'age.between' => '年齢は0から150の間で入力してください。',
        ]);

        $person = Person::find($request->id);

        $person->name = $request->name;
        $person->mail = $request->mail;
        $person->age = (int)$request->age;

        $person->save();

        return redirect('/person');
    }

    public function add(Request $request)
    {
        return view('person.add',['msg'=>'フォームを入力：']);
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

        $person = new Person();

        $person->name = $request->name;
        $person->mail = $request->mail;
        $person->age = (int)$request->age;

        $person->save();

        return view('person.add',['msg'=>'正しく入力されました！']);
    }


    public function del(Request $request)
    {
        $item = Person::find($request->id);
        return view('person.del',['form'=>$item]);
    }

    public function remove(Request $request)
    {
        Person::find($request->id)->delete();

        return redirect('/person');
    }
}
