<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CrashLocation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $clients = Client::all();
        $totalClientsCount = $clients->count();
        $activeClientsCount = Client::where('status', 'Active')->count();

        return view('master.dashboard', compact('clients', 'totalClientsCount', 'activeClientsCount'));
    }

    public function saveClient(Request $request)
    {
//        dd('ok');
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);

            $client = new Client();
            $client->name = $request->input('name');
            $client->phone = $request->input('phone');
            $client->address = $request->input('address');
            $client->country = $request->input('country');
            $client->status = 'Active';
            $client->save();
            $client->update(['device_id' => $client->id]);
            return back()->with('success', 'Client created successfully!');
        } catch (\Exception $exception) {
//            return $exception->getMessage();
            return back()->with('error', 'Failed to add client');
        }

    }

    public function crashes()

    {
        $clashes = CrashLocation::all();
        return view('master.clashes', compact('clashes'));
    }
}
