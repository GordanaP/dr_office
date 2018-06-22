@extends('layouts.master')

@section('content')



@endsection

@section('scripts')
<script>

    var selects = {
        0: [1,2,3,4],
        1 : [1,2,3,4],
    }

    var ids = [1, 6]

    $.each(selects, function(index, val) {
        console.log(selects[index])

        console.log(ids[index])

        // alert($.isArray(ids))
        $.inArray(ids[index], selects[index]) != '-1' ? console.log('Yes') : console.log('No')
    });

</script>
@endsection