<tr>
    <!-- Profile name -->
    <td>
        {{ $profile->getFullName() }}
        <button class="btn btn-danger btn-link btn-sm pull-right">
            {{ $profile->hasDailySchedule() ? 'Change' : 'Add' }}
        </button>
    </td>

    <!-- DailySchedule -->
    @for ($i = 0; $i < sizeof($days); $i++)

        @if ($profile->isWorkingOn($days[$i]))
            <td class="text-center">
                {{ $profile->workingDay('start_at') }}-{{ $profile->workingDay('end_at') }}
            </td>
        @else
            <td></td>
        @endif

    @endfor
</tr>