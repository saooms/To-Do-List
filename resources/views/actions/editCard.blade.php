@extends('layouts.app')

@section('content')

    <h1 class="w3-center">Edit Card</h1>
            <span id="closecard" class="w3-button w3-xlarge w3-transparent w3-display-topright" onclick="location.href = '/toDoList/public'">×</span>
            {!! Form::open(['action' => ['CardsController@update', $lists[3]->id] , 'method' => 'POST']) !!}
                
                    <header>
                        {{Form::label('title', 'Title')}}
                        <p class="w3-center">
                            {{Form::text('title', $lists[3]->title)}}
                        </p>
                    </header>

                    {{Form::textarea('body', $lists[3]->text)}}
                    {{Form::select('list', $lists[2], ($lists[3]->list_id -1), ['class' => 'form-control'])}}
                    {{Form::select('state', $lists[4], $lists[3]->state_id, ['class' => 'form-control'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class'=> 'w3-btn w3-green w3-display-bottomleft'])}}

            {!! Form::close() !!}
                        
        </div>
    </section>

    @endsection

<style>
    #cardmaker {
        display: inline;
    }

</style>
