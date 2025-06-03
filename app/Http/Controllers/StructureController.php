<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageFile;
use App\Models\PageList;
use App\Models\Structure;
use App\Services\Page\PageService;

class StructureController extends Controller
{


    public function index(string $locale)
    {
        $structures = Structure::query()
           ->with('children')
           ->where('parent_id',null)
           ->where('active',true)
           ->get();
        

        return view('structure.index',compact('structures'));
    }

    public function show(string $locale,Structure $structure)
    {
        $structure->load('data');

      //  dd($structure);

        return view('structure.show',compact('structure'));
    }
       
}
