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
                                ->where('is_structure',true)
                                ->orderBy('sort_order')
                                ->first();
        $schools = Structure::where('active',true)
                                ->where('is_structure',false)
                                ->orderBy('sort_order')
                                ->get();


        return view('structure.index',compact('structures','schools'));
    }

    public function show(string $locale,Structure $structure)
    {
        $structure->load(['filteredData','employees' => function ($query) {
            $query->where('is_active', true);
        }]);

        if(!$structure->data){
            abort(404);
        }
         if(!$structure->filteredData){
            abort(404);
        }

        return view('structure.show',compact('structure'));
    }
       
}
