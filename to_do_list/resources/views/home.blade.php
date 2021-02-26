@extends('layouts.layouts')

@section('contents')
<div class="title">
    <h1>To do list</h1>
</div>
<div class="list">

</div>
<div class="add_task">
    新規タスクの追加
    <form method="POST" action="{{ url('/') }}">
        <input type="text" name="task">
        <input type="submit" value="追加">
    </form>
</div>
@endsection