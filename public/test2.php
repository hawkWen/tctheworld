<?php
openlog('php', LOG_CONS | LOG_NDELAY | LOG_PID, LOG_USER | LOG_PERROR);
syslog(LOG_ERR, 'Error!');
syslog(LOG_INFO, 'Hello World!');
closelog();
?>