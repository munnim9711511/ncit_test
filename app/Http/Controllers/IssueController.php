<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\IssueCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset = Asset::all();
        $issues = [];
        if (Auth::check() && Auth::user()->role && (Auth::user()->role->name === 'head' || Auth::user()->role->name === 'staff')) {
            $issues = IssueCard::where('user_id', Auth::id())->get();
        } else {
            $issues = IssueCard::all();
        }

        return view('issue.index', ['assets' => $asset, 'asset_issues' => $issues]);
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


        // validate request
        $validated = $request->validate([
            'assets' => 'required|exists:assets,id',
            'title' => 'required|string|max:255',
            'info' => 'required|string',
            'category' => 'nullable|string|max:100',
            // keep the original input name "Serverity" (note the capitalization)
            'Serverity' => 'required|string|max:50',
        ]);

        // ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to submit an issue.');
        }

        $issueCard = new IssueCard();
        $issueCard->asset_id = $validated['assets'];
        $issueCard->user_id = Auth::id();
        $issueCard->issue = $validated['info'];
        $issueCard->title = $validated['title'];
        $issueCard->category = $validated['category'] ?? null;
        $issueCard->severity = $validated['Serverity'];
        $issueCard->save();

        return redirect()->back()->with('success', 'Issue submitted successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $issueCard = IssueCard::find($id);
        if (!$issueCard) {
            return redirect()->back()->with('error', 'Issue not found.');
        }

        $issueCard->status = $request->input('status');
        $issueCard->save();

        return redirect()->back()->with('success', 'Issue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
