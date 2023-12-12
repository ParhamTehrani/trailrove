<!DOCTYPE html><html lang="en-US"><head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="format-detection" content="telephone=no">


    <link rel="shortcut icon" href="/img/logo.png">


    <title>Trail Rove - @yield('title')</title>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Lato%3A300%2C400%2C600%2C700%2C400italic%7CLustria%3A300%2C400%2C600%2C700%2C400italic%7CLato%7CLustria&amp;subset=latin%2Clatin-ext%2Ccyrillic-ext%2Cgreek-ext%2Ccyrillic&amp;display=swap"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato%3A300%2C400%2C600%2C700%2C400italic%7CLustria%3A300%2C400%2C600%2C700%2C400italic%7CLato%7CLustria&amp;subset=latin%2Clatin-ext%2Ccyrillic-ext%2Cgreek-ext%2Ccyrillic&amp;display=swap" media="print" onload="this.media='all'"><noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato%3A300%2C400%2C600%2C700%2C400italic%7CLustria%3A300%2C400%2C600%2C700%2C400italic%7CLato%7CLustria&#038;subset=latin%2Clatin-ext%2Ccyrillic-ext%2Cgreek-ext%2Ccyrillic&#038;display=swap" /></noscript>
    <meta name="robots" content="noindex, nofollow">
    @yield('head')

    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style id='global-styles-inline-css' type='text/css'>
        body {
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');
            --wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');
            --wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');
            --wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');
            --wp--preset--duotone--midnight: url('#wp-duotone-midnight');
            --wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');
            --wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');
            --wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        body .is-layout-flow > .alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-flow > .alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-flow > .aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained > .alignleft {
            float: left;
            margin-inline-start: 0;
            margin-inline-end: 2em;
        }

        body .is-layout-constrained > .alignright {
            float: right;
            margin-inline-start: 2em;
            margin-inline-end: 0;
        }

        body .is-layout-constrained > .aligncenter {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
            max-width: var(--wp--style--global--content-size);
            margin-left: auto !important;
            margin-right: auto !important;
        }

        body .is-layout-constrained > .alignwide {
            max-width: var(--wp--style--global--wide-size);
        }

        body .is-layout-flex {
            display: flex;
        }

        body .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        body .is-layout-flex > * {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }
        .wp-block-navigation a:where(:not(.wp-element-button)){color: inherit;}
        :where(.wp-block-columns.is-layout-flex){gap: 2em;}
        .wp-block-pullquote{font-size: 1.5em;line-height: 1.6;}
    </style>
    <link rel="stylesheet" id="wp-block-library-css" href="/front/css/style.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="classic-theme-styles-css" href="/front/css/classic-themes.min.css" type="text/css" media="all">

    <link data-minify="1" rel="stylesheet" href="/front/css/form-basic.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet" href="/front/css/reset.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet" href="/front/css/wordpress.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet" href="/front/css/animation.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet" href="/front/css/magnific-popup.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet" href="/front/css/custom.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet" href="/front/css/flexslider.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet" href="/front/css/tooltipster.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet" href="/front/css/screen.css" type="text/css" media="all">

    <link data-minify="1" rel="stylesheet"  href="/front/css/font-awesome.min.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet"  href="/front/css/script-custom-css.css" type="text/css" media="all">
    <link data-minify="1" rel="stylesheet"  href="/front/css/grid.css" type="text/css" media="all">

    <link rel="stylesheet" href="/front/css/kirki-styles.css" type="text/css" media="all">
    <style id='kirki-styles-global-inline-css' type='text/css'>
        body, input[type=text], input[type=email], input[type=url], input[type=password], textarea {
            font-family: Lato, Helvetica, Arial, sans-serif;
        }

        body {
            font-size: 14px;
        }

        h1, h2, h3, h4, h5, h6, h7 {
            font-family: Lato, Helvetica, Arial, sans-serif;
            font-weight: 400;
        }

        h1 {
            font-size: 34px;
        }

        h2 {
            font-size: 30px;
        }

        h3 {
            font-size: 26px;
        }

        h4 {
            font-size: 22px;
        }

        h5 {
            font-size: 18px;
        }

        h6 {
            font-size: 16px;
        }

        body, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a {
            color: #000000;
        }

        ::selection {
            background-color: #000000;
        }

        a {
            color: #be9656;
        }

        a:hover, a:active, .post_info_comment a i {
            color: #222222;
        }

        h1, h2, h3, h4, h5, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i {
            color: #222222;
        }

        #social_share_wrapper, hr, #social_share_wrapper, .post.type-post, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #post_more_wrapper, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, #autocomplete, .page_tagline {
            border-color: #e1e1e1;
        }

        input[type=text], input[type=password], input[type=email], input[type=url], textarea {
            background-color: #ffffff;
            color: #000;
            border-color: #e1e1e1;
        }

        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, textarea:focus {
            border-color: #000000;
        }

        input[type=submit], input[type=button], a.button, .button {
            font-family: Lato, Helvetica, Arial, sans-serif;
            background-color: #888888;
            color: #ffffff;
            border-color: #888888;
        }

        .frame_top, .frame_bottom, .frame_left, .frame_right {
            background: #222222;
        }

        #menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a {
            font-family: Lato, Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #222222;
        }

        #menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover {
            color: #b38d51;
        }

        #menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a {
            color: #b38d51;
        }

        .top_bar {
            background-color: #ffffff;
        }

        #menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #222222;
        }

        .mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:hover, #sub_menu li a:active, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle {
            color: #222222;
        }

        #menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active {
            background: #f9f9f9;
        }

        #menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul {
            background: #ffffff;
            border-color: #e1e1e1;
        }

        #menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active {
            color: #222222;
        }

        #menu_wrapper div .nav li.megamenu ul li {
            border-color: #eeeeee;
        }

        .above_top_bar {
            background: #222222;
        }

        #top_menu li a, .top_contact_info, .top_contact_info i, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active {
            color: #ffffff;
        }

        .mobile_menu_wrapper #searchform {
            background: #ebebeb;
        }

        .mobile_menu_wrapper #searchform input[type=text], .mobile_menu_wrapper #searchform button i {
            color: #222222;
        }

        .mobile_menu_wrapper {
            background-color: #ffffff;
        }

        .mobile_main_nav li a, #sub_menu li a {
            font-family: Lato, Helvetica, Arial, sans-serif;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, .mobile_menu_wrapper .sidebar_wrapper, #close_mobile_menu i {
            color: #666666;
        }

        #page_caption {
            background-color: #f9f9f9;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        #page_caption h1 {
            font-size: 40px;
        }

        #page_caption h1, .post_caption h1 {
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #222222;
        }

        #page_caption.hasbg {
            height: 450px;
        }

        .page_tagline {
            color: #999999;
            font-size: 11px;
            font-weight: 400;
            letter-spacing: 5px;
            text-transform: uppercase;
        }
        #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           .widget_block .wp-block-group__inner-container h2 {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               font-family: Lato, Helvetica, Arial, sans-serif;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               font-size: 12px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               font-weight: 600;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               letter-spacing: 2px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               text-transform: uppercase;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           }
        #page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .widget_block .wp-block-group__inner-container h2 {
            color: #444444;
        }

        #page_content_wrapper .inner .sidebar_wrapper a, .page_content_wrapper .inner .sidebar_wrapper a {
            color: #222222;
        }

        #page_content_wrapper .inner .sidebar_wrapper a:hover, #page_content_wrapper .inner .sidebar_wrapper a:active, .page_content_wrapper .inner .sidebar_wrapper a:hover, .page_content_wrapper .inner .sidebar_wrapper a:active {
            color: #999999;
        }

        #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle {
            color: #222222;
        }

        .footer_bar {
            background-color: #222222;
        }

        #footer, #copyright {
            color: #999999;
        }

        #copyright a, #copyright a:active, #footer a, #footer a:active, #footer_menu li a, #footer_menu li a:active {
            color: #ffffff;
        }

        #copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover, #footer_menu li a:hover {
            color: #be9656;
        }

        .footer_bar_wrapper, .footer_bar {
            border-color: #444444;
        }

        #footer .widget_tag_cloud div a {
            background: #444444;
        }

        .footer_bar_wrapper .social_wrapper ul li a {
            color: #ffffff;
        }

        .post_header:not(.single) h5, body.single-post .post_header_title h1, #post_featured_slider li .slider_image .slide_post h2, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong, #footer ul.sidebar_widget .posts.blog li a, .post_info_comment {
            font-family: Lustria, Georgia, serif;
        }

        .post_header:not(.single) h5, body.single-post .post_header_title h1, #post_featured_slider li .slider_image .slide_post h2, #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a, #page_content_wrapper .sidebar .content .sidebar_widget > li.widget_recent_entries ul li a, #autocomplete li strong, .post_related strong, #footer ul.sidebar_widget .posts.blog li a {
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .post_info_date, .post_attribute, .comment_date, .post-date, #post_featured_slider li .slider_image .slide_post .slide_post_date {
            font-family: Lustria, Georgia, serif;
        }

        .post_info_date {
            color: #be9656;
        }

        .post_info_date:before {
            border-color: #be9656;
        }

        .readmore {
            color: #be9656;
        }
    </style>
    <script type="text/javascript" src="/front/js/jquery.min.js" ></script>
    <script type="text/javascript" src="/front/js/jquery-migrate.min.js" ></script>

</head>
<body class="home blog">


<!-- Begin mobile menu -->
<div class="mobile_menu_wrapper">
    <a id="close_mobile_menu" href="javascript:;"><i class="fa fa-close"></i></a>

    <form role="search" method="get" name="searchform" id="searchform" action="/search">
        <div>
            <input type="text" value="" name="q" id="q" autocomplete="off" placeholder="Search...">
            <button>
                <i class="fa fa-search"></i>
            </button>
        </div>
        <div id="autocomplete"></div>
    </form>

    <div class="menu-side-mobile-menu-container">
        <ul id="mobile_main_menu" class="mobile_main_nav">
            @foreach($categories as $item)
                <li id="menu-item-390" class="hidden menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-390"><a href="/category/{{ $item->slug }}">{{ $item->title }}</a>
                    <ul class="sub-menu">
                        @foreach($item->children as $value)
                            <li id="menu-item-391" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-391"><a href="/category/{{ $value->slug }}">{{ $value->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            @foreach($menu as $item)
                <li id="menu-item-400" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-400"><a href="{{ $item->url }}">{{ $item->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- Begin side menu sidebar -->
    <div class="page_content_wrapper">
        <div class="sidebar_wrapper">
            <div class="sidebar">

                <div class="content">

                    <ul class="sidebar_widget">
                        <li id="text-8" class="widget widget_text"><h2 class="widgettitle">About Me</h2>
                            <div class="textwidget"><p><img width="1440" height="810" src="/img/nature.png" alt="" style="margin-bottom:10px;"><br>
                                    Our website is a window to the world. Discover and enjoy our articles about nature and travel.</p>
                            </div>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
    <!-- End side menu sidebar -->
</div>
<!-- End mobile menu -->

<!-- Begin template wrapper -->
<div id="wrapper">


    <div class="header_style_wrapper">
        <!-- End top bar -->

        <div class="top_bar">

            <!-- Begin logo -->
            <div id="logo_wrapper">

                <!-- Begin right corner buttons -->
                <div id="logo_right_button">

                    <!-- Begin search icon -->
                    <a href="javascript:;" id="search_icon"><i class="fa fa-search"></i></a>
                    <!-- End side menu -->

                    <!-- Begin search icon -->
                    <a href="javascript:;" id="mobile_nav_icon"></a>
                    <!-- End side menu -->

                </div>
                <!-- End right corner buttons -->

                <div id="logo_normal" class="logo_container">
                    <div class="logo_align">
                        <a id="custom_logo" class="logo_wrapper default" href="/">
                            <img src="/img/logo-trans-black.png" alt="" width="100%" height="200">
                        </a>
                    </div>
                </div>
                <!-- End logo -->
            </div>

                <div id="menu_wrapper">
                <div id="nav_wrapper">
                    <div class="nav_wrapper_inner">
                        <div id="menu_border_wrapper">
                            <div class="menu-main-menu-container">
                                <ul id="main_menu" class="nav">
                                    @foreach($categories as $item)
                                    <li id="menu-item-352" class="hidden menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children arrow menu-item-352"><a href="/category/{{ $item->slug }}">{{ $item->title }}</a>
                                        <ul class="sub-menu">
                                            @foreach($item->children as $value)
                                                <li id="menu-item-358" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-358"><a href="/category/{{ $value->slug }}">{{ $value->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach

                                    @foreach($menu as $item)
                                        <li id="menu-item-22" class="megamenu col3 menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-22">
                                        <a href="{{ $item->url }}" aria-current="page">{{ $item->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End main nav -->
            </div>
        </div>
    </div>


    @yield('content')


    <div class="footer_bar   ">

        <div id="footer" class="">
            <ul class="sidebar_widget four">
                <li id="text-7" class="widget widget_text">
                    <div class="textwidget"><p><img src="/img/logo.png" width="151" height="100"></p>
                    </div>
                </li>
                <li id="mc4wp_form_widget-7" class="widget widget_mc4wp_form_widget"><h2 class="widgettitle">Subscription</h2>
                    <form id="mc4wp-form-2" class="mc4wp-form mc4wp-form-437 mc4wp-form-basic" method="post" data-id="437" action="/subscription" data-name="Default sign-up form">
                        @csrf
                        <div class="mc4wp-form-fields">
                            <p>
                                <input type="email" id="mc4wp_email" name="EMAIL" placeholder="Your email address"
                                   required="">
                            </p>
                            <p>
                                <input type="submit" value="Subscribe">
                            </p>
                        </div>
                        <div class="mc4wp-response">
                            @if(\Illuminate\Support\Facades\Session::has('success-rss'))
                                <p>{{\Illuminate\Support\Facades\Session::get('success-rss')}}</p>
                            @endif
                        </div>
                </form>
                </li>
                @if(@$recentNews->count())
                    <li id="custom_recent_posts-3" class="widget Custom_Recent_Posts"><h2 class="widgettitle"><span>Recent Posts</span>
                        </h2>
                        <ul class="posts blog ">
                            @foreach($recentNews as $news)
                                <li><strong class="title"><a
                                            href="/article/{{ $news->slug }}">{{ $news->title }}</a></strong>
                                    <div class="post_attribute">{{ \Carbon\Carbon::parse($news->created_at)->format('F d, Y') }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif

                @if(@$popular->count())
                    <li id="custom_popular_posts-6" class="widget Custom_Popular_Posts">
                        <h2 class="widgettitle">
                            <span>Popular Posts</span>
                        </h2>
                        <ul class="posts blog ">
                            @foreach($popular as $news)
                                <li><strong class="title"><a
                                            href="/article/{{ $news->slug }}">{{ $news->title }}</a></strong>
                                    <div class="post_attribute">{{ \Carbon\Carbon::parse($news->created_at)->format('F d, Y') }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
             @endif

            </ul>
        </div>
        <br class="clear">

        <div class="footer_bar_wrapper ">
            <div class="menu-footer-menu-container">

            </div>

            <div id="copyright">© Copyright Idehtech</div><br class="clear">
        </div>
    </div>

</div>





<link data-minify="1" rel="stylesheet" id="letsblog-frame-css-css" href="/front/css/frame.css" type="text/css" media="all">
<script data-minify="1" type="text/javascript" src="/front/js/jquery.magnific-popup.js" id="jquery.magnific-popup.js-js"></script>
<script data-minify="1" type="text/javascript" src="/front/js/jquery.easing.js" id="jquery.easing.js-js"></script>
<script type="text/javascript" src="/front/js/waypoints.min.js" id="waypoints.min.js-js"></script>
<script data-minify="1" type="text/javascript" src="/front/js/jquery.isotope.js" id="jquery.isotope.js-js"></script>
<script type="text/javascript" src="/front/js/jquery.tooltipster.min.js" id="jquery.tooltipster.min.js-js"></script>
<script data-minify="1" type="text/javascript" src="/front/js/custom_plugins.js" id="custom_plugins.js-js"></script>
<script data-minify="1" type="text/javascript" src="/front/js/custom.js" id="custom.js-js"></script>
<script type="text/javascript" src="/front/js/jquery.flexslider-min.js" id="letsblog-flexslider-js-js"></script>
<script data-minify="1" type="text/javascript" src="/front/js/script-slider-flexslider.js" id="letsblog-script-gallery-flexslider-js"></script>
<script data-minify="1" type="text/javascript" src="/front/js/jquery.cookie.js" id="letsblog-jquery-cookie-js"></script>
<script data-minify="1" type="text/javascript" src="/front/js/script-demo.js" id="letsblog-script-demo-js"></script>
<script data-minify="1" type="text/javascript" defer="" src="/front/js/forms.js" id="mc4wp-forms-api-js"></script>

</body></html>
