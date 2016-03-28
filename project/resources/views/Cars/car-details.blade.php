
@extends("default")
@section('title',$title)
@section('content')
<h1>Voiture: {{$car->model}}</h1>





<!-- Wrapper for slides -->
<div class="owl-carousel">
    @foreach(json_decode($car->picture) as $pic)
    <div class="item ">
        <img src="{{url('project/uploads').'/'.$pic}}" alt="image">

    </div>
    @endforeach
</div>

@if(isset($categories))   
    @foreach($categories as $category)
    <h3>{{$category['name']}}</h3>
    <ul>
        @foreach($category['options'] as $option)
        <li> {{$option->name}} - <strong>Desc:</strong> {{$option->description}} </li>
        @endforeach
    </ul>
    @endforeach
@endif    
@stop