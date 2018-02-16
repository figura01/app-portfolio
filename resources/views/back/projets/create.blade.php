@extends('back.master')

@section('content')

<h2>Créer un projet</h2>
<hr>

<div class="form-responsive">
   <form method="POST" action="/admin/projets/create/" enctype="multipart/form-data">
   {{ csrf_field() }}
        <div class="row">
        <h3>Choisir un nom</h3>
            <div class="form-group col-md-12">
                <lable for="name">Nom:</label>
                <input type="text" name="name" value="">

            
            </div>
        </div>

        <div class="row">
            <h3>Choisir un titre</h3>
            <div class="form-group col-md-12">
                <lable for="name">Titre:</label>
                <input type="text" name="title" value="">
            </div>
        </div>

        <div class="row">
            <h3>Editer l'extrait</h3>
            <div class="form-group col-md-12">
                <textarea class="form-control" name="excerpt"></textarea>
            </div>
        </div>

        <div class="row">
            <h3>Editer le contenu</h3>
            <div class="form-group col-md-12">
                <textarea class="form-control" name="content"></textarea>
            </div>
        </div>
        

        <div class="form-group">
        <label class="col-md-12 " for="categorie_id">Catégorie</label>
        <div class="col-md-12">
          <select id="categorie_id" name="categorie_id" class="form-control">
            <option value="">Non catégorisé</option>
            @forelse($categories as $id => $title)
            <option {{old('categorie_id') == $id ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
            @empty

            @endforelse
          </select>
        </div>
      </div>

       <div class="row">
            <h3>Charger une image</h3>
            <div class="form-group col-md-12">
                <input name="file" type="file" multiple />
            </div>
        </div>

       

        <div class="row">
            <div class="form-group">
                <h3>Publier le projet</h3>
                <label><input type="radio" value="1" name="published">Oui</label>
                <label><input type="radio" value="0" name="published">Non</label>
           
            </div>
        </div>

          <div class="row">
            <h3>Choisir une URL</h3>
            <div class="form-group col-md-12">
                <lable for="link">URL:</label>
                <input type="text" name="link" value="">
            </div>
        </div>

        <div class="col-md-12">
            @forelse($tags as $id => $name)
            <div class="checkbox col-md-4">
                <label for="tag_{{$id}}">
                <input name="tag_id[]" id="tag_{{$id}}" value="{{$id}}" type="checkbox">
                {{$name}}
                </label>
            </div>
            @empty

            @endforelse
          
          
        </div>

        <div class="form-group">
            <input type="submit" value="Enregistrer">
        </div>
   </form>
</div>

@include('layouts.errors')

@endsection