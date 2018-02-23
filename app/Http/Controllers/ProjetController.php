<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projet;
use App\Picture;
use App\Tag;
use App\Categorie;
use Illuminate\Support\Facades\Input; 
use Illuminate\Validation\Rule;
use Validator, Redirect; 
use Illuminate\Support\Facades\File;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::all();
        $pictures = Picture::all();
        return view('back.projets.index', compact('projets','pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        //$tags = Tag::all();
        //$categories = Categorie::all();

        $categories = Categorie::pluck('title', 'id')->all();
        $tags = Tag::pluck('name', 'id')->all();
        $pictures = Picture::all();
        return view('back.projets.create', compact('tags','categories','pictures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request);
        //dd($request->categorie_id);
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required|max:100',
            'content' => ['required', Rule::notIn(['html', 'guerre','violence']) ],
            'link' => 'required',
            'categorie_id' => 'integer',
            'tag_id.*' => 'integer', //test un tableau d'entier
            'published' => 'in:0,1',
            'description' => Rule::notIn(['html', 'guerre','violence']),
            'picture' => ['image', 'max:300', Rule::dimensions()->maxWidth(1000)->maxHeight(500)],
        ]);

        $projet = Projet::create($request->all());     

        $projet->tags()->attach($request->tag_id);

        $validator = Validator::make($request->all(), [
            'file' => 'image|max:2000',
        ]);
        
        $im = $request->file('file');
        dump($request);
        //dd($request);
        if( !is_null($im) ) {

            $ext = $im->getClientOriginalExtension();
            
            //$fileName = $im->getClientOriginalName();
            
            $newFileName = str_random(12);
            $fileName = "import".$newFileName . "." . $ext;
            $im->move(env('PATH_IMAGES', 'images'), $fileName);

            $picture = Picture::create([
                'name' => $request->name,
                'link' => $fileName,
                'size' => $im->getClientSize()
            ]);
            
            $projet->pictures()->attach($picture->id);
            return Redirect::back()->with('successMessage','Success, l\' image a bien été uploader');
        }else{
            return Redirect::back()->with('errorMessage','Erreur, pas d\'image associé');
        }

        
        
        //$projet->tags()->save();
        //$projet->pictures()->save();

        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
