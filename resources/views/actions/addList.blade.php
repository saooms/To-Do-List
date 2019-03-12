@extends('layouts.app')

@section('content')
<h1 class="w3-center">Create list</h1>
            <span id="closecard" class="w3-button w3-xlarge w3-transparent w3-display-topright" onclick="location.href = '/toDoList/public'">×</span>
            {!! Form::open(['action' => 'ListsController@store', 'method' => 'POST']) !!}
                <header>
                    {{Form::label('title', 'Title')}}
                    <p class="w3-center">
                        {{Form::text('title', '', [ 'placeholder' => 'Title'])}}
                    </p>
                </header>
                {{Form::submit('Submit', ['class'=> 'w3-btn w3-green w3-display-bottomleft'])}}
            {!! Form::close() !!}
                        
@endsection
<style>
    #cardmaker {
        display: inline;
    }

</style>