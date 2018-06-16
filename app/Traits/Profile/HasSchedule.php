<?php

namespace App\Traits\Profile;

trait HasSchedule
{
    /**
     * Determine if the profile is working on a particular day.
     *
     * @param  string  $day
     * @return boolean
     */
    public function isWorkingOn($day)
    {
        return $this->workingDays->contains($day);
    }

    /**
     * Get the time for a specific profile's working day.
     * @param  string $time
     * @return string
     */
    public function workingDay($time)
    {
        return $this->workingDays->first()->work->$time;
    }

    /**
     * Determine if the profile has working shedule
     *
     * @return boolean
     */
    public function hasSchedule()
    {
        return $this->workingDays->count();
    }

    /**
     * [getWorkingDays description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    protected function workingDaysRequestArray($array)
    {
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

        return $working_days->all();
    }

    /**
     * Create or update profile's schedule
     *
     * @param  array $array
     * @return void
     */
    public function createOrUpdateSchedule($days)
    {
        $workingDays = $this->workingDaysRequestArray($days);

        if ($this->hasSchedule())
        {
            $this->workingDays()->sync($workingDays);
        }
        else
        {
            $this->workingDays()->attach($workingDays);
        }
    }
}