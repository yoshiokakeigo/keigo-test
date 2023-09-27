@props([
    'user_information' => [],
    'curriculum' => [],
])
<div>
    <canvas id="myChart">
    </canvas>
</div>
<script>
    window.Laravel = {};
    Laravel.user_information = @json($user_information);
    Laravel.curriculum = @json($curriculum);
</script>
