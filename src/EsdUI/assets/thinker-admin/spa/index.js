/** thinker-admin-v1.0.0 MIT License By http://www.thinkphp-admin.com/ */
;layui.define(["admin"], function (e) {
    var n = layui.jquery, i = layui.thinkeradmin, a = layui.element, t = layui.admin, l = layui.view, o = n(window),
        r = "bootstrap", u = function () {
            var e = layui.router(), t = e.path;
            layui.tools.makeSpaUrl(e.path.join("/"));
            t.length || (t = [""]), 1 === t.length && "" === t[0] ? t[0] = i.view.home : "" === t[t.length - 1] && (t[t.length - 1] = i.view.index);
            var r = function () {
                u.haveInit && n(".layui-layer").each(function () {
                    var e = n(this), i = e.attr("times");
                    e.hasClass("layui-layim") || layer.close(i)
                }), u.haveInit = !0, n(i.container.body).scrollTop(0)
            };
            l.init().render("../../" + t.join("/")).then(function (e) {
                this.container.scrollTop(0)
            }).done(function () {
                o.on("resize", layui.data.resize), a.render("breadcrumb", "breadcrumb"), this.container.on("scroll", function () {
                    var e = n(this), i = n(".layui-laydate"), a = n(".layui-layer")[0];
                    i[0] && (i.each(function () {
                        var e = n(this);
                        e.hasClass("layui-laydate-static") || e.remove()
                    }), e.find("input").blur()), a && layer.closeAll("tips")
                })
            }), r()
        }, c = function () {
            var e = layui.router(), n = l.init(i.container.id), a = layui.tools.makeSpaUrl(e.path.join("/"));
            if (a === i.login) n.render(i.view.login).done(function () {
                i.debug && console.log("entry login page: " + a)
            }); else {
                if (i.tokenNeed) {
                    var o = layui.data(i.tableName);
                    if (!o[i.tokenName]) return location.hash = i.login + "/redirect=" + encodeURIComponent(a)
                }
                "home" == r ? u() : n.render("main").done(function () {
                    u(), layui.element.render(), t.screen() < 2 && t.sideFlexible(), r = "home"
                })
            }
        };
    layui.http.post(i.config.dyconfig, {}, function (e) {
        layui.thinkeradmin.menu.list = e.data.menu, c()
    }), window.onhashchange = function () {
        c(), layui.event.call(this, i.eventName, "hash({*})", layui.router())
    }, layui.each(i.extend || [], function (e, n) {
        var i = {};
        i[n] = "{/}" + layui.cache.base + "../lib/extend/" + n, layui.extend(i)
    }), e("index", {render: u})
});