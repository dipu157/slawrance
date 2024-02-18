<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Common\Messages;
use App\Models\Common\Slider;
use App\Models\InstituteInfo\Classes;
use App\Models\InstituteInfo\InstituteInfo;
use App\Models\Member\BoardMember;
use App\Models\Member\Teachers;
use App\Models\Menu\Menu;
use App\Models\Menu\Sub_Menu;
use App\Models\Notice\Event;
use App\Models\Notice\ImportantNotice;
use App\Models\Notice\News;
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
        $message = Messages::query()->where('status',1)->take(2)->get();
        //$events = Event::query()->where('status',1)->take(4)->get();

        //dd($message);

        return view('Frontend.landpage', compact('institute','message','menus','classes','sliders','submenu','bmembers'));
    }
}
