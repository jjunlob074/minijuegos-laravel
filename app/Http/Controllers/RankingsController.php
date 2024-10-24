<?php

// app/Http/Controllers/RankingsController.php

namespace App\Http\Controllers;

use App\Models\MinijuegosUser;
use Illuminate\Http\Request;

class RankingsController extends Controller
{
    public function index()
    {
        $topUsers = MinijuegosUser::with('user')->orderByDesc('points')->take(10)->get();

        return view('rankings', compact('topUsers'));
    }
}
