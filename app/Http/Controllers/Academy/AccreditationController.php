<?php

namespace App\Http\Controllers\Academy;
use App\Http\Controllers\Controller;
use App\Models\Academy\Accreditation;
use Illuminate\Http\Request;

class AccreditationController extends Controller
{
    public function index()
    {
        $accreditationsByOrgan = Accreditation::getGroupedByOrgan();
        $organs = Accreditation::getUniqueOrgans();
        $types = Accreditation::getUniqueTypes();
        $statistics = Accreditation::getStatistics();
        
        return view('academy.accreditation.index', compact(
            'accreditationsByOrgan', 
            'organs', 
            'types', 
            'statistics'
        ));
    }
}