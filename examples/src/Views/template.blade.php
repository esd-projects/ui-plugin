@extends('dev::layout')
@push('styles')
    $styles
@endpush
@section('content')
    {!! $breadcrumb !!}
    <div class="layui-fluid">
        {!! $layouts !!}
    </div>
    $files
@stop;
@push('scripts')
    <script>
        layui.layer = window.layer = parent.layui.layer;
        layui.use(["thinkeradmin", "ices", "index"], function () {
            $css
            $use
        });
    </script>
@endpush