<?php

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$security = array(
    'consumer_key' => $consumer_key,
    'domain'       => $domain,
    'timestamp'    => $timestamp
);

$items = array('Worksheet1', 'Worksheet2','Worksheet3','Worksheet4');
$sessionid = Uuid::generate();

$request = array(
    'user_id'        => $studentid,
    'rendering_type' => 'inline',
    'name'           => 'Items API demo - Worksheet Demo',
    'state'          => 'initial',
    'activity_id'    => 'itemsinlineworksheet',
    'session_id'     => $sessionid,
    'items'          => $items,
    'type'           => 'submit_practice',
    'retrieve_tags'  => true
);

$Init = new Init('items', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>

<style type="text/css">
.worksheet {
    -webkit-column-count: 2; /* Chrome, Safari, Opera */
    -moz-column-count: 2; /* Firefox */
    column-count: 2;
    -webkit-column-rule: 1px solid #ebf0f0; /* Chrome, Safari, Opera */
    -moz-column-rule: 1px solid #ebf0f0; /* Firefox */
    column-rule: 1px solid #ebf0f0;
    -webkit-column-gap: 40px; /* Chrome, Safari, Opera */
    -moz-column-gap: 40px; /* Firefox */
    column-gap: 40px;
}
.worksheet .learnosity-item{
    -webkit-column-break-inside: avoid;
    page-break-inside: avoid;
    break-inside: avoid;
}

/*Go to a single column on smaller devices*/
@media only screen and (max-width: 992px) {  /*992 in this case matches parent page breakpoint*/
    .worksheet {
        -webkit-column-count: 1; /* Chrome, Safari, Opera */
        -moz-column-count: 1; /* Firefox */
        column-count: 1;
    }
}
</style>

<div class="jumbotron section">
    <div class="toolbar">
        <ul class="list-inline">
            <li data-toggle="tooltip" data-original-title="Preview API Initialisation Object"><a href="#"  data-toggle="modal" data-target="#initialisation-preview"><span class="glyphicon glyphicon-search"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/itemsapi/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Toggle product overview box"><a href="#"><span class="glyphicon glyphicon-chevron-up jumbotron-toggle"></span></a></li>
        </ul>
    </div>
    <div class="overview">
        <h1>Worksheet Demo</h1>
        <p>This demo shows an example of a math worksheet created using learnosity items.  If you submit the answers you'll get an instant report on your progress.<p>
    </div>
</div>

<div class="section">
    <br>
    <div class="worksheet">
    <p>
        <?php foreach ($items as $item) { ?>
        <span class="learnosity-item" data-reference="<?= $item; ?>"></span>
        <?php } ?>
       <!--  <span class="learnosity-submit-button"></span>-->
  </p>
    </div>

       <button class="itemssubmit">Submit</button>


        <br><a href="results.php?session_id=<?php echo $sessionid ?>">Results</a>

</div>

<!-- Container for the items api to load into -->
<script src="<?php echo $url_items; ?>"></script>
<script>
    var eventOptions = {
            readyListener: function () {
                console.log('Learnosity Items API is ready');

                //Setup handlers when loaded
                setupSubmitHandler();

                //Display tags

            }
        },
        itemsApp = LearnosityItems.init(<?php echo $signedRequest; ?>, eventOptions);

    function setupCustomHandlers(){
        console.log('Setup handlers');
        $('.itemssubmit').on('click', function(){

            console.log('doSubmit');
            itemsApp.submit();
            //Do redirect on succes

            //Handle error
            // this.();
        })
    }
</script>

<?php
    include_once 'views/modals/initialisation-preview.php';
    include_once 'includes/footer.php';
