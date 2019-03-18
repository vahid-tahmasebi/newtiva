<?php

add_action('admin_head', 'admin_custom_css');
function admin_custom_css(){
    echo '<style>  

  #adminmenu,#adminmenu .wp-submenu,#adminmenuback,#adminmenuwrap {width: 170px;background-color: #28353d;}
  #adminmenu .wp-submenu-head, #adminmenu a.menu-top { font-size: 14px;font-weight: 400;line-height: 18px;font-family: IRANsans!important;padding: 0;}
  #adminmenu .wp-submenu a { font-size: 13px;line-height: 18px;margin: 0;padding: 5px 0;font-family: IRANsans!important;}   
 .rtl h1, .rtl h2, .rtl h3, .rtl h4, .rtl h5, .rtl h6 {font-family: IRANsans !important;font-weight: 900 !important;}     
 .postbox .inside h2, .wrap [class$=icon32]+h2, .wrap h1, .wrap>h2:first-child { font-size:23px;font-weight:900 !important; margin: 0; padding: 9px 0 4px 0;line-height: 29px;font-family: IRANsans !important;}   
 #wpadminbar .quicklinks .ab-empty-item, #wpadminbar .quicklinks a, #wpadminbar .shortlink-input {height: 32px;display: block;padding: 0 10px;margin: 0;font-family: IRANsans!important;}     
 #wpcontent #wp-toolbar .menupop a, #wpcontent #wp-toolbar .menupop a .ab-label { font-family: IRANsans !important;}     
 .mce-menubar .mce-menubtn button span {color: #28353d;font-family: IRANsans!important;font-size: 12px!important;}  
 .postbox .inside, .stuffbox .inside { padding: 0 12px 12px; line-height: 1.4em; font-size: 12px!important;font-family: IRANsans!important;}    
 .wp-core-ui .button, .wp-core-ui .button-secondary {color: #fff; background:#2196F3;box-shadow: 0 1px 0 #ccc;vertical-align: top; font-family: IRANsans!important;border-radius: 10px;}      
 .wp-media-buttons .add_media span.wp-media-buttons-icon:before { color: #fff !important;}    
 .wp-core-ui .button-secondary:focus, .wp-core-ui .button-secondary:hover, .wp-core-ui .button.focus, .wp-core-ui .button.hover, .wp-core-ui .button:focus, .wp-core-ui .button:hover {
    background: #2196F3 !important;
    border-color: #fff !important;
    color: #fff !important;
}
 .mce-btn .mce-txt{font-family: IRANsans !important;}
 #adminmenu .wp-not-current-submenu .wp-submenu, .folded #adminmenu .wp-has-current-submenu .wp-submenu {min-width: 175px !important;}
  #wpadminbar #wp-admin-bar-my-sites a.ab-item, #wpadminbar #wp-admin-bar-site-name a.ab-item {font-family: IRANsans !important;}   
  #wpadminbar .quicklinks>ul>li>a { padding: 0 7px 0 8px; font-family: IRANsans!important;}


        </style>';
}