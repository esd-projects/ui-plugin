<!DOCTYPE html>
<meta charset="utf-8">
<title>请求统计</title>
</head>
<body>
<div class="layui-fluid">
    <div class="layui-card layui-bg-gray">
        <div class="layui-card-body ">
            <div class="think-box-shadow store-total-container notselect">

                <div class="margin-bottom-15">请求统计  服务器启动时间 {{$Start}}</div>
                <div class="layui-row layui-col-space15">
                    <div class="layui-col-sm6 layui-col-md2">
                        <div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#57bdbf,#2f9de2)">
                            <div>总请求量</div>
                            <div>{{$Request}}</div>
                            <div>服务器总请求量</div>
                        </div>
                    <i class="store-total-icon layui-icon layui-icon-user"></i></div>
                <div class="layui-col-sm6 layui-col-md2">
                        <div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#ff7d7d,#fb2c95)">
                            <div>总协程数</div>
                            <div>{{$Coroutine}}</div>
                            <div>实时</div>
                        </div>
                    <i class="store-total-icon layui-icon layui-icon-template-1"></i></div>
                    <div class="layui-col-sm6 layui-col-md2">
                        <div class="store-total-item nowrap" style="background:linear-gradient(-113deg,#c543d8,#925cc3)">
                            <div>连接总数</div>
                            <div>{{$Accept}}</div>
                            <div>接受了多少个连接</div>
                        </div>
                        <i class="store-total-icon layui-icon layui-icon-survey"></i></div>
                    <div class="layui-col-sm6 layui-col-md2">
                        <div class="store-total-item nowrap" style="background:linear-gradient(-141deg,#ecca1b,#f39526)">
                            <div>排队总数</div>
                            <div>{{$Tasking}}</div>
                            <div>当前正在排队的任务数</div>
                        </div>
                     <i class="store-total-icon layui-icon layui-icon-dialogue"></i></div>
                <div class="layui-col-sm6 layui-col-md2">
                        <div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#38bf2f,#f5b468);">
                            <div>投递总数</div>
                            <div>{{$WorkerDispatchCount}}</div>
                            <div>Worker进程投递任务数</div>
                        </div>
                        <i class="store-total-icon layui-icon layui-icon-senior"></i></div>
                    <div class="layui-col-sm6 layui-col-md2">
                        <div class="store-total-item nowrap" style="background:linear-gradient(-211deg,#ec1b1b,#9c7c56);">
                            <div>关闭总数</div>
                            <div>{{$Close}}</div>
                            <div>已关闭的连接数量</div>
                        </div>
                        <i class="store-total-icon layui-icon layui-icon-close-fill"></i></div>
                </div>
            </div>
            <div class="think-box-shadow store-total-container">
                <div class="margin-bottom-15">实时统计</div>
                <table id="systemCount" lay-filter="systemCount"></table>
            </div>

        </div>
    </div>
</div>
</body>
<script>
    layui.use(["form", "table"], function () {
        function load() {
            var $ = layui.jquery;
            var _systemCount_ins = layui.table.render($.extend({
                elem: "#systemCount",
                where: layui.http._beforeAjax({}),
                response: {statusCode: 1},
                page: true,
                toolbar: true,
                cols: [[{"field":"url","title":"URL"},{"field":"num_60","title":"30分钟请求"},{"field":"num_3600","title":"一小时请求"},{"field":"num_86400","title":"一天请求"}]]
            }, {"defaultToolbar":["refresh","filter","print","exports"],"toolbar":"#systemCount_toolbar","url":"\/devTools\/systemCount"}

            ));
        }
        if (!layui.common) {
            layui.use('common', load);
        } else {
            layui.cache.callback.common();
            load();
        }
    });
</script>
</html>