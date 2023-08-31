<?php

namespace App\Http\Controllers\Cms;

use Facades\App\Helpers\ListingHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Permission;
use App\Models\Page;
use App\Models\Article;
use App\Models\Announcements;

class AnnouncementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        Permission::module_init($this, 'menu');
    }

    public function index()
    {
        $searchFields = ['name'];
        $filterFields = ['updated_at', 'name', 'status'];

        $announcements = ListingHelper::sort_by('status')
            ->filter_fields($filterFields)
            ->simple_search(Announcements::class, $searchFields);

        $filter = ListingHelper::filter_fields($filterFields)->get_filter($searchFields);

        $searchType = 'simple_search';

        return view('admin.cms4.announcements.index', compact('announcements','filter', 'searchType'));
    }

    
    public function create()
    {
        
        $pages = Page::where('parent_page_id', 0)->get();

        return view('admin.cms4.announcements.create', compact('pages'));
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:announcements|max:250',
            'msg' => 'required',
            'expiry_date' => 'required',
        ]);

        $save = Announcements::create([
            'name' => $request->name,
            'msg' => $request->msg,
            'expiry_date' => $request->expiry_date,
            'status' => $request->has('visibility') ? 'PUBLISHED' : 'PRIVATE',
            'user_id' => \Auth::id(),
        ]);

        return redirect()->route('announcements.index')->with('success','Successfully saved announcement!');
    }

    
    public function show(Menu $menu)
    {
        abort(404);
    }

    
    public function edit($id)
    {
        
        $announcement = Announcements::find($id);
        // $categories = Announcements::all();
        $article = Article::find($id);
        return view('admin.cms4.announcements.announcement_edit', compact('article', 'announcement'));
    
    }

   
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $announcement = Announcements::find($id);
        // $categories = Announcements::all();
        //$article = Article::find($id);
        $announcement->update($request->only(["name","msg"]));
        // return view('admin.cms4.announcements.edit', compact('announcement', 'categories', 'news'));
        return redirect()->route('announcements.index')->with('success', 'Item updated successfully');
    }

    public function delete(Request $request)
    {
       
        $pages = explode("|", $request->pages);

        foreach ($pages as $page) {
            if (!empty($page) && is_numeric($page)) {
                $announcement = Announcements::whereId($page);
                
                //$announcement->update(['status' => 'PRIVATE']);
                $announcement->delete();
            }
        }

        return redirect()->route('announcements.index')->with('success', 'Record Deleted Successfully');

    }
   
    public function destroy(Menu $menu)
    {
       
    }

    public function destroy_many()
    {

    }

    public function restore($page)
    {
        Announcements::whereId($page)->restore();

        return back()->with('success', __('announcements.restore_success'));
    }
    
    // public function announcements_edit()
    // {
        
    //     return view('announcements.announcement_edit');
       
    // }

}
