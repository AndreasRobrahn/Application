<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\exceleditor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.ConfigIndex');
    }
    public function excel(Request $request)
    {
      if ( $xlsx = exceleditor::parse($request->file('file')) ) {
        	// print_r( $xlsx->rows() );
          return response()->json($xlsx->toHTML('table table-bordered'));
          // foreach($xlsx->rows() as $row)
          // {
          //   print_r($xlsx);
          // }
        } else {
        	return exceleditor::parseError();
        }

      // dd($request->file) ;
    }
}
