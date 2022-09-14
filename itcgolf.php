
    <?php


// Ajax




add_action( 'init', 'sendEmail_script_enqueuer' );
function sendEmail_script_enqueuer() {
    wp_register_script( "marscodertech__sendEmail_script", WP_PLUGIN_URL.'/', array('jquery') );
    wp_localize_script( 'marscodertech__sendEmail_script', 'sendmarsAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'marscodertech__sendEmail_script' );

}
add_action("wp_ajax_marscodertech_itc_listing", "marscodertech_itc_listing");
add_action("wp_ajax_nopriv_marscodertech_itc_listing", "marscodertech_itc_listing");




function marscodertech_script() {
    ?>
    
    <script>
        
                                 jQuery(document).ready( function() {
                                    jQuery(".listing-submit").click( function(e) {
                                          
                                        area_code   = jQuery('#area_code').val();
                                        experience_level =  jQuery('#experience_level').val();
                                        desired_tee_box  = jQuery('#desired_tee_box').val();
                                       
                                        jQuery.ajax({
                                            type : "post",
                                            dataType : "json",
                                            url : sendmarsAjax.ajaxurl,
                                            data : 
                                            {
                                                action: "marscodertech_itc_listing", 
                                                area_code : area_code,
                                                experience_level: experience_level, 
                                                desired_tee_box: desired_tee_box
                                            },
                                            success: function(response) {
                            //                  
                                            }
           
                                        });

                                    });
                                });
        

        jQuery(document).ready( function() {

            jQuery.ajaxSetup({
                beforeSend: function() {
                    jQuery('#loader').show();
                },
                complete: function(){
                    jQuery('#loader').hide();
                },
                success: function() {}
            });

            jQuery('#success_msg').hide();
            jQuery('#alert_msg').hide();
            jQuery('#loader').hide();


        })
    </script>
    <?php
}

add_action( 'wp_footer', 'marscodertech_script' );









    add_shortcode( 'itcResults', 'itcFilter' );
    function itcFilter(){ ?>


        <!-- ======================================================================================== -->

        <!-- ITC GOLF Filter   Search  -->


        <!-- ======================================================================================== -->
        <section class="search-filter">
            <div class="row areas">
                <div class="col-md-3">
                    <label for="areacode">Area Code
                    <select id="area_code" class="form-group">
                        <option>Select</option>
                        <option>4220015</option>
                        <option>4220015</option>
                        <option>4220015</option>
                        <option>4220015</option>
                    </select>
                    </label>
                </div>  
                <div class="col-md-3">
                    <label for="experiencelevel">Experience Level
                    <select id="experience_level" class="form-group">
                        <option>Select</option>
                        <option>4220015</option>
                        <option>4220015</option>
                        <option>4220015</option>
                        <option>4220015</option>
                    </select>
                    </label>
                </div>  
                <div class="col-md-3">
                    <label for="desiredteebox">Desired Tee Box
                    <select id="desired_tee_box" class="form-group">
                        <option>Select</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                    </label>
                </div>
                <div class="col-md-3 search">
                    <input type="submit" value="Search" class="listing-submit">
                </div>

            </div>
           
           
                <?php
    }


    function marscodertech_itc_listing()
    {
      

        $meta_query = array();
       

        $args  =  [
            'post_type' => 'golf_list',

        ];
        if( isset($_POST['area_code']) )
        {
               
            $args['meta_query'][]  =  [
                'key'       => 'area_code',
                'value'     => isset( $_POST["area_code"] ) ? $_POST["area_code"]  : '',
                'compare'   => '=',
            ];

        }


        if( isset($_POST['experience_level']) )
        {
           
            $args['meta_query'][]  =  [
                'key'       => 'experience_level',
                'value'     => isset( $_POST["experience_level"] ) ? $_POST["experience_level"]  : '',
                'compare'   => '=',
            ];

        }



        if( isset($_POST['desired_tee_box']) )
        {
           
            $args['meta_query'][]  =  [
                'key'       => 'desired_tee_box',
                'value'     => isset( $_POST["desired_tee_box"] ) ? $_POST["desired_tee_box"]  : '',
                'compare'   => '=',
            ];

        }


        // $loop = new WP_Query( $args );
    ?>


<?php

   
            }

            ?>
