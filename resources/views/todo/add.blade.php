@extends('layout.dashboard')

@section('content')

@include('layout.partials.message')

<form name='form' action="{{ $todo->id ? route('todo.update', $todo->id) : route('todo.store')}}" method='post'>
    {{ method_field($todo->id ? 'PATCH' : 'POST') }}
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ $todo->title }}" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" name="description" class="form-control" id="description" value="{{ $todo->description }}" placeholder="Enter description here">
    </div>
    <div class="form-group">
        <label for="reference">Reference:</label>
        <input type="text" name="reference" class="form-control" id="reference" value="{{ $todo->reference }}" placeholder="Enter reference here">
    </div>
    <div class="form-group">
        <label for="priority">Priority:</label>
        <select name="priority">
            <option value="">Select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" name="category" class="form-control" id="category" value="{{ $todo->category }}" placeholder="Enter category here">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    <a href="{{ action('TodoController@index') }}"> <button type="button" class="btn btn-success">View All Todo</button> </a>
</form>
@endsection