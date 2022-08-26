<?php

namespace App\Http\Controllers;

use App\Models\User;
use FFMpeg\FFMpeg;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function videoRegisterPage()
    {
        return view('video');
    }

    public function store(Request $request)
    {
        $file = tap($request->file('video'))->store('videos');
        $filename = pathinfo($file->hashName(), PATHINFO_FILENAME);

        FFMpeg::fromDisk("local")
            ->open("videos/" . $file->hashName())
            ->export()
            ->toDisk('local')
            ->isFormat(new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))
            ->save('coverted_videos/' . $filename . 'mp4');

        return response()->json([
            'status' => 'success'
        ]);
    }

}
