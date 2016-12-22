<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{
	/**
	 * Index of report page
	 */
    public function index()
    {
    	return view('report.index');
    }

    /**
     * Show transaction periode
     * @param  $periode [date]
     * @return response
     */
    public function show($begin, $end)
    {
		$from 	= date('l, j F Y 00:00:00', strtotime($begin));
		$to 	= date('l, j F Y 23:59:59', strtotime($end));

		$transaction = 	Item::whereBetween('created_at', [
							date('Y-m-d 00:00:00', strtotime($begin)), 
							date('Y-m-d 23:59:59', strtotime($end))
						])
						->paginate(10);
						
		return view('report.show')->with(compact('transaction', 'from', 'to'));
    }
}
