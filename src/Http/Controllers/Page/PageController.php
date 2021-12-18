<?php

namespace Stephendevs\Pagman\Http\Controllers\Page;

use Stephendevs\Pagman\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stephendevs\Pagman\Http\Requests\PageRequest;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

use Stephendevs\Pagman\Models\Page\Page;
use Stephendevs\Pagman\Models\Menu\Menu;

class PageController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('pagman::page.index', compact(['pages']));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('pagman::page.create', compact(['pages']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $data = $request->validated();

        $page = new Page();
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->url = $request->url;
        $page->content = $request->content;
        $page->description = $request->description;
        $page->parent_page_id = $request->parent_page;

        $page->save();

        if ($request->has('ajax')) {
            return response()->json([
                'success' => true,
                'message' => 'Page Created Successfully',
                'url' => route('pagmanPageShow', ['id' => $page->id])
            ], 200);
        }

        return back()->withInput()->with('success', 'Page Created Successfully');
    }

    public function show($id)
    {
        $page = Page::with(['menus'])->findOrFail($id);
        $otherPages = Page::where('id', '!=', $id)->get();
        return view('pagman::page.show', compact(['page', 'otherPages']));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrfail($id);
        $otherPages = Page::where('id', '!=', $id)->get();
        return view('pagman::page.edit', compact(['page', 'otherPages']));
    }

    public function update(Request $request, $id)
    {

        return back()->withInput()->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::destroy($id);
        return back()->with('success', 'Page deleted successfully');
    }


    public function menu()
    {
        $menus = Menu::with(['pages'])->get();
        $pages = Page::with(['menus'])->get();
        return response()->json(['pages' => $pages]);
    }

}
