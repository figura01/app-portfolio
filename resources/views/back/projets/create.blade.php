@extends('back.master')

@section('content')
<div class="form-responsive">



    <div class="row">
    <div class="col-md-10 col-md-offset-1">  
    <h2>Créer un projet</h2>
<hr> 
   <form method="POST" action="/admin/projets/create/" enctype="multipart/form-data">
   {{ csrf_field() }}
        <div class="row">
       
            <div class="col-md-6">
                <div class="form-group">
                    <h3>Choisir un nom</h3>
                    <lable for="name">Nom:</label>
                    <input type="text" name="name" value="">
                </div>
            </div>

            <div class="col-md-6">
                <h3>Choisir un titre</h3>
                <lable for="Titre">Titre:</label>
                <input type="text" name="title" value="">
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="form-group col-md-12">
                <h3>Editer l'extrait</h3>
                <textarea class="form-control" name="excerpt"></textarea>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="form-group col-md-12">
                <h3>Editer le contenu</h3>
                <textarea class="form-control" name="content"></textarea>
            </div>
        </div>

        <hr>        

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="categorie_id">Catégorie</label>
                    <select id="categorie_id" name="categorie_id" class="form-control">
                        <option value="">Non catégorisé</option>
                        @forelse($categories as $id => $title)
                        <option {{old('categorie_id') == $id ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <h3>Charger une image</h3>
                    <input name="file" type="file" multiple />
                </div>

            </div>

            <div class="col-md-6">
                <h3>Selectionner des tags</h3>
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
        
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">    
                    <h3>Publier le projet</h3>
                    <label><input type="radio" value="1" name="published">Oui</label>
                    <label><input type="radio" value="0" name="published">Non</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h3>Choisir une URL</h3>
                    <lable for="link">URL:</label>
                    <input type="text" name="link" value="">
                </div>
            </div>
        </div>

        @if(count($pictures) > 0)
        <div class="row">

            <div class="col-md-12">
            <h3>Associer images loader</h3>
            <div class="row">
                @foreach($pictures as $picture)
                <div class="checkbox col-md-4">
                    <label for="name">{{$picture->name}}</label>
                    <img src="{{ asset('/images/' .$picture->link ) }}" width="100%">
                    <input name="img_id[]" id="img_{{$picture->id}}" value="{{$picture->id}}" type="checkbox">
                    
                    
                </div>
                @endforeach
            </div>

            </div>    
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="submit" value="Enregistrer" class="btn btn-primary">   
                </div>
            </div>
        </div>
    

       
   </form>
   <div>
   </div>
</div>

@include('layouts.errors')

@endsection