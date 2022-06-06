<?php
/*
TinyIB
https://gitlab.com/tslocum/tinyib

Support:
https://gitlab.com/tslocum/tinyib/issues

See README for instructions on configuring, moderating and upgrading your board.

Set TINYIB_DBMODE to a MySQL-related mode if it's available. By default it's set
to flatfile, which can be very slow.

Many settings require the imageboard to be rebuilt to take effect. To do this,
click Rebuild All in the management panel.
*/

// Internationalization
define('TINYIB_LOCALE', '');          // Locale  (see README for instructions)

// Management panel
define('TINYIB_MANAGEKEY', '');       // When set, the [Manage] link is hidden and the management panel may only be accessed via imgboard.php?manage=TINYIB_MANAGEKEY  ['' to disable]

// Administrator/moderator credentials
define('TINYIB_ADMINPASS', '');       // Administrators have full access to the board
define('TINYIB_MODPASS', '');         // Moderators only have access to delete (and moderate if TINYIB_REQMOD is set) posts  ['' to disable]

// Board description and behavior
//   Warning: Enabling reCAPTCHA will cause all visitors to be tracked by Google.  See https://nearcyan.com/you-probably-dont-need-recaptcha/
define('TINYIB_BOARD', '/b');          // Unique identifier for this board using only letters and numbers
define('TINYIB_BOARDDESC', '/b/ Random'); // Displayed below logo in page headers
define('TINYIB_BOARDTITLE', '');      // Title of board pages.  When blank, defaults to TINYIB_BOARDDESC (when set) or "TinyIB"
define('TINYIB_ALWAYSNOKO', false);   // Redirect to thread after posting
define('TINYIB_CAPTCHA', '');         // Reduce spam by requiring users to pass a CAPTCHA when posting: simple / hcaptcha / recaptcha  ['' to disable]
define('TINYIB_MANAGECAPTCHA', 'simple');   // Improve security by requiring users to pass a CAPTCHA when logging in to the management panel: simple / hcaptcha / recaptcha  ['' to disable]
define('TINYIB_REPORT', true);       // Allow users to report posts
define('TINYIB_REQMOD', '');          // Require moderation before displaying posts: files / all  ['' to disable]
define('TINYIB_AUTOREFRESH', 30);     // Delay (in seconds) between attempts to refresh a thread automatically  [0 to disable]
define('TINYIB_DISALLOWTHREADS', ''); // When set, users attempting to post a new thread are shown this message instead  ['' to disable]
define('TINYIB_DISALLOWREPLIES', ''); // When set, users attempting to post a reply are shown this message instead  ['' to disable]

// Board appearance
define('TINYIB_INDEX', 'index.html'); // Index file
define('TINYIB_LOGO', '');            // Logo HTML
define('TINYIB_THREADSPERPAGE', 10);  // Amount of threads shown per index page
define('TINYIB_PREVIEWREPLIES', 3);   // Amount of replies previewed on index pages
define('TINYIB_TRUNCATE', 0);        // Messages are truncated to this many lines on board index pages  [0 to disable]
define('TINYIB_WORDBREAK', 0);       // Words longer than this many characters will be broken apart  [0 to disable]
define('TINYIB_TIMEZONE', 'Europe/Amsterdam');     // See https://secure.php.net/manual/en/timezones.php - e.g. America/Los_Angeles
define('TINYIB_CATALOG', true);       // Generate catalog page
define('TINYIB_JSON', true);          // Generate JSON files
define('TINYIB_DATEFMT', '%g/%m/%d(%a)%H:%M:%S'); // Date and time format  (see php.net/strftime)
$tinyib_hidefieldsop = array('email','subject','embed');       // Fields to hide when creating a new thread - e.g. array('name', 'email', 'subject', 'message', 'file', 'embed', 'password')
$tinyib_hidefields = array('email','subject','embed');         // Fields to hide when replying
$tinyib_anonymous = array('Anonymous'); // Default name (or names)
$tinyib_capcodes = array(array('Admin', 'red'), array('Mod', 'purple')); // Administrator and moderator capcode label and color

// Post control
define('TINYIB_DELAY', 60);           // Delay (in seconds) between posts from the same IP address to help control flooding  [0 to disable]
define('TINYIB_MAXTHREADS', 20);     // Oldest threads are discarded when the thread count passes this limit  [0 to disable]
define('TINYIB_MAXREPLIES', 30);       // Maximum replies before a thread stops bumping  [0 to disable]
define('TINYIB_MAXNAME', 20);         // Maximum name length  [0 to disable]
define('TINYIB_MAXEMAIL', 320);       // Maximum email length  [0 to disable]
define('TINYIB_MAXSUBJECT', 75);      // Maximum subject length  [0 to disable]
define('TINYIB_MAXMESSAGE', 7000000);    // Maximum message length, This is the value of the audio to Base64 string. - Leop  [0 to disable]

// Upload types
//   Empty array to disable
//   Format: MIME type => (extension, optional thumbnail)
$tinyib_uploads = array('image/jpeg'                    => array('jpg'),
                        'image/pjpeg'                   => array('jpg'),
                        'image/png'                     => array('png'),
                        'image/gif'                     => array('gif'));
//                      'application/x-shockwave-flash' => array('swf', 'swf_thumbnail.png');
//                      'audio/aac'                     => array('aac');
//                      'audio/flac'                    => array('flac');
//                      'audio/ogg'                     => array('ogg');
//                      'audio/opus'                    => array('opus');
//                      'audio/mp3'                     => array('mp3');
//                      'audio/mpeg'                    => array('mp3');
//                      'audio/mp4'                     => array('mp4');
//                      'audio/wav'                     => array('wav');
//                      'audio/webm'                    => array('webm');
//                      'video/mp4'                     => array('mp4'); // Video uploads require mediainfo and ffmpegthumbnailer  (see README for instructions)
//                      'video/webm'                    => array('webm');

// oEmbed APIs
//   Empty array to disable
$tinyib_embeds = array('SoundCloud' => 'https://soundcloud.com/oembed?format=json&url=TINYIBEMBED',
                       'Vimeo'      => 'https://vimeo.com/api/oembed.json?url=TINYIBEMBED',
                       'YouTube'    => 'https://www.youtube.com/oembed?url=TINYIBEMBED&format=json');

// File control
define('TINYIB_MAXKB', 2048);         // Maximum file size in kilobytes  [0 to disable]
define('TINYIB_MAXKBDESC', '2 MB');   // Human-readable representation of the maximum file size
define('TINYIB_THUMBNAIL', 'gd');     // Thumbnail method to use: gd / imagemagick  (see README for instructions)
define('TINYIB_UPLOADVIAURL', false); // Allow files to be uploaded via URL
define('TINYIB_NOFILEOK', false);     // Allow the creation of new threads without uploading a file

// Thumbnail size - new thread
define('TINYIB_MAXWOP', 250);         // Width
define('TINYIB_MAXHOP', 250);         // Height

// Thumbnail size - reply
define('TINYIB_MAXW', 250);           // Width
define('TINYIB_MAXH', 250);           // Height

// Tripcode seed - Must not change once set!
define('TINYIB_TRIPSEED', '');        // Enter some random text  (used when generating secure tripcodes, hashing passwords and hashing IP addresses)

// CAPTCHA - hCaptcha / reCAPTCHA
//   The following settings apply when TINYIB_CAPTCHA is set to hcaptcha
//   For API keys visit https://dashboard.hcaptcha.com/signup
define('TINYIB_HCAPTCHA_SITE', '');   // Site key
define('TINYIB_HCAPTCHA_SECRET', ''); // Secret key
//   The following settings apply when TINYIB_CAPTCHA is set to recaptcha
//   For API keys visit https://www.google.com/recaptcha
define('TINYIB_RECAPTCHA_SITE', '');  // Site key
define('TINYIB_RECAPTCHA_SECRET', '');// Secret key

// Database
//   Recommended database modes from best to worst:
//     pdo, mysqli, mysql, sqlite3, sqlite (deprecated), flatfile (only useful if you need portability or lack any kind of database)
define('TINYIB_DBMODE', 'flatfile');     // Mode
define('TINYIB_DBMIGRATE', false);       // Enable database migration tool  (see README for instructions)
define('TINYIB_DBBANS', 'bans');         // Bans table name (use the same table across boards for global bans)
define('TINYIB_DBKEYWORDS', 'keywords'); // Keywords table name (use the same table across boards for global keywords)
define('TINYIB_DBPOSTS', TINYIB_BOARD . '_posts');     // Posts table name
define('TINYIB_DBREPORTS', TINYIB_BOARD . '_reports'); // Reports table name

// Database configuration - MySQL / pgSQL
//   The following only apply when TINYIB_DBMODE is set to mysql, mysqli or pdo with default (blank) TINYIB_DBDSN
define('TINYIB_DBHOST', 'localhost'); // Hostname
define('TINYIB_DBPORT', 3306);        // Port  (set to 0 if you are using a UNIX socket as the host)
define('TINYIB_DBUSERNAME', '');      // Username
define('TINYIB_DBPASSWORD', '');      // Password
define('TINYIB_DBNAME', '');          // Database

// Database configuration - SQLite / SQLite3
//   The following only apply when TINYIB_DBMODE is set to sqlite or sqlite3
define('TINYIB_DBPATH', '.tinyib.db');  // SQLite DB path

// Database configuration - PDO
//   The following only apply when TINYIB_DBMODE is set to pdo  (see README for instructions)
define('TINYIB_DBDRIVER', 'mysql');   // PDO driver to use (mysql / pgsql / sqlite / etc.)
define('TINYIB_DBDSN', '');           // Enter a custom DSN to override all of the connection/driver settings above  (see README for instructions)
//                                         When changing this, you should still set TINYIB_DBDRIVER appropriately.
//                                         If you're using PDO with a MySQL or pgSQL database, you should leave this blank.
