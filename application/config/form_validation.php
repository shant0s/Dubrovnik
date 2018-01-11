<?php

$config = [

    'rent_rules' => [
        [
            'field' => 'fname',
            'label' => 'Firstname',
            'rules' => 'required'
        ],
        [
            'field' => 'lname',
            'label' => 'Lastname',
            'rules' => 'required'
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
        ],
        [
            'field' => 'phone',
            'label' => 'Phone Number',
            'rules' => 'required'
        ],
        [
            'field' => 'pickupAddress',
            'label' => 'Pick Up Address',
            'rules' => 'required'
        ],
        [
            'field' => 'dropoffAddress',
            'label' => 'Drop Off Address',
            'rules' => 'required'
        ],
        [
            'field' => 'date',
            'label' => 'Pick Up Date',
            'rules' => 'required'
        ],
        [
            'field' => 'pickupTime',
            'label' => 'Pick Up Time',
            'rules' => 'required'
        ],
        [
            'field' => 'vehicleType',
            'label' => 'Vehicle',
            'rules' => 'required'
        ],
        [
            'field' => 'paymentType',
            'label' => 'Payment',
            'rules' => 'required'
        ]
    ],

    'booking_enquiry_rules' => [
        [
            'field' => 'fname',
            'label' => 'Firstname',
            'rules' => 'required'
        ],
        [
            'field' => 'lname',
            'label' => 'Lastname',
            'rules' => 'required'
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required'
        ],
        [
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required'
        ],
    ],

    'qualities_rules' => [
        [
            'field' => 'title1',
            'label' => 'Title 1',
            'rules' => 'required'
        ],
        [
            'field' => 'title2',
            'label' => 'Title 2',
            'rules' => 'required'
        ],
        [
            'field' => 'title3',
            'label' => 'Title 3',
            'rules' => 'required'
        ]

    ]
];