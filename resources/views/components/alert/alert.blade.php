@props(['name','type' => 'success', 'msg'])

@if (session()->has($name))
<script>
    window.onload = function() {
        notif({
            msg: "{{ $msg }}", // Fetching message from session
            type: "{{ $type }}" // Type of alert (success, error, etc.)
        });
    }
</script>
@endif
