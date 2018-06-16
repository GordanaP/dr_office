<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkingDay  $workingDay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $array = $request->day;

        $days = [];

        for ($i=0; $i < sizeof($array) ; $i++)
        {
            if ($array[$i]['working_day_id'])
            {
                array_push($days, $array[$i]);
            }
        }

        $working_days = collect($days)->mapWithKeys(function ($day) {
            return [
                $day['working_day_id'] => [
                    'start_at' => $day['start_at'],
                    'end_at' => $day['end_at'],
                ]
            ];
        });

        if ($profile->hasSchedule())
        {
            $profile->workingDays()->sync($working_days->all());
        }
        else
        {
            $profile->workingDays()->attach($working_days->all());
        }

        return message('Schedule saved');

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
