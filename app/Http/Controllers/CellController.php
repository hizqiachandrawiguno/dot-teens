<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class CellController extends Controller
{
    public function index()
    {
        // Mengelompokkan semua member berdasarkan nama Cell
        $cells = Member::whereNotNull('cell_name')
                    ->orderBy('cell_name')
                    ->get()
                    ->groupBy('cell_name');

        return view('admin-cells', compact('cells'));
    }
}