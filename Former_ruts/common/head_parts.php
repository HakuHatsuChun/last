<?php
function head_parts($title)
{

    return <<<EOM
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="../css/style.css">
<script src='../JS/index.js'></script>
<title>$title</title>
EOM;
}