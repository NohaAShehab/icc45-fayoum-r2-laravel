<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // map objects
//        return parent::toArray($request);
        return [
            "empname"=> $this->name,
            "employeeEmail"=>$this->email,
            "image"=>asset("storage/images/employees/".$this->image)
        ];
    }
}
