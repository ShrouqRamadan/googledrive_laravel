<?php

namespace App\Http\Controllers;

use App\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    
    public function index()
    {
        $drive=Drive::all();
         return view ('drive.index')->with("drive",$drive);
    }
    public function create()
    {
        return view ('drive.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required|min:3",
            "description"=>"required|min:5|max:250",
            "file"=>"required|file|max:9000",
        ]);

        $drive=new Drive();
        $drive->title=$request->title;
        $drive->description=$request->description;
        $drive_data=$request->file('file');
        $drive_name=$drive_data->getClientOriginalName();
        $drive_data->move(public_path()."/upload/",$drive_name);
        $drive->file=$drive_name;
        $drive->save();
        return redirect("drive")->with("done","insert True");

    }

  
    public function show($id)
    {
        $drive=Drive::find($id);
        return view ('drive.show')->with("drive",$drive);
    }


    public function edit($id)
    {
        $drive=Drive::find($id);
        return view ('drive.edit')->with("drive",$drive);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title"=>"required|min:3",
            "description"=>"required|min:5|max:250",
            "file"=>"required|file|max:9000",
        ]);
        $drive=Drive::find($id);
        $drive->title=$request->title;
        $drive->description=$request->description;
        $drive_data=$request->file('file');
        $drive_name=$drive_data->getClientOriginalName();
        $drive_data->move(public_path()."/upload/",$drive_name);
        $drive->file=$drive_name;
        $drive->save();
        return redirect("drive")->with("done","insert True");
    }

   
    public function destroy($id)
    {
        $drive=Drive::find($id);
        $drive->delete();
        return redirect("drive")->with("done","Done");
    }
    public function download($id)
    {
        $drive= Dive::where('id', '=', $id)->firstOrFail();
        $pathToFile=public_path()."/upload/".$drive->file;
        return response()->download($pathToFile);  
    }
}
