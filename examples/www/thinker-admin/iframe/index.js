/** thinker-admin-v1.0.0 MIT License By http://www.thinkphp-admin.com/ */
;layui.define(["admin"], function (e) {
    var n = layui.jquery, i = layui.thinkeradmin, a = layui.element, t = layui.admin, r = t.tabsPage, l = layui.view,
        o = (n(window), "bootstrap"), d = "thinkeradmin-layout-tabs", u = function (e, l) {
            if (e) {
                var o, u = n(i.container.tabheader).find("li"), s = e.replace(/(^http(s*):)|(\?[\s\S]*$)/g, "");
                if (u.each(function (i) {
                    var a = n(this), t = a.attr("lay-id");
                    t === e && (o = !0, r.index = i)
                }), l = l || "新标签页", !o) {
                    var y = e;
                    i.tokenName && (y = layui.http._parseUrl(e, {__iframe: 1})), n(i.container.body).append(['<div class="thinkeradmin-tabsbody-item layui-show">', '<iframe src="' + y + '" frameborder="0" class="thinkeradmin-iframe"></iframe>', "</div>"].join("")), r.index = u.length, a.tabAdd(d, {
                        title: "<span>" + l + "</span>",
                        id: e,
                        attr: s
                    })
                }
                a.tabChange(d, e), t.tabsBodyChange(r.index, {url: e, text: l})
            }
        }, s = function () {
            var e = layui.router(), n = l.init(i.container.id), a = layui.tools.makeSpaUrl(e.path.join("/"));
            if (a === i.login) n.render(i.view.login).done(function () {
                i.debug && console.log("entry login page: " + a)
            }); else {
                if (i.tokenNeed) {
                    var r = layui.data(i.tableName);
                    if (!r[i.tokenName]) return n.render(i.view.login).done(function () {
                        i.debug && console.log("entry login page: " + a)
                    }), null
                }
                "home" === o ? u() : n.render("main").done(function () {
                    u(), layui.element.render(), t.screen() < 2 && t.sideFlexible(), o = "home"
                })
            }
        };
    layui.http.post(i.config.dyconfig, {}, function (e) {
        layui.thinkeradmin.menu.list = e.data.menu, parent === self && s()
    }), layui.each(i.extend || [], function (e, n) {
        var i = {};
        i[n] = "{/}" + layui.cache.base + "../lib/extend/" + n, layui.extend(i)
    }), layui.use("common"), e("index", {render: u})
});