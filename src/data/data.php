<?php
/*
        This file will contain all the arrays of data that are used althroughout the enrollment system, editing the values within this file will change the output of the system, the following are the list of arrays places in this file:
            1. BANNER
            2. NAVIGATION BAR
            3. PROGRAM
            4. HELP
            5. CONTACT
            6. FOOTER
            7. POLICY
            8. SUMMARY ITEM 
            9. FORMS DATA
    */

/*
        1. BANNER
            a. Background Image
            b. Title
            c. Description Line 1
            d. Description Line 2
            e. Description Line 3
            f. Button 1
            g. Button 2
    */

$_banner_1 = [
    [
        /* a */
        'bg' => './src/assets/imgs/background/bg1.jpeg',
        /* b */ 'title' => 'Dock',
        /* c */ 'descline1' => 'Dock Cover En Roll University',
        /* d */ 'descline2' => 'INNOVATIVE UNDERGRADUATE PROGRAM',
        /* e */ 'descline3' => 'Now recruiting Frats Members',
        /* f */ 'btn1' => '<a href="./src/modules/signup.php" class="btn1">Sign Up</a>',
        /* g */ 'btn2' => '<a href="./src/modules/login.php>" class="btn3">Enroll Now!</a>'
    ],

    [
        /* a */
        'bg' => './src/assets/imgs/background/bg2.jpg',
        /* b */ 'title' => 'En Roll University',
        /* c */ 'descline1' => 'Dock Cover En Roll University',
        /* d */ 'descline2' => 'INNOVATIVE UNDERGRADUATE PROGRAM',
        /* e */ 'descline3' => 'Now recruiting Frats Members',
        /* f */ 'btn1' => '<a href="./src/modules/signup.php" class="btn1">Sign Up</a>',
        /* g */ 'btn2' => '<a href="./src/modules/login.php>" class="btn3">Enroll Now!</a>'
    ],

    [
        /* a */
        'bg' => './src/assets/imgs/background/bg3.jpg',
        /* b */ 'title' => 'Cover',
        /* c */ 'descline1' => 'Dock Cover En Roll University',
        /* d */ 'descline2' => 'INNOVATIVE UNDERGRADUATE PROGRAM',
        /* e */ 'descline3' => 'Now recruiting Frats Members',
        /* f */ 'btn1' => '<a href="./src/modules/signup.php" class="btn1">Sign Up</a>',
        /* g */ 'btn2' => '<a href="./src/modules/login.php>" class="btn3">Enroll Now!</a>'
    ],
];

/*
        2. NAVIGATION BAR
            a. Title
            b. Link
    */
$_navbar_1 = [
    [
        /* a */
        'title' => 'About',
        /* b */ 'link' => './src/modules/index/about.php'
    ],
    [
        /* a */
        'title' => 'Programs',
        /* b */ 'link' =>  './src/modules/index/programs.php'
    ],
    [
        /* a */
        'title' => 'Admission',
        /* b */ 'link' =>  './src/modules/index/admission.php'
    ],
    [
        /* a */
        'title' => 'Contact Us',
        /* b */ 'link' =>  './src/modules/index/contact_us.php'
    ],
];

$_navbar_2_student = [
    [
        /* a */
        'title' => 'Dashboard',
        /* b */ 'link' =>  './dashboard.php',
    ],
    [
        /* a */
        'title' => 'Application',
        /* b */ 'link' =>  './application.php',
    ],
    [
        /* a */
        'title' => 'Enrollment',
        /* b */ 'link' =>  './enrollment.php',
    ],
    [
        /* a */
        'title' => 'Profile',
        /* b */ 'link' =>  './profile.php',
    ],
    [
        /* a */
        'title' => 'Policy',
        /* b */ 'link' => './policy.php',
    ],
    [
        /* a */
        'title' => 'Help',
        /* b */ 'link' => './help.php',
    ],
    [
        /* a */
        'title' => 'Logout',
        /* b */ 'link' => '../../process/logout.php',
    ]
];

$_navbar_2_admin = [
    [
        /* a */
        'title' => 'Dashboard',
        /* b */ 'link' =>  './dashboard.php',
    ],
    [
        /* a */
        'title' => 'Application',
        /* b */ 'link' =>  './application.php',
    ],
    [
        /* a */
        'title' => 'Student List',
        /* b */ 'link' => './studentlist.php',
    ],
    [
        /* a */
        'title' => 'Profile',
        /* b */ 'link' => './admin_profile.php',
    ],

    [
        /* a */
        'title' => 'Policy',
        /* b */ 'link' => './policy.php',
    ],
    [
        /* a */
        'title' => 'Help',
        /* b */ 'link' => './help.php',
    ],
    [
        /* a */
        'title' => 'Logout',
        /* b */ 'link' => '../../process/logout.php',
    ]

];

/*
        3. PROGRAM
            a. Category
                a.1. Course Name
                a.2. Course Description
    */
$_program_1 = [
    /* a */
    'Computer Studies' => [
        [
            /* a.1. */
            'course_name' => 'Computer Science',
            /* a.1. */ 'course_description' => 'Explore the world of programming and algorithms.'
        ],
        [
            /* a.1. */
            'course_name' => 'Information Technology (IT)',
            /* a.1. */ 'course_description' => 'Focus on the application of technology to solve business problems.'
        ],
    ],

    /* a */ 'Business & Administration' => [
        [
            /* a.1. */
            'course_name' => 'Business Administration',
            /* a.1. */ 'course_description' => 'Learn about business strategies and management.'
        ],
        [
            /* a.1. */
            'course_name' => 'Economics',
            /* a.1. */ 'course_description' => 'Understand economic systems and principles.'
        ],
    ],

    /* a */ 'Engineering' => [
        [
            /* a.1. */
            'course_name' => 'Computer Engineering',
            /* a.1. */ 'course_description' => 'Design and develop computer systems and networks.'
        ],
        [
            /* a.1. */
            'course_name' => 'Civil Engineering',
            /* a.1. */ 'course_description' => 'Plan, design, and oversee construction projects.'
        ],
        [
            /* a.1. */
            'course_name' => 'Mechanical Engineering',
            /* a.1. */ 'course_description' => 'Explore the design and manufacturing of mechanical systems.'
        ],
    ],
];

/*
        4. HELP
            a. Title
            b. Description
            c. Item
                c.1. Item a
                c.2. Item b
                c.3. Item c
                c.4. Item d
                c.5. Item e
                c.6. Item f
                c.7. Item g
                c.8. Item h
                c.9. Item i
    */
$_help_1 = [
    [
        /* a */
        'title' => 'Signing In Your Account',
        /* b */ 'description' => 'To access your account, enter you login credentials for your created account and press "Login". If you do not own an account yet, you may click on the "Register an account" button or link to create one.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'Account Registration',
        /* b */ 'description' => 'If you are registering as a new user, click on the "Register" link. Fill out all the required information for creating an account:',
        /* c */ 'item' => [
            /* c.1. */
            '- First Name',
            /* c.2. */ '- Middle Initial (optional)',
            /* c.3. */ '- Last Name',
            /* c.4. */ '- Sex (M/F/O/Prefer not to say)',
            /* c.5. */ '- Age',
            /* c.6. */ '- Your Email or Username',
            /* c.7. */ '- Phone Number (Must be 11 digits and starts at 09-)',
            /* c.8. */ '- Password',
            /* c.9. */ '- Religion'
        ]
    ],
    [
        /* a */
        'title' => 'Account Registration for Parents or Guardians',
        /* b */ 'description' => 'The registration requires the same prerequisites as the student accounts. For registering an account for parents or guardians please fill out all of the required information:',
        /* c */ 'item' => [
            /* c.1. */
            '- Name',
            /* c.2. */ '- Address',
            /* c.3. */ '- Occupation',
            /* c.4. */ '- Status',
            /* c.5. */ '- Marital Status',
            /* c.6. */ '- Phone Number (Must be 11 digits and starts at -09)'
        ]
    ],
    [
        /* a */
        'title' => 'Password Strength',
        /* b */ 'description' => 'When creating a password, please ensure that it meets the following criteria:',
        /* c */ 'item' => [
            /* c.1. */
            '- At least 8 characters long or longer',
            /* c.2. */ '- Ensure it includes a mix of uppercase and lowercase letters',
            /* c.3. */ '- Ensure it contains at least one digit and one special symbol/character',
            /* c.4. */ '- Consider using a combination of uppercase and lowercase letters, along with numbers and special characters to enhance the security of your password.'
        ]
    ],
    [
        /* a */
        'title' => 'Forgot Password',
        /* b */ 'description' => 'If you forget your password, click on the "Forgot Password" link on the login page. Follow the instructions to reset your password through the email associated with your account. To reset your password, please follow these steps:',
        /* c */ 'item' => [
            /* c.1. */
            '- On the login page, click on the "Forgot Password" link',
            /* c.2. */ '- Enter the email address associated with your account',
            /* c.3. */ '- Check your email for the password reset link',
            /* c.4. */ '- Click on the link provided in the email',
            /* c.5. */ '- Follow the instructions on the reset page to create a new password',
            /* c.6. */ '- Log in with your new password'
        ]
    ],
    [
        /* a */
        'title' => 'Enrollment Procedure',
        /* b */ 'description' => 'To enroll, please follow these steps:',
        /* c */ 'item' => [
            /* c.1. */
            '- Log in to your created account or register if you are a new user',
            /* c.2. */ '- Once logged in, navigate to the "Enroll" section of the site',
            /* c.3. */ '- Provide all the required information such as your current year level and preferred program',
            /* c.4. */ '- Review your submitted prerequisites to ensure all the entered information correct',
            /* c.5. */ '- Click the "Submit" button to complete the enrollment process'
        ]
    ],
    [
        /* a */
        'title' => 'Required Information',
        /* b */ 'description' => 'During the enrollment process, you will be asked to provide the following information:',
        /* c */ 'item' => [
            '- Personal details, including your name, year level, program, and section',
            '- Your preferred mode of payment (full, monthly, annual)',
            '- A valid ID'
        ]
    ],
    [
        /* a */
        'title' => 'Important Things To Note',
        /* b */ 'description' => 'Take Note.',
        /* c */ 'item' => [
            /* c.1. */
            '- Please ensure all information provided is accurate and up-to-date',
            /* c.2. */ '- Always double-check your details before submitting to avoid any issues with your enrollment',
            /* c.3. */ '- Refrain from sharing any important or personal information such as passwords'
        ]
    ],
    [
        /* a */
        'title' => 'Enrollment Confirmation',
        /* b */ 'description' => 'After successfully submitting your enrollment, you will receive a confirmation message. Keep a record of this confirmation for future references',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'Assistance',
        /* b */ 'description' => 'For any issues or errors you may encounter during the registration and enrollment process, please reach out to our support team for assistance',
        /* c */ 'item' => []
    ]
];

/*
        5. CONTACT
            a. Title
            b. Paragraphs
                b.1. Location
                b.2. Phone
    */
$contact_1 = [
    /* a */
    'title' => 'DCERU',
    /* b */ 'paragraphs' => [
        /* b.1. */
        'Location: ',
        /* b.2. */ 'Phone: ',
    ]
];

/*
        6. FOOTER
            a. Copyright
            b. Signature
    */
$_copyright_1 = [
    [
        'copyright' => '© Copyright. BS501. 2023',
        'signature' => '01000010 01010011 01000011 01010011'
    ]
];

/*
        4. Policy
            a. Title
            b. Description
            c. Item
                c.1. Item a
                c.2. Item b
                c.3. Item c
                c.4. Item d
                c.5. Item e
                c.6. Item f
                c.7. Item g
                c.8. Item h
                c.9. Item i
    */
$_policy_1 = [
    [
        /* a */
        'title' => 'Information Collection',
        /* b */ 'description' => 'We collect personal information necessary for enrollment, including but not limited to:',
        /* c */ 'item' => [
            /* c.1. */
            '- First Name',
            /* c.2. */ '- Middle Initial (optional)',
            /* c.3. */ '- Last Name',
            /* c.4. */ '- Sex (M/F/O/Prefer not to say)',
            /* c.5. */ '- Age',
            /* c.6. */ '- Your Email or Username',
            /* c.7. */ '- Phone Number (Must be 11 digits and starts at 09-)',
            /* c.8. */ '- Password',
            /* c.9. */ '- Religion'
        ]
    ],
    [
        /* a */
        'title' => 'Use of Information',
        /* b */ 'description' => 'Your information is used solely for enrollment purposes. We do not share or sell your data to third parties for marketing purposes.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'Data Security',
        /* b */ 'description' => 'We employ industry-standard security measures to protect your information from unauthorized access, disclosure, alteration, and destruction.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'Third-Party Services',
        /* b */ 'description' => 'In some cases, we may use third-party services for enrollment. These services are bound by confidentiality agreements to protect your data.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'Cookies and Tracking',
        /* b */ 'description' => 'We may use cookies to enhance your experience. You can choose to disable cookies in your browser settings, but this may affect the functionality of our system.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'Data Retention',
        /* b */ 'description' => 'Your information is retained for the duration necessary to fulfill the enrollment process. Afterward, it is securely archived or permanently deleted.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'User Control',
        /* b */ 'description' => 'You have the right to review, update, or delete your personal information. Contact us through email for any requests.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'Changes to Policy',
        /* b */ 'description' => 'We reserve the right to update our policy. Changes will be communicated through our website or other appropriate channels.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'Compliance with Laws',
        /* b */ 'description' => 'We comply with all relevant data protection laws and regulations.',
        /* c */ 'item' => []
    ],
    [
        /* a */
        'title' => 'User Agreement',
        /* b */ 'description' => 'By using our online enrollment system, you agree to the terms outlined in this Privacy and Policy.',
        /* c */ 'item' => []
    ]
];


$_citizenship = [
    [
        /* a */
        'code' => 'none',
        /* b */ 'citizenship' => ''
    ],
    [
        /* a */
        'code' => 'ph',
        /* b */ 'citizenship' => 'Filipino'
    ],
    [
        /* a */
        'code' => 'ch',
        /* b */ 'citizenship' => 'Chinese'
    ],
    [
        /* a */
        'code' => 'jp',
        /* b */ 'citizenship' => 'Japanese'
    ],
    [
        /* a */
        'code' => 'usa',
        /* b */ 'citizenship' => 'Americas'
    ],
    [
        /* a */
        'code' => 'de',
        /* b */ 'citizenship' => 'German'
    ],
    [
        /* a */
        'code' => 'tr',
        /* b */ 'citizenship' => 'Turkish'
    ],
    [
        /* a */
        'code' => 'ca',
        /* b */ 'citizenship' => 'Canadian'
    ],
    [
        /* a */
        'code' => 'india',
        /* b */ 'citizenship' => 'Indian'
    ],
    [
        /* a */
        'code' => 'mx',
        /* b */ 'citizenship' => 'Mexican'
    ],
    [
        /* a */
        'code' => 'fr',
        /* b */ 'citizenship' => 'French'
    ],
    [
        /* a */
        'code' => 'ir',
        /* b */ 'citizenship' => 'Iranian'
    ],
    [
        /* a */
        'code' => 'kr',
        /* b */ 'citizenship' => 'Korean'
    ],
    [
        /* a */
        'code' => 'uk',
        /* b */ 'citizenship' => 'British'
    ],
    [
        /* a */
        'code' => 'esp',
        /* b */ 'citizenship' => 'Spanish'
    ],
    // popular ng countries. atleast 10-15
];

$_program = [
    [
        'code' => 'none',
        'program' => ''
    ],
    [
        'code' => 'bscs',
        'program' => 'Bachelor of Science in Computer Science'
    ],
    [
        'code' => 'psych',
        'program' => 'Bachelor of Science in Psychology'
    ],
    [
        'code' => 'bsit',
        'program' => 'BS in Information Technology'
    ],
    [
        'code' => 'bsis',
        'program' => 'BS in Information Systems'
    ],
    [
        'code' => 'it',
        'program' => '2-yr Infortmation Technology'
    ],
    [
        'code' => 'act',
        'program' => '2-yr Associate in Computer Technology'
    ],
    [
        'code' => 'bsba',
        'program' => 'BS in Business Administration'
    ],
    [
        'code' => 'bsa',
        'program' => 'BS in Accountancy'
    ],
    [
        'code' => 'bsais',
        'program' => 'BS in Accounting Information System'
    ],
    [
        'code' => 'bsma',
        'program' => 'BS in Management Accounting'
    ],
    [
        'code' => 'bsrtcs',
        'program' => 'BS in Retail Technology and Consumer Science'
    ],
    [
        'code' => 'art',
        'program' => '2-yr Associate in Retail Technology'
    ],
    [
        'code' => 'bshm',
        'program' => 'BS in Hospitality Management'
    ],
    [
        'code' => 'bscm',
        'program' => 'BS in Culinary Management'
    ],
    [
        'code' => 'hra',
        'program' => '3-yr Hotel and Restaurant Administration'
    ],
    [
        'code' => 'hrs',
        'program' => '2-yr Hospitality and Restaurant Services'
    ],
    [
        'code' => 'bstm',
        'program' => 'BS in Tourism Management'
    ],
    [
        'code' => 'tem',
        'program' => '2-yr Tourism and Events Management'
    ],
    [
        'code' => 'bscpe',
        'program' => 'BS in Computer Engineering'
    ],
    [
        'code' => 'bmma',
        'program' => 'Bachelor of Multimedia Arts'
    ],
    [
        'code' => 'bacomm',
        'program' => 'BA in Communication'
    ],
    [
        'code' => 'bsmt',
        'program' => 'Bachelor of Science in Marine Transportation'
    ],
    [
        'code' => 'bsmare',
        'program' => 'Bachelor of Science in Marine Engineering'
    ],
    [
        'code' => 'bsname',
        'program' => 'Bachelor of Science in Naval Architecture and Marine Engineering'
    ],
    //  atleast ung mga available sa sti page  
];

$_payment_type = [
    [
        /* a */
        'code' => 'none',
        /* b */ 'paymenttype' => ''
    ],
    [
        /* a */
        'code' => 'monthly',
        /* b */ 'paymenttype' => 'Monthly'
    ],
    [
        /* a */
        'code' => 'full',
        /* b */ 'paymenttype' => 'Full Payment'
    ],
];
