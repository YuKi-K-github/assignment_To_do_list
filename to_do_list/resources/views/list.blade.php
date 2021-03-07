@extends('layouts.layouts')

@section('contents')
<div class="title">
    <h1>To do list</h1>
</div>
@foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
@endforeach
<div class="list">
<div class="status">
    <label>すべて</label>
    <input id="everything" type="radio" name="select_status" checked>
    <label>作業中</label>
    <input id="progressing" type="radio" name="select_status">
    <label>完了</label>
    <input id="done" type="radio" name="select_status">
</div>
<table>
    <tr>
        <td>ID</td>
        <td>コメント</td>
        <td>状態</td>
    </tr>
    @forelse($lists as $list)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $list->task }}</td>
            <td>
                <form method="post" action="{{ url('/lists/'.$list->id ) }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if($list->status === 0)
                        <input type="submit" value="作業中">
                    @elseif($list->status === 1)
                        <input type="submit" value="完了">
                    @endif
                </form>
            </td>
            <td>
                <form method="post" action="{{ url('/lists/'.$list->id) }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="削除">
                </form>
            </td>
        </tr>
    @empty
        <td>タスクはありません。</td>
    @endforelse
</table>
</div>
<div class="add_task">
    <h3>新規タスクの追加</h3>
    <form method="post" action="{{ url('/lists') }}">
        @csrf
        <input type="text" name="task">
        <input type="submit" value="追加">
    </form>
</div>
@endsection