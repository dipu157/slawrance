<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Common\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
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
        return view('slider.manageSlider');
    }

    public function getAllSlider()
    {
        $bMember = Slider::query()->where('status',1)->get();
        $output = '';
        if($bMember->count() > 0){
            $output .= '<table id="sliderTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($bMember as $bm) {
                // Generate the image URL
                $defaultImage = asset('storage/images/1706522691.jpg');
                $imageUrl = asset('storage/images/Slider/'.$bm->image);
                $imageSrc =  $bm->image ? $imageUrl : $defaultImage;

                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td>'. $bm->title.'</td>
                <td><img src='.$imageSrc.' width="50" class="img-thumbnail"></td>
                <td>'.$bm->description.'</td>
                <td>
                  <a class="btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editSliderModal" id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>
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
        $file->storeAs('public/images/Slider', $filename);

        $bData = [
            'title' => $request->title,
            'image' => $filename,
            'description' => $request->description,
            'user_id' => $this->user_id,
        ];

        //dd($insData);

        Slider::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = Slider::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {

        $fileName = '';
        $member = Slider::find($request->id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images/Slider', $fileName);
            if ($member->image) {
                Storage::delete('public/images/Slider/' . $member->image);
            }
        } else {
            $fileName = $request->bmem_photo;
        }

        $bData = [
            'title' => $request->title,
            'image' => $fileName,
            'description' => $request->description,
            'user_id' => $this->user_id,
        ];

        $member->update($bData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $member = Slider::find($id);
        if (Storage::delete('public/images/Slider/' . $member->image)) {
            Slider::destroy($id);
        }
    }
}
