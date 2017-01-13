<?php

namespace App\Http\Controllers;

use App\Livre;
use App\Genre;
use Illuminate\Http\Request;
use Form;
class LivreController extends Controller
{

    public function index()
    {
        $livres = Livre::all();
        $genres = Genre::all();
        $genreArray = array();
        foreach ($genres as $genre) {
          $genreArray[$genre->id] = $genre->name;
        }
        return view('/livre',["livres" => $livres, "genre" => $genreArray]);
    }
    public function create()
    {
      $genres = Genre::all();
      $genreArrayId = array();
      $genreArray = array();
      foreach ($genres as $genre) {
        $genreArrayId[] = $genre->id;
        $genreArray[$genre->id] = $genre->name;
      }

      return view('/ajoutlivre',["genres" => $genreArray, "genresId" => $genreArrayId]);
    }
    public function insertOne(Request $request)
    {
        $livre = new Livre;
        $livre->name = $request->name;
        $livre->publication = $request->publication;
        $livre->save();
        foreach ($request->genres as $key => $value) {
          $existingGenre = Genre::find($value);
          $livre->genres()->attach($existingGenre->id);
        }
        return redirect('/livre');
    }
    public function deleteOne(Request $request, $id)
    {
        Livre::destroy($id);
        return redirect('/livre');
    }
    public function livreUpdate($id) //update pour add un new super power
    {
        $livre = Livre::find($id);
        $genres = Genre::all();
        $genreArrayId = array();
        $genreArray = array();
        foreach ($genres as $genre) {
          $genreArrayId[] = $genre->id;
          $genreArray[$genre->id] = $genre->name;
        }
        return view('ajoutlivre', ['updatedLivre' => $livre, "genres" => $genreArray, "genresId" => $genreArrayId]);
    }
    public function updateOne(Request $request)
    {
      $livre = Livre::find($request->id);
      $livre->name = $request->name;
      $livre->publication = $request->publication;
      $livre->save();
      if (is_array($request->genres)) {
        $livre->genres()->sync($request->genres);
      } else {
        $livre->genres()->detach();
      }
      return redirect('/livre');
    }
}
