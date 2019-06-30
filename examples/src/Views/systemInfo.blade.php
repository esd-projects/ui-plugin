<div class="layui-card layui-bg-gray">
    <div class="layui-card-body layui-anim layui-anim-upbit">
        <div class="think-box-shadow store-total-container notselect">
            <div class="margin-bottom-15">系统统计</div>
            <div class="layui-row layui-col-space15">
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#57bdbf,#2f9de2)">
                        <div>商品总量</div>
                        <div>63</div>
                        <div>当前商品总数量</div>
                    </div>
                    <i class="store-total-icon layui-icon layui-icon-template-1"></i></div>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="store-total-item nowrap" style="background:linear-gradient(-125deg,#ff7d7d,#fb2c95)">
                        <div>用户总量</div>
                        <div>1,634</div>
                        <div>当前用户总数量</div>
                    </div>
                    <i class="store-total-icon layui-icon layui-icon-user"></i></div>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="store-total-item nowrap" style="background:linear-gradient(-113deg,#c543d8,#925cc3)">
                        <div>订单总量</div>
                        <div>148</div>
                        <div>已付款订单总数量</div>
                    </div>
                    <i class="store-total-icon layui-icon layui-icon-read"></i></div>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="store-total-item nowrap" style="background:linear-gradient(-141deg,#ecca1b,#f39526)">
                        <div>评价总量</div>
                        <div>0</div>
                        <div>订单评价总数量</div>
                    </div>
                    <i class="store-total-icon layui-icon layui-icon-survey"></i></div>
            </div>
        </div>
        <div class="think-box-shadow store-total-container">
            <div class="margin-bottom-15">实时概况</div>
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md6 margin-bottom-15">
                    <div class="layui-row">
                        <div class="layui-col-xs3 text-center"><i class="layui-icon color-blue"
                                                                  style="font-size:60px;line-height:72px">&#xe65e;</i>
                        </div>
                        <div class="layui-col-xs4">
                            <div class="font-s14">销售额（元）</div>
                            <div class="font-s16">1351.00</div>
                            <div class="font-s12 color-desc">昨日：974.00</div>
                        </div>
                        <div class="layui-col-xs5">
                            <div class="font-s14">支付订单数</div>
                            <div class="font-s16">106</div>
                            <div class="font-s12 color-desc">昨日：76</div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md6 margin-bottom-15">
                    <div class="layui-row">
                        <div class="layui-col-xs3 text-center"><i class="layui-icon color-blue"
                                                                  style="font-size:60px;line-height:72px">&#xe663;</i>
                        </div>
                        <div class="layui-col-xs4">
                            <div class="font-s14">新增用户数</div>
                            <div class="font-s16">327</div>
                            <div class="font-s12 color-desc">昨日：238</div>
                        </div>
                        <div class="layui-col-xs5">
                            <div class="font-s14">下单用户数</div>
                            <div class="font-s16">69</div>
                            <div class="font-s12 color-desc">昨日：34</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6">
                <div class="think-box-shadow">
                    <table class="layui-table" lay-skin="line" lay-even>
                        <caption class="text-left margin-bottom-15 font-s14">系统信息</caption>
                        <colgroup>
                            <col width="30%">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td>当前程序版本</td>
                            <td>未知</td>
                        </tr>
                        <tr>
                            <td>Swoole版本</td>
                            <td>{{ swoole_version()  }}</td>
                        </tr>
                        <tr>
                            <td>运行PHP版本</td>
                            <td>{{PHP_VERSION }}</td>
                        </tr>
                        <tr>
                            <td>服务器操作系统</td>
                            <td>{{ php_uname('s') }}</td>
                        </tr>
                        <tr>
                            <td>WEB运行环境</td>
                            <td>{{ php_sapi_name() }}</td>
                        </tr>
                        <tr>
                            <td>PHP内存</td>
                            <td>{{ ini_get('memory_limit') }}</td>
                        </tr>
                        <tr>
                            <td>上传大小限制</td>
                            <td>{{ ini_get('upload_max_filesize') }}</td>
                        </tr>
                        <tr>
                            <td>POST大小限制</td>
                            <td>{{ ini_get('post_max_size') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="think-box-shadow">
                    <table class="layui-table" lay-skin="line" lay-even>
                        <caption class="text-left margin-bottom-15 font-s14">产品团队</caption>
                        <colgroup>
                            <col width="30%">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td>产品名称</td>
                            <td>Esd DevTools</td>
                        </tr>
                        <tr>
                            <td>在线体验</td>
                            <td>
                                暂无
                            </td>
                        </tr>
                        <tr>
                            <td>官方QQ群</td>
                            <td>
                                群号:994811283
                            </td>
                        </tr>
                        <tr>
                            <td>项目地址</td>
                            <td><a target="_blank" href="https://github.com/esd-projects">https://github.com/esd-projects</a>
                            </td>
                        </tr>
                        <tr>
                            <td>BUG反馈</td>
                            <td><a target="_blank" href="https://github.com/esd-projects/ui-plugin/issues">https://github.com/esd-projects/ui-plugin/issues</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>