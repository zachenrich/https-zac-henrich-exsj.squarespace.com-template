<?php

include_once '../../config.php';
$showNavigation = false;
include_once 'includes/header.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$security = array(
    'consumer_key' => $consumer_key,
    'domain'       => $domain
);

$session_id    = Uuid::generate();
$session_state = 'initial';
$activity_id   = Uuid::generate();

$request = [
    'user_id'              => $studentid,
    'rendering_type'       => 'assess',
    'assess_inline'        => true,
    'name'                 => 'K–2 Demo',
    'state'                => $session_state,
    'activity_id'          => $activity_id,
    'session_id'           => $session_id,
    'activity_template_id' => 'K-2_DEMO',
    'type'                 => 'local_practice'
];

$Init = new Init('items', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>

<style type="text/css">
body {
    background-color: #ffffff;
}
.container {
    padding: 0;
    margin: 0;
    width: auto;
}
.wrapper {
    background: url('./static/images/background.svg');
    height: 752px;
    background-size: cover;
}
.container-api {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 50px;
}
.container-api {
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    border-radius: 20px;
}
</style>

<div class="wrapper">
    <div class="container-api">
        <!-- Container for the items api to load into -->
        <div id="learnosity_assess"></div>
    </div>
</div>

<script src="<?php echo $url_items; ?>"></script>
<script>
    var itemsApp = LearnosityItems.init(<?php echo $signedRequest; ?>);
</script>

<?php
    include_once 'includes/footer.php';
