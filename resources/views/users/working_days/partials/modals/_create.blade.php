<div class="modal" tabindex="-1" role="dialog" id="createScheduleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-calendar mr-2"></i> Create schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- FORM -->
            <form id="createScheduleForm">
                <div class="modal-body">

                    <div id="workingDaysFields">
                        <div class="form-group flex align-center" id="0">

                            <!-- Working day -->
                            <div>
                                <label for="">Working day</label>
                                <select name="day-0-working_day_id" class="form-control day-0-working_day_id">
                                    <option value="">Day</option>
                                    @foreach ($days as $day)
                                        <option value="{{ $day->id }}">{{ $day->name }}</option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback day-0-working_day_id"></span>
                            </div>

                            <!-- Start -->
                            <div>
                                <label for="">Start</label>
                                <input type="text" class="form-control day-0-start_at" name="day[0][start_at]" />
                                <span class="invalid-feedback day-0-start_at"></span>
                            </div>

                            <!-- End -->
                            <div>
                                <label for="">End</label>
                                <input type="text" class="form-control day-0-end_at" name="day[0][end_at]" />
                                <span class="invalid-feedback day-0-end_at"></span>
                            </div>

                            <!-- Add button -->
                            <div>
                                <label for=""></label>
                                <button type="button" class="btn" id="add"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Action buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="storeSchedule">Create schedule</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>