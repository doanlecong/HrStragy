<?php
return [
    'admin'  => 'Administrator',
    'job_company_location' => 'Job-Company-Category-Location-Manager',
    'story_service' => 'Story-Service-Manager',
    'candidate_guest' => 'Candidates-Guest-Contact-Manager',
    'mail_sub_contact_us' => 'Contact-Mail-Subscriber-Manager',
    'cooperate_company_info' => 'Cooperate-Company-Info-Manager',
    //////////////////////////////////////////////////
    /// Get Status to Store
    /// //////////////////////////////////////////////
    'statusActive' => 'Y',
    'statusDisable' => 'N',

    //////////////////////////////////////////////////
    /// For name to display
    /// //////////////////////////////////////////////
    'Y' => 'Active',
    'N' => 'InActive',

    'readY' => 'Đã Đọc',
    'readN' => 'Chưa Đọc',
    //////////////////////////////////////////////////
    /// Direction UP/Down
    ///
    'down' => 1,
    'up'=> 2,

    // array Image file that accept to show

    'image_types' => ['png', 'jpg', 'jpeg', 'bmp', 'gif'],


    'type_display_job' => 'created_time', // or 2 options : 'created_time' or 'time_end_job' :if set this , job will be displayed to the time that job is lasted to
    'limit_number_job_on_homepage' => 10, // you can set any positive number but should not be too large ( may be between 10 and 30 . I think ...)
    // Thông tin giới tính
    'sex_0' => '',
    'sex_1' => 'Nam',
    'sex_2' => 'Nữ',
    'sex_3' => 'Nam & Nữ',


    // Image Slider In Wellcome Page
    'image_slider_1' => 'images/handshake-min.jpg',
    'image_slider_2' => 'images/Candidates.jpg',
    'image_slider_3' => 'images/employer-min.jpg',

];