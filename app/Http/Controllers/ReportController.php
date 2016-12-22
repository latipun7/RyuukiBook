<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function show(Request $request)
    {
  //   	$this->validate($request, [
		// 	'begin' => 'required',
		// 	'end' => 'required',
		// ]);

		// $from = date('Y-m-d', strtotime(Input::get('begin')));
		// $to = date('Y-m-d', strtotime(Input::get('end')));

		// $transaction = Transaction::whereHas('product', function($q) {
		// 	$from = date('Y-m-d', strtotime(Input::get('begin')));
		// 	$to = date('Y-m-d', strtotime(Input::get('end')));

		// 	$q->whereBetween('tanggal', [$from,$to]);
		// })->get();

		// return view('report.getPeriode', compact('transaction', 'from', 'to'));
    }
}
