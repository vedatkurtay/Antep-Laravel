<?php

namespace App\Imports;

use App\Models\Categories;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{

    public function model(array $row)
    {
        return new Categories([
            'name' => $row[0]
        ]);
    }
}
