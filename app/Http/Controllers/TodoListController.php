<?php

namespace App\Http\Controllers;

use App\Models\Database\UserRoles;
use App\Models\TodoList;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoListController extends Controller{

    public function index(Request $request){
        $id=Auth()->user()->id;
        $role_id = UserRoles::where('user_id',$id)->first();

        if( $role_id->role_id == 1 ){       // Yönetici Rolü
            $todo_list = TodoList::paginate(10);
        }else{                              // Kullanıcı Rolü
            $todo_list = TodoList::where('user_id',$id)->paginate(10);
        }

        return view('admin.todo.index',compact('todo_list','id'));

    }

    public function addTodoList(Request $request){

        TodoList::create([
            'todo_content' => $request->todo_content,
            'user_id' => $request->user_id
        ]);
        return response()->json([
            'status' => 1,
            'msg' => 'Todo list başarılı bir şekilde eklenmiştir.'
        ]);
    }

    public function updateTodoList(Request $request){
        $validator = Validator::make($request->all(), [
            'todo_content' => ['required'],
        ]);

        if ( $validator->fails() ) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        TodoList::where('id',$request->todo_id)->update([
            'todo_content' => $request->todo_content,
        ]);

        return response()->json([
            'status' => 1,
            'msg' => 'Todo list başarılı bir şekilde güncellendi.'
        ]);

    }

    public function delTodoList(Request $request) {

        if ($request->input('todo_id')) {
            $todo_id = $request->input('todo_id');
            $todo_count = TodoList::where('id', $todo_id)->count();
            if ($todo_count > 0) {
                $todo = TodoList::find($todo_id);
                $todo->delete();
                return response()->json([
                    'status' => 1,
                    'msg' => 'Todo list başarılı bir şekilde silindi'
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'msg' => 'Herhangi bir hatırlatma bulunamadı.'
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'Teknik bir hata meydana geldi.'
            ]);
        }

    }

}
