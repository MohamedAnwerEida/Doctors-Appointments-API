<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Status' => ucwords($this->Status),
            'Patient' => ucwords($this->Patient->name),
            'Doctor' => ucwords($this->Doctor->name),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'End_date' =>  date("Y-m-d",strtotime($this->End_date)) ,
            'Start_date' =>  date("Y-m-d",strtotime($this->Start_date)) ,

        ];
    }
}
