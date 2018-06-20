<div class="form-row" id="0">

    <!-- Day -->
    <div class="form-group col-md-4 offset-md-1">
        <label>Day</label>
        <select name="day[0][working_day_id]" class="form-control day-0-working_day_id">
            <option value="">Select a day</option>
            @foreach ($days as $day)
                <option value="{{ $day->id }}">
                    {{ $day->name }}
                </option>
            @endforeach
        </select>
        <span class="invalid-feedback day-0-working_day_id"></span>
    </div>

    <!-- Start -->
    <div class="form-group col-md-3">
        <label>Start</label>
        <input type="text" name="day[0][start_at]" class="form-control day-0-start_at" placeholder="00:00">
        <span class="invalid-feedback day-0-start_at"></span>
    </div>

    <!-- End -->
    <div class="form-group col-md-3">
        <label>End</label>
        <input type="text" name="day[0][end_at]" class="form-control day-0-end_at" placeholder="00:00">
        <span class="invalid-feedback day-0-end_at"></span>
    </div>

    <!-- Add field button -->
    <div class="form-group col-md-1">
        <label for="" class="mt-3"></label>
        <button type="button" class="btn" id="addCreateSchedule"><i class="fa fa-plus"></i></button>
    </div>

</div>