<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $galleries = Gallery::all();


        return view("home", compact("galleries"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'author_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            // Save to the database
            // \DB::table('gallery')->insert([
            //     'author_name' => $request->author_name,
            //     'title' => $request->title,
            //     'category' => $request->category,
            //     'image' => $filePath, // Store file path
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
            // Save using Eloquent
            Gallery::create([
                'author_name' => $request->author_name,
                'title' => $request->title,
                'category' => $request->category,
                'image' => $filePath, // Store file path
            ]);
        }

        return redirect()->route('gallery.index')->with('message', 'File uploaded successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->route('gallery.index')->with('error', 'Record not found.');
        }

        return view('edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the existing gallery record
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->route('gallery.index')->with('error', 'Record not found.');
        }

        // Validate the request
        $request->validate([
            'author_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'file' => 'nullable|mimes:jpg,png,jpeg|max:2048', // File is optional during update
        ]);

        // If a new file is uploaded, handle the file upload
        if ($request->hasFile('file')) {
            // Delete the old file from storage
            if (Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            // Store the new file
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            // Update the file path in the gallery record
            $gallery->image = $filePath;
        }

        // Update the gallery record with new values
        $gallery->update([
            'author_name' => $request->author_name,
            'title' => $request->title,
            'category' => $request->category,
        ]);

        return redirect()->route('gallery.index')->with('message', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the gallery record by id
        $gallery = Gallery::find($id);

        // Check if the gallery record exists
        if ($gallery) {
            // Get the file path stored in the 'image' column
            $filePath = $gallery->image;

            // Check if the file exists in storage (on the 'public' disk)
            if (Storage::disk('public')->exists($filePath)) {
                // Delete the file from storage
                Storage::disk('public')->delete($filePath);
            }

            // Delete the record from the database
            $gallery->delete();

            return redirect()->route('gallery.index')->with('message', 'Record and file deleted successfully.');
        }

        return redirect()->route('gallery.index')->with('error', 'Record not found.');
    }
}
