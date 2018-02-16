<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator, Input, Redirect; 
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('back.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'name'    => 'required',
        );

        //$validator = Validator::make(Input::all(), $rules);

        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|unique:tags',
        ]);

        //dump($validator);
        
        if($validator->fails()){
            $errors = $validator->errors();
            //$errorMessage = $error;
            //dd($errors);
            return Redirect::back()
                ->with('errorMessage','Erreur, ce tag existe déjà') // send back all errors to the login form
                ->withInput();

            $input = input::all();
        }else{
            Tag::create($request->all());

            return Redirect::back()->with('successMessage','Success, le tag a bien été enregistrer');
        }
        //
   
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
        
        $tag = Tag::find($id);
        
        return view('back.tags.edit',compact('tag'));
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
        //dd($request);
        $tag = Tag::find($id);

        request()->validate([
            'name' => 'required'
        ]);

       
        $tag->name  = $request->name;

        $tag->update($request->all());

        return redirect()->route('tag')
                        ->with('success','Member updated successfully');
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
