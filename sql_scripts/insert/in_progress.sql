SELECT * FROM bearberry.progress WHERE eid = 100;

# add a new record for an exercise this week
INSERT INTO bearberry.progress (uid, week, eid, weight, comments) VALUES (
3, # user ID: 1 - Igor, 2 - Jenica, 3 - Daniel, 4 - Joy
1548, # week
8, # exercise ID
120, # weight
''); 

SELECT * FROM bearberry.progress ORDER BY id DESC;