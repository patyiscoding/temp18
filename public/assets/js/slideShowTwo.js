var app = window.app || {};
app.globals = {
    init: function () {
        app.scrollAnimations.init(), app.pageTransitions.init()
    }
};

var app = window.app || {};
app.pageTransitions = {
    init: function () {
        function a(a) {
            return a = a || navigator.userAgent, a.indexOf("MSIE ") > -1 || a.indexOf("Trident/") > -1
        }
        var b = $("html, body"),
            c = this;
        this.windowW = $(window).width(), $(window).resize(this.resize), c.route = "", this.mobile = !1, this.isBottom = !1, this.windowW >= 980 && !a() && $("#wrapper").smoothState({
            forms: !1,
            alterRequest: function (a) {
                var b = localStorage.getItem("target_page");
                return b ? a.url = c.updateQueryString(a.url, "t", b) : a.url = c.updateQueryString(a.url, "t"), a
            },
            onBefore: function (a, b) {
                c.route = $(a).data("route"), c.target = a, void 0 == c.route && (c.route = "home"), $("a").on("click", function (a) {
                    a.preventDefault()
                }), $(".c-last_news").length > 0 && app.widgets.latestNews.hide(), TweenMax.killAll(), "news" != c.route && "news-next" != c.route && ($(".c-news_list").addClass("js-wow"), $(".c-news_block").addClass("js-wow"), $(".c-news-list_header").addClass("js-wow"), $(".c-news_list_wrapper").addClass("js-wow"), $(".c-news-list_item").addClass("js-wow"), localStorage.removeItem("target_page"))
            },
            onStart: {
                duration: 2e3,
                render: function (a) {
                    $(window).unbind("mousewheel"), $(window).unbind("DOMMouseScroll");
                    if ("contact" == c.route) $(".c-contact").delay(300).addClass("is-active");
                    else if ("mean" == c.route) $(".c-mean").delay(300).addClass("is-active");
                    else if ("news" == c.route) c.id = $(c.target).data("id"), $(".c-news_list").removeClass("u-fadeInLeftBig"), $(".c-news_list").removeClass("js-wow"), TweenLite.to($(".c-news_block.-current"), 1, {
                        y: "-100%",
                        alpha: 0,
                        ease: Power2.easeIn,
                        delay: .3
                    }), b.stop().delay(1100).animate({
                        scrollTop: 0
                    }, "800"), c.itemNextArticle = $("#article-" + c.id), $(".c-news-list_item.is-active .bar").fadeOut(), $(".c-news-list_item.is-active").removeClass("is-active"), $("#article-" + c.id).addClass("is-active"), c.idx = $(".c-news-list_item").index(c.itemNextArticle), TweenLite.to($(".c-news_list_wrapper"), .8, {
                        scrollTo: {
                            y: c.idx * $(".c-news-list_item").height()
                        },
                        ease: Power2.easeOut,
                        delay: 1
                    });
                    else if ("news-next" == c.route) {
                        c.id = $(c.target).data("id"), $(".c-news_list").removeClass("u-fadeInLeftBig"), $(".c-news_list").removeClass("js-wow"), TweenLite.to($(".c-news_block.-current"), 1, {
                            y: "-100%",
                            alpha: 0,
                            ease: Power2.easeIn,
                            delay: .3
                        });
                        var d = -15;
                        $(window).width() > 1366 && (d = 100), TweenLite.to($(".c-news_block.-next"), .8, {
                            y: -$(window).height() + $(".c-news_block.-next").outerHeight() + d,
                            ease: Power2.easeOut,
                            delay: .6
                        }), $(".c-news_block.-next").addClass("is-active"), $("body, html").css("overflow-y", "hidden"), c.itemNextArticle = $("#article-" + c.id), $(".c-news-list_item.is-active .bar").fadeOut(), $(".c-news-list_item.is-active").removeClass("is-active"), $("#article-" + c.id).addClass("is-active"), c.idx = $(".c-news-list_item").index(c.itemNextArticle), $(".c-news_block.-next h1").css("opacity", 1), TweenLite.to($(".c-news_list_wrapper"), .8, {
                            scrollTo: {
                                y: c.idx * $(".c-news-list_item").height()
                            },
                            ease: Power2.easeOut,
                            delay: 1
                        }), TweenLite.to($(".c-news-block_arrow"), .6, {
                            alpha: 0,
                            ease: Power2.easeOut,
                            delay: .3
                        }), $(".c-news-block_infos_label").addClass("is-animate")
                    } else $(".js-wow").each(function (a) {
                        $(this).hasClass("c-sidebar") || $(this).hasClass("c-sidebar_button") || $(this).hasClass("c-news_list") || $(this).hasClass("c-socials") || TweenLite.to($(this), 1, {
                            alpha: 0,
                            x: 1.5 * $(this).parent().width(),
                            ease: Power2.easeIn
                        })
                    }), b.stop().delay(1100).animate({
                        scrollTop: 0
                    }, "800"), $(".c-contact").removeClass("is-active"), $(".c-mean").removeClass("is-active");
                    $(".js-label-menu").removeClass("is-open"), $(".js-submenu-menu").removeClass("is-open")
                }
            },
            onProgress: {
                duration: 0,
                render: function (a) {
                    if ("news-next" == c.route) {
                        $(".c-news_block.-current").hide();
                        var b = -15;
                        $(window).width() > 1366 && (b = 100), TweenLite.to($(".c-news_block.-next"), 0, {
                            y: b + "px"
                        })
                    }
                }
            },
            onReady: {
                duration: 0,
                render: function (a, b) {
                    a.html(b), this.isBottom = !1, ("news" == c.route || "news-next" == c.route) && ($(".c-news_list").removeClass("js-wow"), $(".c-news_block").removeClass("js-wow"), $(".c-news-list_header").removeClass("js-wow"), $(".c-news-list_item").removeClass("js-wow"), $(".c-news_list_wrapper").removeClass("js-wow"), TweenLite.to($(".c-news_list_wrapper"), 0, {
                        scrollTo: {
                            y: c.idx * $(".c-news-list_item").height()
                        },
                        ease: Power2.easeOut
                    })), "news-next" == c.route && ($(".c-news_block").removeClass("js-wow"), $(".c-news-block_title").removeClass("js-wow"), $(".c-news-block_infos").removeClass("js-wow")), $(".c-sidebar").removeClass("js-wow"), $(".c-socials_item").removeClass("js-wow")
                }
            },
            onAfter: function (a, b) {
                "news-next" == c.route && $("body, html").css("overflow-y", "auto"), $(window).unbind("scroll"), TweenMax.delayedCall(4, function () {
                    $("a").unbind("click")
                }), app.reinit(), app.pageTransitions.scrollEvents()
            }
        }), TweenMax.delayedCall(4, function () {
            $(".c-sidebar").removeClass("js-wow"), $(".c-socials_item").removeClass("js-wow")
        }), this.scrollEvents()
    },
    scrollEvents: function () {
        $(window).bind("mousewheel DOMMouseScroll", function (a) {
            var b = a.originalEvent.wheelDelta;
            a.originalEvent.wheelDelta > 0 || a.originalEvent.detail < 0 || -250 >= b && this.isBottom && $(".c-news_block.-next>a").click()
        }), $(window).scroll(function () {
            $(window).scrollTop() + $(window).height() == $(document).height() ? this.isBottom = !0 : this.isBottom = !1
        })
    },
    resize: function () {
        this.windowW = $(window).width()
    },
    updateQueryString: function (a, b, c) {
        a || (a = window.location.href);
        var d, e = new RegExp("([?&])" + b + "=.*?(&|#|$)(.*)", "gi");
        if (e.test(a)) return "undefined" != typeof c && null !== c ? a.replace(e, "$1" + b + "=" + c + "$2$3") : (d = a.split("#"), a = d[0].replace(e, "$1$3").replace(/(&|\?)$/, ""), "undefined" != typeof d[1] && null !== d[1] && (a += "#" + d[1]), a);
        if ("undefined" != typeof c && null !== c) {
            var f = -1 !== a.indexOf("?") ? "&" : "?";
            return d = a.split("#"), a = d[0] + f + b + "=" + c, "undefined" != typeof d[1] && null !== d[1] && (a += "#" + d[1]), a
        }
        return a
    }
};
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
app.templates = app.templates || {}, app.templates.generic = {
    init: function () {}
};
var app = window.app || {};
app.widgets = app.widgets || {}, app.widgets.contact = {
    init: function () {
        this.resize(), $(window).resize(this.resize)
    },
    resize: function () {
        this.windowW = $(window).width(), this.windowH = $(window).height(), this.windowW < 985 ? $(".c-contact_header").prepend($(".c-contact-col.-double")) : $(".c-contact_header").append($(".c-contact-col.-double"))
    }
};
var app = window.app || {};
app.widgets = app.widgets || {}, app.widgets.dropdownCategories = {
    init: function () {
        $(".js-dropdown-label").on("click", this.toggleDropdown), $(".c-dropdown_item").on("click", this.sort)
    },
    toggleDropdown: function () {
        $(".c-dropdown_list").toggleClass("is-active"), $(".c-dropdown_list").hasClass("is-active") ? ($(this).children("span").text("all categories"), $(this).addClass("is-active")) : ($(this).children("span").text("categories"), $(this).removeClass("is-active"))
    },
    sort: function () {
        var a = $(this),
            b = a.data("idcat");
        "all" != b ? ($(".c-dropdown_list").toggleClass("is-active"), $(".c-sidebar-news_item").fadeOut(100), $(".c-dropdown_item").removeClass("is-active"), $(".c-sidebar-news_item").each(function (c) {
            for (var d = $(this).data("idcat"), e = 0; e < d.length; e++) d[e] == b && ($(this).delay(500 + 50 * c).fadeIn(), a.addClass("is-active"), $(".js-dropdown-label span").text(a.text()), $(".js-dropdown-label").removeClass("is-active"))
        })) : $(".c-dropdown_list").hasClass("is-active") || ($(".c-dropdown_item").removeClass("is-active"), $(".c-sidebar-news_item").fadeIn())
    }
};
var app = window.app || {};
app.widgets = app.widgets || {}, app.widgets.expertiseGraphic = {
    init: function () {
        if ($(".t-expertise_graphic").length > 0) {
            var a = this,
                b = !1;
            window.pageYOffset > $(".t-expertise_graphic").offset().top - $(".t-expertise_graphic").height() / 1.5 && (setTimeout(function () {
                a.launchAnimation()
            }, 300), b = !0), $(window).scroll(function () {
                window.pageYOffset > $(".t-expertise_graphic").offset().top - $(".t-expertise_graphic").height() / 1.5 && (b || (setTimeout(function () {
                    a.launchAnimation()
                }, 300), b = !0))
            })
        }
    },
    launchAnimation: function () {
        $(".js-expertise-graph").each(function (a) {
            function b() {
                f = parseInt(g.progress() * d), c.find(".js-expertise-value").text(f + " %")
            }
            var c = $(this),
                d = c.data("value"),
                e = c.find(".js-expertise-bar"),
                f = 0,
                g = new TimelineMax({
                    onUpdate: b
                });
            g.to(e, 1, {
                css: {
                    height: 75 * d / 100 + "vh"
                },
                delay: .3 * a
            })
        })
    }
};
var app = window.app || {};
app.widgets = app.widgets || {}, app.widgets.generic = {
    init: function () {}
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
            $(".c-last-news_item").eq(b).addClass("is-active"),
                $(".c-last-news_item").eq(a).removeClass("is-active"),
                $(".c-last-news_item").eq(b).css("zIndex", 35),
                $(".c-last-news_item").eq(a).css("zIndex", 30),
                TweenMax.to($(".c-last-news_item").eq(a).find(".c-last-news_content"), 0, {
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
        $(".c-last-news_item").removeClass("is-active"),
            clearInterval(this.intervalNews),
            TweenMax.to($(".c-last-news_item").find(".c-last-news_content"), 0, {
                x: "0%",
                alpha: 1
            })
    },
    hide: function () {
        clearInterval(this.intervalNews)
    }
};
var app = window.app || {};
app.widgets = app.widgets || {}, app.widgets.menu = {
    init: function () {
        $(".js-label-menu").on("click", this.toggleMenu), $(".js-label-news").on("click", this.toggleNews)
    },
    toggleMenu: function (a) {
        a.preventDefault();
        var b = $(this);
        $(".js-submenu-news").hasClass("is-open") ? ($(".js-submenu-news").removeClass("is-open"), $(".js-label-news").removeClass("is-open"), setTimeout(function () {
            b.toggleClass("is-open"), $(".js-submenu-menu").toggleClass("is-open"), b.hasClass("is-open") ? $("body,html").css("overflow-y", "hidden") : $("body,html").css("overflow-y", "auto")
        }, 800)) : (b.toggleClass("is-open"), $(".js-submenu-menu").toggleClass("is-open"), b.hasClass("is-open") ? $("body,html").css("overflow-y", "hidden") : $("body,html").css("overflow-y", "auto"))
    },
    toggleNews: function (a) {
        a.preventDefault();
        var b = $(this);
        $(".js-submenu-menu").hasClass("is-open") ? ($(".js-submenu-menu").removeClass("is-open"), $(".js-label-menu").removeClass("is-open"), setTimeout(function () {
            b.toggleClass("is-open"), $(".js-submenu-news").toggleClass("is-open"), b.hasClass("is-open") ? $("body,html").css("overflow-y", "hidden") : $("body,html").css("overflow-y", "auto")
        }, 800)) : (b.toggleClass("is-open"), $(".js-submenu-news").toggleClass("is-open"), b.hasClass("is-open") ? $("body,html").css("overflow-y", "hidden") : $("body,html").css("overflow-y", "auto"))
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
    app.init(), FastClick.attach(document.body), svg4everybody()
});
