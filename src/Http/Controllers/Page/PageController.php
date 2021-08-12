<?php

namespace Stephendevs\Lpage\Http\Controllers\Page;

use Stephendevs\Lpage\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stephendevs\Lpage\Http\Requests\PageRequest;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

use Stephendevs\Lpage\Models\Page\Page;
use Stephendevs\Lpage\Models\Menu\Menu;

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
        return view('lpage::page.index', compact(['pages']));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('lpage::page.create', compact(['pages']));
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
        $page->name = $request->name;
        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->url = $request->url;

        if($request->parent_child == '2'){
            $page->is_child = '1';
            $page->is_parent = '0';
            $page->parent_id = $request->parent_id;
        }else{
            $page->is_parent = '1';
            $page->is_child = '0';
            $page->parent_id = '0';
        }

        $page->save();

        return back()->withInput()->with('success', 'Page Created Successfully');
    }

    public function show($id)
    {
        $page = Page::with(['menus'])->findOrFail($id);
        $children = Page::where('parent_id', $id)->get();
        //return $page;
        return view('lpage::page.show', compact(['page', 'children']));
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
        $pages = Page::where('id', '!=', $id)->get();
        return view('lpage::page.edit', compact(['page', 'pages']));
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
