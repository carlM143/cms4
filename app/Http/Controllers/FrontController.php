<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Facades\App\Helpers\ListingHelper;

use App\Http\Requests\ContactUsRequest;
use App\Helpers\Setting;

use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryAdminMail;
use App\Mail\InquiryMail;

use App\Models\{Article, Page, User, Resource, ResourceCategory};

use Auth, DB;


class FrontController extends Controller
{


    public function home()
    {
        return $this->page('home');
    }

    public function admission()
    {
        $page = new Page();
        $page->name = 'Admission';
        return view('theme.pages.admission', compact('page'));
    }

    public function seach_result(Request $request)
    {
        $page = new Page();
        $page->name = 'Search Results';

        $breadcrumb = $this->breadcrumb($page);
        $pageLimit = 10;

        $searchtxt = $request->searchtxt; 

        $pages = Page::where('status','PUBLISHED')
            ->select('name','slug')
            ->whereNotIn('slug',['footer','home'])
            ->where('name','like','%'.$searchtxt.'%')
            ->orWhere('contents','like','%'.$searchtxt.'%')
            ->orderBy('name','asc')->get();

        $news = Article::where('status','PUBLISHED')
            ->select('name','slug')
            ->where('name','like','%'.$searchtxt.'%')
            ->orWhere('contents','like','%'.$searchtxt.'%')
            ->orderBy('name','asc')->get();

        $totalItems = $pages->count()+$news->count();

        $searchResult = collect($pages)->merge($news)->paginate(10);

        return view('theme.pages.search-result', compact('searchResult', 'totalItems', 'page','breadcrumb'));
    }

    public function privacy_policy(){

        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        $page = new Page();
        $page->name = Setting::info()->data_privacy_title;

        $breadcrumb = $this->breadcrumb($page);

        return view('theme.pages.privacy-policy', compact('page', 'footer','breadcrumb'));

    }

    public function page($slug)
    {
        if (Auth::guest()) {
            $page = Page::where('slug', $slug)->where('status', 'PUBLISHED')->first();
        } else {
            $page = Page::where('slug', $slug)->first();
        }

        if ($page == null) {
            $view404 = 'theme.pages.404';
            if (view()->exists($view404)) {
                $page = new Page();
                $page->name = 'Page not found';
                return view($view404, compact('page'));
            }

            abort(404);
        }

        $breadcrumb = $this->breadcrumb($page);

        $footer = Page::where('slug', 'footer')->where('name', 'footer')->first();

        if (!empty($page->template)) {
            return view('theme.pages.'.$page->template, compact('footer', 'page', 'breadcrumb'));
        }
        
        $parentPage = null;
        $parentPageName = $page->name;
        $currentPageItems = [];
        $currentPageItems[] = $page->id;
        if ($page->has_parent_page() || $page->has_sub_pages()) {
            if ($page->has_parent_page()) {
                $parentPage = $page->parent_page;
                $parentPageName = $parentPage->name;
                $currentPageItems[] = $parentPage->id;
                while ($parentPage->has_parent_page()) {
                    $parentPage = $parentPage->parent_page;
                    $currentPageItems[] = $parentPage->id;
                }
            } else {
                $parentPage = $page;
                $currentPageItems[] = $parentPage->id;
            }
        }

        return view('theme.page', compact('footer', 'page', 'parentPage', 'breadcrumb', 'currentPageItems', 'parentPageName'));
    }

    public function contact_us(ContactUsRequest $request)
    {
        $admins  = User::where('role_id', 1)->get();
        $client = $request->all();

        Mail::to($client['email'])->send(new InquiryMail(Setting::info(), $client));

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new InquiryAdminMail(Setting::info(), $client, $admin));
        }

        if (Mail::failures()) {
            return redirect()->back()->with('error','Failed to send inquiry. Please try again later.');
        }

        return redirect()->back()->with('success','Email sent!');
    }

    public function breadcrumb($page)
    {
        return [
            'Home' => url('/'),
            $page->name => url('/').'/'.$page->slug
        ];
    }
}
