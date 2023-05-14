<?php

function render_head($title = "", $children = "")
{
    echo '
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $title . '</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="' . APP_STYLES_PATH . '/store/index.css">
    <link rel="stylesheet" href="' . APP_STYLES_PATH . '/store/notification.css">
    <link rel="stylesheet" href="' . APP_STYLES_PATH . '/store/notification.css">
    
    
    
    ' . $children . '
</head>';
}
// <link rel="stylesheet" href="../../../View/styles/popup-btn-table.css">
// <link rel="stylesheet" href="../../../View/styles/stats.css">