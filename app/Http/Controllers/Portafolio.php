<?php

namespace App\Http\Controllers;
use DB;
use App\Project;
use Illuminate\Http\Request;
use App\Policies\UserPolicy;
use App\Http\Requests\CreateProjectRequest;

class Portafolio extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('index','show');
    }
    
    public function index()
    {

        //$portafolio =  DB::table('projects')->get();

        $portafolio = Project::latest('updated_at')->get();

        /*$portafolio = [
            ['title' => 'Proyecto #1'],
            ['title' => 'Proyecto #2'],
            ['title' => 'Proyecto #3'],
            ['title' => 'Proyecto #4']
        ];*/
        //return response()->json(['portafolio'=>$portafolio]);
        return view('projects.index', compact('portafolio'));
    }


    public function create()
    {
        return view('projects.create',[
            'project' => new Project
        ]);
    }

    public function store(CreateProjectRequest $request)
    {

        Project::create($request->validated())->with('status','Se a creado correctamente :D');

        /*$filas = request()->validate([
            'title'=>'required',
            'description'=>'required'
        ]);*/
        //Project::create($filas);
        
        
        
        //Project::create(request()->only('title','description'));
        


        /*Project::create([
            'title' => $request->title,
            'description' => $request->description
        ]);*/

        return redirect()->route('portafolio.index');
    }

    public function show(Project $project)
    {
        //$project = Project::find($id);
    
        //return $project;

        return view('projects.show',[
            'project' => $project
        ]);
        /*return view('projects.show',[
            'project' => Project::findOrFail($id)
        ]);*/
    }

    
    public function edit(Project $project)
    {
//        dd(json_decode($project));

        //$this->authorize($project);//Politicas

        return view('projects.edit',[
            'project'=> $project
        ]);
    }

    
    public function update(Project $project, CreateProjectRequest $request)
    {
        /*$project->update([
            'title'=>request('title'),
            'description'=>request('description')
        ]);*/

//        $this->authorize($project); //Autorizacion

        $project->update($request->validated());
        
        return redirect()->route('portafolio.show', $project)->with('status','Se ha actualizado correctamente');
    }

    
    public function destroy(Project $project)
    {

        //$this->authorize($project);//Politicas

        $project->delete();

        return redirect()->route('portafolio.index')->with('status','Se ha eliminado correctamnete');
    }
}
