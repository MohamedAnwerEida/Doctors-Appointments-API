<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\DataTables\AppointmentsDatatable;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AppointmentsDatatable $appointment)
    {
        $page_title = __("Appointments");
        $page_description =__( "View Appointments");
        return  $appointment->render("appointments.index", compact('page_title', 'page_description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $page_title = __("Add Appointments");
        $page_description = __("Add new Appointments");
        return view('appointments.add', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = Appointment::rules($request,NULL);
        $request->validate($rules);
        $credentials = Appointment::credentials($request);
        $appointment = Appointment::create($credentials);
        $appointment->save();
        session()->flash('success',__("Appointments has been added!"));
        return redirect()->route("appointments.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $page_title = __('Appointments');
        $page_description = __('Edit');
        return view('appointments.edit', compact('page_title', 'page_description','appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules  = Appointment::rules($request,$id);
        $request->validate($rules);
        $credentials = Appointment::credentials($request);
        $appointment = Appointment::where('id',$id)->update($credentials);

        session()->flash('updated',__("Changes has been Updated Successfully"));
        return  redirect()->route("appointments.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointments)
    {
        $appointments->delete();
        session()->flash('deleted',__("Changes has been Deleted Successfully"));
        return redirect()->route("appointments.index");
    }
    public function multi_delete(){
        if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$appointment = Appointment::find($id);
				$appointment->delete();
			}
		} else {
			$appointment = Appointment::find(request('item'));
			$appointment->delete();
		}
        session()->flash('deleted',__("Changes has been Deleted Successfully"));
        return redirect()->route("appointments.index");
    }
}
