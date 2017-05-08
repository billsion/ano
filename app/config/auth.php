<?php
return array(
    'multi'	=> array(
        'admin' => array(
            'driver' => 'eloquent',
            'model' => 'App\Modules\Admin\Models\Admin'
         ),
         'member' => array(
             'driver' => 'database',
             'table' => 'members'
         )
    ),

    'reminder' => array(
        'email' => 'emails.auth.reminder',
        'table' => 'password_reminders',
        'expire' => 60,
    ),
);