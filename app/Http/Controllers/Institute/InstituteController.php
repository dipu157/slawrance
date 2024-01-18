<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\InstituteInfo\InstituteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Asset;
use Illuminate\Support\Facades\Storage;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Institute.manageInstitute');
    }

    public function getAllInstitute()
    {
        $instituteInfo = InstituteInfo::query()->where('status',1)->get();
        $output = '';
        if($instituteInfo->count() > 0){
            $output .= '<table id="instituteTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>logo</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($instituteInfo as $i_info) {
                // Generate the image URL
                $defaultImage = asset('storage/images/1694713766.jpg');
                $imageUrl = asset('storage/images/'.$i_info->logo);
                $imageSrc =  $i_info->logo ? $imageUrl : $defaultImage;

                $output .= '<tr>
                <td>'.$i_info->id.'</td>
                <td><img src='.$imageSrc.' width="50" class="img-thumbnail"></td>
                <td>'. $i_info->name.'</td>
                <td>'.$i_info->address.'</td>
                <td>'.$i_info->email.'</td>
                <td>'.$i_info->phone.'</td>
                <td>'.$i_info->website.'</td>
                <td>
                  <a class="btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editInstituteModal" id="' . $i_info->id . '"><i class="bx bxs-edit"></i></a>
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

        $file = $request->file('logo');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images', $filename);

        $insData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'logo' => $filename,
            'social_link1' => $request->social_link1,
            'social_link2' => $request->social_link2,
            'social_link3' => $request->social_link3,
            'social_link4' => $request->social_link4,
            'map_link' => $request->map_link,
            'city' => $request->city,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'website' => $request->website,
            'history' => $request->history,
            
        ];

        //dd($insData);

        InstituteInfo::create($insData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = InstituteInfo::find($id);
        //dd($ins);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {

        $fileName = '';
        $ins = InstituteInfo::find($request->id);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $fileName);
            if ($ins->logo) {
                Storage::delete('public/images/' . $ins->logo);
            }
        } else {
            $fileName = $request->emp_photo;
        }

        $insData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'social_link1' => $request->social_link1,
            'social_link2' => $request->social_link2,
            'social_link3' => $request->social_link3,
            'social_link4' => $request->social_link4,
            'map_link' => $request->map_link,
            'city' => $request->city,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'website' => $request->website,
            'history' => $request->history,
            'logo' => $fileName
        ];

        $ins->update($insData);
        return response()->json([
            'status' => 200,
        ]);
    }



}
