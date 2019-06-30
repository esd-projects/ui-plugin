/**

 @Name：全局配置
 @Author：贤心
 @Site：http://www.layui.com/admin/
 @License：LPPL（layui付费产品协议）

 */

layui.define(['laytpl', 'layer', 'element', 'util'], function (exports) {
    exports('setter', {
        container: 'LAY_app' //容器ID
        , base: layui.cache.base //记录layuiAdmin文件夹所在路径
        , path: '/devTools' //记录layuiAdmin文件夹所在路径
        , views: layui.cache.base + 'views/' //视图所在目录
        , entry: 'index' //默认视图文件名
        , engine: '.html' //视图文件后缀名
        , pageTabs: true //是否开启页面选项卡功能。单页版不推荐开启
        , name: 'ESD开发者工具'
        , tableName: 'devTool' //本地存储表名
        , MOD_NAME: 'admin' //模块事件名

        , debug: true //是否开启调试模式。如开启，接口异常时会抛出异常 URL 等信息

        , interceptor: false //是否开启未登入拦截

        //自定义请求字段
        , request: {
            tokenName: 'access_token' //自动携带 token 的字段名。可设置 false 不携带。
        }

        //自定义响应字段
        , response: {
            statusName: 'code' //数据状态的字段名称
            , statusCode: {
                ok: 1 //数据状态一切正常的状态码
                , logout: 1001 //登录状态失效的状态码
            }
            , msgName: 'msg' //状态信息的字段名称
            , dataName: 'data' //数据详情的字段名称
        }

        //独立页面路由，可随意添加（无需写参数）
        , indPage: [
            '/user/login' //登入页
            , '/user/reg' //注册页
            , '/user/forget' //找回密码
            , '/template/tips/test' //独立页的一个测试 demo
        ]

        //扩展的第三方模块
        , extend: [
            'echarts', //echarts 核心包
            'echartsTheme' //echarts 主题
        ]

        //主题配置
        , theme: {
            //内置主题配色方案
            color: [{
                main: '#20222A' //主题色
                , selected: '#009688' //选中色
                , alias: 'default' //默认别名
            }, {
                main: '#03152A'
                , selected: '#3B91FF'
                , alias: 'dark-blue' //藏蓝
            }, {
                main: '#2E241B'
                , selected: '#A48566'
                , alias: 'coffee' //咖啡
            }, {
                main: '#50314F'
                , selected: '#7A4D7B'
                , alias: 'purple-red' //紫红
            }, {
                main: '#344058'
                , logo: '#1E9FFF'
                , selected: '#1E9FFF'
                , alias: 'ocean' //海洋
            }, {
                main: '#3A3D49'
                , logo: '#2F9688'
                , selected: '#5FB878'
                , alias: 'green' //墨绿
            }, {
                main: '#20222A'
                , logo: '#F78400'
                , selected: '#F78400'
                , alias: 'red' //橙色
            }, {
                main: '#28333E'
                , logo: '#AA3130'
                , selected: '#AA3130'
                , alias: 'fashion-red' //时尚红
            }, {
                main: '#24262F'
                , logo: '#3A3D49'
                , selected: '#009688'
                , alias: 'classic-black' //经典黑
            }, {
                logo: '#226A62'
                , header: '#2F9688'
                , alias: 'green-header' //墨绿头
            }, {
                main: '#344058'
                , logo: '#0085E8'
                , selected: '#1E9FFF'
                , header: '#1E9FFF'
                , alias: 'ocean-header' //海洋头
            }, {
                header: '#393D49'
                , alias: 'classic-black-header' //经典黑
            }, {
                main: '#50314F'
                , logo: '#50314F'
                , selected: '#7A4D7B'
                , header: '#50314F'
                , alias: 'purple-red-header' //紫红头
            }, {
                main: '#28333E'
                , logo: '#28333E'
                , selected: '#AA3130'
                , header: '#AA3130'
                , alias: 'fashion-red-header' //时尚红头
            }, {
                main: '#28333E'
                , logo: '#009688'
                , selected: '#009688'
                , header: '#009688'
                , alias: 'green-header' //墨绿头
            }]

            //初始的颜色索引，对应上面的配色方案数组索引
            //如果本地已经有主题色记录，则以本地记录为优先，除非请求本地数据（localStorage）
            , initColorIndex: 0
        }
    });
});

;layui.define(["setter"], function (e) {
    var n = layui.setter;
    e("session", {
        set: function (e, a) {
            layui.data(n.tableName, {key: e, value: a})
        }, get: function (e) {
            var a = layui.data(n.tableName);
            return "undefined" != typeof a[e] ? a[e] : null
        }, has: function (e) {
            var a = layui.data(n.tableName);
            return "undefined" != typeof a[e] || null
        }, remove: function (e) {
            layui.data(n.tableName, {key: e, remove: !0})
        }, token: function () {
            var e = this.get(n.tokenName);
            return !!e && e
        }, checkToken: function () {
            this.token() || (n.isIframe ? location.reload() : location.hash = n.login)
        }, logout: function () {
            this.remove(n.tokenName), this.checkToken()
        }
    });
    var t = layui.jquery, r = layui.setter, a = layui.tools, s = layui.session, o = r.response;
    e("http", {
        _beforeAjax: function (e) {
            return s.token() && r.tokenName && (e[r.tokenName] = s.token()), "function" == typeof o.beforeAjax ? e = o.beforeAjax(e) : "object" == typeof o.beforeAjax && (e = t.extend({}, o.beforeAjax, e)), e
        }, _parseData: function (e) {
            return a.isNull(e) || "" === e ? this._beforeAjax({}) : a.isObject(e) ? this._beforeAjax(e) : e
        }, _parseUrl: function (e, t) {
            t = this._parseData(t);
            var r = [];
            for (var a in t) r.push(a + "=" + t[a]);
            return e + (e.indexOf("?") === -1 ? "?" : "&") + r.join("&")
        }, request: function (e) {
            var a = e.success, s = e.error, o = e.fail, u = r.ajax;
            return e.data = e.data || {}, e.headers = e.headers || {}, delete e.success, delete e.error, delete e.fail, t.ajax(t.extend({
                type: "get",
                dataType: "json",
                success: function (e) {
                    var t = u.resultCode;
                    e[u.resultCodeName] === t.success ? "function" == typeof a && a(e) : e[u.resultCodeName] === t.logout ? ("function" == typeof s && s(e), layui.session.logout()) : ("function" == typeof s && s(e), layui.view.error("<cite>Error：</cite> " + (e[u.resultMsgName] || "返回状态码异常")))
                },
                error: function (e, t) {
                    layui.view.error("请求异常，请重试<br><cite>错误信息：</cite>" + t), "function" == typeof o && o(e, t)
                }
            }, e))
        }, get: function (e, t, r, a, s) {
            return this.request({method: "GET", url: e, data: this._parseData(t || {}), success: r, error: a, fail: s})
        }, post: function (e, t, r, a, s) {
            return this.request({method: "POST", url: e, data: this._parseData(t || {}), success: r, error: a, fail: s})
        }, form: function (e, t, r, a, s, o) {
            var u = new FormData;
            u.append(t.name, t.files[0]);
            for (var n in r) u.append(n, r[n]);
            return this.request({method: "POST", url: e, data: u, success: a, error: s, fail: o})
        }, "delete": function (e, t, r, a, s) {
            return this.request({
                method: "DELETE",
                url: e,
                data: this._parseData(t || {}),
                success: r,
                error: a,
                fail: s
            })
        }, put: function (e, t, r, a, s) {
            return this.request({method: "PUT", url: e, data: this._parseData(t || {}), success: r, error: a, fail: s})
        }
    })
});