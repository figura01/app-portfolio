@extends('back.master')

@section('content')

<h2>Editer un tag</h2>
<hr>
<div>
    <h3>Info tag</h3>
    <p><strong>Name:</strong> {{$tag->name}}</p>
</div>
<div class="form-responsive">
   <form method="POST" action="{{$tag->id}}">
   {{ csrf_field() }}
   {{ method_field('PUT') }}
        <div class="form-group">
            <lable for="name">Nom:</label>
            <input type="text" name="name" value="{{$tag->name}}">
        </div>
        <div class="form-group">
            <input type="submit" value="Mettre à jour">
        </div>
   </form>
</div>
@endsection