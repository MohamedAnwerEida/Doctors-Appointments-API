<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppointmentsResource;

class AppointmentsController extends Controller
{
    public function index()
    {
      return AppointmentsResource::collection(Appointment::with(["Doctor", "Patient"])->paginate(25));
    }

    public function store(Request $request)
    {

      Appointment::create([
        'Status'            => $request->Status,
        'Patient'           => $request->Patient,
        'Doctor'            => $request->Doctor,
        'Start_date'        => $request->Start_date,
        'End_date'          => $request->End_date,
        'created_at'        =>  $request->created_at,
        'updated_at'        =>  $request->updated_at,
    ]);

      return new AppointmentsResource($Appointment);
    }

    public function show(Appointment $Appointment)
    {
      return new AppointmentsResource($Appointment);
    }

    public function update(Request $request, Appointment $Appointment)
    {
      // check if currently authenticated user is the owner of the Appointment
      /*if ($request->user()->id !== $Appointment->Patient->id) {
        return response()->json(['error' => 'You can only edit your own Appointments.'], 403);
      }*/

      $Appointment->update($request->only(['End_date', 'Start_date']));

      return new AppointmentsResource($Appointment);
    }

    public function destroy(Appointment $Appointment)
    {
      $Appointment->delete();

      return response()->json(null, 204);
    }
}
