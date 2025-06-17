<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageFile;
use App\Models\PageList;
use App\Models\Structure;
use App\Models\StructureData;
use App\Services\Page\PageService;

class StructureController extends Controller
{


    public function index(string $locale)
    {
        $structures = Structure::query()
           ->with(['children'=> function($c){
                $c->with(['children' => function($l){
                   $l->where('active',true)->orderBy('position');
                 }])->where('active',true)->orderBy('position');
            }])
           ->where('parent_id',null)
           ->where('active',true)
           ->orderBy('position')
           ->get();
        

        return view('structure.index',compact('structures'));
    }

    public function show(string $locale,Structure $structure)
    {
        $structure->load('filteredData','employees');

        //dd($structure);
        if(!$structure->data){
            abort(404);
        }
         if(!$structure->filteredData){
            abort(404);
        }

      //  dd($structure);

        return view('structure.show',compact('structure'));
    }
       
}
