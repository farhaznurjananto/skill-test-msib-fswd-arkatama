<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'input1' => 'required',
        ]);

        $data = strtoupper($validatedData['input1']);

        $data = explode(' ', $data);
        $result = [];
        $temporaryData = [];

        foreach ($data as $item) {
            $ignorePatterns = ["TAHUN", "THN", "TH"];
            $ignoreItem = false;

            foreach ($ignorePatterns as $pattern) {
                if (stripos($item, $pattern) !== false) {
                    $ignoreItem = true;
                    break;
                }
            }

            if ($ignoreItem) {
                continue;
            }

            if (is_numeric($item)) {
                if (!empty($temporaryData)) {
                    $result[] = implode(" ", $temporaryData);
                    $temporaryData = [];
                }
                $result[] = $item;
            } else {
                $temporaryData[] = $item;
            }
        }

        if (!empty($temporaryData)) {
            $result[] = implode(" ", $temporaryData);
        }

        $validatedData = [
            'name' => $result[0],
            'age' => $result[1],
            'city' => $result[2]
        ];

        Data::create($validatedData);

        return redirect('/')->with('success', 'Data Add Successfully');
    }
}
