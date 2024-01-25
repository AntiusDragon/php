@extends('layout')

@section('body')
@if ($result !== '')
    <h1>Result: {{$result}}</h1>
@endif

<form action="{{route('do-count')}}" method="post">
    @csrf
    <input type="text" name="count1">
    <input type="text" name="count2">
    <button type="submit">Submit</button>
</form>
@endsection

@section('title', 'Magic Counter')