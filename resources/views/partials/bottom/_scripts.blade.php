<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/helpers.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.3/sweetalert2.min.js"></script>

<script>
    $.notify("{{ session('message') }}", "{{ session('type') }}")
</script>