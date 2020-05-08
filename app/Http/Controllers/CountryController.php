<?php

namespace App\Http\Controllers;

use App\Http\Resources\Lookups\CountryCollection;
use App\Models\Lookups\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Lookups\Country as CountryResource;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CountryCollection
     */
    public function index()
    {
        return new CountryCollection(Country::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CountryResource
     */
    public function store(Request $request)
    {

        if($this->validateInputs($request)->fails()){
            return response(['errors' => $this->validateInputs($request)->errors()], 422);
        }

        $country  = Country::create([
            'name' => $request->name,
            'phone_code' => $request->phoneCode,
            'country_code' => $request->countryCode,
        ]);

        return new CountryResource($country);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookups\Country  $country
     * @return CountryResource
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\Country  $country
     * @return CountryResource
     */
    public function update(Request $request, Country $country)
    {
        if($this->validateInputs($request)->fails()){
            return response(['errors' => $this->validateInputs()->errors()], 422);
        }

        $country->update([
            'name' => $request->name,
            'phone_code' => $request->phoneCode,
            'country_code' => $request->countryCode,
        ]);

        return new CountryResource($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //$country->delete();
    }

    private function validateInputs(Request $request ){
         return  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phoneCode' => 'required|max:5',
            'countryCode' => 'required|max:5'
        ]);
    }
}
