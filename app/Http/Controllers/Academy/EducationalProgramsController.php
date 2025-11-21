<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EducationField;
use App\Models\DirectionClassification;
use App\Models\EducationalProgramGroup;
use App\Models\EducationalProgram;
use App\Models\Academy\Accreditation;

class EducationalProgramsController extends Controller
{
    public function index(Request $request, ?string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();

        // Accreditation codes set (first token before space)
        $accrCodes = Accreditation::query()
            ->select('name')
            ->get()
            ->map(function($row){
                return strtok($row->name, ' '); // first token
            })
            ->filter()
            ->unique()
            ->flip();

        $levels = ['bachelor','master','doctorate'];
        $data = [];

        foreach ($levels as $level) {
            // Preload hierarchy for level
            $classifications = DirectionClassification::with(['programGroups.programs'])
                ->where('education_level', $level)
                ->orderBy('code')
                ->get()
                ->groupBy('education_field_id');

            $fields = EducationField::whereIn('id', $classifications->keys())
                ->orderBy('id')->get();

            $fieldBlocks = [];
            foreach ($fields as $field) {
                $classRows = [];
                foreach ($classifications->get($field->id, collect()) as $classification) {
                    $groupRows = [];
                    foreach ($classification->programGroups as $group) {
                        $programItems = $group->programs->map(function($p) use ($accrCodes, $locale) {
                            $code = $p->code;
                            $accredited = $accrCodes->has($code);
                            
                            // Get accreditation file based on locale
                            $accreditationFileField = match($locale) {
                                'kk' => 'accreditation_file_kk',
                                'en' => 'accreditation_file_en',
                                default => 'accreditation_file_ru'
                            };
                            
                            $accreditationFile = $p->$accreditationFileField;
                            
                            return [
                                'code' => $code,
                                'name_ru' => $p->name_ru,
                                'name_kk' => $p->name_kk,
                                'name_en' => $p->name_en,
                                'epvo_url' => $p->epvo_url,
                                'accreditation_pdf' => $accreditationFile ? asset('storage/' . $accreditationFile) : null,
                                'accredited' => $accredited,
                            ];
                        });
                        $groupRows[] = [
                            'group_code' => $group->code,
                            'group_name_ru' => $group->name_ru,
                            'group_name_kk' => $group->name_kk,
                            'group_name_en' => $group->name_en,
                            'programs' => $programItems,
                            'any_accredited' => $programItems->contains(fn($pi) => $pi['accredited']),
                        ];
                    }
                    $classRows[] = [
                        'classification_code' => $classification->code,
                        'classification_name_ru' => $classification->name_ru,
                        'classification_name_kk' => $classification->name_kk,
                        'classification_name_en' => $classification->name_en,
                        'groups' => $groupRows,
                    ];
                }
                $fieldBlocks[] = [
                    'field_name_ru' => $field->name_ru,
                    'field_name_kk' => $field->name_kk,
                    'field_name_en' => $field->name_en,
                    'classifications' => $classRows,
                ];
            }
            $data[$level] = $fieldBlocks;
        }

        return view('academy.op.index', [
            'hierarchy' => $data,
            'locale' => $locale,
        ]);
    }
}

