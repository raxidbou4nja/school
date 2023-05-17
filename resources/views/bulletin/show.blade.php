@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bultain Pour <b>{{ $bulletin->haslevel->name }}</b></div>

                <div class="card-body">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Subject</th>
                            <th>coefficient</th>
                            <th>note</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                        @php
                            $totalCoefficient = 0;
                            $totalMark = 0;
                        @endphp
                        
                        @foreach($notes as $note)

                            @php
                                $totalMark += $note->mark;
                                $totalCoefficient += $note->subject->coefficient;
                            @endphp
                            <tr>
                                <td>{{ $note->subject->name }}</td>
                                <td>{{ $note->subject->coefficient }}</td>
                                <td>{{ $note->mark }}</td>
                                <td>{{ $note->subject->coefficient * $note->mark }}</td>
                            </tr>  
                        @endforeach
                        <tr>
                            <td>SubTotal</td> 
                            <td>{{ $totalCoefficient }}</td>
                            <td>{{ $totalMark }}</td> 

                        </tr>
                        <tr>
                            <td colspan="3">Result</td>
                            <td>{{ $bulletin->total }}</td>
                        </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
