@extends('layouts.app')

@section('content')

    <h1 class="w3-center">Edit List</h1>
            <span id="closecard" class="w3-button w3-xlarge w3-transparent w3-display-topright" onclick="location.href = '/toDoList/public'">×</span>
            {!! Form::open(['action' => ['ListsController@update', $lists[2]->id] , 'method' => 'POST']) !!}
                
                    <header>
                        {{Form::label('title', 'Title')}}
                        <p class="w3-center">
                            {{Form::text('title', $lists[2]->title)}}
                        </p>
                    </header>

                    {{ Form::label('filter', 'filter list by:')}}<br>
                    {{ Form::label('filter', 'days sinds now')}}{{Form::text('date', $lists[2]->filterdate, [ 'placeholder' => 'Body Text'])}} <br>
                    {{ Form::label('filter', 'show states')}}{{Form::select('filterstate', $lists[3], $lists[2]->filterstate, ['class' => 'form-control'])}} <br>
                    <hr>
                    {{ Form::label('sort', 'sort list by:')}}
                    <br>
                    {{ Form::label('state')}}    {{form::radio('orderstate', 'true')}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class'=> 'w3-btn w3-green w3-display-bottomleft'])}}

            {!! Form::close() !!}
                        
@endsection
<style>
    #cardmaker {
        display: inline;
    }

</style>