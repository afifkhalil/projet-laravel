@extends("default")

@section('content')


<h1>Voiture</h1>

@foreach($categories as $category)
    
<h3>{{$category['name']}}</h3>
<ul>
    @foreach($category['options'] as $option)
    
        
    <li> {{$option->name}} - <strong>Desc:</strong> {{$option->description}} </li>
    @endforeach
</ul>
@endforeach
@stop