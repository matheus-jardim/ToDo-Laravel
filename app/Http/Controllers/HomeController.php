<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request) {
        if($request->date) {
            $filter_date = $request->date;
        } else{
            $filter_date = date('Y-m-d');
        }

        $carbonDate = Carbon::createFromDate($filter_date);
        // Carbon::setLocale('pt_BR');
        $data['date_as_string'] = $carbonDate->translatedFormat('d').' de '.ucfirst($carbonDate->translatedFormat('M'));
        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');

        $data['tasks'] = Task::whereDate('due_date', $filter_date)->get();
        $data['authUser'] = Auth::user();

        $data['tasks_count'] = $data['tasks']->count();
        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();

        return view('home', $data);
    }
}
