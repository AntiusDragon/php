@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header">Redaguoti sunkvežimio duomenis</div>
                <div class="card-body">
                    <form action="{{route('trucks-update', $truck)}}" method="post">
                        <div class="form-group">
                            <label>Sunkvažimio modelis</label>
                            <input type="text" name="brand" class="form-control" value="{{ old('brand', $truck->brand) }}">
                            <small class="form-text text-muted">Įveskite naują sinkvežimio modelį</small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Valstibinis numeris</label>
                            <input type="text" name="plate" class="form-control" value="{{ old('plate', $truck->plate) }}">
                            <small class="form-text text-muted">Įveskite naują sunkvežimio valstybinį numerį</small>
                        </div>
                        <div class="form-group mb-3">
                            <label>Mechanikas</label>
                            <select class="form-select" name="mechanic_id">
                                <option value="0">Pasirinkite mechaniką</option>
                                @foreach ($mechanics as $mechanic)
                                    <option value="{{$mechanic->id}}" 
                                        @if(old('mechanic_id', $truck->mechanic_id) == $mechanic->id) selected @endif
                                        >{{$mechanic->name}} {{$mechanic->surname}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Priskirkite naują mechaniką sunkvežimio priežiūrai</small>
                        </div>
                        <button type="submit" class="btn btn-outline-primary me-3">Išsaugorti</button>
                        <a href="{{ route('trucks-index') }}" class="btn btn-secondary">Atšaukti</a>
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Sunkvežimio redagavimas')