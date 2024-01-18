<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Member\BoardMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BoardMemberController extends Controller
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
        return view('Members.Board.manageBoard');
    }

    public function getAllMemebers()
    {
        $bMember = BoardMember::query()->where('status',1)->get();
        $output = '';
        if($bMember->count() > 0){
            $output .= '<table id="memberTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Full Name</th>
                <th>Position</th>
                <th>Mobile</th>
                <th>DOB</th>
                <th>Blood Group</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($bMember as $bm) {
                // Generate the image URL
                $defaultImage = asset('storage/images/1694713766.jpg');
                $imageUrl = asset('storage/images/BMember/'.$bm->photo);
                $imageSrc =  $bm->photo ? $imageUrl : $defaultImage;

                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td><img src='.$imageSrc.' width="50" class="img-thumbnail"></td>
                <td>'. $bm->full_name.'</td>
                <td>'.$bm->position.'</td>
                <td>'.$bm->mobile.'</td>
                <td>'.$bm->dob.'</td>
                <td>'.$bm->blood_group.'</td>
                <td>
                  <a class="btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editMemberModal" id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>

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

        $file = $request->file('photo');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/BMember', $filename);

        $bData = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'position' => $request->position,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
            'national_id' => $request->national_id,
            'photo' => $filename,
            'user_id' => $this->user_id,
        ];

        //dd($insData);

        BoardMember::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = BoardMember::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {

        $fileName = '';
        $member = BoardMember::find($request->id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/BMember', $fileName);
            if ($member->photo) {
                Storage::delete('public/images/BMember/' . $member->photo);
            }
        } else {
            $fileName = $request->bmem_photo;
        }

        $bData = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'position' => $request->position,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
            'national_id' => $request->national_id,
            'photo' => $fileName,
            'user_id' => $this->user_id,
        ];

        $member->update($bData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $member = BoardMember::find($id);
        if (Storage::delete('public/images/BMember/' . $member->photo)) {
            BoardMember::destroy($id);
        }
    }
}
