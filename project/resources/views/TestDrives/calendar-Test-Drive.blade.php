@extends("default")
@section('title',$title)

@section('content')

<h1 align="center">Calendrier</h1>

    <ul>
   
            @foreach($dateDispo as $date)
            @if(!empty($date->date))
            
                <div class="{{$date->id}}">
                  <li class="haut">
                    {{$date->date}} 
                    <button class="btn btn-info modifier btn-xs"  data-id="{{$date->id}}">Modifier</button>
                    <button class="btn btn-info supprimer btn-xs"  data-id="{{$date->id}}">Supprimer</button>
                  </li>

                </div>    
            @endif
            @endforeach
            
 
</ul>

@stop

@section('js')
<script src="{{ url('project/resources/assets/plugins/datePicker/js/bootstrap-datepicker.js') }}"></script>
<script>
    hoursRoute= "{{route('Hours',0)}}";
    hoursRoute = hoursRoute.slice(0, -1);
    suppdayRoute= "{{route('supp-day',0)}}";
    suppdayRoute = suppdayRoute.slice(0, -1);
    
</script>
@stop