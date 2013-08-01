<? include_once "src/facebook.php";

session_start();

// application settings

$settings['appid'] = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$settings['appsecret'] = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
$settings['url'] = "http://[PAHT TO YOUR ROOT FOLDER OF APP]";
$settings['fbappurl'] = "https://apps.facebook.com/[YOU APP NAME HERE]";

// create our cpplication instance.

$facebook = new Facebook(array(
  'appId' => $settings['appid'],
  'secret' => $settings['appsecret'],
  'cookie' => true,
));

// Get the current signed request being used by the SDK

$signedRequest = $facebook->getSignedRequest();

// returns the Facebook User ID of the current user

$user = $facebook->getUser();

// edirect the user to login to Facebook and authorize your application

$loginUrl = $facebook->getLoginUrl(array(
  'scope' => 'user_status,
email,
user_photos,
read_stream,
friends_status,
user_birthday,
user_religion_politics,
user_about_me

'
));

if ($user)
  {
  try
    {

    // get user basic data

    $userdata = $facebook->api("/$user");

    // Get the current access token being used by the SDK

    $fb_access_token = $facebook->getAccessToken();
    }

  catch(FacebookApiException $e)
    {

    // print error if any

    error_log('APP ERROR: ' . $e);
    $user = null;
    }
  }

// redirect user to authorize app again if user hasn't

if (!$user)
  {
  echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
  exit;
  }

// redirect user to facebook app page after he authorizes the app

if (isset($_GET['code']))
  {
  header("Location: " . $settings['fbappurl']);
  $url = $settings['fbappurl'];
  exit();
  }yo