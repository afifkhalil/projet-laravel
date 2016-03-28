@extends("default")
@section('title',$title)

@section('content')


<h1>Voiture</h1>
<ul>
    @foreach($cars as $car)
        @if(!empty($car->model))
             <li><a href="{{route('affiche', $car->id)}}">{{ $car->model }}</a></li>
        @endif
    @endforeach
    
</ul>
@stop