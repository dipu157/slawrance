<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu\Menu;
use App\Models\Menu\Sub_Menu;
use App\Models\Menu\MenuDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuPageController extends Controller
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
        $submenus = Sub_Menu::query()->where('status',1)->pluck('name','id');
        return view('menupage.menupageIndex',compact('menus','submenus'));
    }

    public function getAllmenuPage()
    {
        $menupage = MenuDetails::query()->where('status',1)->get();
        //dd($menupage);
        $output = '';
        if($menupage->count() > 0){
            $output .= '<table id="menuPageTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Menu</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($menupage as $bm) {
                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td>'.$bm->menu->name.'</td>
                <td>'. $bm->title.'</td>
                <td>'.$bm->description.'</td>
                <td>
                  <a class="btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editMenuPageModal" id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>

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

        $file = $request->file('image');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/menudetails', $filename);

        $bData = [
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'image' => $filename,
            'description' => $request->description,
            'user_id' => $this->user_id,
        ];

        //dd($bData);

        MenuDetails::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = MenuDetails::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {
  
        $fileName = '';
        $member = MenuDetails::find($request->id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/menudetails', $fileName);
            if ($member->image) {
                Storage::delete('public/images/menudetails/' . $member->image);
            }
        } else {
            $fileName = $request->bmem_photo;
        }

        $bData = [
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName,
            'user_id' => $this->user_id,
        ];

        $member->update($bData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $member = MenuDetails::find($id);
        if (Storage::delete('public/images/menudetails/' . $member->image)) {
            MenuDetails::destroy($id);
        }
    }
}
