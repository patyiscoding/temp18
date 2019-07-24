//All credit goes to http://kekselias.com/

var app = window.app || {};
app.scrollAnimations = {
    init: function () {
        if (this.windowW = $(window).width(), $(window).resize(this.resize), this.windowW > 1e3) {
            new WOW({
                boxClass: "js-wow",
                animateClass: "is-animated",
                mobile: !1,
                callback: function (a) {}
            }).init()
        }
    },
    resize: function () {
        this.windowW = $(window).width(), this.windowW > 1e3 && $(".js-wow").css("visibility", "visible")
    }
};


var app = window.app || {};
app.widgets = app.widgets || {}, app.widgets.latestNews = {
    init: function () {
        this.destroy();
        var a = this,
            b = 0,
            c = -1;
        a.goToNews(c, b), TweenMax.delayedCall(.6, function () {
            var d = $(".c-last-news_item").length;
            a.intervalNews = setInterval(function () {
                c = b, b == d - 1 ? b = 0 : b++, a.goToNews(c, b)
            }, 7e3)
        }), this.resize(), $(window).resize(this.resize), this.events()
    },
    goToNews: function (a, b) {
        function c() {
            $(".c-last-news_item").eq(b).addClass("is-active"), $(".c-last-news_item").eq(a).removeClass("is-active"), $(".c-last-news_item").eq(b).css("zIndex", 35), $(".c-last-news_item").eq(a).css("zIndex", 30), TweenMax.to($(".c-last-news_item").eq(a).find(".c-last-news_content"), 0, {
                x: "0%",
                alpha: 1,
                delay: 2
            })
        }
        var d = new TimelineMax;
        d.to($(".c-last-news_item").eq(a).find(".c-last-news_content"), 1, {
            x: "150%",
            alpha: 0,
            ease: Power1.easeInOut,
            onComplete: c
        })
    },
    events: function () {
        $(".c-last-news_intro,.c-last-news_more").on("mouseenter", function () {
            $(".c-last-news_title").addClass("is-hover")
        }), $(".c-last-news_intro,.c-last-news_more").on("mouseleave", function () {
            $(".c-last-news_title").removeClass("is-hover")
        }), $(".t-home_section .o-link,.t-home_section .o-subtitle").on("mouseenter", function () {
            $(this).parent().find(".o-title").addClass("is-hover")
        }), $(".t-home_section .o-link,.t-home_section .o-subtitle").on("mouseleave", function () {
            $(this).parent().find(".o-title").removeClass("is-hover")
        })
    },
    resize: function () {
        if (this.windowW = $(window).width(), this.windowH = $(window).height(), this.windowW < 985) {
            var a = 0;
            $(".c-last-news_content").each(function () {
                $(this).height() > a && (a = $(this).height())
            }), $(".c-last_news").css("minHeight", a + $(".c-last-news_image").height() + $(".c-last-news_title").outerHeight()), $(".js-figure-before").after($(".js-content-after")), $(".c-last_news").prepend($(".c-last-news_image")), $(".-fondator .t-home-section_link").prepend($(".-fondator .o-title"))
        } else $(".js-figure-before").before($(".js-content-after")), $(".-fondator .t-home-section_link").append($(".-fondator .o-title"))
    },
    destroy: function () {
        $(".c-last-news_item").removeClass("is-active"), clearInterval(this.intervalNews), TweenMax.to($(".c-last-news_item").find(".c-last-news_content"), 0, {
            x: "0%",
            alpha: 1
        })
    },
    hide: function () {
        clearInterval(this.intervalNews)
    }
};

var app = window.app || {};
app.widgets = app.widgets || {}, app.widgets.newsList = {
    infiniteScrolling: !0,
    page: 0,
    maxPages: 0,
    newPage: 0,
    init: function () {
        var a = this;
        this.infiniteScrolling = !0, this.page = 0, this.maxPages = 0, this.newPage = 0, $(window).on("scroll", function (b) {
            a.mainScroll()
        }), $(".c-news_list_wrapper").on("scroll", function (b) {
            a.listScroll(b)
        })
    },
    mainScroll: function () {
        var a = 100 * window.pageYOffset / $(".c-news_block.-current").height() * (1 + $(".c-news_block.-next").height() / $(".c-news_block.-current").height());
        TweenMax.to($(".c-news-list_item.is-active .bar"), 0, {
            css: {
                width: a + "%"
            }
        })
    },
    listScroll: function (a) {
        var b = $(".c-news-list_item").height() * $(".c-news-list_item").length - $(".c-news_list_wrapper").height() - 100;
        a.currentTarget.scrollTop > b && this.infiniteScrolling && (this.infiniteScrolling = !1, this.load_more())
    },
    load_more: function () {
        var a = this;
        localStorage.setItem("target_page", ajax_info.target_page), a.maxPages = parseInt(ajax_info.max_pages), a.page = parseInt(ajax_info.target_page), a.newPage = a.page + 1, console.log(a.newPage), console.log(a.maxPages), a.newPage <= a.maxPages ? $.ajax({
            url: ajax_info.url,
            type: "post",
            data: {
                action: "kekselias_more_articles_list",
                page: a.newPage,
                pll_load_front: 1,
                query_vars: ajax_info.query_vars
            },
            success: function (b) {
                $(".c-news_list_wrapper").append(b), ajax_info.target_page = a.newPage, localStorage.setItem("target_page", ajax_info.target_page), a.newPage === a.maxPages ? a.infiniteScrolling = !1 : a.infiniteScrolling = !0
            },
            error: function (a, b, c) {
                console.log("There was an error with the request.")
            },
            complete: function () {}
        }) : a.infiniteScrolling = !1
    }
};
var app = window.app || {};

app.init = function () {
    "use strict";
    var a = this;
    a.params = {}, a.elements = {
        html: document.documentElement,
        body: document.body
    }, a.templates = a.templates || {}, a.widgets = a.widgets || {}, "object" == typeof a.globals && a.globals.init(), a.params.current_modules = [];
    for (var b = document.querySelectorAll("[data-app]"), c = 0; c < b.length; c++) {
        var d = b[c].getAttribute("data-app");
        "object" == typeof a[d] && -1 === a.params.current_modules.indexOf(d) && (a[d].init(), a.params.current_modules.push(d))
    }
    a.params.current_template = a.elements.body.getAttribute("data-template"), "object" == typeof a.templates[a.params.current_template] && a.templates[a.params.current_template].init(), a.params.current_widgets = [];
    for (var e = document.querySelectorAll("[data-widget]"), f = 0; f < e.length; f++) {
        var g = e[f].getAttribute("data-widget");
        "object" == typeof a.widgets[g] && -1 === a.params.current_widgets.indexOf(g) && (a.widgets[g].init(), a.params.current_widgets.push(g))
    }
}, app.reinit = function () {
    var a = this;
    a.params = {}, a.elements = {
        html: document.documentElement,
        body: document.body
    }, a.templates = a.templates || {}, a.widgets = a.widgets || {}, a.params.current_modules = [];
    for (var b = document.querySelectorAll("[data-app]"), c = 0; c < b.length; c++) {
        var d = b[c].getAttribute("data-app");
        "object" == typeof a[d] && -1 === a.params.current_modules.indexOf(d) && (a[d].init(), a.params.current_modules.push(d))
    }
    a.params.current_template = a.elements.body.getAttribute("data-template"), "object" == typeof a.templates[a.params.current_template] && a.templates[a.params.current_template].init(), a.params.current_widgets = [];
    for (var e = document.querySelectorAll("[data-widget]"), f = 0; f < e.length; f++) {
        var g = e[f].getAttribute("data-widget");
        "object" == typeof a.widgets[g] && -1 === a.params.current_widgets.indexOf(g) && (a.widgets[g].init(), a.params.current_widgets.push(g))
    }
}, $(function () {
    app.init()
});
