<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Publication;


class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::all();

    return view('publications.index', [
        'publications' => $publications
    ]);
    } 
    
    
    public function show(int $id)
    {
    
    $publication = Publication::where('id', $id)->firstOrFail();

    return view('publications.show', [
        'publication' => $publication,
        'comments' => $publication->comments
    ]);
}
}

