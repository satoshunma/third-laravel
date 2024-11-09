@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
<div class="attendance__alert">
  @if (Auth::check())
  <p>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
  @endif
</div>

<hr class="borderline">

<table class="information_list">
    <tr class="information_headline">
        <th>名前</th>
        <th>勤務開始</th>
        <th>勤務終了</th>
        <th>休憩時間</th>
        <th>勤務時間</th>
    </tr>
    @foreach ($stamps as $stamp)
    <tr>
        <td>{{ isset($stamp->user) ? $stamp->user->name : 'N/A' }}</td>
        <td>{{ $stamp->start_time ?? 'N/A' }}</td>
        <td>{{ $stamp->end_time ?? 'N/A' }}</td>
        <td>
            @php
                // 休憩時間の計算
                if (isset($stamp->break_start) && isset($stamp->break_end)) {
                    $break_duration = \Carbon\Carbon::parse($stamp->break_start)->diff(\Carbon\Carbon::parse($stamp->break_end));
                    echo $break_duration->format('%H:%I:%S');
                } else {
                    echo 'N/A';
                }
            @endphp
        </td>
        <td>
            @php
                // 勤務時間の計算（休憩時間を引く）
                if (isset($stamp->start_time) && isset($stamp->end_time)) {
                    $work_duration = \Carbon\Carbon::parse($stamp->start_time)->diff(\Carbon\Carbon::parse($stamp->end_time));
                    if (isset($stamp->break_start) && isset($stamp->break_end)) {
                        $work_duration = $work_duration->sub($break_duration);
                    }
                    echo $work_duration->format('%H:%I:%S');
                } else {
                    echo 'N/A';
                }
            @endphp
        </td>
    </tr>
    @endforeach
</table>

<hr class="borderline">

<footer class="footer">
    <div class="footer__inner">
      <a class="footer__logo">
      Atte,inc.
      </a>
    </div>
</footer>

@endsection
