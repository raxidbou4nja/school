@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nouveau Bulletin Pour {{ $level->name }}</div>
                @if(session()->has('error'))
                    <div class="alert alert-danger text-center mt-2">
                         {{ session()->get('error') }}
                    </div>
                @endif


                <div class="card-body">
                    <form action="{{ route('createBulletin')  }}" method="post" >
                        @csrf
                        <input type="hidden" name="level" value="{{ $level->id }}">
                        @foreach($subjects as $subject)
                            <div class="form-group">
                                <label>{{ $subject->name }}</label>
                                <input type="text" name="{{ $subject->id }}" class="form-control" placeholder="ex. 14,00" value="{{ @session()->get('old')[$subject->id] }}" required>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
