<?php

header ('HTTP/1.0 503 Service Temporarily Unavailable');

include(dirname(__FILE__) . '/maintenance.html');

?>
