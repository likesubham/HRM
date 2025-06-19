<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function index()
    {
        return Inertia::render('Members/Index');
    }

    public function create()
    {
        return Inertia::render('Members/Create');
    }

    public function store(Request $request)
    {
        // Store logic here
        return redirect()->route('members.index')->with('success', 'Member created.');
    }

    public function edit($id)
    {
        // Fetch member by $id if needed
        return Inertia::render('Members/Edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        // Update logic here
        return redirect()->route('members.index')->with('success', 'Member updated.');
    }

    public function destroy($id)
    {
        // Destroy logic here
        return redirect()->route('members.index')->with('success', 'Member deleted.');
    }
} 