<?php

namespace App\Http\Controllers\InstituteInfo;

use App\Http\Controllers\Controller;
use App\Models\InstituteInfo\Facilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
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
        return view('facility.manageFacility');
    }

    public function getAllFacility()
    {
        $facility = Facilities::query()->where('status',1)->get();
        $output = '';
        if($facility->count() > 0){
            $output .= '<table id="facilityTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($facility as $bm) {
                // Generate the image URL
                $defaultImage = asset('storage/images/1694713766.png');
                $imageUrl = asset('storage/images/Facility/'.$bm->icon);
                $imageSrc =  $bm->icon ? $imageUrl : $defaultImage;

                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td><img src='.$imageSrc.' width="50" class="img-thumbnail"></td>
                <td>'.$bm->title.'</td>
                <td>'.$bm->description.'</td>
                <td>
                  <a class="btn btn-sm btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editFacilityModal"
                  id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>
                  <a class="btn btn-sm ms-3 btn-danger deleteIcon" id="' . $bm->id . '"><i class="bx bxs-trash"></i></a>
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
        $file = $request->file('icon');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/Facility', $filename);

        $bData = [
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $filename,
            'user_id' => $this->user_id,
        ];

        //dd($bData);

        Facilities::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = Facilities::find($id);
        return response()->json($ins);
    }

    public function update(Request $request) {

        $fileName = '';
        $member = Facilities::find($request->id);

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/Facility', $fileName);
            if ($member->icon) {
                Storage::delete('public/images/Facility/' . $member->icon);
            }
        } else {
            $fileName = $request->fac_icon;
        }



        $bData = [
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $fileName,
            'user_id' => $this->user_id,
        ];

        $member->update($bData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        Facilities::destroy($id);
    }

}
