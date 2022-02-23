<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login | GOODTEST</title>

    <meta name="description" content="Admin Goodtest">
    <meta name="author" content="goodtest">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Admin Goodtest">
    <meta property="og:site_name" content="goodtest">
    <meta property="og:description" content="Admin Goodtest ">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url('assets/admin/') ?>media/favicons/icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/admin/') ?>media/favicons/icon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/admin/') ?>media/favicons/icon.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>js/plugins/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>js/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>js/plugins/simplemde/simplemde.min.css">

    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="<?= base_url('assets/admin/') ?>css/oneui.min.css">


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Light themed Header
            'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('<?= base_url('assets/admin') ?>/media/photos/photo6@2x.jpg');">
                <div class="hero-static bg-white-95">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <!-- Sign In Block -->
                                <div class="block block-themed block-fx-shadow mb-0">
                                    <div class="block-header">
                                        <h3 class="block-title">Login</h3>
                                    </div>
                                    <div class="block-content">
                                        <?= $this->session->flashdata('msg'); ?>
                                        <div class="p-sm-3 px-lg-4 py-lg-5">

                                            <h1 class="mb-2">GoodTest</h1>
                                            <p>Selamat Datang, Silakan Login.</p>

                                            <form action="<?= base_url() ?>auth/" method="POST">
                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="auth_username" placeholder="Username" required>
                                                        <small class="form-text text-danger"><?= form_error('auth_username'); ?></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-alt form-control-lg" id="login-password" name="auth_password" placeholder="Password" required>
                                                        <small class="form-text text-danger"><?= form_error('auth_password'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-xl-5">
                                                        <button type="submit" class="btn btn-block btn-primary">
                                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- END Sign In Form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- END Sign In Block -->
                            </div>
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-muted text-center">
                        <strong>GOODTest</strong> &copy; <span data-toggle="year-copy"><?= date('Y'); ?></span>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
    <script src="<?= base_url('assets/admin') ?>/js/oneui.core.min.js"></script>
    <script src="<?= base_url('assets/admin') ?>/js/oneui.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="<?= base_url('assets/admin') ?>/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script>
        ! function(e) {
            var n = {};

            function r(t) {
                if (n[t]) return n[t].exports;
                var i = n[t] = {
                    i: t,
                    l: !1,
                    exports: {}
                };
                return e[t].call(i.exports, i, i.exports, r), i.l = !0, i.exports
            }
            r.m = e, r.c = n, r.d = function(e, n, t) {
                r.o(e, n) || Object.defineProperty(e, n, {
                    enumerable: !0,
                    get: t
                })
            }, r.r = function(e) {
                "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                    value: "Module"
                }), Object.defineProperty(e, "__esModule", {
                    value: !0
                })
            }, r.t = function(e, n) {
                if (1 & n && (e = r(e)), 8 & n) return e;
                if (4 & n && "object" == typeof e && e && e.__esModule) return e;
                var t = Object.create(null);
                if (r.r(t), Object.defineProperty(t, "default", {
                        enumerable: !0,
                        value: e
                    }), 2 & n && "string" != typeof e)
                    for (var i in e) r.d(t, i, function(n) {
                        return e[n]
                    }.bind(null, i));
                return t
            }, r.n = function(e) {
                var n = e && e.__esModule ? function() {
                    return e.default
                } : function() {
                    return e
                };
                return r.d(n, "a", n), n
            }, r.o = function(e, n) {
                return Object.prototype.hasOwnProperty.call(e, n)
            }, r.p = "", r(r.s = 32)
        }({
            32: function(e, n, r) {
                e.exports = r(33)
            },
            33: function(e, n) {
                function r(e, n) {
                    for (var r = 0; r < n.length; r++) {
                        var t = n[r];
                        t.enumerable = t.enumerable || !1, t.configurable = !0, "value" in t && (t.writable = !0), Object.defineProperty(e, t.key, t)
                    }
                }
                var t = function() {
                    function e() {
                        ! function(e, n) {
                            if (!(e instanceof n)) throw new TypeError("Cannot call a class as a function")
                        }(this, e)
                    }
                    return function(e, n, t) {
                        n && r(e.prototype, n), t && r(e, t)
                    }(e, null, [{
                        key: "initValidation",
                        value: function() {
                            jQuery(".js-validation-signin").validate({
                                errorClass: "invalid-feedback animated fadeIn",
                                errorElement: "div",
                                errorPlacement: function(e, n) {
                                    jQuery(n).addClass("is-invalid"), jQuery(n).parents(".form-group").append(e)
                                },
                                highlight: function(e) {
                                    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid").addClass("is-invalid")
                                },
                                success: function(e) {
                                    jQuery(e).parents(".form-group").find(".is-invalid").removeClass("is-invalid"), jQuery(e).remove()
                                },
                                rules: {
                                    "login-username": {
                                        required: !0,
                                        minlength: 3
                                    },
                                    "login-password": {
                                        required: !0,
                                        minlength: 3
                                    }
                                },
                                messages: {
                                    "login-username": {
                                        required: "Masukan Username Anda",
                                        minlength: "Username Harus Lebih dari 3 Huruf"
                                    },
                                    "login-password": {
                                        required: "Masukan Password Anda",
                                        minlength: "Username Harus Lebih dari 3 Huruf "
                                    }
                                }
                            })
                        }
                    }, {
                        key: "init",
                        value: function() {
                            this.initValidation()
                        }
                    }]), e
                }();
                jQuery(function() {
                    t.init()
                })
            }
        });
    </script>
</body>

</html>