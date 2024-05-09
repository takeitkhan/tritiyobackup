SELECT * FROM
(SELECT COUNT(*) AS total FROM ci_sessions) AS total,
(SELECT COUNT(*) AS yeartotal FROM ci_sessions WHERE YEAR(FROM_UNIXTIME(`timestamp`)) = YEAR(CURDATE())) AS yeartotal,
(SELECT COUNT(*) AS weektotal FROM ci_sessions WHERE WEEK(FROM_UNIXTIME(`timestamp`)) = WEEK(CURDATE())) AS weektotal,
(SELECT COUNT(*) AS yesterdaytotal FROM ci_sessions WHERE `timestamp` = SUBDATE(CURDATE(), 1)) AS yesterdaytotal