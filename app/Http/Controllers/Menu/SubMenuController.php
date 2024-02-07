<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\Menu;
use App\Models\Menu\Sub_Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubMenuController extends Controller
{
    protected $user_id;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user_id = Auth::id();

            return $next($request);
        });
    }

    public function index()
    {
        $menus = Menu::query()->where('status',1)->pluck('name','id');
        return view('sub_menu.manageSubMenu',compact('menus'));
    }

    public function getAllSubmenu()
    {
        $bMember = Sub_Menu::query()->where('status',1)->get();
        $output = '';
        if($bMember->count() > 0){
            $output .= '<table id="submenuTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Menu</th>
                <th>Sub Menu</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($bMember as $bm) {
                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td>'.$bm->menu->name.'</td>
                <td>'. $bm->name.'</td>
                <td>'.$bm->status.'</td>
                <td>
                  <a class="btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editSubMenuModal" id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>

                  <a class="ms-3 btn-danger deleteIcon" id="' . $bm->id . '"><i class="bx bxs-trash"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        }else{
            echo '<h1 class="text-center text-secondary my-5">No Record Found in Database</h1>';
        }
    }

    public function create(Request $request)
    {
        $bData = [
            'menu_id' => $request->menu_id,
            'name' => $request->name,
            'position' => $request->position,
            'user_id' => $this->user_id,
        ];

        //dd($insData);

        Sub_Menu::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = Sub_Menu::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {

        $member = Sub_Menu::find($request->id);

        $bData = [
            'menu_id' => $request->menu_id,
            'name' => $request->name,
            'position' => $request->position,
            'user_id' => $this->user_id,
        ];

        $member->update($bData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        Sub_Menu::destroy($id);
    }
}
