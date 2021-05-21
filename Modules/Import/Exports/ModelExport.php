<?php

namespace Modules\Import\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ModelExport implements FromCollection
{
    public function collection()
    {
        $table = DB::table('employees')->get();
        return $table;
    }
}