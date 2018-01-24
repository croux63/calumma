<?php
/*
  Plugin Name: Calumma Custom
  Plugin URI: http://christophe-roux.me/calumma/
  Description: Calumma customization
  Version 0.1
  Author: Christophe Roux
  Author URI: http://christophe-roux.me/
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: calumma-custom
*/

class wp_calumma {

  private $style='';
  private $font='';
  private $return_message='';

  function __construct() {
    $this->set_default_style();
    $default = $this->style;
    $this->style = get_option('calumma',$default);
    add_action('admin_menu',array(&$this,'my_admin_menu'));
  }

  function set_default_style() {
    $this->style["html"] = array("font-size" => "62.5%");
    $this->style["h1"] = array("color" => "#3a3a3a",
                               "font-size" => "40px;font-size:4rem",
                               "font-weight" => "300",
                               "font-style" => "normal",
                               "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style["h2"] = array("color" => "#3a3a3a",
                               "font-size" => "38px;font-size:3.8rem",
                               "font-weight" => "300",
                               "font-style" => "normal",
                               "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style["h3"] = array("color" => "#3a3a3a",
                               "font-size" => "30px;font-size:3rem",
                               "font-weight" => "300",
                               "font-style" => "normal",
                               "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style["h4"] = array("color" => "#3a3a3a",
                               "font-size" => "24px;font-size:2.4rem",
                               "font-weight" => "400",
                               "font-style" => "normal",
                               "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style["h5"] = array("color" => "#3a3a3a",
                               "font-size" => "19px;font-size:1.9rem",
                               "font-weight" => "400",
                               "font-style" => "normal",
                               "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style["h6"] = array("color" => "#3a3a3a",
                               "font-size" => "16px;font-size:1.6rem",
                               "font-weight" => "400",
                               "font-style" => "normal",
                               "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".site"] = array("width" => "100%",
                                   "height" => "auto",
                                   "margin-top" => "0",
                                   "margin-right" => "0",
                                   "margin-bottom" => "0",
                                   "margin-left" => "0",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "#fff",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat");
    $this->style[".site-header"] = array("width" => "100%",
                                   "height" => "auto",
                                   "margin-top" => "0",
                                   "margin-right" => "0",
                                   "margin-bottom" => "0",
                                   "margin-left" => "0",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",
                                   "background-color" => "#23282D",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat");
    $this->style[".site-content"] = array("width" => "900px",
                                   "height" => "auto",
                                   "margin-top" => "2em",
                                   "margin-right" => "auto",
                                   "margin-bottom" => "0",
                                   "margin-left" => "auto",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "#fff",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat");
    $this->style[".site-footer"] = array("width" => "100%",
                                   "height" => "5em",
                                   "margin-top" => "0",
                                   "margin-right" => "0",
                                   "margin-bottom" => "0",
                                   "margin-left" => "0",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "#23282D",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat");
    $this->style[".site-branding"] = array("width" => "900px",
                                   "height" => "auto",
                                   "margin-top" => "0",
                                   "margin-right" => "auto",
                                   "margin-bottom" => "0",
                                   "margin-left" => "auto",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "inherit",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat",
                                   "color" => "#aaaaaa",
                                   "font-size" => "1.7em",
                                   "font-weight" => "300",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".content-area"] = array("float" => "left",
                                          "width" => "600px",
                                   "height" => "auto",
                                   "margin-top" => "0",
                                   "margin-right" => "0",
                                   "margin-bottom" => "0",
                                   "margin-left" => "0",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "#fff",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat",
                                   "color" => "#3a3a3a",
                                   "font-size" => "1.7em",
                                   "font-weight" => "300",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".widget-area"] = array("float" => "right",
                                          "width" => "200px",
                                   "height" => "auto",
                                   "margin-top" => "0",
                                   "margin-right" => "0",
                                   "margin-bottom" => "0",
                                   "margin-left" => "0",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "#fff",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat",
                                   "color" => "#3a3a3a",
                                   "font-size" => "1.7em",
                                   "font-weight" => "300",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".site-info"] = array("width" => "900px",
                                   "height" => "auto",
                                   "margin-top" => "1em",
                                   "margin-right" => "auto",
                                   "margin-bottom" => "0",
                                   "margin-left" => "auto",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "inherit",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat",
                                   "color" => "#aaaaaa",
                                   "font-size" => "1.4em",
                                   "font-weight" => "300",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".site-title"] = array("color" => "#3a3a3a",
                                   "font-size" => "40px;font-size:4rem",
                                   "font-weight" => "300",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".entry-title"] = array("width" => "auto",
                                   "height" => "auto",
                                   "margin-top" => "0",
                                   "margin-right" => "0",
                                   "margin-bottom" => "0",
                                   "margin-left" => "0",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "inherit",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat",
                                   "color" => "#3a3a3a",
                                   "text-transform" => "none",
                                   "font-size" => "40px;font-size:4rem",
                                   "font-weight" => "300",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".posted-on"] = array("color" => "#888888",
                                   "font-size" => "14px;font-size:1.4rem",
                                   "font-weight" => "normal",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".byline"] = array("color" => "#888888",
                                   "font-size" => "14px;font-size:1.4rem",
                                   "font-weight" => "normal",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".cat-links"] = array("color" => "#888888",
                                   "font-size" => "14px;font-size:1.4rem",
                                   "font-weight" => "normal",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".tags-links"] = array("color" => "#888888",
                                   "margin-left" => "1em",
                                   "font-size" => "14px;font-size:1.4rem",
                                   "font-weight" => "normal",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".comments-link"] = array("color" => "#888888",
                                   "margin-left" => "1em",
                                   "font-size" => "14px;font-size:1.4rem",
                                   "font-weight" => "normal",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");                                   
    $this->style[".edit-link"] = array("color" => "#888888",
                                   "margin-left" => "1em",
                                   "font-size" => "14px;font-size:1.4rem",
                                   "font-weight" => "normal",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");                                
    $this->style[".more-link"] = array("color" => "#3a3a3a",
                                   "font-size" => "1em",
                                   "font-weight" => "normal",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".nav-links"] = array("color" => "#3a3a3a",
                                   "font-size" => "1em",
                                   "font-weight" => "normal",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");
    $this->style[".widget-title"] = array("width" => "auto",
                                   "height" => "auto",
                                   "margin-top" => "0",
                                   "margin-right" => "0",
                                   "margin-bottom" => "0",
                                   "margin-left" => "0",
                                   "padding-top" => "0",
                                   "padding-right" => "0",
                                   "padding-bottom" => "0",
                                   "padding-left" => "0",
                                   "border-top-style" => "none",
                                   "border-right-style" => "none",
                                   "border-bottom-style" => "none",
                                   "border-left-style" => "none",
                                   "border-top-width" => "0",
                                   "border-right-width" => "0",
                                   "border-bottom-width" => "0",
                                   "border-left-width" => "0",
                                   "border-top-color" => "transparent",
                                   "border-right-color" => "transparent",
                                   "border-bottom-color" => "transparent",
                                   "border-left-color" => "transparent",
                                   "border-radius" => "0",                                   
                                   "background-color" => "inherit",
                                   "background-image" => "none",
                                   "background-attachment" => "scroll",
                                   "background-position" => "0% 0%",
                                   "background-repeat" => "no-repeat",
                                   "color" => "#3a3a3a",
                                   "text-transform" => "none",
                                   "font-size" => "30px;font-size:3rem",
                                   "font-weight" => "300",
                                   "font-style" => "normal",
                                   "font-family" => "\"Source Sans Pro\",sans-serif");                                   
    $this->style[".site-branding_a_link"] = array("color" => "#aaaaaa",
                                                  "text-decoration" => "none");
    $this->style[".site-branding_a_visited"] = array("color" => "#aaaaaa",
                                                  "text-decoration" => "none");
    $this->style[".site-branding_a_hover"] = array("color" => "#3a3a3a",
                                                  "text-decoration" => "none");
    $this->style[".site-branding_a_active"] = array("color" => "#eeeeee",
                                                  "text-decoration" => "none");
    $this->style[".content-area_a_link"] = array("color" => "#2075c0",
                                                 "text-decoration" => "none");
    $this->style[".content-area_a_visited"] = array("color" => "#2075c0",
                                                 "text-decoration" => "none");
    $this->style[".content-area_a_hover"] = array("color" => "#3a3a3a",
                                                 "text-decoration" => "none");
    $this->style[".content-area_a_active"] = array("color" => "#eeeeee",
                                                 "text-decoration" => "none");
    $this->style[".entry-title_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".entry-title_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".entry-title_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".entry-title_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".posted-on_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".posted-on_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".posted-on_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".posted-on_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".byline_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".byline_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".byline_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".byline_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".cat-links_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".cat-links_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".cat-links_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".cat-links_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".tags-links_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".tags-links_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".tags-links_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".tags-links_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".comments-link_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".comments-link_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".comments-link_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".comments-link_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".edit-link_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".edit-link_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".edit-link_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".edit-link_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".more-link_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".more-link_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".more-link_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".more-link_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".nav-links_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".nav-links_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".nav-links_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".nav-links_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".widget-area_a_link"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".widget-area_a_visited"] = array("color" => "#2075c0",
                                                "text-decoration" => "none");
    $this->style[".widget-area_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".widget-area_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style[".site-footer_a_link"] = array("color" => "#aaaaaa",
                                                "text-decoration" => "none");
    $this->style[".site-footer_a_visited"] = array("color" => "#aaaaaa",
                                                "text-decoration" => "none");
    $this->style[".site-footer_a_hover"] = array("color" => "#3a3a3a",
                                                "text-decoration" => "none");
    $this->style[".site-footer_a_active"] = array("color" => "#eeeeee",
                                                "text-decoration" => "none");
    $this->style["other"] = array("min-2col" => "768",
                                  "min-full" => "1024",
                                  "rpadding" => "2%",
                                  "rcontent" => "63%",
                                  "rwidget" => "35%",
                                  "mpadding" => "1",
                                  "mfont-style" => "normal",
                                  "mfont-weight" => "300",
                                  "mfont-size" => "1.5",
                                  "font-family" => "\"Source Sans Pro\",sans-serif",
                                  "mcolor" => "#aaaaaa",
                                  "mcolor-hover" => "#aaaaaa",
                                  "mbgcolor" => "#23282d",
                                  "mbgcolor-hover" => "#33383d",
                                  "mwidth" => "900px",
                                  "mborder-top-color" => "transparent",
                                  "mborder-right-color" => "transparent",
                                  "mborder-bottom-color" => "transparent",
                                  "mborder-left-color" => "transparent",
                                  "mmargin-top" => "0",
                                  "mmargin-right" => "auto",
                                  "mmargin-bottom" => "0",
                                  "mmargin-left" => "auto",
                                  "smcolor" => "#aaaaaa",
                                  "smcolor-hover" => "#aaaaaa",
                                  "smbgcolor" => "#33383d",
                                  "smbgcolor-hover" => "#42484d",
                                  "smshadow" => "5px 5px 3px grey",
                                  "smborder-color" => "transparent",
                                  "css" => "",
                                  "replace-fonts" => "");
  }

  function my_admin_menu() {
     add_menu_page('Calumma','Calumma',8,
                   'calumma_typo',array(&$this,'homepage'),
                   plugins_url('calumma-custom/icon.png'),61);
     add_submenu_page('calumma_typo',
                       esc_html__('Typography customization','calumma-custom'),
                       esc_html__('Typography','calumma-custom'),8,
                       'calumma_typo',array(&$this,'homepage'));
     add_submenu_page('calumma_typo',
                       esc_html__('Pagination customization','calumma-custom'),
                       esc_html__('Pagination','calumma-custom'),8,
                       'calumma_page',array(&$this,'homepage'));
     add_submenu_page('calumma_typo',
                       esc_html__('Menu customization','calumma-custom'),
                       esc_html__('Menu','calumma-custom'),8,
                       'calumma_menu',array(&$this,'homepage'));
     add_submenu_page('calumma_typo',
                       esc_html__('Responsive design customization','calumma-custom'),
                       esc_html__('Responsive','calumma-custom'),8,
                       'calumma_resp',array(&$this,'homepage'));
     add_submenu_page('calumma_typo',
                       esc_html__('Add css','calumma-custom'),
                       esc_html__('Add css','calumma-custom'),8,
                       'calumma_css',array(&$this,'homepage'));
     add_submenu_page('calumma_typo',
                       esc_html__('Export to text','calumma-custom'),
                       esc_html__('Export','calumma-custom'),8,
                       'calumma_export',array(&$this,'homepage'));
     add_submenu_page('calumma_typo',
                       esc_html__('Import from text','calumma-custom'),
                       esc_html__('Import','calumma-custom'),8,
                       'calumma_import',array(&$this,'homepage'));
  }

  function print_script() {
    echo '<script>';
    echo "function change_tab(name)";
    echo "{";
    echo "document.getElementById('calumma-tab-'+oldtab).className = 'calumma-tab-back calumma-tab';";
    echo "document.getElementById('calumma-tab-'+name).className = 'calumma-tab-front calumma-tab';";
    echo "document.getElementById('calumma-tab-content-'+oldtab).style.display = 'none';";
    echo "document.getElementById('calumma-tab-content-'+name).style.display = 'block';";
    echo "oldtab = name;";
    echo "}";
    echo "</script>";
  }
  
  function init_script($name) {
    echo '<script>';
    echo "var oldtab = '".$name."';";
    echo "change_tab(oldtab);";
    echo "</script>";
  }

  function homepage() {
    $this->print_script();
    if(!empty($_POST))
      $this->return_message = $this->post();
    else
      $this->return_message = '<p></p>';
    echo '<div class="wrap">';
    if (strcmp($_GET['page'],'calumma_typo') == 0)
    {
      $this->get_typo();
    }
    else if (strcmp($_GET['page'],'calumma_page') == 0)
    {
      $this->get_page();
    }
    else if (strcmp($_GET['page'],'calumma_menu') == 0)
    {
      $this->get_menu();
    }
    else if (strcmp($_GET['page'],'calumma_resp') == 0)
    {
      $this->get_resp();
    }
    else if (strcmp($_GET['page'],'calumma_css') == 0)
    {
      $this->get_css();
    }
    else if (strcmp($_GET['page'],'calumma_export') == 0)
    {
      $this->get_export();
    }
    else if (strcmp($_GET['page'],'calumma_import') == 0)
    {
      $this->get_import();
    }
    echo '</div>';
  }

  function set_googlefonts() {
    $resolver = array(
                      '100' => '100',
                      '100italic' => '100italic',
                      '200' => '200',
                      '200italic' => '200italic',
                      '300' => '300',
                      '300italic' => '300italic',
                      'regular' => '400',
                      'italic' => '400italic',
                      '500' => '500',
                      '500italic' => '500italic',
                      '600' => '600',
                      '600italic' => '600italic',
                      '700' => '700',
                      '700italic' => '700italic',
                      '800' => '800',
                      '800italic' => '800italic',
                      '900' => '900',
                      '900italic' => '900italic');

    $filename = plugin_dir_path( __FILE__ )."webfonts.json";
    $fp = fopen($filename,"r");
    $json = fread($fp,filesize($filename));
    fclose($fp);
    $googlefonts = json_decode($json,true);
    $myfonts = '';
    foreach ( $googlefonts['items'] as $item )
    {
      foreach($this->font as $family => $weight)
      {
        if (strcmp($family,$item['family']) == 0)
        {
           $myfonts .= 'https://fonts.googleapis.com/css?family=';
           $myfonts .= str_replace(' ','+',$family);
           $variants = array_intersect(array_unique($weight),$item['variants']);
           $i = 0;
           foreach($variants as  $variant)
           { 
             if ($i == 0)
               $myfonts .= ':'.$resolver[$variant];
             else
               $myfonts .= ','.$resolver[$variant];
             $i = 1;
           }
           $myfonts .= "\n";
        }
      }  
    }
    $fp = fopen(get_stylesheet_directory()."/googlefonts.dat","w");
    fwrite($fp,$myfonts);
    fclose($fp);
  }
  

  function post() {
    if (isset($_POST['import']))
    {
      $temp = base64_decode($_POST['import']);
      if ($temp === FALSE)
      {
        return '<p style="color:red;"><strong>'.esc_html__('This string is not a valid saved string','calumma-custom').'</strong></p>';
      }
	
      $json = gzuncompress($temp);
      if ($json === FALSE)
      {
        return '<p style="color:red;"><strong>'.esc_html__('This string is not a valid saved string','calumma-custom').'</strong></p>';
      }
      $this->style = json_decode($json,true);
    }
    else
    {
      foreach( $_POST as $name=>$value )
      { 
        list($bloc,$property) = explode(":",str_replace('#','.',$name));
        $this->style[$bloc][$property] = $value;
      }
    }
    $css = "/*\nDO NOT EDIT THIS FILE\nInstall the plugin Calumma Custom to customize this theme\n*/\n";
    foreach($this->style as $bloc => $pair)
    {
      if (strcmp($bloc,"other") != 0)
      {
        $css .= str_replace("_a_"," a:",$bloc)."{";
        foreach($pair as $property => $value)
        {
          if (strcmp($property,"font-family") == 0)
          {
            if (strlen($this->style["other"]["replace-fonts"]) >0)
            {
              $this->style[$bloc]["font-family"] = $this->style["other"]["replace-fonts"];
              $css .=$property.":".stripslashes($this->style["other"]["replace-fonts"]).";";
              $list = explode(",",$this->style["other"]["replace-fonts"]);
            }
            else
            {
              $css .=$property.":".stripslashes($value).";";
              $list = explode(",",$value);
            }
            foreach($list as $fam)
            { 
              $family = trim(str_replace('"','',stripslashes($fam)));
              $this->font[$family][] = 'regular';
              $this->font[$family][] = 'italic';
              $this->font[$family][] = '700';
              $this->font[$family][] = '700italic';
              $weight = trim($this->style[$bloc]['font-weight']);
              if (is_numeric(trim($weight)))
              {
                $this->font[$family][] = $weight;
                $this->font[$family][] = $weight.'italic';
              }
            }
          }
          else
          {
            $css .=$property.":".stripslashes($value).";";
          }

        }
        $css .= "}";
      }
    }
    $css .='blockquote,q,var{font-style:italic;}';
    $css .='kbd,code,pre,tt,var{font-size:1em;}';
    $css .='.header-image img{width:100%;height:auto;}';
    $css .='.sticky h2:before{content:"\f308 ";font-family:Genericons;font-size:0.7em;margin-right:0.2em;}';
    $css .='.main-navigation{margin-left:-'.$this->style["other"]["mpadding"] * $this->style["other"]["mpadding"].'em;}'; 
    $css .='.main-navigation div{width:'.$this->style["other"]["mwidth"].';';
    $css .='margin-top:'.$this->style["other"]["mmargin-top"].';';
    $css .='margin-right:'.$this->style["other"]["mmargin-right"].';';
    $css .='margin-bottom:'.$this->style["other"]["mmargin-bottom"].';';
    $css .='margin-left:'.$this->style["other"]["mmargin-left"].';';
    $css .='font-size:'.$this->style["other"]["mfont-size"].'em;';
    $css .='font-family:'.$this->style["other"]["font-family"].';}';
    $css .='.main-navigation li{padding:'.$this->style["other"]["mpadding"].'em;}';
    $css .='.main-navigation a:link{color:'.$this->style["other"]["mcolor"].';}';
    $css .='.main-navigation a:visited{color:'.$this->style["other"]["mcolor"].';}';
    $css .='.main-navigation a:hover{color:'.$this->style["other"]["mcolor-hover"].';}';
    $css .='.main-navigation a:active{color:'.$this->style["other"]["mcolor"].';}';
    $css .='.main-navigation .menu > li{border-top: 1px solid '.$this->style["other"]["mborder-top-color"].';';
    $css .='border-right: 1px solid '.$this->style["other"]["mborder-right-color"].';';
    $css .='border-bottom: 1px solid '.$this->style["other"]["mborder-bottom-color"].';';
    $css .='border-left: 1px solid '.$this->style["other"]["mborder-left-color"].';';
    $css .='background-color:'.$this->style["other"]["mbgcolor"].';}';
    $css .='.main-navigation .menu > li:hover{background-color:'.$this->style["other"]["mbgcolor-hover"].';}';

    $css .='.main-navigation .sub-menu a:link{color:'.$this->style["other"]["smcolor"].';}';
    $css .='.main-navigation .sub-menu a:visited{color:'.$this->style["other"]["smcolor"].';}';
    $css .='.main-navigation .sub-menu a:hover{color:'.$this->style["other"]["smcolor-hover"].';}';
    $css .='.main-navigation .sub-menu a:active{color:'.$this->style["other"]["smcolor"].';}';
    $css .='.main-navigation .sub-menu{background-color:'.$this->style["other"]["smbgcolor"].';}';
    $css .='.main-navigation .sub-menu li:hover{background-color:'.$this->style["other"]["smbgcolor-hover"].';}';
    $css .='.main-navigation ul ul{border: 1px solid:'.$this->style["other"]["smborder-color"].';';
    $css .='box-shadow:'.$this->style["other"]["smshadow"].';}';
    $css .='.main-navigation .menu > li > ul{margin-top:'.$this->style["other"]["mpadding"] * 2 .'em;';
    $css .='margin-left:-'.$this->style["other"]["mpadding"].'em;}';
    $css .='.main-navigation .sub-menu > li > ul{margin-top:-1px;';
    $css .='margin-left:1px;}';
    $css .='.main-navigation .menu > .menu-item-has-children > a:after{';
    $css .='margin-left:0.7em;font-size:0.7em;vertical-align:middle;';
    $css .='content: "\f502 ";font-family: Genericons;}';
    $css .='.menu-toggle{text-shadow:none;box-shadow:none;border:none;border-radius:0;';
    $css .='color:'.$this->style["other"]["mcolor"].';';
    $css .='background-color:'.$this->style["other"]["mbgcolor"].';';
    $css .='font-size:'.$this->style["other"]["mfont-size"].'em;';
    $css .='font-family:'.$this->style["other"]["font-family"].';}';
    $css .='.menu-toggle:before{content: "\f419 ";font-size:0.7em;';
    $css .='font-family: Genericons;margin-right: 0.8em;}';
    $css .='.menu-toggle:hover{text-shadow:none;box-shadow:none;border:none;border-radius:0;';
    $css .='color:'.$this->style["other"]["mcolor"].';';
    $css .='background-color:'.$this->style["other"]["mbgcolor-hover"].';';
    $css .='font-size:'.$this->style["other"]["mfont-size"].'em;';
    $css .='font-family:'.$this->style["other"]["font-family"].';}';
    $css .= '@media only screen and (min-width:'.$this->style["other"]["min-2col"].'px){';
    $css .='.main-navigation .sub-menu > .menu-item-has-children > a:after{';
    $css .='font-size:0.7em;display:block;float:right;';
    $css .='content: "\f501 ";font-family: Genericons;}';
    $css .= "}";
    $css .= '@media only screen and (min-width:'.$this->style["other"]["min-2col"].'px) and (max-width:'.($this->style["other"]["min-full"]-1).'px){';
    $css .= '.site{width:100%;margin:0;padding:0;}';
    $css .= '.site-header{width:100%;margin:0;padding:0 '.$this->style["other"]["rpadding"].';}';
    $css .= '.site-content{width:100%;margin:0padding:0;}';
    $css .= '.content-area{width:'.$this->style["other"]["rcontent"].';margin:0;padding:0 '.$this->style["other"]["rpadding"].';}';
    $css .= '.widget-area{width:'.$this->style["other"]["rwidget"].';margin:0;padding:0 '.$this->style["other"]["rpadding"].';}';
    $css .= '.site-footer{width:100%;margin:0;padding:0 '.$this->style["other"]["rpadding"].';}';
    $css .='.menu-toggle{display:none;}';
    $css .='.main-navigation ul{display:block;}';
    $css .= "}";
    $css .= '@media only screen and (max-width:'.($this->style["other"]["min-2col"]-1).'px){';
    $css .= '.site{width:100%;margin:0;padding:0;}';
    $css .= '.site-header{width:100%;margin:0;padding:0 '.$this->style["other"]["rpadding"].';}';
    $css .= '.site-content{width:100%;margin:0;padding:0;}';
    $css .= '.content-area{width:100%;margin:0;padding:0 '.$this->style["other"]["rpadding"].';}';
    $css .= '.widget-area{width:100%;margin:0;padding:0 '.$this->style["other"]["rpadding"].';}';
    $css .= '.site-footer{width:100%;margin:0;padding:0 '.$this->style["other"]["rpadding"].';}';
    $css .='.menu-toggle{display:block;}';
    $css .='.main-navigation ul{width:100%;display:none;}';
    $css .='.main-navigation li{width:100%;}';
    $css .= "}";
    $css .= ".widget-area ul {list-style-type:none;list-style-position:inside;margin-left:0;padding-left:0.5em;}";
    $css .= ".widget > ul {margin-left:-0.5em;}";
    $css .= stripslashes($this->style["other"]["css"]);
    $fp = fopen(get_template_directory()."/calumma.css","w");
    if ($fp === FALSE)
    {
      return '<p style="color:red;"><strong>'.esc_html__('Your theme directory is not writable !','calumma-custom').'</strong></p>';
    }
    fwrite($fp,$css);
    fclose($fp);
    $this->style["other"]["replace-fonts"] = "";
    update_option('calumma',$this->style);
    $this->set_googlefonts();
    return '<p style="color:green;"><strong>'.esc_html__('Style saved','calumma-custom').'</strong></p>';
  }

   function print_header($title) {
      echo '<h1>'.esc_html__($title,'calumma-custom').'</h1>';
      echo $this->return_message;
      $uri = explode('&',$_SERVER['REQUEST_URI']);
      echo '<form method="post" action="'.$uri[0].'">';
  }

  function open_table() {
      echo '<table>';
      echo '<tr><td style="width: 150px;">';
      echo esc_html__('Property','calumma-custom');
      echo '</td><td>';
      echo esc_html__('Value','calumma-custom').'</td><td>';
      echo esc_html__('Exemple(s)','calumma-custom').'</td></tr>';
  }

  function print_input($label,$name,$value,$exemple,$width=90) {
      echo '<tr><td>'.esc_html__($label,'calumma-custom');
      echo '</td><td><input style="width:'.$width.'px;" type="text" name="'.$name.'" value="'.stripslashes(htmlspecialchars($value));
      echo '"></td><td>'.$exemple.'</td></tr>';
  }

  function close_table() {
      echo '</table>';
  }

  function print_footer($margin = 200) {
      echo '<input type="submit" style="margin-left:'.$margin.'px;" class="button-primary" value="'.esc_html__('Save','calumma-custom').'">';
      echo '</form>';
  }

  function add_tab($name) {
    echo '<span class="calumma-tab-back calumma-tab" id="calumma-tab-'.$name.'" onclick="change_tab('."'".$name."'".');">'.$name.'</span>';
  }

  function print_font($name,$class=true) {
      if ($class == true)
      {
        $prefix = '.';
        $form = '#';
      }
      else
      {
        $prefixe = '';
        $form = '';
      }
      $this->print_input('font-family',
                         $form.$name.':font-family',
                         $this->style[$prefix.$name]["font-family"],
                         '"font name" | font-name',150);
      $this->print_input('font-size',
                         $form.$name.':font-size',
                         $this->style[$prefix.$name]["font-size"],
                         '120% | 2em | 20px',150);
      $this->print_input('font-style',
                         $form.$name.':font-style',
                         $this->style[$prefix.$name]["font-style"],
                         'normal | italic',150);
      $this->print_input('font-weight',
                         $form.$name.':font-weight',
                         $this->style[$prefix.$name]["font-weight"],
                         'normal | bold | 300',150);
      $this->print_input('color',
                         $form.$name.':color',
                         $this->style[$prefix.$name]["color"],
                         'transparent | red | #cc58ed',150);
  }

  function print_link($name) {
      $this->print_input('color link',
                         '#'.$name.'_a_link:color',
                         $this->style['.'.$name.'_a_link']["color"],
                         'transparent | red | #cc58ed',150);
      $this->print_input('text-decoration link',
                         '#'.$name.'_a_link:text-decoration',
                         $this->style['.'.$name.'_a_link']["text-decoration"],
                         'none | underline',150);
      $this->print_input('color visited',
                         '#'.$name.'_a_visited:color',
                         $this->style['.'.$name.'_a_visited']["color"],
                         'transparent | red | #cc58ed',150);
      $this->print_input('text-decoration visited',
                         '#'.$name.'_a_visited:text-decoration',
                         $this->style['.'.$name.'_a_visited']["text-decoration"],
                         'none | underline',150);
      $this->print_input('color hover',
                         '#'.$name.'_a_hover:color',
                         $this->style['.'.$name.'_a_hover']["color"],
                         'transparent | red | #cc58ed',150);
      $this->print_input('text-decoration hover',
                         '#'.$name.'_a_hover:text-decoration',
                         $this->style['.'.$name.'_a_hover']["text-decoration"],
                         'none | underline',150);
      $this->print_input('color active',
                         '#'.$name.'_a_active:color',
                         $this->style['.'.$name.'_a_active']["color"],
                         'transparent | red | #cc58ed',150);
      $this->print_input('text-decoration active',
                         '#'.$name.'_a_active:text-decoration',
                         $this->style['.'.$name.'_a_active']["text-decoration"],
                         'none | underline',150);
  }

  function print_col($name) {
      $this->print_div($name);
      $this->print_input('Alignment',
                         '#'.$name.':float',
                         $this->style['.'.$name]["float"],
                         'left | right');
  }

  function print_div($name) {
      $this->print_input('width',
                         '#'.$name.':width',
                         $this->style['.'.$name]["width"],
                         'auto | 300% | 900px');
      $this->print_input('height',
                         '#'.$name.':height',
                         $this->style['.'.$name]["height"],
                         'auto | 300% | 900px');
      $this->print_input('margin-top',
                         '#'.$name.':margin-top',
                         $this->style['.'.$name]["margin-top"],
                         'auto | 2% | 20px | 1em');
      $this->print_input('margin-right',
                         '#'.$name.':margin-right',
                         $this->style['.'.$name]["margin-right"],
                         'auto | 2% | 20px | 1em');
      $this->print_input('margin-bottom',
                         '#'.$name.':margin-bottom',
                         $this->style['.'.$name]["margin-bottom"],
                         'auto | 2% | 20px | 1em');
      $this->print_input('margin-left',
                         '#'.$name.':margin-left',
                         $this->style['.'.$name]["margin-left"],
                         'auto | 2% | 20px | 1em');
      $this->print_input('padding-top',
                         '#'.$name.':padding-top',
                         $this->style['.'.$name]["padding-top"],
                         '2% | 20px | 1em');
      $this->print_input('padding-right',
                         '#'.$name.':padding-right',
                         $this->style['.'.$name]["padding-right"],
                         '2% | 20px | 1em');
      $this->print_input('padding-bottom',
                         '#'.$name.':padding-bottom',
                         $this->style['.'.$name]["padding-bottom"],
                         '2% | 20px | 1em');
      $this->print_input('padding-left',
                         '#'.$name.':padding-left',
                         $this->style['.'.$name]["padding-left"],
                         '2% | 20px | 1em');
      $this->print_input('border-top-style',
                         '#'.$name.':border-top-style',
                         $this->style['.'.$name]["border-top-style"],
                         'none | dotted | dashed | solid | double');
      $this->print_input('border-right-style',
                         '#'.$name.':border-right-style',
                         $this->style['.'.$name]["border-right-style"],
                         'none | dotted | dashed | solid | double');
      $this->print_input('border-bottom-style',
                         '#'.$name.':border-bottom-style',
                         $this->style['.'.$name]["border-bottom-style"],
                         'none | dotted | dashed | solid | double');
      $this->print_input('border-left-style',
                         '#'.$name.':border-left-style',
                         $this->style['.'.$name]["border-left-style"],
                         'none | dotted | dashed | solid | double');
      $this->print_input('border-top-width',
                         '#'.$name.':border-top-width',
                         $this->style['.'.$name]["border-top-width"],
                         'medium | thin | thick | 5px');
      $this->print_input('border-right-width',
                         '#'.$name.':border-right-width',
                         $this->style['.'.$name]["border-right-width"],
                         'medium | thin | thick | 5px');
      $this->print_input('border-bottom-width',
                         '#'.$name.':border-bottom-width',
                         $this->style['.'.$name]["border-bottom-width"],
                         'medium | thin | thick | 5px');
      $this->print_input('border-left-width',
                         '#'.$name.':border-left-width',
                         $this->style['.'.$name]["border-left-width"],
                         'medium | thin | thick | 5px');
      $this->print_input('border-top-color',
                         '#'.$name.':border-top-color',
                         $this->style['.'.$name]["border-top-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-right-color',
                         '#'.$name.':border-right-color',
                         $this->style['.'.$name]["border-right-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-bottom-color',
                         '#'.$name.':border-bottom-color',
                         $this->style['.'.$name]["border-bottom-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-left-color',
                         '#'.$name.':border-left-color',
                         $this->style['.'.$name]["border-left-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-radius',
                         '#'.$name.':border-radius',
                         $this->style['.'.$name]["border-radius"],
                         '0 | 5px | 1em');                         
      $this->print_input('background-color',
                         '#'.$name.':background-color',
                         $this->style['.'.$name]["background-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('background-image',
                         '#'.$name.':background-image',
                         $this->style['.'.$name]["background-image"],
                         'none | url(img.png)');
      $this->print_input('background-attachment',
                         '#'.$name.':background-attachment',
                         $this->style['.'.$name]["background-attachment"],
                         'scroll | fixed');
      $this->print_input('background-position',
                         '#'.$name.':background-position',
                         $this->style['.'.$name]["background-position"],
                         '0% 0%');
      $this->print_input('background-repeat',
                         '#'.$name.':background-repeat',
                         $this->style['.'.$name]["background-repeat"],
                         'no-repeat | repeat | repeat-x | repeat-y');
  }

  function print_boxes() {
      echo '<div style="width:270px;height:225px;margin-top:20px;border:thin solid black;text-align:center;color:black;">site';
      echo '<div style="width:260px;height:50px;margin:5px;border:thin solid blue;text-align:center;color:blue;">site-header';
      echo '<div style="width:250px;height:20px;margin:5px;border:thin solid red;text-align:center;color:red;">site-branding';
      echo '</div>';
      echo '</div>';
      echo '<div style="width:260px;height:80px;margin:5px;border:thin solid blue;text-align:center;color:blue;">site-content';
      echo '<div style="clear:both;"></div>';
      echo '<div style="width:140px;height:50px;margin:5px;border:thin solid red;float:left;text-align:center;color:red;">content-area';
      echo '</div>';
      echo '<div style="width:90px;height:50px;margin:5px;border:thin solid red;float:right;text-align:center;color:red;">widget-area';
      echo '</div>';
      echo '</div>';
      echo '<div style="width:260px;height:50px;margin:5px;border:thin solid blue;clear:both;text-align:center;color:blue;">site-footer';
      echo '<div style="width:250px;height:20px;margin:5px;border:thin solid red;text-align:center;color:red;">site-info';
      echo '</div>';
      echo '</div>';
      echo '</div>';
  }  
 
  function get_typo() {
      echo '<div><div style="float:left">';
      $this->print_header('Typography customization');
      $this->open_table();
      $this->print_input('Root font size',
                         'html:font-size',
                         $this->style["html"]["font-size"],
                         '62.5% | 12px | 1em',150);
      $this->print_input('Replace all font-family',
                         'other:replace-fonts',
                         $this->style["other"]["replace-fonts"],
                         '"font name" | font-name',150);
      $this->close_table();
      echo '<div style="margin-top:1em;"><div>';
      $this->add_tab('site-branding');
      $this->add_tab('content-area');
      $this->add_tab('widget-area');
      $this->add_tab('site-info');
      $this->add_tab('entry-links');
      $this->add_tab('h1-h6');
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-site-branding">';
      $this->open_table();
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('Main Title').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('site-title');
      $this->print_link('site-branding');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('Site Description').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('site-branding');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-content-area">';
      $this->open_table();
      $this->print_font('content-area');
      $this->print_link('content-area');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('Entry Title').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('entry-title');
      $this->print_input('text-transform',
                         '#entry-title:text-transform',
                         $this->style[".entry-title"]["text-transform"],
                         'none | uppercase',150);
      $this->print_link('entry-title');
      $this->print_div('entry-title');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-widget-area">';
      $this->open_table();
      $this->print_font('widget-area');
      $this->print_link('widget-area');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('Widget Title').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('widget-title');
      $this->print_input('text-transform',
                         '#widget-title:text-transform',
                         $this->style[".widget-title"]["text-transform"],
                         'none | uppercase',150);
      $this->print_div('widget-title');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-site-info">';
      $this->open_table();
      $this->print_font('site-info');
      $this->print_link('site-footer');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-entry-links">';
      $this->open_table();
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('posted-on').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('posted-on');
      $this->print_link('posted-on');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('byline').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('byline');
      $this->print_link('byline');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('cat-links').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('cat-links');
      $this->print_link('cat-links');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('tags-links').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('tags-links');
      $this->print_link('tags-links');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('edit-link').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('edit-link');
      $this->print_link('edit-link');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('more-link').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('more-link');
      $this->print_link('more-link');
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('nav-links').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('nav-links');
      $this->print_link('nav-links');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-h1-h6">';
      $this->open_table();
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('h1').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('h1',false);
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('h2').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('h2',false);
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('h3').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('h3',false);
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('h4').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('h4',false);
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('h5').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('h5',false);
      echo '<tr><td style="text-decoration:underline;">'
           .esc_html__('h6').'</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
      $this->print_font('h6',false);
      $this->close_table();
      echo '</div>';
      echo '</div>';
      $this->print_footer(260);
      $this->init_script('site-branding');
      echo '</div><div style="float:right;">';
      $this->print_boxes();
      echo '</div></div>';
  }

  function get_page() {
      echo '<div><div style="float:left">';
      $this->print_header('Pagination customization');
      echo '<div><div>';
      $this->add_tab('site');
      $this->add_tab('site-header');
      $this->add_tab('site-branding');
      $this->add_tab('site-content');
      $this->add_tab('content-area');
      $this->add_tab('widget-area');
      $this->add_tab('site-footer');
      $this->add_tab('site-info');
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-site">';
      $this->open_table();
      $this->print_div('site');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-site-header">';
      $this->open_table();
      $this->print_div('site-header');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-site-branding">';
      $this->open_table();
      $this->print_div('site-branding');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-site-content">';
      $this->open_table();
      $this->print_div('site-content');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-content-area">';
      $this->open_table();
      $this->print_col('content-area');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-widget-area">';
      $this->open_table();
      $this->print_col('widget-area');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-site-footer">';
      $this->open_table();
      $this->print_div('site-footer');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-site-info">';
      $this->open_table();
      $this->print_div('site-info');
      $this->close_table();
      echo '</div>';
      $this->print_footer();
      echo '</div>';
      $this->init_script('site');
      echo '</div><div style="float:right;">';
      $this->print_boxes();
      echo '</div></div>';
  }

  function get_menu() {
      $this->print_header('Menu customization');
      echo '<div style="margin-top:1em;"><div>';
      $this->add_tab('general');
      $this->add_tab('menu');
      $this->add_tab('submenus');
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-general">';
      $this->open_table();
      $this->print_input('font-family',
                         'other:font-family',
                         $this->style["other"]["font-family"],
                         '"font name" | font-name');
      $this->print_input('font-size',
                         'other:mfont-size',
                         $this->style["other"]["mfont-size"],
                         '2 (em)');
      $this->print_input('font-style',
                         'other:mfont-style',
                         $this->style["other"]["mfont-style"],
                         'normal | italic');
      $this->print_input('font-weight',
                         'other:mfont-weight',
                         $this->style["other"]["mfont-weight"],
                         'normal | bold | 300');
      $this->print_input('width',
                         'other:mwidth',
                         $this->style["other"]["mwidth"],
                         'auto | 300% | 900px');
      $this->print_input('padding',
                         'other:mpadding',
                         $this->style["other"]["mpadding"],
                         '1 (em)');
      $this->print_input('margin-top',
                         'other:mmargin-top',
                         $this->style["other"]["mmargin-top"],
                         'auto | 2% | 20px | 1em');
      $this->print_input('margin-right',
                         'other:mmargin-right',
                         $this->style["other"]["mmargin-right"],
                         'auto | 2% | 20px | 1em');
      $this->print_input('margin-bottom',
                         'other:mmargin-bottom',
                         $this->style["other"]["mmargin-bottom"],
                         'auto | 2% | 20px | 1em');
      $this->print_input('margin-left',
                         'other:mmargin-left',
                         $this->style["other"]["mmargin-left"],
                         'auto | 2% | 20px | 1em');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-menu">';
      $this->open_table();
      $this->print_input('color',
                         'other:mcolor',
                         $this->style["other"]["mcolor"],
                         'transparent | red | #cc58ed');
      $this->print_input('color:hover',
                         'other:mcolor-hover',
                         $this->style["other"]["mcolor-hover"],
                         'transparent | red | #cc58ed');
      $this->print_input('background-color',
                         'other:mbgcolor',
                         $this->style["other"]["mbgcolor"],
                         'transparent | red | #cc58ed');
      $this->print_input('background-color:hover',
                         'other:mbgcolor-hover',
                         $this->style["other"]["mbgcolor-hover"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-top-color',
                         'other:mborder-top-color',
                         $this->style["other"]["mborder-top-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-right-color',
                         'other:mborder-right-color',
                         $this->style["other"]["mborder-right-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-bottom-color',
                         'other:mborder-bottom-color',
                         $this->style["other"]["mborder-bottom-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-left-color',
                         'other:mborder-left-color',
                         $this->style["other"]["mborder-left-color"],
                         'transparent | red | #cc58ed');
      $this->close_table();
      echo '</div>';
      echo '<div class="calumma-tab-content" id ="calumma-tab-content-submenus">';
      $this->open_table();
      $this->print_input('color',
                         'other:smcolor',
                         $this->style["other"]["smcolor"],
                         'transparent | red | #cc58ed');
      $this->print_input('color:hover',
                         'other:smcolor-hover',
                         $this->style["other"]["smcolor-hover"],
                         'transparent | red | #cc58ed');
      $this->print_input('background-color',
                         'other:smbgcolor',
                         $this->style["other"]["smbgcolor"],
                         'transparent | red | #cc58ed');
      $this->print_input('background-color:hover',
                         'other:smbgcolor-hover',
                         $this->style["other"]["smbgcolor-hover"],
                         'transparent | red | #cc58ed');
      $this->print_input('border-color',
                         'other:smborder-color',
                         $this->style["other"]["smborder-color"],
                         'transparent | red | #cc58ed');
      $this->print_input('box-shadow',
                         'other:smshadow',
                         $this->style["other"]["smshadow"],
                         'none | 5px 5px 3px grey');
      $this->close_table();
      echo '</div>';
      echo '</div>';
      $this->print_footer();
      $this->init_script('general');
  }

  function get_resp() {
      $this->print_header('Responsive design customization');
      $this->open_table();
      $this->print_input('Minimal width for 2 columns',
                         'other:min-2col',
                         $this->style["other"]["min-2col"],
                         '768');
      $this->print_input('Minimal width for full design',
                         'other:min-full',
                         $this->style["other"]["min-full"],
                         '1024');
      $this->print_input('Padding left and right',
                         'other:rpadding',
                         $this->style["other"]["rpadding"],
                         '2%');
      $this->print_input('Content width',
                         'other:rcontent',
                         $this->style["other"]["rcontent"],
                         '63%');
      $this->print_input('Widget width',
                         'other:rwidget',
                         $this->style["other"]["rwidget"],
                         '35%');
      $this->close_table();
      $this->print_footer();
  }

  function get_css() {
      $this->print_header('Add css');
      echo esc_html__('Add your code here:').'<br />';
      echo '<textarea rows="25" cols="80" name="other:css">';
      echo  stripslashes(htmlspecialchars($this->style["other"]["css"]));
      echo '</textarea><br />';
      $this->print_footer();
  }

  function get_export() {
      echo '<h1>'.esc_html__('Export to text','calumma-custom').'</h1>';

      echo esc_html__('Copy/paste this string to keep your customization in a safe place:').'<br />';
      $json = json_encode($this->style);
echo '<pre>';
      echo chunk_split(base64_encode(gzcompress($json,9)),80,"\n");
      //print_r($this->style);
echo '</pre>';
  }

  function get_import() {
      $this->print_header('Import from text');
      echo esc_html__('Paste your saved string here:').'<br />';
      echo '<textarea rows="25" cols="80" name="import">';
      echo '</textarea><br />';
      $this->print_footer();
  }

}


function calumma_init() {
  new wp_calumma;
}

function calumma_admin() {
  wp_enqueue_style('calumma_admin_css',plugin_dir_url( __FILE__ ).'/admin.css');
}

add_action('plugins_loaded','calumma_init');
add_action('admin_print_styles','calumma_admin',11);  
?>
