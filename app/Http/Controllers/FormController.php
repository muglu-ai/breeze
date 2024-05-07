<?php

namespace App\Http\Controllers;

use App\Models\Exhibitor;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;
use Stidges\CountryFlags\CountryFlag;
use App\Models\Country;






class FormController extends Controller
{
    //exhibitor view
    public function form(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        $countries2 = Country::paginate(10);
//       country_flag('IN');
        $countries = CountryListFacade::getList('en');

        return view('exhibitor.create',['countries2' => $countries2], compact('countries',  ));
    }

    public function showCountryFlags(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Paginate the countries
        $countries = Country::paginate(10);

        // Pass the paginated countries to the view
        return view('country-flags', ['countries' => $countries]);
    }

    //exhibitor submit
    public function submit(Request $request)
    {



    }


}
