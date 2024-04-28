<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;

class CsvController extends Controller
{
    /**
     * Pass file to Simple Excel Reader to extrapolate data to frontend
     * @param Request $request
     * @return array
     */
    public function handleCsv(Request $request): array
    {
        $request->validate([
            'csvFile' => 'required|file',
        ]);

        $path = $this->store($request->file('csvFile'));

        $rows = SimpleExcelReader::create($path)->getRows();

        return ['data' => $rows];
    }

    /**
     * Store the csv file in the uploads folder and return path
     * @param Object $file
     * @return string
     */
    public function store($file): string
    {
        $destinationPath = public_path() . sprintf("/uploads/%s/", Str::random(8));
        $extension = $file->getClientOriginalExtension();
        $filename =  Str::random(12) . '.' . $extension;
        $file->move($destinationPath, $filename);
        $path = $destinationPath . $filename;
        return $path;
    }
}
