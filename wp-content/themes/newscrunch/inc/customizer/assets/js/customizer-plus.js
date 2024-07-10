(function($) {
    $( function() {
        if($("#toggle_hide_show_banner").val()== 'true')
        {
            /* =============================================================
            **    Left Banner
            ================================================================ */
            // Onload
            if($("#_customize-input-spncp_banner_left_overlay_options").val()=='custom')
            {
                $("#customize-control-spncp_banner_left1_gradient").hide();
                $("#customize-control-spncp_banner_left2_gradient").hide();
                $("#customize-control-spncp_banner_left_overlay").show();
                $("#customize-control-spncp_banner_left_color").show();
                if($("#toggle_spncp_banner_left_overlay").val() == 'false')
                {
                    $("#customize-control-spncp_banner_left_color").hide();
                }
            }
            else if($("#_customize-input-spncp_banner_left_overlay_options").val()=='gradient')
            {
                $("#customize-control-spncp_banner_left_overlay").hide();
                $("#customize-control-spncp_banner_left_color").hide();
                $("#customize-control-spncp_banner_left1_gradient").show();
                $("#customize-control-spncp_banner_left2_gradient").show();   
            }
            // Onchange
            $("#_customize-input-spncp_banner_left_overlay_options").change(function(){
            if($(this).val()=='gradient')
            {   
                $("#customize-control-spncp_banner_left_overlay").hide();
                $("#customize-control-spncp_banner_left_color").hide();
                $("#customize-control-spncp_banner_left1_gradient").show();
                $("#customize-control-spncp_banner_left2_gradient").show();
            }
            else if($(this).val()=='custom')
            { 
                $("#customize-control-spncp_banner_left1_gradient").hide();
                $("#customize-control-spncp_banner_left2_gradient").hide();
                $("#customize-control-spncp_banner_left_overlay").show();
                $("#customize-control-spncp_banner_left_color").show();
                if($("#toggle_spncp_banner_left_overlay").val() == 'false')
                {
                    $("#customize-control-spncp_banner_left_color").hide();
                }
            } 
        });


        /* =============================================================
        **    Center Banner Gradient Color
        ================================================================ */
        // onload
        if($("#_customize-input-spncp_banner_center_overlay_options").val()=='custom')
        {
            $("#customize-control-spncp_banner_center1_gradient").hide();
            $("#customize-control-spncp_banner_center2_gradient").hide();
            $("#customize-control-spncp_slider_overlay").show();
            $("#customize-control-spncp_cslider_color").show();
            if($("#toggle_spncp_slider_overlay").val() == 'false')
                {
                    $("#customize-control-spncp_cslider_color").hide();
                }
        }
        else if($("#_customize-input-spncp_banner_center_overlay_options").val()=='gradient')
        {
            $("#customize-control-spncp_slider_overlay").hide();
            $("#customize-control-spncp_cslider_color").hide();
            $("#customize-control-spncp_banner_center1_gradient").show();
            $("#customize-control-spncp_banner_center2_gradient").show();
        }
        // onchange
        $("#_customize-input-spncp_banner_center_overlay_options").change(function(){
            if($(this).val()=='gradient')
            {
                $("#customize-control-spncp_slider_overlay").hide();
                $("#customize-control-spncp_cslider_color").hide();
                $("#customize-control-spncp_banner_center1_gradient").show();
                $("#customize-control-spncp_banner_center2_gradient").show();
            }
            else if($(this).val()=='custom')
            {
                $("#customize-control-spncp_banner_center1_gradient").hide();
                $("#customize-control-spncp_banner_center2_gradient").hide();
                $("#customize-control-spncp_slider_overlay").show();
                $("#customize-control-spncp_cslider_color").show();
                if($("#toggle_spncp_slider_overlay").val() == 'false')
                {
                    $("#customize-control-spncp_cslider_color").hide();
                }
            } 
        });  

        /* =============================================================
        **    Right Banner
        ================================================================ */
        // onload
        if($("#_customize-input-spncp_banner_right_overlay_options").val()=='custom')
        {
            $("#customize-control-spncp_banner_right1_gradient").hide();
            $("#customize-control-spncp_banner_right2_gradient").hide();
            $("#customize-control-spncp_banner_right_overlay").show();
            $("#customize-control-spncp_banner_right_color").show();
            if($("#toggle_spncp_banner_right_overlay").val() == 'false')
                {
                    $("#customize-control-spncp_banner_right_color").hide();
                }
        }
        else if($("#_customize-input-spncp_banner_right_overlay_options").val()=='gradient')
        {
            $("#customize-control-spncp_banner_right_overlay").hide();
            $("#customize-control-spncp_banner_right_color").hide();
            $("#customize-control-spncp_banner_right1_gradient").show();
            $("#customize-control-spncp_banner_right2_gradient").show();
        }
        // onchange
        $("#_customize-input-spncp_banner_right_overlay_options").change(function(){
            if($(this).val()=='gradient')
            {  
                $("#customize-control-spncp_banner_right_overlay").hide();
                $("#customize-control-spncp_banner_right_color").hide();
                $("#customize-control-spncp_banner_right1_gradient").show();
                $("#customize-control-spncp_banner_right2_gradient").show();
            }
            else if($(this).val()=='custom')
            {   
                $("#customize-control-spncp_banner_right1_gradient").hide();
                $("#customize-control-spncp_banner_right2_gradient").hide();
                $("#customize-control-spncp_banner_right_overlay").show();
                $("#customize-control-spncp_banner_right_color").show();
                if($("#toggle_spncp_banner_right_overlay").val() == 'false')
                {
                    $("#customize-control-spncp_banner_right_color").hide();
                }
            } 
        });
        }

        /* =============================================================
        **    Banner Toggle ON/OFF
        ================================================================ */
        $("#toggle_hide_show_banner").click(function(){
           if($(this).is(':checked'))
           {
                /* =============================================================
                *    Left Banner
                ================================================================ */
                if( $("#_customize-input-spncp_banner_left_overlay_options").val() == 'custom')
                {
                    $("#customize-control-spncp_banner_left1_gradient").delay(500000).hide();
                    $("#customize-control-spncp_banner_left2_gradient").delay(500000).hide();
                    $("#customize-control-spncp_banner_left_overlay").show();
                    $("#customize-control-spncp_banner_left_color").show();
                    if($("#toggle_spncp_banner_left_overlay").val() == 'false')
                    {
                        $("#customize-control-spncp_banner_left_color").delay(500000).hide();
                    }
                }
                else if($("#_customize-input-spncp_banner_left_overlay_options").val() == 'gradient')
                {
                    $("#customize-control-spncp_banner_left_overlay").delay(500000).hide();
                    $("#customize-control-spncp_banner_left_color").delay(500000).hide();
                    $("#customize-control-spncp_banner_left1_gradient").show();
                    $("#customize-control-spncp_banner_left2_gradient").show();
                }

                /* =============================================================
                *    Center Banner
                ================================================================ */
                if($("#_customize-input-spncp_banner_center_overlay_options").val()=='custom')
                {
                    $("#customize-control-spncp_banner_center1_gradient").delay(500000).hide();
                    $("#customize-control-spncp_banner_center2_gradient").delay(500000).hide();
                    $("#customize-control-spncp_slider_overlay").show();
                    $("#customize-control-spncp_cslider_color").show();
                    if($("#toggle_spncp_slider_overlay").val() == 'false')
                        {
                            $("#customize-control-spncp_cslider_color").delay(500000).hide();
                        }
                }
                else if($("#_customize-input-spncp_banner_center_overlay_options").val()=='gradient')
                {
                    $("#customize-control-spncp_slider_overlay").delay(500000).hide();
                    $("#customize-control-spncp_cslider_color").delay(500000).hide();
                    $("#customize-control-spncp_banner_center1_gradient").show();
                    $("#customize-control-spncp_banner_center2_gradient").show();
                }

                /* =============================================================
                *    Right Banner
                ================================================================ */
                if($("#_customize-input-spncp_banner_right_overlay_options").val()=='custom')
                {
                    $("#customize-control-spncp_banner_right1_gradient").delay(500000).hide();
                    $("#customize-control-spncp_banner_right2_gradient").delay(500000).hide();
                    $("#customize-control-spncp_banner_right_overlay").show();
                    $("#customize-control-spncp_banner_right_color").show();
                    if($("#toggle_spncp_banner_right_overlay").val() == 'false')
                        {
                            $("#customize-control-spncp_banner_right_color").delay(500000).hide();
                        }
                }
                else if($("#_customize-input-spncp_banner_right_overlay_options").val()=='gradient')
                {
                    $("#customize-control-spncp_banner_right_overlay").delay(500000).hide();
                    $("#customize-control-spncp_banner_right_color").delay(500000).hide();
                    $("#customize-control-spncp_banner_right1_gradient").show();
                    $("#customize-control-spncp_banner_right2_gradient").show();
                }
                

                $("#_customize-input-spncp_banner_left_overlay_options").change(function(){
                if($(this).val()=='gradient')
                {   
                    $("#customize-control-spncp_banner_left_overlay").hide();
                    $("#customize-control-spncp_banner_left_color").hide();
                    $("#customize-control-spncp_banner_left1_gradient").show();
                    $("#customize-control-spncp_banner_left2_gradient").show();
                }
                else if($(this).val()=='custom')
                { 
                    $("#customize-control-spncp_banner_left1_gradient").hide();
                    $("#customize-control-spncp_banner_left2_gradient").hide();
                    $("#customize-control-spncp_banner_left_overlay").show();
                    $("#customize-control-spncp_banner_left_color").show();
                    if($("#toggle_spncp_banner_left_overlay").val() == 'false')
                    {
                        $("#customize-control-spncp_banner_left_color").hide();
                    }
                } 
            });

            $("#_customize-input-spncp_banner_center_overlay_options").change(function(){
            if($(this).val()=='gradient')
            {
                $("#customize-control-spncp_slider_overlay").hide();
                $("#customize-control-spncp_cslider_color").hide();
                $("#customize-control-spncp_banner_center1_gradient").show();
                $("#customize-control-spncp_banner_center2_gradient").show();
            }
            else if($(this).val()=='custom')
            {
                $("#customize-control-spncp_banner_center1_gradient").hide();
                $("#customize-control-spncp_banner_center2_gradient").hide();
                $("#customize-control-spncp_slider_overlay").show();
                $("#customize-control-spncp_cslider_color").show();
                if($("#toggle_spncp_slider_overlay").val() == 'false')
                {
                    $("#customize-control-spncp_cslider_color").hide();
                }
            } 
            });  

            $("#_customize-input-spncp_banner_right_overlay_options").change(function(){
            if($(this).val()=='gradient')
            {  
                $("#customize-control-spncp_banner_right_overlay").hide();
                $("#customize-control-spncp_banner_right_color").hide();
                $("#customize-control-spncp_banner_right1_gradient").show();
                $("#customize-control-spncp_banner_right2_gradient").show();
            }
            else if($(this).val()=='custom')
            {   
                $("#customize-control-spncp_banner_right1_gradient").hide();
                $("#customize-control-spncp_banner_right2_gradient").hide();
                $("#customize-control-spncp_banner_right_overlay").show();
                $("#customize-control-spncp_banner_right_color").show();
                if($("#toggle_spncp_banner_right_overlay").val() == 'false')
                {
                    $("#customize-control-spncp_banner_right_color").hide();
                }
            } 
            });
           }

           else{
                $("#customize-control-spncp_banner_left_overlay").hide();
                $("#customize-control-spncp_banner_left_color").hide();
                $("#customize-control-spncp_banner_left1_gradient").hide();
                $("#customize-control-spncp_banner_left2_gradient").hide();
                $("#customize-control-spncp_slider_overlay").hide();
                $("#customize-control-spncp_cslider_color").hide();
                $("#customize-control-spncp_banner_center1_gradient").hide();
                $("#customize-control-spncp_banner_center2_gradient").hide();
                $("#customize-control-spncp_banner_right_overlay").hide();
                $("#customize-control-spncp_banner_right_color").hide();
                $("#customize-control-spncp_banner_right1_gradient").hide();
                $("#customize-control-spncp_banner_right2_gradient").hide();
           }
        });         
       

        /* =============================================================
            *      Autoload Script Left Side Topbar
        ================================================================ */
        if($("#_customize-input-color_options").val()=='custom')
        {
            $("#customize-control-gradient_color_enable").hide();
            $("#customize-control-gradient_left_color").hide();
            $("#customize-control-gradient_right_color").hide();
            $("#customize-control-custom_color_enable").show();
            $("#customize-control-link_color").show();
        }
        else if($("#_customize-input-color_options").val()=='gradient')
        {
            $("#customize-control-custom_color_enable").hide();
            $("#customize-control-link_color").hide();
            $("#customize-control-gradient_color_enable").show();
            $("#customize-control-gradient_left_color").show();
            $("#customize-control-gradient_right_color").show();
        }


        $("#_customize-input-color_options").change(function(){
            if($(this).val()=='gradient')
            {
            $("#customize-control-custom_color_enable").hide();
            $("#customize-control-link_color").hide();
            $("#customize-control-gradient_color_enable").show();
            $("#customize-control-gradient_left_color").show();
            $("#customize-control-gradient_right_color").show();
            }
            else if($(this).val()=='custom')
            {
            $("#customize-control-gradient_color_enable").hide();
            $("#customize-control-gradient_left_color").hide();
            $("#customize-control-gradient_right_color").hide();
            $("#customize-control-custom_color_enable").show();
            $("#customize-control-link_color").show();
            } 
        });
        /* =============================================================
            *   Onclick Script Left Side Topbar
        ================================================================ */
        $( '#input_contatc_info_section_tab .newscrunch-customizer-tab > label' ).on(
            'click', function () {       
            if($("#_customize-input-top_left_variation").val()=='left_1' && $(this).text()=='GeneralGeneral')
            {
                //General Tabs for Date Time
                $("#customize-control-hide_show_date").show(); 
                $("#customize-control-hide_show_time").show();
                $("#customize-control-hide_show_left_social_icons").hide();
                $("#customize-control-topbar_left_social_icons").hide();
                $("#customize-control-hide_show_left_trending").hide();
                $("#customize-control-spnc_left_trending").hide();
            }
            else if($("#_customize-input-top_left_variation").val()=='left_1' && $(this).text()=='StyleStyle')
            {
               //Style Tabs For Date Time
                $("#customize-control-hide_show_date_time_color").show();
                $("#customize-control-date_color").show();
                $("#customize-control-time_color").show();
                $("#customize-control-hide_show_left_social_icon_color").hide();
                $("#customize-control-left_social_icon_color").hide();
                $("#customize-control-left_social_icon_hover_color").hide();
                $("#customize-control-left_social_icon_bg_color").hide();
                $("#customize-control-left_social_icon_bg_hover_color").hide();
                $("#customize-control-hide_show_left_trend").hide();
                $("#customize-control-hide_show_left_trend_title_color").hide();
                $("#customize-control-hide_show_left_trend_post_color").hide(); 
            }

            else if($("#_customize-input-top_left_variation").val()=='left_2' && $(this).text()=='GeneralGeneral')
            {
                //General Tabs For Social Icons
                $("#customize-control-hide_show_left_social_icons").show();
                $("#customize-control-topbar_left_social_icons").show();
                $("#customize-control-hide_show_date").hide();  
                $("#customize-control-hide_show_time").hide(); 
                $("#customize-control-hide_show_left_trending").hide();
                $("#customize-control-spnc_left_trending").hide();
            }
            else if($("#_customize-input-top_left_variation").val()=='left_2' && $(this).text()=='StyleStyle')
            {
                //Style Tabs For Social Icons
                $("#customize-control-hide_show_left_social_icon_color").show();
                $("#customize-control-left_social_icon_color").show();
                $("#customize-control-left_social_icon_hover_color").show();
                $("#customize-control-left_social_icon_bg_color").show();
                $("#customize-control-left_social_icon_bg_hover_color").show();
                $("#customize-control-hide_show_date_time_color").hide(); 
                $("#customize-control-date_color").hide();
                $("#customize-control-time_color").hide();
                $("#customize-control-hide_show_left_trend").hide();
                $("#customize-control-hide_show_left_trend_title_color").hide();
                $("#customize-control-hide_show_left_trend_post_color").hide();
            }


            else if($("#_customize-input-top_left_variation").val()=='left_3' && $(this).text()=='GeneralGeneral')
            {
                //General Tabs For Trending Post
                $("#customize-control-hide_show_left_trending").show();
                $("#customize-control-spnc_left_trending").show(); 
                $("#customize-control-hide_show_left_social_icons").hide();
                $("#customize-control-topbar_left_social_icons").hide(); 
                $("#customize-control-hide_show_date").hide(); 
                $("#customize-control-hide_show_time").hide();
            }
            else if($("#_customize-input-top_left_variation").val()=='left_3' && $(this).text()=='StyleStyle')
            {
                //Style Tabs For Trending Post
                $("#customize-control-hide_show_left_trend").show();
                $("#customize-control-hide_show_left_trend_title_color").show();
                $("#customize-control-hide_show_left_trend_post_color").show();
                $("#customize-control-hide_show_left_social_icon_color").hide();
                $("#customize-control-left_social_icon_color").hide();
                $("#customize-control-left_social_icon_hover_color").hide();
                $("#customize-control-left_social_icon_bg_color").hide();
                $("#customize-control-left_social_icon_bg_hover_color").hide();
                $("#customize-control-hide_show_date_time_color").hide(); 
                $("#customize-control-date_color").hide();
                $("#customize-control-time_color").hide();              
            }

            else if($("#_customize-input-top_left_variation").val()=='left_4' && $(this).text()=='GeneralGeneral')
            {
                //General Tabs For Date With Social Icons
                $("#customize-control-hide_show_left_social_icons").show();
                $("#customize-control-topbar_left_social_icons").show(); 
                $("#customize-control-hide_show_date").show(); 
                $("#customize-control-hide_show_time").show(); 
                $("#customize-control-hide_show_left_trending").hide();
                $("#customize-control-spnc_left_trending").hide();  
            }
            else if($("#_customize-input-top_left_variation").val()=='left_4' && $(this).text()=='StyleStyle')
            {
                //Style Tabs For Date With Social Icons
                $("#customize-control-hide_show_left_social_icon_color").show();
                $("#customize-control-left_social_icon_color").show();
                $("#customize-control-left_social_icon_hover_color").show();
                $("#customize-control-left_social_icon_bg_color").show();
                $("#customize-control-left_social_icon_bg_hover_color").show();
                $("#customize-control-hide_show_date_time_color").show();
                $("#customize-control-date_color").show();
                $("#customize-control-time_color").show();
                $("#customize-control-hide_show_left_trend").hide();
                $("#customize-control-hide_show_left_trend_title_color").hide();
                $("#customize-control-hide_show_left_trend_post_color").hide();
            }
       
        });


        /* =============================================================
            *   Onclick Script Right Side Topbar
        ================================================================ */
        $( '#input_social_icon_section_tab .newscrunch-customizer-tab > label' ).on(
            'click', function () {       
            if($("#_customize-input-top_right_variation").val()=='right_1' && $(this).text()=='GeneralGeneral')
            {
                //General Tabs for Date Time
                $("#customize-control-hide_show_right_date").show();
                $("#customize-control-hide_show_right_time").show();
                $("#customize-control-hide_show_social_icons").hide();
                $("#customize-control-social_icons").hide();
                $("#customize-control-spnc_right_trending").hide();
                $("#customize-control-hide_show_right_trending").hide();
            }
            else if($("#_customize-input-top_right_variation").val()=='right_1' && $(this).text()=='StyleStyle')
            {
               //Style Tabs For Date Time
                $("#customize-control-hide_show_right_date_time_color").show();
                $("#customize-control-right_date_color").show();
                $("#customize-control-right_time_color").show();

                $("#customize-control-hide_show_social_icon_color").hide();
                $("#customize-control-social_icon_color").hide(); 
                $("#customize-control-social_icons").hide(); 
                $("#customize-control-social_icon_hover_color").hide();
                $("#customize-control-social_icon_bg_color").hide();
                $("#customize-control-social_icon_bg_hover_color").hide();

                $("#customize-control-hide_show_right_trend").hide();
                $("#customize-control-hide_show_right_trend_title_color").hide();
                $("#customize-control-hide_show_right_trend_post_color").hide(); 
            }

            else if($("#_customize-input-top_right_variation").val()=='right_2' && $(this).text()=='GeneralGeneral')
            {
                //General Tabs For Social Icons
                $("#customize-control-hide_show_social_icons").show(); 
                $("#customize-control-social_icons").show();  
                $("#customize-control-hide_show_right_date").hide(); 
                $("#customize-control-hide_show_right_time").hide(); 
                $("#customize-control-spnc_right_trending").hide();
                $("#customize-control-hide_show_right_trending").hide();
            }
            else if($("#_customize-input-top_right_variation").val()=='right_2' && $(this).text()=='StyleStyle')
            {
                //Style Tabs For Social Icons
                $("#customize-control-hide_show_social_icon_color").show();
                $("#customize-control-social_icon_color").show(); 
                
                $("#customize-control-social_icon_hover_color").show();
                $("#customize-control-social_icon_bg_color").show();
                $("#customize-control-social_icon_bg_hover_color").show();

                 $("#customize-control-hide_show_right_date_time_color").hide();
                $("#customize-control-right_date_color").hide() ;
                $("#customize-control-right_time_color").hide();

                $("#customize-control-hide_show_right_trend").hide();
                $("#customize-control-hide_show_right_trend_title_color").hide();
                $("#customize-control-hide_show_right_trend_post_color").hide(); 
            }


            else if($("#_customize-input-top_right_variation").val()=='right_3' && $(this).text()=='GeneralGeneral')
            {
                //General Tabs For Trending Post
                $("#customize-control-hide_show_right_trending").show();
                $("#customize-control-spnc_right_trending").show();
                $("#customize-control-hide_show_social_icons").hide(); 
                $("#customize-control-social_icons").hide();  
                $("#customize-control-hide_show_right_date").hide(); 
                $("#customize-control-hide_show_right_time").hide();
            }
            else if($("#_customize-input-top_right_variation").val()=='right_3' && $(this).text()=='StyleStyle')
            {
                //Style Tabs For Trending Post
                $("#customize-control-hide_show_right_trend").show();
                $("#customize-control-hide_show_right_trend_title_color").show();
                $("#customize-control-hide_show_right_trend_post_color").show();
                
                $("#customize-control-hide_show_social_icon_color").hide();
                $("#customize-control-social_icon_color").hide();
                $("#customize-control-social_icons").hide(); 
                $("#customize-control-social_icon_hover_color").hide();
                $("#customize-control-social_icon_bg_color").hide();
                $("#customize-control-social_icon_bg_hover_color").hide();

                $("#customize-control-hide_show_right_date_time_color").hide();
                $("#customize-control-right_date_color").hide();
                $("#customize-control-right_time_color").hide();              
            }

            else if($("#_customize-input-top_right_variation").val()=='right_4' && $(this).text()=='GeneralGeneral')
            {
                //General Tabs For Date With Social Icons
                $("#customize-control-hide_show_social_icons").show(); 
                $("#customize-control-social_icons").show();  
                $("#customize-control-hide_show_right_date").show(); 
                $("#customize-control-hide_show_right_time").show(); 
                $("#customize-control-spnc_right_trending").hide();
                $("#customize-control-hide_show_right_trending").hide();
            }
            else if($("#_customize-input-top_right_variation").val()=='right_4' && $(this).text()=='StyleStyle')
            {
                //Style Tabs For Date With Social Icons
                $("#customize-control-hide_show_right_trend").hide();
                $("#customize-control-hide_show_right_trend_title_color").hide();
                $("#customize-control-hide_show_right_trend_post_color").hide();
                $("#customize-control-hide_show_social_icon_color").show();
                $("#customize-control-social_icon_color").show();
                $("#customize-control-social_icon_hover_color").show();
                $("#customize-control-social_icon_bg_color").show();
                $("#customize-control-social_icon_bg_hover_color").show();
                $("#customize-control-right_date_color").show();
                $("#customize-control-right_time_color").show();
            }
       
        });

         /* =============================================================
            *      Autoload Script Left Side Topbar
        ================================================================ */
        if($("#_customize-input-top_left_variation").val()=='left_1')
        {
            $("#customize-control-hide_show_date").show(); 
            $("#customize-control-hide_show_time").show();
            $("#customize-control-hide_show_left_social_icons").hide();
            $("#customize-control-topbar_left_social_icons").hide();
            $("#customize-control-hide_show_left_trending").hide();
            $("#customize-control-spnc_left_trending").hide();
        }
        else if($("#_customize-input-top_left_variation").val()=='left_2')
        {
            $("#customize-control-hide_show_left_social_icons").show();
            $("#customize-control-topbar_left_social_icons").show();
            $("#customize-control-hide_show_date").hide();
            $("#customize-control-hide_show_time").hide();
            $("#customize-control-hide_show_left_trending").hide();
            $("#customize-control-spnc_left_trending").hide();
        }
        else if($("#_customize-input-top_left_variation").val()=='left_3')
        {
            $("#customize-control-hide_show_left_trending").show();
            $("#customize-control-spnc_left_trending").show(); 
            $("#customize-control-hide_show_left_social_icons").hide();
            $("#customize-control-topbar_left_social_icons").hide();
            $("#customize-control-hide_show_date").hide();
            $("#customize-control-hide_show_time").hide();
        }
        else if($("#_customize-input-top_left_variation").val()=='left_4')
        {
            $("#customize-control-hide_show_left_social_icons").show();
            $("#customize-control-topbar_left_social_icons").show();
            $("#customize-control-hide_show_date").show();
            $("#customize-control-hide_show_time").show();
             $("#customize-control-hide_show_left_trending").hide();
            $("#customize-control-spnc_left_trending").hide();
        }


         /* =============================================================
            *      Autoload Script Right Side Topbar
        ================================================================ */
        if($("#_customize-input-top_right_variation").val()=='right_1')
        {
            //Date Time   
            $("#customize-control-hide_show_right_date").show();
            $("#customize-control-hide_show_right_time").show();
            $("#customize-control-hide_show_social_icons").hide();
            $("#customize-control-social_icons").hide(); 
            $("#customize-control-spnc_right_trending").hide();
            $("#customize-control-hide_show_right_trending").hide();
        }
        else if($("#_customize-input-top_right_variation").val()=='right_2')
        {
            //Social Icons
            $("#customize-control-hide_show_social_icons").show(); 
            $("#customize-control-social_icons").show();  
            $("#customize-control-hide_show_right_date").hide(); 
            $("#customize-control-hide_show_right_time").hide(); 
            $("#customize-control-spnc_right_trending").hide(); 
            $("#customize-control-hide_show_right_trending").hide();           
        }
        else if($("#_customize-input-top_right_variation").val()=='right_3')
        {
            //Trending Post
            $("#customize-control-hide_show_right_trending").show();
            $("#customize-control-spnc_right_trending").show(); 
            $("#customize-control-hide_show_social_icons").hide(); 
            $("#customize-control-social_icons").hide();  
            $("#customize-control-hide_show_right_date").hide(); 
            $("#customize-control-hide_show_right_time").hide();
        }
        else if($("#_customize-input-top_right_variation").val()=='right_4')
        {
            //Date With Social Icons
            $("#customize-control-hide_show_social_icons").show(); 
            $("#customize-control-social_icons").show();  
            $("#customize-control-hide_show_right_date").show(); 
            $("#customize-control-hide_show_right_time").show(); 
            $("#customize-control-spnc_right_trending").hide();
            $("#customize-control-hide_show_right_trending").hide();
        }


        /* =============================================================
            *      Customizer Script Left Side Topbar
        ================================================================ */
        wp.customize('top_left_variation', function(control) {
        control.bind(function( spncp_top_left ) 
        {
            if(spncp_top_left=='left_1')
            {   
                $("#customize-control-hide_show_date").show();
                $("#customize-control-hide_show_time").show();
                $("#customize-control-hide_show_left_social_icons").hide();
                $("#customize-control-topbar_left_social_icons").hide();
                $("#customize-control-hide_show_left_trending").hide();
                $("#customize-control-spnc_left_trending").hide();
            }
            else if(spncp_top_left=='left_2')
            {
                $("#customize-control-hide_show_left_social_icons").show();
                $("#customize-control-topbar_left_social_icons").show();
                $("#customize-control-hide_show_date").hide();
                $("#customize-control-hide_show_time").hide();
                $("#customize-control-hide_show_left_trending").hide();
                $("#customize-control-spnc_left_trending").hide();
            }
            else if(spncp_top_left=='left_3')
            {
                $("#customize-control-hide_show_left_trending").show();
                $("#customize-control-spnc_left_trending").show();
                 $("#customize-control-hide_show_left_social_icons").hide();
                $("#customize-control-topbar_left_social_icons").hide();
                $("#customize-control-hide_show_date").hide();
                $("#customize-control-hide_show_time").hide();
             }
            else if(spncp_top_left=='left_4')
            {
                //General Tabs
                $("#customize-control-hide_show_left_social_icons").show();
                $("#customize-control-topbar_left_social_icons").show();
                $("#customize-control-hide_show_date").show();
                $("#customize-control-hide_show_time").show();
                $("#customize-control-hide_show_left_trending").hide();
                $("#customize-control-spnc_left_trending").hide();
            }
        });
        });



        /* =============================================================
            *      Customizer Script Right Side Topbar
        ================================================================ */
    
        wp.customize('top_right_variation', function(control) {
        control.bind(function( spncp_right_side ) 
        {    
            if(spncp_right_side=='right_1')
            {
                //Date Time   
                $("#customize-control-hide_show_right_date").show();  
                $("#customize-control-hide_show_right_time").show(); 
                $("#customize-control-hide_show_social_icons").hide();
                $("#customize-control-social_icons").hide();
                $("#customize-control-spnc_right_trending").hide()
                $("#customize-control-hide_show_right_trending").hide();
            }
            
            else if(spncp_right_side=='right_2')
            {
                //Social Icons
                $("#customize-control-hide_show_social_icons").show(); 
                $("#customize-control-social_icons").show();  
                $("#customize-control-hide_show_right_date").hide(); 
                $("#customize-control-hide_show_right_time").hide(); 
                $("#customize-control-spnc_right_trending").hide();
                $("#customize-control-hide_show_right_trending").hide();
            }
            
            else if(spncp_right_side=='right_3')
            {
                //Trending Post
                $("#customize-control-hide_show_right_trending").show();
                $("#customize-control-spnc_right_trending").show();
                $("#customize-control-hide_show_social_icons").hide(); 
                $("#customize-control-social_icons").hide();  
                $("#customize-control-hide_show_right_date").hide(); 
                $("#customize-control-hide_show_right_time").hide(); 
            }
            else if(spncp_right_side=='right_4')
            {
                //Date With Social Icons
                $("#customize-control-hide_show_social_icons").show(); 
                $("#customize-control-social_icons").show();  
                $("#customize-control-hide_show_right_date").show(); 
                $("#customize-control-hide_show_right_time").show(); 
                $("#customize-control-spnc_right_trending").hide();
                $("#customize-control-hide_show_right_trending").hide();
            }
        });
        });


        //Auto-Load Advance scroll to top
        if($("#customize-control-scroll_to_top_position #_customize-input-scroll_to_top_position-radio-right").is(':checked')) 
        {
            $('#customize-control-scroll_to_top_margin_left').hide();
            $("#customize-control-scroll_to_top_margin_right").show();
        }
        else
        {
            $('#customize-control-scroll_to_top_margin_left').show();
            $("#customize-control-scroll_to_top_margin_right").hide();
        }

        //Click Event Advance scroll to top
        $("#customize-control-scroll_to_top_position input").click(function(){
            if($(this).attr('id')==='_customize-input-scroll_to_top_position-radio-right')
            {
                $('#customize-control-scroll_to_top_margin_left').hide();
                $("#customize-control-scroll_to_top_margin_right").show();
            }
            else
            {
                $('#customize-control-scroll_to_top_margin_left').show();
                $("#customize-control-scroll_to_top_margin_right").hide();
            }
      });

    });
})(jQuery)