<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Models\Notice\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
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
        return view('CollegeEvent.manageEvent');
    }

    public function getAllEvent()
    {
        $bMember = Event::query()->where('status',1)->get();
        $output = '';
        if($bMember->count() > 0){
            $output .= '<table id="memberTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Event Date</th>
                <th>Details</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($bMember as $bm) {
                // Generate the image URL
                $defaultImage = asset('storage/images/no_img.jpg');
                $imageUrl = asset('storage/images/events/'.$bm->image);
                $imageSrc =  $bm->image ? $imageUrl : $defaultImage;

                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td><img src='.$imageSrc.' width="50" class="img-thumbnail"></td>
                <td>'. $bm->title.'</td>
                <td>'. $bm->event_date.'</td>
                <td>'.$bm->details.'</td>
                <td>
                  <a class="btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editEventModal" id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>
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
        $file->storeAs('public/images/events', $filename);

        $bData = [
            'title' => $request->title,
            'event_date' => $request->event_date,
            'details' => $request->details,
            'image' => $filename,
            'user_id' => $this->user_id,
        ];

        //dd($insData);

        Event::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = Event::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {

        $fileName = '';
        $member = Event::find($request->id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/events', $fileName);
            if ($member->image) {
                Storage::delete('public/images/events/' . $member->image);
            }
        } else {
            $fileName = $request->bmem_photo;
        }

        $bData = [
            'title' => $request->title,
            'event_date' => $request->event_date,
            'details' => $request->details,
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
        $member = Event::find($id);
        if (Storage::delete('public/images/events/' . $member->image)) {
            Event::destroy($id);
        }
    }
}
