@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__alert">
  @if (Auth::check())
  <p>ようこそ、{{ Auth::user()->name }}さん</p>
  @endif
</div>

<div class="attendance__content">
  <div class="attendance__panel">
    <form class="attendance__form" action="{{ route('attendance.startWork') }}" method="POST">
        @csrf
        <button class="attendance__button-submit" type="submit">勤務開始</button>
    </form>

    <form class="attendance__form" action="{{ route('attendance.endWork') }}" method="POST">
        @csrf
        <button class="attendance__button-submit" type="submit">勤務終了</button>
    </form>

    <form class="attendance__form" action="{{ route('attendance.startBreak') }}" method="POST">
        @csrf
        <button class="attendance__button-submit" type="submit">休憩開始</button>
    </form>

    <form class="attendance__form" action="{{ route('attendance.endBreak') }}" method="POST">
        @csrf
        <button class="attendance__button-submit" type="submit">休憩終了</button>
    </form>
  </div>
</div>

<footer class="footer">
    <div class="footer__inner">
      <a class="footer__logo">Atte, inc.</a>
    </div>
</footer>
@endsection
