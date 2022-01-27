<?php

namespace Stephendevs\Pagman\Http\Controllers\Menu;

use Stephendevs\Pagman\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Stephendevs\Pagman\Http\Requests\MenuRequest;

use Stephendevs\Pagman\Models\Menu\Menu;
use Stephendevs\Pagman\Models\Menu\MenuItem;
use Stephendevs\Pagman\MenuOrganiser;

class MenuController extends Controller
{
    use MenuOrganiser;

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of all menu items for specific menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::withCount(['menuItems'])->get();
        return view('pagman::menus.index', compact(['menus']));
    }

    /**
     * Show the form for creating a new nav menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagman::navbar.menus.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $data = $request->validated();

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->save();

        if($request->ajax()){
            return response()->json([
                'success' => true,
                'message' => 'Menu Created Successfully',
            ], 200);
        }
        return back()->withInput()->with('success', 'Menu Created Successfully');
    }

    /**
     * Display the specified menu and its items.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::with(['menuItems'])->findOrFail($id);
        return view('pagman::menus.show', compact(['menu']));
    }

    /**
     * Show the form for editing the specified menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrfail($id);
        return view('pagman::menu.edit', compact(['menu']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->convertPrimaryMenusToNotPrimary($request);
        $this->convertFooterMenusToNotFooter($request);

        $menu = Menu::findOrfail($id);
        $menu->name = $request->name;

        ($request->has('is_primary')) ? $menu->is_primary = '1' : $menu->is_primary = '0';
        ($request->has('footer')) ? $menu->footer = '1' : $menu->footer = '0';
        
        $menu->save();


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
        Menu::destroy($id);
        return back()->with('success', 'Menu deleted successfully');
    }

    private function convertPrimaryMenusToNotPrimary($request)
    {
        if($request->has('is_primary')){
            $primaries = Menu::where('is_primary', '1')->get(['id']);
            for ($i=0; $i < count($primaries) ; $i++) { 
                Menu::where('id', $primaries[$i]['id'])->update(['is_primary' => '0']);
            }
        }
    }

    private function convertFooterMenusToNotFooter($request)
    {
        if($request->has('footer')){
            $footers = Menu::where('footer', '1')->get(['id']);
            for ($i=0; $i < count($footers) ; $i++) { 
                Menu::where('id', $footers[$i]['id'])->update(['footer' => '0']);
            }
        }
    }

      /**
     * Display a listing of menus for ajax.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAjax()
    {
        $menus = Menu::all();
        return response()->json(['data' => $menus]);
    }
}
