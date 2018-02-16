<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use Illuminate\Support\Facades\Input; 
use Illuminate\Validation\Rule;
use Validator, Redirect; 
use Illuminate\Support\Facades\File;

class PictureController extends Controller
{
    public function index()
    {
        $pictures = Picture::all();
        
        

        return view('back.pictures.index', compact('pictures'));
    }


    public function upload(Request $request)
    {
        $input = Input::all();
        
        $validator = Validator::make($request->all(), [
            'file' => 'image|max:2000',
        ]);
        
        $im = $request->file('file');

        if( !is_null($im) ) {

            $ext = $im->getClientOriginalExtension();
            
            //$fileName = $im->getClientOriginalName();
            
            $newFileName = str_random(12);
            $fileName = "import".$newFileName . "." . $ext;
            $im->move(env('PATH_IMAGES', 'img'), $fileName);

            Picture::create([
                'name' => 'Futurama',
                'link' => $fileName,
                'size' => $im->getClientSize()
            ]);
            return Redirect::back()->with('successMessage','Success, l\' image a bien été uploader');
        }

        /*
        if($validator->fails()){
            $errors = $validator->errors();
            dd($erros);
            //$errorMessage = $error;
            //dd($errors);
            return Redirect::back()
                ->with('errorMessage','Erreur, ce tag existe déjà') // send back all errors to the login form
                ->withInput();

            $input = input::all();
        }else{
            $file = $request->file();
            dd( $file["file"]->name );
            Picture::create($request->all());

            return Redirect::back()->with('successMessage','Success, le tag a bien été enregistrer');
        }
        */
        //dd($request);
    }

    public function destroy($id)
    {
        $picture = Picture::findOrFail($id);

        $image = \DB::table('pictures')->where('id', $id)->first();
        $file= $image->link;
        $filename = public_path().'/images/'.$file;
        File::delete($filename);



        $picture->delete();

        return Redirect::back()->with('successMessage','Success, l\'image a bien étét supprimer');

    }
}
