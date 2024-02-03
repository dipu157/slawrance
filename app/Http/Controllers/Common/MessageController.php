<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Common\Messages;
use App\Models\Notice\ImportantNotice;
use App\Models\Notice\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
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
        return view('Members.Message.manageMessage');
    }

    public function getAllMessage()
    {
        $message = Messages::query()->where('status',1)->get();
        $output = '';
        if($message->count() > 0){
            $output .= '<table id="messageTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Position</th>
                <th>Message</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($message as $bm) {
                // Generate the image URL
                $defaultImage = asset('storage/images/1694713766.png');
                $imageUrl = asset('storage/message/'.$bm->photo);
                $imageSrc =  $bm->photo ? $imageUrl : $defaultImage;

                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td><img src='.$imageSrc.' width="50" class="img-thumbnail"></td>
                <td>'.$bm->name.'</td>
                <td>'.$bm->position.'</td>
                <td>'.$bm->message.'</td>
                <td>
                  <a class="btn btn-sm btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editMessageModal"
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
        $file = $request->file('photo');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/message', $filename);

        $bData = [
            'name' => $request->name,
            'position' => $request->position,
            'message' => $request->message,
            'photo' => $filename,
            'user_id' => $this->user_id,
        ];

        //dd($bData);

        Messages::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = Messages::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {

        $fileName = '';
        $member = Messages::find($request->id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/message', $fileName);
            if ($member->photo) {
                Storage::delete('public/message/' . $member->photo);
            }
        } else {
            $fileName = $request->bmem_photo;
        }

        $bData = [
            'name' => $request->name,
            'position' => $request->position,
            'message' => $request->message,
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
        $member = Messages::find($id);
        if (Storage::delete('public/message/' . $member->photo)) {
            Messages::destroy($id);
        }

    }
}
