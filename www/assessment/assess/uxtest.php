<?php

include_once '../../config.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$security = array(
    'consumer_key' => $consumer_key,
    'user_id'      => $studentid,
    'domain'       => $domain
);

$uniqueResponseIdSuffix = substr(Uuid::generate(), 0, 23);

$request = array(
    'name'           => 'UX Test Activity',
    'state'          => 'initial',
    'title'          => 'Demo activity - UX test for Assess app',
    'subtitle'       => 'Activity subtitle here',
    'administration' => array(
        'pwd' => '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', // `password`
        'options' => array(
            'show_save' => true,
            'show_exit' => true,
            'show_extend' => true
        )
    ),
    'navigation' => array(
        'scroll_to_top'            => false,
        'scroll_to_test'           => false,
        'show_intro'               => true,
        'show_outro'               => true,
        'show_next'                => true,
        'show_prev'                => true,
        'show_fullscreencontrol'   => false,
        'show_progress'            => true,
        'show_submit'              => true,
        'show_title'               => true,
        'show_save'                => true,
        'show_calculator'          => false,
        'show_itemcount'           => true,
        'skip_submit_confirmation' => false,
        'toc'                      => true,
        'transition'               => 'fade',
        'transition_speed'         => 400,
        'warning_on_change'        => false,
        'scrolling_indicator'      => false,
        'show_answermasking'       => false,
        'exit_securebrowser'       => true,
        'auto_save'                => false
    ),
    'time' => array(
        'max_time'     => 600,
        'limit_type'   => 'hard',
        'show_pause'   => true,
        'warning_time' => 60,
        'show_time'    => true
    ),
    'labelBundle' => array(
        'appName' => 'Assess Demo',
        'sheet'   => 'Question'
    ),
    'ui_style'      => 'main',
    'configuration' => array(
        'questionsApiVersion'    => 'v2',
        'fontsize'               => 'normal',
        'dynamic'                => false,
        'swipe'                  => false,
        'events'                 => false,
        'stylesheet'             => '',
        'onsave_redirect_url'    => $env['protocol'] . $env['page'],
        'onsubmit_redirect_url'  => $env['protocol'] . $env['page'],
        'ondiscard_redirect_url' => $env['protocol'] . $env['page'],
        'idle_timeout'           => array(
            'interval'       => 300,
            'countdown_time' => 60
        )
    ),
    'items' => array(
        array(
            'reference'    => 'Demo3',
            'content'      => '<span class="learnosity-response question-'.$uniqueResponseIdSuffix.'_demo3"></span>',
            'workflow'     => array(),
            'response_ids' => array(
                $uniqueResponseIdSuffix.'_demo3'
            ),
            'feature_ids'  => array()
        ),
        array(
            'reference'    => 'Demo4',
            'content'      => '<span class="learnosity-response question-'.$uniqueResponseIdSuffix.'_Demo4"></span>',
            'workflow'     => array(),
            'response_ids' => array(
                $uniqueResponseIdSuffix.'_Demo4'
            ),
            'feature_ids'  => array()
        ),
        array(
            'reference'    => 'Demo5',
            'content'      => '<span class="learnosity-response question-'.$uniqueResponseIdSuffix.'_Demo5"></span><span class="learnosity-feature" data-type="calculator"></span>',
            'workflow'     => array(),
            'response_ids' => array(
                $uniqueResponseIdSuffix.'_Demo5'
            ),
            'feature_ids'  => array()
        ),
        array(
            'reference'    => 'Demo6',
            'content'      => '<span class="learnosity-response question-'.$uniqueResponseIdSuffix.'_Demo6"></span>',
            'workflow'     => array(),
            'response_ids' => array(
                $uniqueResponseIdSuffix.'_Demo6'
            ),
            'feature_ids'  => array()
        ),
        array(
            'reference'    => 'Demo7',
            'content'      => '<span class="learnosity-response question-'.$uniqueResponseIdSuffix.'_Demo7"></span>',
            'workflow'     => array(),
            'response_ids' => array(
                $uniqueResponseIdSuffix.'_Demo7'
            ),
            'feature_ids'  => array()
        ),
        array(
            'reference'    => 'Demo8',
            'content'      => '<span class="learnosity-response question-'.$uniqueResponseIdSuffix.'_Demo8"></span>',
            'workflow'     => array(),
            'response_ids' => array(
                $uniqueResponseIdSuffix.'_Demo8'
            ),
            'feature_ids'  => array()
        ),
        array(
            'reference'    => 'Demo9',
            'content'      => '<span class="learnosity-response question-'.$uniqueResponseIdSuffix.'_Demo9"></span>',
            'workflow'     => array(),
            'response_ids' => array(
                $uniqueResponseIdSuffix.'_Demo9'
            ),
            'feature_ids'  => array()
        ),
        array(
            'reference'    => 'Demo10',
            'content'      => '<span class="learnosity-response question-'.$uniqueResponseIdSuffix.'_Demo10"></span>',
            'workflow'     => array(),
            'response_ids' => array(
                $uniqueResponseIdSuffix.'_Demo10'
            ),
            'feature_ids'  => array()
        )
    ),
    'questionsApiActivity' => json_decode(
        '{
            "type": "submit_practice",
            "state": "initial",
            "id": "assessdemo_' . $uniqueResponseIdSuffix . '",
            "name": "Assess API - Demo",
            "course_id": "' . $courseid . '",
            "session_id": "' . Uuid::generate() . '",
            "questions": [
             {
                "type": "orderlist",
                "list": [
                  "cat",
                  "horse",
                  "pig",
                  "elephant",
                  "mouse"
                ],
                "stimulus": "<p>Arrange these animals from smallest to largest</p>",
                "ui_style": "button",
                "validation": {
                  "show_partial_ui": true,
                  "partial_scoring": true,
                  "valid_score": 1,
                  "penalty_score": 0,
                  "valid_response": [
                    4,
                    0,
                    2,
                    1,
                    3
                  ],
                  "pairwise": false
                },
                "instant_feedback": true,
                "response_id": "'.$uniqueResponseIdSuffix.'_demo3",
                "metadata": {
                  "sheet_reference": "Demo3",
                  "widget_reference": "demo3"
                }
              },
              {
                "type": "clozeassociation",
                "template": "<p> <strong>The United States of America was founded in {{response}}.</strong></p>",
                "possible_responses": [
                  "1676",
                  "1776",
                  "1876"
                ],
                "feedback_attempts": 2,
                "instant_feedback": true,
                "validation": {
                  "show_partial_ui": true,
                  "partial_scoring": true,
                  "valid_score": 1,
                  "penalty_score": 0,
                  "valid_responses": [
                    [
                      "1776"
                    ]
                  ]
                },
                "response_id": "'.$uniqueResponseIdSuffix.'_Demo4",
                "metadata": {
                  "sheet_reference": "Demo4",
                  "widget_reference": "Demo4"
                }
              },
              {
                "type": "clozetext",
                "template": "<p>What is the sum of \\\\(785 \\\\times 89\\\\)</p> {{response}}",
                "is_math": true,
                "validation": {
                  "show_partial_ui": true,
                  "partial_scoring": true,
                  "valid_score": 1,
                  "penalty_score": 0,
                  "valid_responses": [
                    [
                      "69865"
                    ]
                  ]
                },
                "instant_feedback": true,
                "response_id": "'.$uniqueResponseIdSuffix.'_Demo5",
                "metadata": {
                  "sheet_reference": "Demo5",
                  "widget_reference": "Demo5"
                }
              },
              {
                "type": "numberline",
                "points": [
                  "5/5",
                  "1/4",
                  "2/4",
                  "7/8"
                ],
                "is_math": true,
                "labels": {
                  "points": "0,1,2,3,4",
                  "show_min": true,
                  "show_max": true
                },
                "line": {
                  "min": 0,
                  "max": 4,
                  "left_arrow": true,
                  "right_arrow": true
                },
                "stimulus": "<p>Drag the points onto the numberline.</p>",
                "ticks": {
                  "distance": ".25",
                  "show": true
                },
                "validation": {
                  "partial_scoring": "true",
                  "show_partial_ui": "true",
                  "valid_score": "1",
                  "penalty_score": "0",
                  "threshold": "0",
                  "valid_responses": [
                    {
                      "point": "5/5",
                      "position": "1"
                    },
                    {
                      "point": "1/4",
                      "position": ".25"
                    },
                    {
                      "point": "2/4",
                      "position": "2"
                    },
                    {
                      "point": "7/8",
                      "position": "3.5"
                    }
                  ]
                },
                "instant_feedback": true,
                "snap_to_ticks": true,
                "response_id": "'.$uniqueResponseIdSuffix.'_Demo6",
                "metadata": {
                  "sheet_reference": "Demo6",
                  "widget_reference": "Demo6"
                }
              },
              {
                "type": "tokenhighlight",
                "template": "<p>He was told not to laugh in class.</p>",
                "tokenization": "word",
                "validation": {
                  "show_partial_ui": true,
                  "partial_scoring": true,
                  "valid_score": 1,
                  "penalty_score": 0,
                  "valid_responses": [
                    5
                  ]
                },
                "stimulus": "<p>Highlight the verb in the sentence below.</p>",
                "instant_feedback": true,
                "response_id": "'.$uniqueResponseIdSuffix.'_Demo7",
                "metadata": {
                  "sheet_reference": "Demo7",
                  "widget_reference": "Demo7"
                }
              },
              {
                "type": "mcq",
                "options": [
                  {
                    "value": "0",
                    "label": "Berlin"
                  },
                  {
                    "value": "1",
                    "label": "Paris"
                  },
                  {
                    "value": "2",
                    "label": "London"
                  },
                  {
                    "value": "3",
                    "label": "Madrid"
                  }
                ],
                "stimulus": "<strong>What\'s the capital of France?</strong>",
                "stimulus_review": "Something Else",
                "ui_style": {
                  "type": "block",
                  "choice_label": "upper-alpha"
                },
                "valid_responses": [
                  {
                    "value": "1",
                    "score": 1
                  }
                ],
                "instant_feedback": true,
                "response_id": "'.$uniqueResponseIdSuffix.'_Demo8",
                "metadata": {
                  "sheet_reference": "Demo8",
                  "widget_reference": "Demo8"
                }
              },
              {
                "type": "clozedropdown",
                "template": "“It’s all clear,’ he {{response}}. “Have you the chisel and the bags? Great Scott! Jump, Archie, jump, and I’ll swing for it!’ Sherlock {{response}} had sprung out and seized the {{response}} by the collar. The other dived down the hole, and I heard the sound of {{response}} cloth as Jones clutched at his skirts. The light flashed upon the barrel of a revolver, but Holmes’ {{response}} came down on the man’s wrist, and the pistol {{response}} upon the stone floor.",
                "possible_responses": [
                  [
                    "whispered",
                    "sprinted",
                    "joked"
                  ],
                  [
                    "Homes",
                    "holmes",
                    "Holmes"
                  ],
                  [
                    "acquaintance",
                    "intruder",
                    "shopkeeper"
                  ],
                  [
                    "burning",
                    "departing",
                    "rending",
                    "broken"
                  ],
                  [
                    "revolver",
                    "hunting crop"
                  ],
                  [
                    "rattled",
                    "clinked",
                    "spilt"
                  ]
                ],
                "stimulus": "<p><strong>Fill in the blanks.</strong></p>",
                "validation": {
                  "show_partial_ui": true,
                  "partial_scoring": true,
                  "valid_score": 1,
                  "penalty_score": 0,
                  "valid_responses": [
                    [
                      "whispered"
                    ],
                    [
                      "Holmes"
                    ],
                    [
                      "intruder"
                    ],
                    [
                      "rending"
                    ],
                    [
                      "hunting crop"
                    ],
                    [
                      "clinked"
                    ]
                  ]
                },
                "instant_feedback": true,
                "response_id": "'.$uniqueResponseIdSuffix.'_Demo9",
                "metadata": {
                  "sheet_reference": "Demo9",
                  "widget_reference": "Demo9"
                }
              },
              {
                "type": "graphplotting",
                "axis_x": {
                  "ticks_distance": 1,
                  "draw_labels": true
                },
                "axis_y": {
                  "ticks_distance": 1,
                  "draw_labels": true
                },
                "canvas": {
                  "x_min": 0,
                  "x_max": 10.2,
                  "y_min": -0.5,
                  "y_max": 10.2,
                  "snap_to": "grid"
                },
                "grid": {
                  "x_distance": 1,
                  "y_distance": 1
                },
                "toolbar": {
                  "tools": [
                    "point",
                    "move"
                  ],
                  "default_tool": "point"
                },
                "ui_style": {
                  "margin": "10px"
                },
                "stimulus": "<p>Plot the following points \\\\((2,5), (4,8), (8,1)\\\\).</p>",
                "is_math": true,
                "validation": {
                  "valid_score": "1",
                  "penalty_score": "0",
                  "valid_responses": [
                    [
                      {
                        "id": "lrn_1",
                        "type": "point",
                        "coords": {
                          "x": 2,
                          "y": 5
                        }
                      },
                      {
                        "id": "lrn_2",
                        "type": "point",
                        "coords": {
                          "x": 4,
                          "y": 8
                        }
                      },
                      {
                        "id": "lrn_3",
                        "type": "point",
                        "coords": {
                          "x": 8,
                          "y": 1
                        }
                      }
                    ]
                  ]
                },
                "instant_feedback": true,
                "response_id": "'.$uniqueResponseIdSuffix.'_Demo10",
                "metadata": {
                  "sheet_reference": "Demo10",
                  "widget_reference": "Demo10"
                }
              }
            ]
        }',
        true
    )
);

include_once 'utils/settings-override.php';

$Init = new Init('assess', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Learnosity API Demos</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo $env['www'] ?>static/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?php echo $env['www'] ?>static/dist/all.min.css?<?php echo $assetVersion ?>">
        <script src="<?php echo $env['www'] ?>static/dist/all.min.js?<?php echo $assetVersion ?>"></script>
        <script>
            var config = {
                www: '<?php echo $env["www"]; ?>',
                apiRequest: {
                    security: {
                        consumer_key: '<?php echo $consumer_key; ?>',
                        domain: '<?php echo $domain; ?>',
                        timestamp: '<?php echo $timestamp; ?>',
                        signature: '[add request signature here]'
                    }
                }
            }
        </script>
    </head>
<body>
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $env['www'] ?>"><span class="logo">Learnosity Demos</span></a>
        </div>
    </div>
</div>

<div class="container container-content">
    <div class="row">
    <div class="section">
        <!-- Container for the assess api to load into -->
        <div id="learnosity_assess"></div>
    </div>

    <script src="<?php echo $url_assess; ?>?inline"></script>
    <script>
        var activity = <?php echo $signedRequest; ?>,
            assessApp = LearnosityAssess.init(activity, 'learnosity_assess');
    </script>

<?php
include_once 'views/modals/settings-assess.php';
include_once 'views/modals/initialisation-preview.php';
include_once 'includes/footer.php';
