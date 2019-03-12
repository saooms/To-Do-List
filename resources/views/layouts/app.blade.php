<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script> -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">  
</head>
<body>
    <nav class="w3-bar w3-green"><h1>To Do List</h1></nav>
    <section id="lists" class="">
        @if(count($lists) > 0)
            @foreach ($lists[0] as $list)
                <div class="list w3-display-container">
                    <h2 class="w3-center">{{$list->title}}</h2>
                    {!! Form::open(['action' => ['ListsController@destroy', $list->id], 'method' => 'POST',  'onsubmit' => 'return check()'])!!}
                        {{ Form::hidden('_method', 'DELETE')}}
                        {{ Form::submit('X', ['class' => 'w3-button w3-hover-red w3-display-topleft'])}}
                    {!! Form::close()!!}
                    <p class="w3-center w3-hover-green" onclick="location.href = 'lists/{{$list->id}}/edit'">...</p>
                
                    <hr>
                    @for ($i = 0; $i < count($lists[1]); $i++)
                        @foreach ($lists[1][$i] as $card)
                            @if ($card->list_id == $list->id)
                                <div class="card w3-card {{($list->filterdate > 0)?($card->created_at < (date('Y-m-d', strtotime('-'.$list->filterdate.'days'))))? ' ' : ' ghost ':''}} {{($list->filterstate != '0')?(($card->state_id == $list->filterstate - 1 ) ? ' ' : ' ghost'):''}}">
                                    <header class="state{{$card->state_id}}">
                                        <h2 class="w3-center">{{$card->title}}</h2>
                                        <p class="w3-center w3-hover-green" onclick="location.href = 'cards/{{$card->id}}/edit'">...</p>
                                    </header>
                                    <p>{{$card->text}}</p>
                                    <p><small><small>{{$card->created_at}}</small></small></p>
                                    {!! Form::open(['action' => ['CardsController@destroy', $card->id], 'method' => 'POST',  'onsubmit' => 'return check()'])!!}
                                        {{ Form::hidden('_method', 'DELETE')}}
                                        {{ Form::submit('X', ['class' => 'w3-button'])}}
                                    {!! Form::close()!!}
                                </div>
                            @endif
                        @endforeach
                    @endfor
                    
                    <button class="addcard w3-hover-green w3-button w3-hover-shadow" onclick="location.href = 'cards/create'">add card +</button>
                </div>
            @endforeach
        @endif

        <div class="w3-display-container addlst">
            <i class="fas fa-3x fa-plus-square w3-hover-shadow w3-hover-grey w3-display-right" onclick="location.href = 'lists/create'"></i>
        </div>
    </section>

    <section id="cardmaker" class="w3-modal">
        <div class="card w3-card w3-modal-content w3-animate-zoom w3-display-middle w3-display-container">
            @yield('content')
        </div>
    </section>
    
    

    
</body>
</html>