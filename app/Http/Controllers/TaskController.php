<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * タスクリポジトリ
     * 
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * コンストラクタ
     * コンストラクタはコントローラのインスタンスが作成される際に最初に実行されるメソッドであり、
     * 初期設定や共通の処理を行うために使用される
     * 
     * @return void
     */
    public function __construct(TaskRepository $tasks) {
        $this->middleware('auth');
        // auth ミドルウェアは、ユーザーの認証状態を確認し、
        // 認証されていないユーザーをログイン画面にリダイレクトする役割を持つ
        $this->tasks = $tasks;
    }

    /**
     * タスク一覧
     * 
     * @param Request $request
     * @return Response
     */
    
    public function index(Request $request) {
        // $tasks = Task::orderBy('created_at' , 'asc')->get();
        // $tasks = $request->user()->tasks()->get();
        return view('tasks.index' , [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
     * タスク登録
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        // タスク作成
        // Taskモデルを使用して新しいレコードをcreateで作成する
        // Task::create([
        //     'user_id' => 0,
        //     'name' => $request->name,
        // ]);
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * タスク削除
     * 
     * @param Request $request
     * @param Task $task
     * @return Response
     */
    public function destroy(Request $request, Task $task) {

        $this->authorize('destroy', $task);
        
        $task->delete();
        return redirect('/tasks');
    }
}
