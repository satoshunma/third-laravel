<?php

namespace App\Http\Controllers;

use App\Models\Stamp; // Stampをインポート
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        // Stampモデルからデータを取得（userリレーションも一緒に取得）
        $stamps = Stamp::with('user')->get();

        // デバッグ用に取得データを確認する
        // dd($stamps);

        return view('attendance', compact('stamps'));
    }
}
