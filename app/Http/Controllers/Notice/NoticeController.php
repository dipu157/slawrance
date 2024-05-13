<?php

namespace App\Http\Controllers\Notice;

use App\Http\Controllers\Controller;
use App\Models\Notice\ImportantNotice;
use App\Models\Notice\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
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
        return view('notice.manageNotice');
    }

    public function getAllNotice()
    {
        $bMember = Notice::query()->where('status',1)->get();
        $output = '';
        if($bMember->count() > 0){
            $output .= '<table id="noticeTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Notice Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($bMember as $bm) {
                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td>'. $bm->title.'</td>
                <td>'.$bm->description.'</td>
                <td>'.$bm->notice_date.'</td>
                <td>
                  <a class="btn btn-sm btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editNoticeModal"
                  id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>
                  <a class="btn btn-sm ms-3 btn-success viewIcon" id="' . $bm->id . '"><i class="bx bxs-envelope"></i></a>
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
        $bData = [
            'title' => $request->title,
            'description' => $request->description,
            'notice_date' => $request->notice_date,
            'user_id' => $this->user_id,
        ];

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/notice', $filename);
            $bData['attachment'] = $filename;
        }

        Notice::create($bData);
        return response()->json(['status' => 200]);
    }


    public function edit(Request $request){

        $id = $request->id;
        $ins = Notice::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function update(Request $request) {


        $fileName = '';
        $member = Notice::find($request->id);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/notice', $fileName);
            if ($member->attachment) {
                Storage::delete('public/notice/' . $member->attachment);
            }
        } else {
            $fileName = $request->attachment;
        }

        $bData = [
            'title' => $request->title,
            'description' => $request->description,
            'notice_date' => $request->notice_date,
            'attachment' => $fileName,
            'user_id' => $this->user_id,
        ];

        $member->update($bData);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request) {
        $id = $request->id;
        $member = Notice::find($id);
        if (Storage::delete('public/notice/' . $member->attachment)) {
            Notice::destroy($id);
        }

    }








    public function inoticeIndex()
    {
        return view('important_notice.manageInotice');
    }

    public function getAllInotice()
    {
        $inotice = ImportantNotice::query()->where('status',1)->get();
        $output = '';
        if($inotice->count() > 0){
            $output .= '<table id="inoticeTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($inotice as $bm) {
                $output .= '<tr>
                <td>'.$bm->id.'</td>
                <td>'. $bm->title.'</td>
                <td>'.$bm->description.'</td>
                <td>
                  <a class="btn btn-sm btn-edit editIcon" data-bs-toggle="modal" data-bs-target="#editINoticeModal"
                  id="' . $bm->id . '"><i class="bx bxs-edit"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        }else{
            echo '<h1 class="text-center text-secondary my-5">No Record Found in Database</h1>';
        }
    }

    // public function createInotice(Request $request)
    // {
    //     $bData = [
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'user_id' => $this->user_id,
    //     ];

    //     //dd($bData);

    //     ImportantNotice::create($bData);
    //     return response()->json(['status' => 200]);
    // }

    public function editInotice(Request $request){

        $id = $request->id;
        $ins = ImportantNotice::find($id);
        return response()->json($ins);
    }

    // handle update an InstituteInfo ajax request
    public function updateInotice(Request $request) {

        $member = ImportantNotice::find($request->id);

        $bData = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $this->user_id,
        ];

        $member->update($bData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // public function deleteInotice(Request $request) {
    //     $id = $request->id;
    //     ImportantNotice::destroy($id);
    // }
}
