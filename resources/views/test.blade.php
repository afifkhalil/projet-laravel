@extends("default")
@section('title',$title)

@section('content')
<style>
    h3{
        background: #F5F5F5;
        border-radius: 7px;
        padding: 10px 20px;
        font-size: 17px !important;
        text-transform: uppercase;
        border: 1px solid rgba(221, 221, 221, 0.86);
        margin-top: 35px !important;
    }
    .dddd {
        background: red;
    }
    .rows .row {
        margin-bottom: 20px;
    }
    .hidden{
        display: none;
    }
    p{
        padding:6px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: #f5f5f5;
    }
</style>
<h1>Ajouter Voiture</h1>
{!! Form::open(['method'=>'post', 'url'=>('addCars') ])!!}

<div class="form-group">
    {!! Form::label('pictureL','Photo') !!}
    {!! Form::file('picture', ['multiple'=>true]) !!}
</div>


<button class="btn btn-success" type="submit">save</button>
{!! Form::close()!!}
<div class="hidden" id="to-clone">
    <div class="col-md-8">
        <p></p>
    </div>
    <div class="col-md-4">
        {!! Form::text('', '',['class'=>'form-control price', 'placeholder'=>'Prix']) !!}
    </div>
</div> 
@stop