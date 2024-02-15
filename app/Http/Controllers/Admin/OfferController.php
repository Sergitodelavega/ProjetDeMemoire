<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ecole;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function index()
    {
        $adminUser = Auth::user();
        if($adminUser->role == "admin")
        {
            $offers = Offer::where('ecole_id', $adminUser->ecole_id)->get();
        }
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.offers.edit');
    }

    public function store(OfferRequest $request)
    {
        $adminUser = Auth::user();
        if($adminUser->role == "admin")
        {

        $offer = new Offer([
            "name" => $request->name,
            "domaine" => $request->domaine,
            "details" => $request->details,
            "deadline" => $request->deadline,
        ]);
        $ecole = Ecole::find($adminUser->ecole_id);
        $offer->ecole_id = $ecole->id;
        $offer->save();
        return redirect(route("offers.index"));
    }
}
    public function show(Offer $offer)
    {
        return view('admin.offers.show', compact('offer'));
    }

    public function edit(Offer $offer)
    {
        return view('admin.offers.edit', compact('offer'));
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update([
            "name" => $request->name,
            "domaine" => $request->domaine,
            "details" => $request->details,
            "deadline" => $request->deadline,
        ]);

        return redirect()->back();
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect(route('offers.index'));
    }
}
