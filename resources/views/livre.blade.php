@extends('templates.base')
@section('title','bibliotheque')
@section('content')
  <h1>Bibliotheque</h1>
  <div class="container" style="width:100%;">
    @if (sizeof($livres) >1)
      <table id="livre-table">
        <tr>
          <th>name</th>
          <th>date de publication</th>
          <th>genre</th>
          <th>description</th>
          <th>modifier</th>
          <th>supprimer</th>
        </tr>
      @foreach ($livres as $livre)
        <tr>
          <td>{{$livre->name}}</td>
          <td>{{$livre->publication}}</td>
          <td>
          @foreach ($livre->genres as $genre)
            <span>{{$genre->name}}, </span>
          @endforeach
          </td>
          <td>
          @foreach ($livre->genres as $genre)
            <span>{{$genre->description}}</span>
          @endforeach
          </td>
          <td><a id="modifier" href="/livre/{{$livre->id}}/update">modifier</a></td>
          <td><a id="delete" href="/livre/{{$livre->id}}/delete">delete</a></td>
        </tr>
      @endforeach
      </table>
    @elseif (sizeof($livres) == 1)
      <table id="livre-table">
        <tr>
          <th>name</th>
          <th>date de publication</th>
          <th>genre</th>
          <th>description</th>
          <th>modifier</th>
          <th>supprimer</th>
        </tr>
        <tr>
          <td>{{$livre->name}}</td>
          <td>{{$livre->publication}}</td>
          <td>
          @foreach ($livre->genres as $genre)
            <span>{{$genre->name}}</span>
          @endforeach
          </td>
          <td>
          @foreach ($livre->genres as $genre)
            <span>{{$genre->description}}</span>
          @endforeach
          </td>
          <td><a id="delete" href="/livre/{{$livre->id}}/delete">delete</a></td>
        </tr>
      </table>
      @else
        <p></p>
    @endif
  </div>
@endsection
