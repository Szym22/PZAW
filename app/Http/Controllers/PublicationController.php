<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Publication;
use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::orderByDesc('created_at')->get();

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

    public function create()
    {

    return view('publications.form');

    }

    public function store(StorePublicationRequest $request)
    {
        $data = $request->validated();
        
        $newPublication = new Publication($data);

        $newPublication->save();

        return redirect()->route('publications.index')->with('success', 'Akcja pomyślnie wykonana');
    }

    public function edit(Publication $publication)
    {
        return view('publications.form', [
            'publication' => $publication,
        ]);
    }

    public function update(UpdatePublicationRequest $request, Publication $publication)
    {
        $data = $request->validated();
        $publication->fill($data);
        $publication->save();
        return redirect()->route('publications.show', ['id' => $publication])->with('success', 'Akcja pomyślnie wykonana');
    } 

    public function destroy(Publication $publication)
    {
        $publication->comments()->delete();
        $publication->delete();
        return redirect()->route('publications.index')->with('success', 'Publikacja została usunięta');
    }


}

