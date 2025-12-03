<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsImageController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
            'title' => 'nullable|string|max:255'
        ]);

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = Str::random(12) . '_' . time() . '.' . $ext;

        $path = $file->storeAs('public/news/images', $filename);

        $newsImage = NewsImage::create([
            'news_id' => $news->id,
            'title' => $request->input('title'),
            'image' => $filename,
        ]);

        return back()->with('success', __('Image uploaded'));
    }

    public function destroy(News $news, NewsImage $image)
    {
        if ($image->news_id !== $news->id) {
            abort(404);
        }

        // delete file
        Storage::delete('public/news/images/' . $image->image);

        $image->delete();

        return back()->with('success', __('Image removed'));
    }
}
