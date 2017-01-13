@extends('templates.base')
@section('title','ajout d\'un livre')
@section('content')
  <h1>{{ isset($updatedLivre) ? 'Mise a jour de : ' . $updatedLivre->name : 'Ajout d’un livre'}}</h1>
  @if (isset($updatedLivre))
    {{Form::open(['url' => 'livre/update'])}}
    {{Form::hidden('id', $updatedLivre->id)}}
    @else
    {{Form::open(['url' => 'livre/new'])}}
  @endif
    {{Form::label('name','Nom du livre : ')}}
    {{Form::text('name',isset($updatedLivre) ? $updatedLivre->name : '')}}
    {{Form::label('publication','date de publication : ')}}
    {{Form::text('publication',isset($updatedLivre) ? $updatedLivre->publication : '')}}
    {{Form::label('genres','genre(s): ')}}
    {{Form::select('genres[]', $genres, $genresId, ['multiple' => true])}}
    {{Form::submit('Créer')}}
  {{Form::close()}}
@endsection
