<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use PhpParser\Comment\Doc;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return Inertia::render('Documents/Index', [
            'documents' => $user->documents()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return Inertia::render('Documents/Create', [
            'empty' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $validated = Validator::make($request->all(),
            [
                'title' => 'required'
            ]
        )->validate();

        $document = new Document([
           'content' => '',
           'title' => $validated['title'],
           'user_id' =>  $user->id
        ]);
        $document->save();
        return redirect()->route('documents.show', [$document]);
    }

    /**
     * Display the specified resource.
     * Show will show the markdown in html
     */
    public function show(Document $document)
    {
        // do text interpolation to inset html

        return Inertia::render('Documents/Show', [
            'document' => $document,
            'interpolatedText' => '<b>html</b>'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * Edit will show the form in plain text
     */
    public function edit(Document $document)
    {
        return Inertia::render('Documents/Edit', [
            'document' => $document,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Document $document)
    {
        $user = $request->user();
        $validated = Validator::make($request->all(),
            [
                'content' => 'required'
            ]
        )->validate();

        $document->content = $validated['content'];
        $document->save();

        return redirect(route('document.show', [$document]));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Document $document)
    {
        //
    }
}
