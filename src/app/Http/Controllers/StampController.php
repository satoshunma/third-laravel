<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stamp;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StampController extends Controller
{
    public function index()
    {
        $stamps = Stamp::where('user_id', Auth::id())->latest()->first();
        return view('attendance', compact('stamps'));
    }

    public function startWork()
    {
        Stamp::create([
            'user_id' => Auth::id(),
            'start_time' => Carbon::now(),
        ]);
        return redirect()->back()->with('status', '勤務開始を記録しました');
    }

    public function endWork()
    {
        $stamp = Stamp::where('user_id', Auth::id())->latest()->first();
        $stamp->update(['end_time' => Carbon::now()]);
        return redirect()->back()->with('status', '勤務終了を記録しました');
    }

    public function startBreak()
    {
        $stamp = Stamp::where('user_id', Auth::id())->latest()->first();
        $stamp->update(['break_start' => Carbon::now()]);
        return redirect()->back()->with('status', '休憩開始を記録しました');
    }

    public function endBreak()
    {
        $stamp = Stamp::where('user_id', Auth::id())->latest()->first();
        $stamp->update(['break_end' => Carbon::now()]);
        return redirect()->back()->with('status', '休憩終了を記録しました');
    }
}