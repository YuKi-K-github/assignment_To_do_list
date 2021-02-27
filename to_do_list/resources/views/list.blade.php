@extends('layouts.layouts')

@section('contents')
<div class="title">
    <h1>To do list</h1>
</div>
@foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
@endforeach
<div class="list">
<table>
    <tr>
        <td>ID</td>
        <td>コメント</td>
        <td>状態</td>
    </tr>
    @forelse($lists as $list)
        <tr>
            <td>{{ $list_id++ }}</td>
            <td>{{ $list->task }}</td>
            <td><input type="submit" value="作業中"></td>
            <td><input type="submit" value="削除"></td>
        </tr>
    @empty
        <td>タスクはありません。</td>
    @endforelse
</table>
</div>
<div class="add_task">
    <h3>新規タスクの追加</h3>
    <form method="post" action="{{ url('/list') }}">
        @csrf
        <input type="text" name="task">
        <input type="submit" value="追加">
    </form>
</div>
@endsection