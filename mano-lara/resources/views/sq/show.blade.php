@extends('layout')

@section('body')
<style>
    .bin {
        display: flex;
        flex-wrap: wrap;
        gap: 0.6rem;
        width: 30rem;
        border: 0.1rem solid #ccc;
        padding: 1rem;
        margin-top: 1rem;
    }
    .square {
        width: 3rem;
        height: 3rem;
        background-color: crimson;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    form {
        margin-top: 1rem;
    }
</style>

<h1>Now is: {{$count}} Squares</h1>

    <form action="{{route('do-squares')}}" method="post">
        <input type="text" name="count">
        <button type="submit">Create Squares</button>
        @csrf
    </form>

    <form action="{{route('add-squares')}}" method="post">
        <input type="text" name="count">
        <button type="submit">Add Squares</button>
        @method('PUT')
        @csrf
    </form>

<div class="bin">
    @forelse ($squares as $square)
        <div class="square">{{$square}}</div>
    @empty
        <h2>No Square</h2>
    @endforelse
</div>

@endsection

@section('title', 'Magic Squares')