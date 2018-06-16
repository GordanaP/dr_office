@for ($i = 0; $i < count($profile->workingDays) ; $i++)

    <div class="form-group flex field">
        <input type="text" name="day[{{ $i }}][working_day_id]" id="day[{{ $i }}][working_day_id]" class="form-control" value="{{ $profile->workingDays[$i]->name }}">

        <input type="text" name="day[{{ $i }}][start_at]" id="day[{{ $i }}][start_at]" class="form-control" value="{{ $profile->workingDays[$i]->work->start_at }}">

        <input type="text" name="day[{{ $i }}][end_at]" id="day[{{ $i }}][end_at]"  class="form-control" value="{{ $profile->workingDays[$i]->work->end_at }}">

        <button type="button" class="btn btn-sm {{ $i > 0 ? 'btn-remove' : '' }}" id="{{ $i > 0 ? '' : 'add' }}">
            <i class="fa {{ $i > 0 ? 'fa-remove' : 'fa-plus' }}"></i>
        </button>
    </div>

@endfor
