<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Account/Index');
    }

    public function create()
    {
        return Inertia::render('Account/Create');
    }

    public function store(Request $request)
    {
        // Store logic here
        return redirect()->route('accounts.index')->with('success', 'Account created.');
    }

    public function edit($id)
    {
        // Fetch member by $id if needed
        return Inertia::render('Accounts/Edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        // Update logic here
        return redirect()->route('Accounts.index')->with('success', 'Member updated.');
    }

    public function destroy($id)
    {
        // Destroy logic here
        return redirect()->route('Accounts.index')->with('success', 'Member deleted.');
    }
} 