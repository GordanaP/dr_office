<div class="modal" tabindex="-1" role="dialog" id="createDayModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id='createScheduleForm'>
                <div class="modal-body">
                    <div id="workingDaysFields">
                        <div class="form-group flex field">
                            <input type="text" name="day[0][working_day_id]" id="day[0][working_day_id]" class="form-control">
                            <input type="text" name="day[0][start_at]" id="day[0][start_at]" class="form-control">
                            <input type="text" name="day[0][end_at]" id="day[0][end_at]" class="form-control">
                            <button type="button" class="btn btn-sm" name="add" id="add"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveDay">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>