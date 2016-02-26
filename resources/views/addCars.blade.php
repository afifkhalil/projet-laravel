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
    .btn-info.add-option {
        margin-top: 25px;
    }
</style>
<h1>Ajouter Voiture</h1>
{!! Form::open(['method'=>'post', 'url'=>'cars/add-car' , 'files'=>true])!!}
<div class="form-group">
    {!! Form::label('modelL','Modele') !!}
    {!! Form::text('model', '',['class'=>'form-control', 'placeholder'=>'Modele de la voiture', 'required'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('pictureL','Photo') !!}
    {!! Form::file('picture[]', ['multiple'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('videoL','Video') !!}
    {!! Form::text('video', '',['class'=>'form-control', 'placeholder'=>'Lien de la video']) !!}
</div>
<div class="form-group">
    {!! Form::label('basic_priceL','Prix basique') !!}
    {!! Form::text('basic_price', '',['class'=>'form-control', 'placeholder'=>'Modele de la voiture']) !!}
</div>
<div class="form-group">
    {!! Form::label('disponible','Disponible dans le garage') !!}<br>
    {!! Form::radio('response', '1',false) !!}
    {!! Form::label('oui','OUI') !!}
    {!! Form::radio('response', '0',false) !!}
    {!! Form::label('non','NON') !!}
</div>

{!! Form::hidden('tab_option', "") !!}
@if(isset($categories))
   @foreach($categories as $c)
    @if (isset($c))
        @if (isset($opp[$c->id]))
            <h3>Categorie : {{$c->name_category}}</h3>
            

            <div id="parent-{{$c->id}}" class="rows">
                <div class="row to-copy line-input">
                    <div class="col-md-3">
                        {!! Form::label('','Option :') !!}
                        {!! Form::select('option', $opp[$c->id],null,['class'=>'form-control option','name'=>'option-'.$c->id]) !!}
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-info add-option" data-id="{{$c->id}}"><i class="fa fa-plus" ></i>Ajouter</button>
                    </div>
                    <br> 
                    <div class="col-md-6" id="new_option_{{$c->id}}">

                    </div>
                </div>                
            </div>
            @endif
        @endif
   @endforeach
@endif
<button class="btn btn-success" type="submit">save</button>
{!! Form::close()!!}
<div class="hidden" id="to-clone">
    <div class="col-md-8">
        <p></p>
    </div>
    <div class="col-md-4">
        {!! Form::text('', '',['class'=>'form-control price', 'placeholder'=>'Prix','required'=>true]) !!}
    </div>
</div> 
@stop