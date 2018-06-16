<div class="modal" tabindex="-1" role="dialog" id="createScheduleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-calendar mr-2"></i> Create schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id='createScheduleForm'>
                <div class="modal-body">
                    <div id="workingDaysFields">

                        <div class="form-group flex field" id="field-0">
                            <div>
                                <input type="text" name="day[0][working_day_id]" id="day[0][working_day_id]" class="form-control day-0-working_day_id">

                                <span class="invalid-feedback day-0-working_day_id"></span>
                            </div>
                            <div>
                                <input type="text" name="day[0][start_at]" id="day[0][start_at]" class="form-control day-0-start_at">

                                <span class="invalid-feedback day-0-start_at"></span>
                            </div>
                            <div>
                                <input type="text" name="day[0][end_at]" id="day[0][end_at]" class="form-control day-0-end_at">

                                <span class="invalid-feedback day-0-end_at"></span>
                            </div>

                            <button type="button" class="btn btn-sm" id="add"><i class="fa fa-plus"></i></button>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="storeSchedule">Create schedule</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>