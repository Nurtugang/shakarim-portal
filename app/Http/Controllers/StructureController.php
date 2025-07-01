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
         $structures = Structure::whereNull('parent_id')
                                ->with('childrenRecursive')
                                ->where('active',true)
                                ->first(); 

        return view('structure.index',compact('structures'));
    }

    public function show(string $locale,Structure $structure)
    {
        $structure->load('filteredData','employees');

        if(!$structure->data){
            abort(404);
        }
         if(!$structure->filteredData){
            abort(404);
        }

        return view('structure.show',compact('structure'));
    }

    public function viceRector(string $locale,Structure $structure)
    {
        $structure->load('filteredData');

        if(!$structure->data){
            abort(404);
        }
         if(!$structure->filteredData){
            abort(404);
        }

        return view('structure.vice-rector',compact('structure'));
    }
       
}
