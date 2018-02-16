@extends('back.master')

@section('content')
        
      
<h2>Liste des Images</h2>
<hr>
<form method="POST" action="/admin/pictures" class="dropzone" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
  <div class="form-group">
        <input type="submit" value="Uploader">
    </div>
</form>
  
    



 <div class="table-responsive">
    
@if( isset($pictures) && count($pictures) > 0 )

   
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Visu</th>
                <th>Name</th>
                <th>Id</th>
                <th>Size</th>
                <th>Link</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
    @foreach($pictures as $picture)
        <tr>
            <td>
                <img src="/images/{{$picture->link}}" width="100px">
            
            </td>
            <td>Name: {{$picture->name}}</td>
            <td>Id: {{$picture->id}}</td>
            <td>Size: {{$picture->size}}</td>
            <td>Link: {{$picture->link}}</td>
            <td>
                <a href="" class="btn btn-primary">Voir</a>
                <a href="/admin/pictures/modify/{{$picture->id}}" class="btn btn-primary">Modifier</a>
                <a href="/admin/pictures/delete/{{$picture->id}}" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    @endforeach

@else

<div class="col-sm-12">
    <p>Pas d'images uploader</p>
</div>
    @endif
</div>
@endsection