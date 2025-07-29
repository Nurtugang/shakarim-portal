<?php

namespace App\Http\Controllers\Science;

use App\Http\Controllers\Controller;
use App\Models\Science\SciencePurchasesOffer;
use Illuminate\Http\Request;

class SciencePurchasesOfferController extends Controller
{
    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'purchase_id' => 'required|integer|exists:science_purchases,id',
            'organization' => 'required|string|max:255',
            'head' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'filename' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240', // max 10MB
        ]);

        // Обработка файла
        if ($request->hasFile('filename')) {
            $path = $request->file('filename')->store('purchase_offers', 'public');
            $validatedData['filename'] = basename($path);
        }

        SciencePurchasesOffer::create($validatedData);
        
        return redirect()->route('science.purchases',['locale'=>app()->getLocale()])->with('success', 'Заявка успешно отправлена!');
    }
}
