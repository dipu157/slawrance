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


}
