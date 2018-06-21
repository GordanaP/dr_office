@extends('layouts.master')

@section('links')
    <style>
        .is-hidden {display: none}
    </style>
@endsection

@section('content')
    <h1>Welcome to  {{ config('app.name') }}</h1>

    <button type="button" class="btn btn-warning mb-2" id="openModal">Open modal</button>

    <div class="modal" tabindex="-1" role="dialog"  id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-calendar mr-2"></i> Create schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form>
                    <div class="modal-body">

                        <div id="fields">

                                {{-- <p><input type="text" name="day[0]" class="form-control" value="1"></p>
                                <p><input type="text" name="day[1]" class="form-control" value="2"></p>

                                <button type="button" class="btn" id="getDays">Get days</button> --}}
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        var profile = "{{ $profile->slug }}"

        var mutliDimArr = [[1,0,0],[0,0,1],[0,1,0]];
        var newArray = mutliDimArr[1];

        console.log(newArray)

        $(document).on('click', "#openModal", function(){
            $('#myModal').modal('show')

            var fields = [
                [
                    '<p class="flex"><input type="text" name="day[0][id]" class="form-control" value="1"><input type="text" name="day[0][name]" class="form-control" value="Monday"></p>'
                ],
                [
                    '<p  class="flex"><input type="text" name="day[1][id]" class="form-control" value="2"><input type="text" name="day[1][name]" class="form-control" value="Tuesday"></p>'
                ],
            ]

            var select = $('select[name*=day]');

            $('option', select).remove();

            $.each(days, function(text, key) {

                var option = new Option(key, text);
                select.append($(option));
            });

            for (var i = 0; i < fields.length; i++) {
                for (var j = 0; j < fields[i].length; j++) {

                    $('#fields').append(fields[i][j])
                }
            }

            console.log(fields[1])
        })


    </script>
@endsection