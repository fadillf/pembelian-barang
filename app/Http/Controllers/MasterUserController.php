<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class MasterUserController extends Controller
{
    protected $_pageTitle = 'Data Master User';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedInUser = auth()->user();
        $data = User::get();
        return view('pages.master-user.index', [
            'pageTitle' => $this->_pageTitle,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.master-user.create', [
            'pageTitle' => $this->_pageTitle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $createdRecord = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('master-user.index')->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterUser $masterUser)
    {
        return view('pages.master-user.show', [
            'pageTitle' => $this->_pageTitle,
            'record' => $masterUser,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterUser $masterUser)
    {
        return view('pages.master-user.edit', [
            'pageTitle' => $this->_pageTitle,
            'record' => $masterUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterUser $masterUser)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $masterUser->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        // $masterBarang->update($validatedData);
        return redirect()->route('master-user.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterUser $masterUser)
    {
        $masterBarang->delete();
        return redirect()->route('master-user.index')->with('success', 'Data deleted successfully');
    }
}
