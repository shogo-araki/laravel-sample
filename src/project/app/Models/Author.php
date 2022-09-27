<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    // t_authorテーブルを紐づける
    // protected $table = 't_author';

    // プライマリーキーを変更
    // protected $primaryKey = 'author_id';

    // timestampを使用しない
    // protected $timestamps = false;

    // white list
    // protected $fillable = [
    //     'name', 'kana',
    // ];

    // // black list
    // protected $guard = [
    //     'id', 'created_at', 'updated_at',
    // ];

    // カラムから値を取得したときにデフォルトで固有の処理を追加したいときにアクセサーの機能を使う
    // public function getKanaAttribute(string $value): string
    // {
    //     return mb_convert_kana($value, "k");
    // }

    // // カラムに値を保存するときデフォルトで固有の処理を追加する、ミューテータの機能を使う
    // public function setKanaAttribute(string $value): void
    // {
    //     $this->attributes['kana'] = mb_convert_kana($value, "KV");
    // }

    // 1 on 1
    // public function detail(){
    //     return $this->hasOne('\App\Models\Bookdetail');
    // }

    // reverse BookDetailModel
    // public function book(){
    //     return $this->belongsTo('\App\Models\Book');
    // }

    // 1 on N
    public function books(){
        return $this->hasMany('\App\Models\Book');
    }


}
