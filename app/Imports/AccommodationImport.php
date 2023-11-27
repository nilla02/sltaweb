<?php

namespace App\Imports;

use App\Models\Accommodation;
use App\Http\Controllers\AdminsController;
use App\Models\AdminAccommodation;
use App\Models\Declaration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Session;



class AccommodationImport extends AdminsController implements ToCollection, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $rows)
    {
        $property_id = Session::get('propertyid');
        $id = Auth::id();
        $num = 1;
        foreach ($rows as $row) {
            if ($row[0] != null && $row[1] != null && $row[2] != null && $row[4] != null && $row[5] != null && $row[6] != null) {

                $check = 1;
                if (strpos($row[0], "/")) {
                    $arrivalDate = gmdate("Y-m-d", strtotime($row[0]));
                } else {
                    $UNIX_DATE = ($row[0] - 25569) * 86400;
                    $arrivalDate = gmdate("Y-m-d", $UNIX_DATE);
                }

                $decMonths = Declaration::select('date')->where('property_id', $this->property_id())->get();
                foreach ($decMonths as $decMonth) {
                    if ($decMonth->date == date('Y-m', strtotime($arrivalDate))) {
                        $check = Null;
                        $monthclose = date('F, Y', strtotime($arrivalDate));
                    }
                }

                $guestExempted = strtolower($row[3]);
                if ($guestExempted == 'y' || $guestExempted == 'yes' || $guestExempted == 1 || $guestExempted == true || $guestExempted == 'true' || $guestExempted == 't') {
                    $guestExempted = 1;
                } else {
                    $guestExempted = 0;
                }
                if (Accommodation::where('property_id', $property_id)->where('arrivalDate', $arrivalDate)->where('roomNumber', $row[1])->where('ageOfGuest', $row[2])->where('guestExempted', $guestExempted)->where('lastName', $row[4])->where('firstName', $row[5])->where('numberOfNights', $row[6])->doesntExist()) {

                    if ($check == 1) {

                        $color = '#' . $this->random_color();
                        Accommodation::create([
                            'property_id' => $property_id,
                            'user_created' => $id,
                            'user_updated' => $id,
                            'arrivalDate' => $arrivalDate,
                            'roomNumber' => $row[1],
                            'ageOfGuest' => $row[2],
                            'guestExempted' => $guestExempted ?? NULL,
                            'lastName' => $row[4],
                            'firstName' => $row[5],
                            'numberOfNights' => $row[6],
                            'color' => $color,
                        ]);

                        $AdminAccommodation = new AdminAccommodation;
                        $AdminAccommodation->property_id = $property_id;
                        $AdminAccommodation->collector_created = $id;
                        $AdminAccommodation->collector_updated = $id;
                        $AdminAccommodation->arrivalDate = $arrivalDate;
                        $AdminAccommodation->roomNumber = $row[1];
                        $AdminAccommodation->ageOfGuest = $row[2];
                        $AdminAccommodation->guestExempted = $guestExempted ?? NULL;
                        $AdminAccommodation->firstName = $row[5];
                        $AdminAccommodation->lastName = $row[4];
                        $AdminAccommodation->numberOfNights = $row[6];
                        $AdminAccommodation->color = $color;
                        $AdminAccommodation->save();

                        session()->flash('file', "Records have been inserted.");
                    } else {
                        session()->flash('check' . $num, $row[5] . " " . $row[4] . " couldn't been uploaded because " . $monthclose . " is close.");
                        if ($num == 3) {
                            session()->flash('check', "More Entries couldn't been uploaded...");
                        }
                        $num += 1;
                    }
                } else {
                    session()->flash('exist' . $num, $row[5] . " " . $row[4] . " already created.");
                    if ($num == 3) {
                        session()->flash('exist', "More Duplicates...");
                    }
                    $num += 1;
                }
            }
        }
    }

    public function startRow(): int
    {
        return 13;
    }
}
