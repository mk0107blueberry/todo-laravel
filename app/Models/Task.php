<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    // protected : アクセスクラスの１つ クラス自体とその派生クラスからのみアクセス可能 他publicとprivate
    // $fillable : データベースにデータを保存する際に、許可されるカラム（列）を指定するためのもの

    /**
     * タスクを保持するユーザーの取得
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
