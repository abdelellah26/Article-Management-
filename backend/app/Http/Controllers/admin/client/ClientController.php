<?php

namespace App\Http\Controllers\admin\client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $client;

    public function __construct(){

        $this->client=new Client();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->client->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return $this->client->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $client=$this->client->find($id);
       return $client;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client=$this->client->find($id);

        if (!$client) {
            return response()->json(['error' => 'client not found'], 404);
        }

        $client->update($request->all());

        return $client ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client=$this->client->find($id);
        return $client->delete();
    }
}
