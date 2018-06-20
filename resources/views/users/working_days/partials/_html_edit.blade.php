@for ($i = 0; $i < count($profile->workingDays) ; $i++)

    <div class="form-group flex align-center {{ $i > 0 ? 'field' : ''}}" id="{{ $i }}" id="{{ $i }}" >
        <div>
            @if ($i == 0)
                <label for="">Working day</label>
            @endif
            <select name="day[{{ $i }}][working_day_id]" class="form-control day-{{ $i }}-working_day_id">
                    <option value="">Day</option>
                    @foreach ($days as $day)
                        <option value="{{ $day->id }}"
                            {{ selected($day->id, $profile->workingDays[$i]->id) }}
                        >
                            {{ $day->name }}
                        </option>
                    @endforeach
            </select>
            <span class="invalid-feedback day-{{ $i }}-working_day_id"></span>
        </div>

        <div>
            @if ($i == 0)
                <label for="">Start</label>
            @endif
            <input type="text" name="day[{{ $i }}][start_at]" class="form-control day-{{ $i }}-start_at" value="{{ $profile->workingDays[$i]->work->start_at }}">
            <span class="invalid-feedback day-{{ $i }}-start_at"></span>
        </div>

        <div>
            @if ($i == 0)
                <label for="">End</label>
            @endif
            <input type="text" name="day[{{ $i }}][end_at]" class="form-control day-{{ $i }}-end_at" value="{{ $profile->workingDays[$i]->work->end_at }}">
            <span class="invalid-feedback day-{{ $i }}-end_at"></span>
        </div>

        @if ($i == 0)
            <label for=""></label>
        @endif
        <button type="button" class="btn {{ $i > 0 ? 'btn-remove' : '' }}" id="{{ $i > 0 ? '' : 'addDay' }}">
            <i class="fa {{ $i > 0 ? 'fa-remove' : 'fa-plus' }}"></i>
        </button>
    </div>

@endfor


{{--
 @for ($i = 0; $i < count($profile->workingDays) ; $i++)

     <div class="form-group flex field">
         <input type="text" name="day[{{ $i }}][working_day_id]" id="day[{{ $i }}][working_day_id]" class="form-control" value="{{ $profile->workingDays[$i]->name }}">

         <input type="text" name="day[{{ $i }}][start_at]" id="day[{{ $i }}][start_at]" class="form-control" value="{{ $profile->workingDays[$i]->work->start_at }}">

         <input type="text" name="day[{{ $i }}][end_at]" id="day[{{ $i }}][end_at]"  class="form-control" value="{{ $profile->workingDays[$i]->work->end_at }}">

         <button type="button" class="btn btn-sm {{ $i > 0 ? 'btn-remove' : '' }}" id="{{ $i > 0 ? '' : 'add' }}">
             <i class="fa {{ $i > 0 ? 'fa-remove' : 'fa-plus' }}"></i>
         </button>
     </div>

 @endfor --}}