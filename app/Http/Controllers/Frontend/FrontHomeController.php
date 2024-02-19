<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Common\Slider;
use App\Models\Common\Testimonial;
use App\Models\InstituteInfo\Classes;
use App\Models\InstituteInfo\Facilities;
use App\Models\InstituteInfo\InstituteInfo;
use App\Models\Member\BoardMember;
use App\Models\Menu\Menu;
use App\Models\Menu\Sub_Menu;
use App\Models\Notice\Notice;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
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
        $databaseFacilities  = Facilities::query()->where('status',1)->take(4)->get();
        // Define an array of colors
        $colors = [
            "bg-primary",
            "bg-success",
            "bg-warning",
            "bg-success",
            // Add more colors as needed
        ];
        // Combine data from the database with colors
        $combinedFacilities = [];
        foreach ($databaseFacilities  as $index => $databaseFacility) {
            $combinedFacilities[] = array_merge($databaseFacility->toArray(), ["color" => $colors[$index]]);
        }



        return view('Frontend.landpage', compact('institute','testimonial','menus','classes','sliders','submenu','bmembers','combinedFacilities'));
    }
}
