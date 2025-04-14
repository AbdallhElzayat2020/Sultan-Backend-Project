<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Offer;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function index()
    {
        Artisan::call('key:generate');

        $testimonials = Testimonial::active()->with(['media'])->get();

        $services = Service::active()->with(['media'])->get();

        $blogs = Blog::active()->with(['media'])->latest()->limit(3)->get();

        $offers = Offer::active()->with(['media'])->latest()->limit(3)->get();

        $partners = Partner::active()->with(['media'])->latest()->get();

        $clients = Client::active()->with(['media'])->latest()->get();

        return view('website.pages.Home', compact('testimonials', 'services', 'blogs', 'offers', 'partners', 'clients'));
    }
}
