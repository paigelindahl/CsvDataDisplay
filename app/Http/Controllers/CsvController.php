<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;

class CsvController extends Controller
{
    /**
     * Handle csv file
     * @param Request $request
     */
    public function handleCsv(Request $request)
    {
        $request->validate([
            'csvFile' => 'required|file',
        ]);

        $path = $this->store($request->file('csvFile'));

        $rows = SimpleExcelReader::create($path)->getRows();

        $rowsData = collect();
        $rows->each(function(array $rowProperties) use ($rowsData) {
            $rowsData->push($rowProperties);
        });

        return ['data' => $rowsData];
    }

    public function store($file)
    {
        $destinationPath = public_path() . sprintf("/uploads/%s/", Str::random(8));
        $extension = $file->getClientOriginalExtension();
        $filename =  Str::random(12) . '.' . $extension;
        $file->move($destinationPath, $filename);
        $path = $destinationPath . $filename;
        return $path;
    }
}
