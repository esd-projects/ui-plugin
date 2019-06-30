<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@section('title'){{ isset($title) ? $title : 'ESD' }}@show</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    @section('style')
        <link rel="stylesheet" href="layui/css/layui.css?t=20181101-1" media="all">
        <link rel="stylesheet" href="dist/style/common.css?t=20181101-1{{time()}}" media="all">
    @show
    @stack('style')
</head>
<body>
@yield('header')
@yield('nav')
@yield('content')
<div id="LAY_app"></div>
</body>
<script src="layui/layui.js?t=20181101-1"></script>
<script>
    layui.config({
        base: '/dist/' //指定 layuiAdmin 项目路径
        , version: '1.2.1'
    }).use('index', function () {
    });
</script>
@stack('scripts')
@yield('js')
</html>