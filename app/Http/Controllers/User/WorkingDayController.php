<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkingDayRequest;
use App\Profile;
use App\WorkingDay;
use Illuminate\Http\Request;

class WorkingDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function schedule()
    {
        $days = WorkingDay::all();
        $profiles = Profile::with('workingDays')->get();

        return view('users.working_days.index', compact('days', 'profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkingDay  $workingDay
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkingDay  $workingDay
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Create or update the specified resource in storage.
     *
     * @param  \App\Http\Requests\WorkingDayRequest  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->createOrUpdateSchedule($request->day);

        return message('Profile working days have been saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkingDay  $workingDay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
