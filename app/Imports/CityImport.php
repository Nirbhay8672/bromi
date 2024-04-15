<?php

namespace App\Imports;

use App\Models\State;
use App\Models\SuperCity;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CityImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $city = SuperCity::where('name',$row['name'])->first();

        $state_id = '';

        if(! $city) {
            $state = State::where('name',$row['state_name'])->where('user_id', Auth::user()->id)->first();

            if($state) {
                $state_id = $state->id;
            } else {
                $new = new State();

                $new->fill([
                    'name' => $row['state_name'],
                    'user_id' => Auth::user()->id,
                ])->save();

                $state_id = $new->id;
            }

            return new SuperCity([
                'name' => $row['name'],
                'state_id' => $state_id
            ]);
        }
    }
}
