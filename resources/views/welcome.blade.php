@extends('layouts.master')

@section('content')
    <h1>Welcome to  {{ config('app.name') }}</h1>

    <div id="fields">
        <div class="flex" id="field[0]">
            <input type="text" name="day[0]" />
            <button type="button" class="btn" id="addInput"><i class="fa fa-plus"></i></button>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        var i = 0

        $(document).on('click', '#addInput', function(){

            function makeNewArray(fields) {

                var tempArray = []

                $.each(fields, function(index, field) {

                    tempArray.push(field.id)

                    tempArray.sort()
                });

                return tempArray
            }

            i++

            var fields = $(".field")
            var total = fields.length;
            var max = 5

            var dynamicArray = makeNewArray(fields)

            var missing;

            for(var i=1;i<=dynamicArray.length;i++)
            {
               if(dynamicArray[i-1] != i) {

                    missing = i;
                    break;
               }
            }

            if (total < max)
            {
                var index = missing ? missing : i

                $('#fields').append('<div class="flex field" id="'+ index +'"><input type="text" name="day['+ index +']" class="form-control" /> <button type="button" class="btn btn-remove"><i class="fa fa-remove"></i></button></div>')

                $("div[class=field]").sort(function(a,b){
                    if(a.id < b.id) {
                        return -1;
                    } else {
                        return 1;
                    }
                })
            }
        })

        $(document).on('click', '.btn-remove', function(){

            var formatted = []

            $(this).parent('div').remove()

        })

    </script>
@endsection