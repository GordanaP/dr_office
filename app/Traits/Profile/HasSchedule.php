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
     * Create or update profile's schedule
     *
     * @param  array $days
     * @return void
     */
    public function createOrUpdateSchedule($days)
    {
        $workingDays = $this->workingDaysArray($days);

        if ($this->hasSchedule())
        {
            $this->workingDays()->sync($workingDays);
        }
        else
        {
            $this->workingDays()->attach($workingDays);
        }
    }

    /**
     * Create a multidimensional array
     *
     * @param  array $data
     * @return array
     */
    protected function workingDaysArray($array)
    {
        $fields = $this->dayArrayKeys();

        $daysCollection = $this->daysCollection($array);

        $working_days = $daysCollection->mapWithKeys(function ($day) use($fields) {
            return [
                $day[$fields[0]] => [
                    $fields[1] => $day[$fields[1]],
                    $fields[2] => $day[$fields[2]],
                ]
            ];
        });

        return $working_days->all();
    }

    /**
     * Collect day array fields
     *
     * @param  array $array
     * @return array
     */
    protected function daysCollection($array)
    {
        $fields = $this->dayArrayKeys();
        $days = [];

        for ($i=0; $i < sizeof($array) ; $i++)
        {
            if ($array[$i][$fields[0]])
            {
                array_push($days, $array[$i]);
            }
        }

        return collect($days);
    }

    /**
     * Get day array keys
     *
     * @return array
     */
    protected function dayArrayKeys()
    {
        return ['working_day_id', 'start_at', 'end_at'];
    }

}