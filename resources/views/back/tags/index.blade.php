@extends('back.master')

@section('content')

<h2>Liste des Tags</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
                <td>
                    <a href="/admin/tags/edit/{{$tag->id}}" class="btn btn-primary">Modifier</a>
                    <a href="/admin/tags/delate/{{$tag->id}}" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        @endforeach
        </tbody>

        <tfooter>
            <tr>
                <td><a href="/admin/tags/create" class="btn btn-primary">Créer</a></td>
                <td></td>
                <td></td>
            </tr>
        </tfooter>
        
    </table>
</div>
@endsection