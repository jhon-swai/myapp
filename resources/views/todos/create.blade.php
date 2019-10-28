@extends('layouts.app')
@section('title')
  Create table
@endsection
@section('content')
    <h3 class='text-center'>Create Todo</h3>
    <form action="{{route('todos.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Todo Title</label>
            <input type="text" name="title" id="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{old('title')}}" placeholder="Enter title">
            @if($errors->has('title'))
                <span class="invalid-feedback">
                    {{$errors->first('title')}}
                </span>
            @endif
            <div class="form-group">
                <label for="body">Todo description</label>
                <textarea name="body" id="body" rows="4" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" placeholder="Enter description">{{old('body')}}</textarea>
                @if($errors->has('body')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{$errors->first('body')}} {{-- <- Display the First validation error --}}
                </span>
            @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
