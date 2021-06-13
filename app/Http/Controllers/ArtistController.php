<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
  public function getAll()
  {
    return Artist::paginate(10);
  }

  public function getArtist($id)
  {
    return Artist::getById($id);
  }
}
