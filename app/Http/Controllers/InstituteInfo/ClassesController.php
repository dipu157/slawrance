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
                <th>Headline</th>
                <th>Short Description</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($classes as $bm) {
                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td>'. $bm->headline.'</td>
                <td>'.$bm->short_description.'</td>
                <td>'.$bm->description.'</td>
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

        $file = $request->file('photo');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/teacher', $filename);

        $filename2 = time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/images/classRoom', $filename2);

        $bData = [
            'class_teacher_name' => $request->class_teacher_name,
            'position' => $request->position,
            'photo' => $filename,
            'class_name' => $request->class_name,
            'image' => $filename2,
            'student_age' => $request->student_age,
            'class_time' => $request->class_time,
            'capacity' => $request->capacity,
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

      $fileName = '';
      $ins = Classes::find($request->id);

      if ($request->hasFile('logo')) {
          $file = $request->file('logo');
          $fileName = time() . '.' . $file->getClientOriginalExtension();
          $file->storeAs('public/images', $fileName);
          if ($ins->logo) {
              Storage::delete('public/images/'.$ins->logo);
          }
      } else {
          $fileName = $request->ins_photo;
      }

      $insData = [
        'class_teacher_name' => $request->class_teacher_name,
        'position' => $request->position,
        'photo' => $fileName,
        'class_name' => $request->class_name,
        'image' => $filename2,
        'student_age' => $request->student_age,
        'class_time' => $request->class_time,
        'capacity' => $request->capacity,
        'user_id' => $this->user_id,
      ];

      $ins->update($insData);
      return response()->json([
          'status' => 200,
      ]);
  }


}
