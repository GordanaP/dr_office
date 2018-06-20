<div class="modal" tabindex="-1" role="dialog" id="createScheduleModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-calendar mr-2"></i> Create schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="createScheduleForm">
                <div class="modal-body flex">

                    <div id="createFormGroups">
                        {{-- @include('test.forms._create') --}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="storeSchedule">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>