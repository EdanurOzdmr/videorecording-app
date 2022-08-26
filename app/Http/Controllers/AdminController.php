<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password', 'role');

        if (Auth::attempt($credentials) && Auth::user()->role == 'admin') {
            return redirect()->intended(route('dashboard'));

        } else {
            $this->authorize('admin');
            return back()->with('error', 'Invalid username and password');
        }
    }

    public function getVideo()
    {
        $data['video'] = Video::join('questions', 'questions.id', '=', 'videos.question_id')->get();
        return view('admin.dashboard', compact('data'));
    }



    public function deny($id)
    {
        $video = Video::where('id', $id)->first();
        if ($video->status == '1') {
            Video::where('id', $id)->update(['status' => '0']);

            return back()->with('success', 'Successful');
        } elseif ($video->status == '0') {
            return back()->with('error', 'Invalid operation');
        }

    }

    public function confirm($id)
    {
        $video = Video::where('id', $id)->first();
        if ($video->status == '0') {
            Video::where('id', $id)->update(['status' => '1']);
            return back()->with('success', 'Successful');
        } elseif ($video->status == '1') {
            return back()->with('error', 'Invalid operation');
        }

    }
}
