<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>To Do List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script> -->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body>
    <nav class="w3-bar w3-green"><h1>To Do List</h1></nav>
    <section id="lists">
        @if(count($lists) > 0)
            @foreach ($lists[0] as $list)
                <div class="list w3-ul w3-border ">
                    <title>{{$list->title}}</title>
                    @foreach ($lists[1] as $card)
                        @if ($card->list_id == $list->id)
                        <div class="card w3-card ">
                            <header>
                                <h2 class="w3-center">{{$card->title}}</h2>
                                <p class="w3-center w3-hover-green">...</p>
                            </header>
                            <p>{{$card->text}}</p>
                            <i onclick="" class="w3-button">x</i>
                        </div>
                        @endif
                    @endforeach
                    <a class="w3-hover-green w3-hover-shadow w3-center" href="create">add card +</a>
                </div>
                
            @endforeach
        @endif
        <div class="w3-display-container addlst">
            <i class="fas fa-3x fa-plus-square w3-hover-shadow w3-hover-grey w3-display-right" ></i>
        </div>
    </section>
    
</body>
</html>