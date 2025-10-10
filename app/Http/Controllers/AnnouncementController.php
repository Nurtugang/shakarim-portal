<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(string $locale, Request $request)
   {
       $announcements = Announcement::where('status', 1)
           ->where('language', app()->getLocale())
           ->orderBy('date', 'desc')
           ->paginate(12);
       
       $announcements->withPath(route('announcements.index', ['locale' => $locale]));
       
       return view('announcements.index', compact('announcements'));
   }
    
    public function show(string $locale, $id)
    {
        $announcement = Announcement::where('status', 1)->findOrFail($id);
        
        $latestAnnouncements = Announcement::where('status', 1)
            ->where('id', '!=', $announcement->id)
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();
        
        return view('announcements.show', compact('announcement', 'latestAnnouncements'));
    }
}