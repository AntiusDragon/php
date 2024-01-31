@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">

                <div class="card-header">
                    <h1>Sunkvežimių parkas</h1>

                    <form action="{{route('trucks-index')}}">
                        <div class="container">
                            <div class="row ">

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label class="m-2">Rūšiaviams</label>
                                        <select class="form-select mt-2" name="sort">
                                            @foreach ($sorts as $sort_key => $sort_value)
                                            <option value="{{ $sort_key }}" 
                                            @if ($sortBy == $sort_key) selected @endif
                                            >{{ $sort_value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label class="m-2">Rodyti puslapyje rezultatų</label>
                                        <select class="form-select mt-2" name="per_page">
                                            @foreach ($perPageSelect as $sort_key => $sort_value)
                                            <option value="{{ $sort_key }}" 
                                            @if ($perPage == $sort_key) selected @endif
                                            >{{ $sort_value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label class="m-2">Ieškoti mechaniko</label>
                                        <input type="text" class="form-control mt-2" name="s" value="{{ $s }}">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-5">Rodyti</button>
                                        <a href="{{ route('trucks-index') }}" class="btn btn-secondary mt-5 ms-2">Pradinis</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body">

                    <table class="table">
                        <tr>
                            <th>Modelis</th>
                            <th>Numeris</th>
                            <th>Mechanikas</th>
                            <th>Veiksmai</th>
                        </tr>
                        @forelse ($trucks as $truck)
                        <tr>
                            <td>{{ $truck->brand }}</td>
                            <td>{{ $truck->plate }}</td>
                            <td>{{ $truck->mechanic->name }} {{ $truck->mechanic->surname }}</td>
                            <td>
                                <a class="btn btn-success m-1" href={{ route('trucks-edit', $truck->id) }}>Redaguoti</a>
                                <a class="btn btn-danger m-1" href={{ route('trucks-delete', $truck->id) }}>Nurašyti</a>
                                <a class="btn btn-secondary m-1" href={{ route('trucks-show', $truck->id) }}>Peržiūrėti</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Sunkvežimių nėra</td>
                        </tr>
                        @endforelse
                    </table>
                    <div>
                        <a href="{{ route('trucks-create') }}" class="btn btn-success">Pridėti</a>
                    </div>

                </div>
            </div>
            @if ($perPage)
            <div class="mt-3">  
                {{ $trucks->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('title', 'Sunkvežimių parkas')