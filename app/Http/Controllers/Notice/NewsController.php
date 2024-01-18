<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Models\Notice\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
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
        return view('news.manageNews');
    }

    public function getAllNews()
    {
        $bMember = News::query()->where('status',1)->get();
        $output = '';
        if($bMember->count() > 0){
            $output .= '<table id="newsTable" class="table table-striped table-bordered" style="width:100%">
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
            foreach ($bMember as $bm) {
                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td>'. $bm->headline.'</td>
                <td>'.$bm->short_description.'</td>
                <td>'.$bm->description.'</td>
                <td>
                  <a class="btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editNewsModal" id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>

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
        $file->storeAs('public/images/news_events', $filename);

        $bData = [
            'headline' => $request->headline,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'attachment' => $filename,
            'user_id' => $this->user_id,
        ];

        //dd($insData);

        News::create($bData);
        return response()->json(['status' => 200]);
    }

    public function edit(Request $request){

        $id = $request->id;
        $ins = News::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {

        $member = News::find($request->id);

        $bData = [
            'title' => $request->title,
            'headline' => $request->headline,
            'short_description' => $request->short_description,
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
        News::destroy($id);
    }
}
