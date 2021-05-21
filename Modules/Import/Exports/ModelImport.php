<?php

namespace Modules\Import\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModelImport implements ToCollection , WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $table = DB::table(session()->get('table'))->delete();
        foreach ($rows as $row)
        {
            $array = $row->toArray();
            $array = array_keys($array);
            $array2 = array();
            foreach ($array as $key => $item) {
                if($item != "")
                {
                    if($item == "password")
                    {
                        $array2[$item] = Hash::make($row[$item]);
                    } else {
                        $array2[$item] = $row[$item];
                    }

                }
            }
            DB::table(session()->get('table'))->insert($array2);
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}