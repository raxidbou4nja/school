@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bulletin</div>
                <div class="row m-0 justify-content-center">
                <form action="{{ route('createBulletin') }}" class="col-md-6 p-3"> 
                        <div class="row">
                            <div class="form-group col-md-7 m-0">
                                <select class="form-control" name="level">
                                    @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-primary col-md-3 mx-2">Créer</button>
                        </div>
                </form>
                <a class="col-md-4 my-auto text-dark text-decoration-none " href="{{ route('calculator') }}">
                   <div class="text-center bg-light border fw-bold d-flex rounded">
                        <div class="my-auto m-1">
                            <img src="images/calculator.svg" width="50px">
                        </div> 
                        <div class="p-3 fw-bold  w-100">
                            Calculatrice
                        </div>
                    </div>
                </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>
                                Id
                            </th>
                            <th>
                                Nivau Scolaire
                            </th>
                            <th>
                                Note
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @forelse($bulletins as $bulletin)
                            <tr>
                                <td>{{ $bulletin->id }}</td>
                                <td>{{ $bulletin->hasLevel->name }}</td>
                                <td>{{ $bulletin->total }}</td>
                                <td><a href="{{ route('showBulletin', $bulletin->id)}}" class="btn btn-outline-primary btn-sm">voir</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">aucun bulletin</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="justify-content-center row">
                        {{ $bulletins->links() }} 
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
