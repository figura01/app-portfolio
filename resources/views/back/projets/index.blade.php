@extends('back.master')

@section('content')
        
      
<h2>Liste des Projets</h2>
<hr>

<div class="table-responsive">
    
@if( isset($projets) && count($projets) > 0 )

   
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Visu</th>
                <th>Name</th>
                <th>Id</th>
                <th>Catégorie</th>
                <th>Tags</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
    @foreach($projets as $projet)
        <tr>
            <td>
                <img src="/images/{{$picture->link}}" width="100px">
            </td>
            <td>Name: {{$projet->name}}</td>
            <td>Id: {{$projet->id}}</td>
            <td>Size: {{$projet->size}}</td>
            <td>Link: {{$projet->link}}</td>
            <td>
                <a href="" class="btn btn-primary">Voir</a>
                <a href="/admin/projets/modify/{{$projet->id}}" class="btn btn-primary">Modifier</a>
                <a href="/admin/projets/delete/{{$projet->id}}" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    @endforeach
        <tfooter>
            <td colspan="6"><a hreh="/admin/projets/create" class="btn btn-success">Ajouter</a></td>
        
        </tfooter>
@else

<div class="col-sm-12">
    <p>Pas de projet</p>

    <a href="/admin/projets/create" class="btn btn-success">Ajouter</a>
</div>
    @endif
</div>
@endsection