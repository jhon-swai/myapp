@extends('layouts.app')
@section('title')
  Todo list  
@endsection
@section('content')
<h2 class="text-center">All Todos</h2>
<ul class="list-group py-3 mb-3">
    @forelse ($todos as $todo)
        <li class="list-group-item my-2">
            <h5>{{$todo->title}}</h5>
            <p>{{Str::limit($todo->body,20)}}</p>
        <small class="float-right">{{$todo->created_at}}</small>
        {{-- <small class="float-right">{{$todo->created_at->diffForHumans()}}</small> --}}
        <a href="{{route('todos.show',$todo->id)}}">Read more</a>
        </li>
        @empty
            <h4 class="text-center">No todos found</h4>

    @endforelse
</ul>
<div class="d-flex justify-content-center">
    {{$todos->links('vendor.pagination.bootstrap-4')}}
</div>

@endsection
