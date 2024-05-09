<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'my_framework';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => 'Theme Control',
    'menu_slug'  => 'theme-control',
    'menu_position'   =>  2,
    'ajax_save'       => true,
    'show_reset_all'  => false,
    'framework_title' => 'Theme Control',
    'theme'  => 'light',
    'footer_credit' => '<div style="background: #007cba; color: #fff; font-size: 17px; padding: 15px; text-align: center;">Developed By <a href="http://tritiyo.com" style="color: #fff; text-decoration: none;">Tritiyo Limited</a></div>',
  ) );



    // Custom


  CSF::createSection( $prefix, array(

    'title'  => 'General settings',
    'fields' => array(
      
      //Field Start

        array(
         'id'    => 'favicon',
         'type'  => 'media',
         'title' => 'Favicon',
         'url'   => false,
        ),

        array(
         'id'    => 'logo',
         'type'  => 'media',
         'title' => 'Upload Logo',
         'url'   => false,
    	  ),

        array(
         'id'    => 'phone',
         'type'  => 'text',
         'title' => 'Phone',     
        ),

        array(
         'id'    => 'email',
         'type'  => 'text',
         'title' => 'Email',     
        ),

        array(
         'id'    => 'address',
         'type'  => 'text',
         'title' => 'Address',     
        ),

        array(
         'id'    => 'skype',
         'type'  => 'text',
         'title' => 'Skype',     
        ),


        array(
         'id'    => 'fb_link',
         'type'  => 'text',
         'title' => 'Facebook Url',     
        ),

        array(
         'id'    => 'twitter_link',
         'type'  => 'text',
         'title' => 'Twitter Url',     
        ),

        array(
         'id'    => 'linkedin_link',
         'type'  => 'text',
         'title' => 'Linkedin Url',     
        ),

         array(
         'id'    => 'yt_link',
         'type'  => 'text',
         'title' => 'Youtube Url',     
        ),

         array(
         'id'    => 'instagram_link',
         'type'  => 'text',
         'title' => 'Instagram Url',     
        ),

        array(
         'id'    => 'header_button_url',
         'type'  => 'text',
         'title' => 'Header Button Url',     
        ),

         array(
         'id'    => 'header_button_label',
         'type'  => 'text',
         'title' => 'Header Button Label',     
        ),

        array(
         'id'    => 'footer_content',
         'type'  => 'textarea',
         'title' => 'Footer Content',     
        ),

        array(
         'id'    => 'footer_button_url',
         'type'  => 'text',
         'title' => 'Footer Button Url',     
        ),

         array(
         'id'    => 'footer_button_label',
         'type'  => 'text',
         'title' => 'Footer Button Label',     
        ),

        array(
         'id'    => 'copyright_text',
         'type'  => 'text',
         'title' => 'Footer Copyright Text',     
        ),

    )

     

  ));



  // Homepage

  CSF::createSection( $prefix, array(
  'id'    => 'homepage_fields',
  'title' => 'Homepage Section',
  'icon'  => 'fa fa-plus-circle',
  ) );

  //SubOption

  //Headline Section

  CSF::createsection( $prefix, array(
     'parent' => 'homepage_fields',
     'title'  =>'Our Speciality', //Second Section
     'fields' => array(

         array(
         'title'   => 'Title',
         'id'      => 'second_section_title',
         'type'    => 'text',
        //  'default' => 'Title',
         ), // End  title

         array(
         'title'   => 'Sub Title',
         'id'      => 'second_section_subtitle',
         'type'    => 'text',
        //  'default' => 'Sub Title',
         ), // End  title

         array(
           'id'    => 'second_section_page_id',
           'type'  => 'select',
           'multiple' => false,
           'title' =>  'Select page',
           'options' => 'pages',
           'chosen' => true,
           'width'  => '200px',
           'query_args' => array(
               'hide_empty' => false,
           ),
           //'desc'  => 'you can select multiple category',
         ), // End page

     ) // End field
  )); // End Section

  //Home Lead Section

  CSF::createSection( $prefix, array(
    'parent' => 'homepage_fields',
    'title'  => 'Industries', // Third section
    'fields' => array(      
       
       array(
         'title'   => 'Title',
         'id'      => 'third_section_title',
         'type'    => 'text',
         ), // End  title

         array(
         'title'   => 'Sub Title',
         'id'      => 'third_section_subtitle',
         'type'    => 'text',
         ), // End  title

        array(
         'title'   => 'Description',
         'id'      => 'third_section_desc',
         'type'    => 'textarea',
         ), // End  title

      ), // End field

  ));    // End Section


//Services Area
  
  CSF::createSection( $prefix, array(
    'parent' => 'homepage_fields',
    'title'  => 'Service section',
    'fields' => array(      
       
       array(
         'title'   => 'Title',
         'id'      => 'service_section_title',
         'type'    => 'text',
         ), // End  title

         array(
          'title'   => 'Sub Title',
          'id'      => 'service_section_subtitle',
          'type'    => 'text',
         ), // End  title

      ), // End field

  ));    // End Section



  






  // About Theme Section

  CSF::createSection( $prefix, array(

    'title'  => 'About Theme',
    'fields' => array(
      
      //Field Start

        array(
        'type'        => 'content',
        'content'     => '<strong>Theme name:</strong> News Rabbit',
        ),
        array(
        'type'        => 'subheading',
        'content'     => 'About Developer',
        ),
        
        array(
         'type' => 'content',
         'content' => '<strong>project Manager:</strong> Khalekuzzaman samrat'
        ),
        
         array(
         'type' => 'content',
         'content' => '<strong>Theme Developer:</strong> Noushad Nipun'
        ),

    ) // End field

     

  )); // End Section


}


?>