<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkingDayRequest;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        if(request()->ajax())
        {
            $html = view('users.working_days.partials._html_edit', compact('profile'))->render();

            return response([
                'profile' => $profile->load('workingDays'),
                'html' => $html
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('test', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(WorkingDayRequest $request, Profile $profile)
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

        $profile->workingDays()->sync($working_days->all());

        if (request()->ajax())
        {
            return message('Schedule Updated');
        }
        else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
