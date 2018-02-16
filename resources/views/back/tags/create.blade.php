@extends('back.master')

@section('content')

<h2>Créer un tag</h2>
<hr>

<div class="form-responsive">
   <form method="POST" action="/admin/tags/create/">
   {{ csrf_field() }}
   
        <div class="form-group">
            <lable for="name">Nom:</label>
            <input type="text" name="name" value="">
        </div>
        <div class="form-group">
            <input type="submit" value="Enregistrer">
        </div>
   </form>
</div>

@include('layouts.errors')

@endsection