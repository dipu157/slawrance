<?php

namespace App\Http\Controllers\InstituteInfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstituteInfo\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClassesController extends Controller
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
        return view('Classes.manageClasses');
    }

    public function getAllClasses()
    {
        $classes = Classes::query()->where('status',1)->get();
        $output = '';
        if($classes->count() > 0){
            $output .= '<table id="classTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Class Image</th>
                <th>Class Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($classes as $bm) {
                // Generate the image URL
                $defaultImage = asset('storage/images/1706522691.jpg');
                $classimage = asset('storage/images/classRoom/'.$bm->image);
                $classimageSrc =  $bm->image ? $classimage : $defaultImage;

                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td><img src='.$classimageSrc.' width="50" class="img-thumbnail"></td>
                <td>'. $bm->class_name.'</td>
                <td>
                  <a class="btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editClassModal" id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>

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
        $file2 = $request->file('image');
        $filename2 = time().'.'.$file2->getClientOriginalExtension();
        $file2->storeAs('public/images/classRoom', $filename2);

        $bData = [
            'class_name' => $request->class_name,
            'image' => $filename2,
            'user_id' => $this->user_id,
        ];

        //dd($insData);

        Classes::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

      $id = $request->id;
      $ins = Classes::find($id);
      //dd($ins);
      return response()->json($ins);
  }

  // handle update an class ajax request
  public function update(Request $request) {

      $clas = Classes::find($request->id);

      $classImg = '';
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $classImg = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/classRoom/', $classImg);
        if ($clas->image) {
            Storage::delete('public/images/classRoom/'.$clas->image);
        }
    } else {
        $classImg = $request->image;
    }

      $insData = [
        'class_name' => $request->class_name,
        'image' => $classImg,
        'user_id' => $this->user_id,
      ];

      $clas->update($insData);
      return response()->json([
          'status' => 200,
      ]);
  }

  public function delete(Request $request) {
    $id = $request->id;
    $member = Classes::find($id);
    if (Storage::delete('public/images/classRoom/' . $member->image)) {
        Classes::destroy($id);
    }
}


}
