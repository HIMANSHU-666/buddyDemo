<?php

namespace App\Imports;

use App\Models\UniversityCoursesModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class myImportClass implements ToModel
{
    public function model(array $row)
    {
        // Define how to create a model from the Excel row data
        return new UniversityCoursesModel([
            'id'=> $row[0],
            'uni_id' => $row[1],
            'course_id' => $row[2],
            'ps_fee_with_hos' => $row[3],	
            'ps_fee_without_hos' => $row[4],	
            'anul_fee_with_hos' => $row[5],
            'anul_fee_without_hos' => $row[6],
        ]);
    }
}