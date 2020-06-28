<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destination;

class DestinationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

   // Render Admin Destination Page
    public function admin_destinationIndex(){

        // get all destinations
        $destinations = Destination::paginate(8);
        return view('admin.destination' , ['destinations' => $destinations]);
    }

    // Render Admin Destination Form Page
    public function admin_destinationformIndex($id = null){

        if($id){
            $destinations = Destination::find($id);
            return view('admin.destination_form' , ['destinations' => $destinations]);
        }
        return view('admin.destination_form' , ['destinations' => null]);
    }

    // Create Destination
    public function admin_destinationformCreate(Request $request){

        Destination::create([
            'destination_name' => $request['destination_name'],
            'is_active' => true,
        ]);

        return redirect('/admin/destination');
    }

	// edit Destination
    public function admin_destinationformEdit(Request $request){

    	$destination = Destination::find($request->id);
    	$destination->destination_name = $request->destination_name;
    	$destination->save();
        return redirect('/admin/destination');
    }

    // delete Destination
    public function admin_destinationDelete($id){

    	$destination = Destination::find($id);
    	$destination->delete();
        return redirect('/admin/destination');
    }
}
