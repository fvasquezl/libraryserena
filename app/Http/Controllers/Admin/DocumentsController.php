<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class DocumentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        $this->validate(request(),[
            'document' => 'required|mimes:pdf'
        ]);

        $post->documents()->create([
            'title' => request()->file('document')->getClientOriginalName(),
            'url'=> Storage::url(request()->file('document')->store('documents','public')),
        ]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();

        $documentPath = str_replace('storage','public',$document->url);

        Storage::delete($documentPath);

        return back()->with('info','Documento eliminado');
    }
}
