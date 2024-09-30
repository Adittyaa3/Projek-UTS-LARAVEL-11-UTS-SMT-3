<?php 
namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'required|mimes:mp4,mov,avi|max:20000', // batas ukuran file 20MB
        ]);

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');

            Video::create([
                'title' => $request->title,
                'description' => $request->description,
                'video_path' => $videoPath
            ]);
        }

        return redirect()->route('videos.index')->with('success', 'Video berhasil diunggah.');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20000',
        ]);

        $video = Video::findOrFail($id);

        if ($request->hasFile('video')) {
            // Hapus video lama
            if ($video->video_path) {
                Storage::disk('public')->delete($video->video_path);
            }
            $videoPath = $request->file('video')->store('videos', 'public');
            $video->video_path = $videoPath;
        }

        $video->title = $request->title;
        $video->description = $request->description;
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Video berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Hapus file video dari storage
        if ($video->video_path) {
            Storage::disk('public')->delete($video->video_path);
        }

        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video berhasil dihapus.');
    }
}
