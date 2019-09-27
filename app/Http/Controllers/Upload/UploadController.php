<?php

namespace App\Http\Controllers\Upload;


use DB;
use Auth;
use File;
use Validator;
use App\User;
use App\Models\Client\Stages;
use App\Models\Client\ResultsQuest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function image_upload(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,bmp,gif,svg|max:5000'
        ]);

        $path = $request->file('image')->store('upload/users/'.$request->user()->id, 'public');

        if(File::exists('storage/'.Auth::user()->avatar)) {
            File::delete('storage/'.Auth::user()->avatar);
        }

        User::where('id', Auth::user()->id)->update(['avatar' => $path]);

        return redirect('home');
    }

    public function file_upload(Request $request)
    {
        $request->validate([
            'file_quest' =>'mimes:doc,dot,pdf|max:40000'
        ]);

        $id = ResultsQuest::first();
        $id_stage = Stages::where('start_date', '<', date('y-m-d'))->max('id');
        $path = $request->file('file_quest')->store('upload/users/'.$request->user()->id.'/answer_'.$id_stage, 'public');

        if ($id==null) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            ResultsQuest::truncate();
        }

        ResultsQuest::where('id_user', Auth::user()->id)->where('id_stage', $id_stage)
            ->insert(['user_answer' => $path],
                ['id_user' => Auth::user()->id],
                ['id_stage' => $id_stage]);

        /*user_answer = ResultsQuest::where('id_user', Auth::user()->id)->where('id_stage', $id_stage)->value('user_answer');
        if(File::exists('storage/'.$user_answer))
        {
            File::delete('storage/'.$user_answer);
        }

        if(ResultsQuest::where('id_user', Auth::user()->id)->where('id_stage', $id_stage)->value('user_answer')==null) {
            ResultsQuest::where('id_user', Auth::user()->id)->where('id_stage', $id_stage)
                ->insert(['user_answer' => $path],
                    ['id_user' => Auth::user()->id],
                    ['id_stage' => $id_stage]);
        }
        else{
            ResultsQuest::where('id_user', Auth::user()->id)->where('id_stage', $id_stage)->delete();
            ResultsQuest::where('id_user', Auth::user()->id)->where('id_stage', $id_stage)
                ->insert(['user_answer' => $path],
                    ['id_user' => Auth::user()->id],
                    ['id_stage' => $id_stage]);
        }*/

        return redirect('home');
    }

    public function downloadfile()
    {
        $id_stage = Stages::where('start_date', '<', date('y-m-d'))->max('id');
        $file = Stages::where('id', $id_stage)->value('quest_file');
        return response()->download(storage_path('app/public/'.$file));
    }
}
