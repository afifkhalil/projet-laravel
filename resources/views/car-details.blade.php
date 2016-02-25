@extends("default")
@section('title',$title)

@section('content')


<h1>Voiture : {{$car->model}}</h1>
    
     
    @foreach($categories as $cat)
    <h3>{{$cat['name']['name_category'] }}</h3>
   
    <ul>
        
        @foreach($cat as $option)
            @if(!empty($option['options-name'] ))
                <li>{{ $option['options-name'] }} <strong>  {{ $option['price'] }}</strong></li>
            @endif
        @endforeach
    </ul>
    @endforeach
    
  

@stop