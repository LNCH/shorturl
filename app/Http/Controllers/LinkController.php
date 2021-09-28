<?php

namespace App\Http\Controllers;

use App\Http\Requests\Links\CreateRequest;
use App\Http\Requests\Links\UpdateRequest;
use App\Models\Link;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('links.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        Link::create($request->validated());
        return redirect()->route('links.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Link $link
     * @return Renderable
     */
    public function show(Link $link): Renderable
    {
        return view('links.show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Link $link
     * @return Renderable
     */
    public function edit(Link $link): Renderable
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Link $link
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Link $link): RedirectResponse
    {
        $link->update($request->validated());
        return redirect()->route('links.show', $link);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Link $link
     * @return Response
     */
    public function destroy(Link $link)
    {
        //
    }
}
