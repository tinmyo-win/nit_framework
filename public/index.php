<?php
// Dynamic variables for iframe
$iframeSrc = "http://localhost:8001/chat";
$iframeStyle = "width:100%; height:100%; border:none;";

// Echo out the iframe with dynamic attributes
echo "<iframe src=\"$iframeSrc\" style=\"$iframeStyle\"></iframe>";
