<?php

namespace App\Http\Controllers;

use App\Town;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search() {

        $search = request()->input('query') ?? ''; // Search query
        $orderBy = request()->input('order_by') ?? 'id'; // Order by column
        $sortBy = request()->input('sort_by') ?? 'asc'; // Sort - 'asc' or 'desc'

        $results = Town::with(['municipality'])->searchByKeyword($search)->orderBy($orderBy, $sortBy)->paginate(12); // with('municipality')->
        if (count($results) == 0) {
            return view('welcome')->with('error', 'Не бяха намерени резултати. Сигурни ли сте, че пишете на кирилица?')->with('keyword', $search);
        }
        return view('welcome')->with('results', $results)->with('keyword', $search);
    }
}
