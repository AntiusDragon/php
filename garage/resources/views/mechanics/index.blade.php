@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Dirbantys Mechanikai</h1>

                    <form action="" method="">
                        <div class="container">
                            <div class="row ">
                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label class="ms-1">Rūšiaviams</label>
                                        <select class="form-select" name="sort">
                                            <option value="0">nerūšiuota</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-body">

                    <table class="table">
                        <tr>
                            <th>Vardas</th>
                            <th>Pavardė</th>
                            <th>Veiksmai</th>
                        </tr>
                        @forelse ($mechanics as $mechanic)
                        <tr>
                            <td>{{ $mechanic->name }}</td>
                            <td>{{ $mechanic->surname }}</td>
                            <td>
                                <a class="btn btn-success m-1" href={{ route('mechanics-edit', $mechanic->id) }}>Redaguoti</a>
                                <a class="btn btn-danger m-1" href={{ route('mechanics-delete', $mechanic->id) }}>Atleisti [{{$mechanic->trucks()->count()}}]</a>
                                <a class="btn btn-secondary m-1" href={{ route('mechanics-show', $mechanic->id) }}>Peržiūrėti</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Mecanikų nėra</td>
                        </tr>
                        @endforelse
                    </table>
                    <div>
                        <a href="{{ route('mechanics-create') }}" class="btn btn-success">Pridėti</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Dirbantys Mechanikai')