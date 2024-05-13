<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Common\Slider;
use App\Models\Common\Testimonial;
use App\Models\InstituteInfo\Classes;
use App\Models\Appointment\Appointment;
use App\Models\InstituteInfo\Facilities;
use App\Models\InstituteInfo\InstituteInfo;
use App\Models\Member\BoardMember;
use App\Models\Menu\Menu;
use App\Models\Menu\Sub_Menu;
use App\Models\Notice\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class FrontHomeController extends Controller
{
    public function createStorageLink()
    {
        // Run the storage:link command
        Artisan::call('storage:link');

        // Get the output of the command if needed
        $output = Artisan::output();

        // You can also check if the command was successful
        $exitCode = Artisan::call('storage:link');

        if ($exitCode === 0) {
            return 'Symbolic link created successfully.';
        } else {
            return 'Failed to create symbolic link.';
        }
    }

    public function index()
    {
        $institute = InstituteInfo::query()->where('id', 1)->first();
        $menus = Menu::query()->where('status', 1)->orderBy('position')->get();
        $submenu = Sub_Menu::query()->where('status', 1)->get();
        $notice = Notice::query()->where('status', 1)->take(10)->get();
        $sliders = Slider::query()->where('status', 1)->take(3)->get();
        $bmembers = BoardMember::query()->where('status',1)->take(3)->get();
        $classes = Classes::query()->where('status',1)->get();
        $testimonial = Testimonial::query()->where('status',1)->take(2)->get();
        $databaseFacilities  = Facilities::query()->where('status',1)->take(5)->get();
        // Define an array of colors
        $colors = [
            "bg-primary",
            "bg-success",
            "bg-warning",
            "bg-success",
            "bg-primary",
            "bg-warning",
            // Add more colors as needed
        ];
        // Combine data from the database with colors
        $combinedFacilities = [];
        foreach ($databaseFacilities  as $index => $databaseFacility) {
            $combinedFacilities[] = array_merge($databaseFacility->toArray(), ["color" => $colors[$index]]);
        }



        return view('Frontend.landpage', compact('institute','testimonial','menus','classes','sliders','submenu','bmembers','combinedFacilities'));
    }

    public function createAppointment(Request $request)
    {

        $AppointData = [
            'gurdian_name' => $request->gurdian_name,
            'mobile' => $request->mobile,
            'child_name' => $request->child_name,
            'class' => $request->class,
            'message' => $request->message,
        ];

        //dd($AppointData);

        Appointment::create($AppointData);
        return response()->json(['status' => 200]);
    }

    public function appointmentIndex()
    {
        return view('Members.Appointment.manageappointment');
    }

    public function getAllAppointment()
    {
        $bMember = Appointment::query()->get();
        $output = '';
        if($bMember->count() > 0){
            $output .= '<table id="memberTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Guardian Name</th>
                <th>Mobile</th>
                <th>Child Name</th>
                <th>Admission Class</th>
                <th>Message</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($bMember as $bm) {

                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td>'. $bm->gurdian_name.'</td>
                <td>'.$bm->mobile.'</td>
                <td>'.$bm->child_name.'</td>
                <td>'.$bm->class.'</td>
                <td>'.$bm->message.'</td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        }else{
            echo '<h1 class="text-center text-secondary my-5">No Record Found in Database</h1>';
        }
    }
}
