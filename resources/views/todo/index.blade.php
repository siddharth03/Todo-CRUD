@extends('layout.dashboard')

@section('content')
@include('layout.partials.message')
<div>
    <form action="{{ route('todo.search')}}" method="GET">
        <label for="title">Search:</label>
        <input type="text" name="searchbycombo" value="{{ $request ? $request->get('searchbycombo') : ''}}"  class="form-control" placeholder="Enter to search">
        <div class="form-group">
            <label for="priority">Priority:</label>
            <select name="priority">
                <option></option>
                @for ($i=1; $i <= 10; $i++)
                <option value="{{$i}}" {!! $request->get('priority') == $i ? 'selected' : '' !!}>{{$i}}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    @foreach ($todos as $todo)  
        <ul class="list-group">
            <li class="list-group-item list-group-item-info">
                <h4>Title:{{$todo->title}}<br>
                Description:{{$todo->description}}</h4>
                <div class="btn-group">
                    <form action="{{ route('todo.destroy', $todo->id)}}" method="post">
                    {{method_field('DELETE')}}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href ="{{ route('todo.edit', $todo->id)}}" class="btn btn-primary">Edit</a>  
                    </form>
                </div>
            </li>
        </ul>
    @endforeach
    </div>
@endsection