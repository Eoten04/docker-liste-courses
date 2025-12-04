<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */
return [
    /*
     * Debug Level:
     *
     * Production Mode:
     * false: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * true: Errors and warnings shown.
     */
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive data.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', 'a8632847fe1e146e786c4a15ee89a34e5c240da13a0864862a62f73f5e9ef2e5'),
    ],

    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [
            'host' => env('DATABASE_HOST', 'localhost'),
            'driver' => \Cake\Database\Driver\Mysql::class,
            'port' => env('DATABASE_PORT', '3306'),
            'username' => env('DATABASE_USER', 'app_user'),
            'password' => env('DATABASE_PASSWORD', 'app_password_secure'),
            'database' => env('DATABASE_NAME', 'liste_courses'),
            'url' => env('DATABASE_URL', null),
            'encoding' => 'utf8mb4',
        ],

        /*
         * The test connection is used during the test suite.
         */
        'test' => [
            'host' => env('DATABASE_HOST', 'localhost'),
            'port' => env('DATABASE_PORT', '3306'),
            'username' => env('DATABASE_USER', 'app_user'),
            'password' => env('DATABASE_PASSWORD', 'app_password_secure'),
            'database' => env('DATABASE_NAME', 'test_liste_courses'),
            'url' => env('DATABASE_TEST_URL', 'mysql://app_user:app_password_secure@localhost/test_liste_courses'),
            'encoding' => 'utf8mb4',
        ],
    ],

    /*
     * Email configuration.
     *
     * Host and credential configuration in case you are using SmtpTransport
     *
     * See app.php for more configuration options.
     */
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
