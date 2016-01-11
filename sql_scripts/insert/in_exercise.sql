# adding a new exercise to the database
INSERT INTO bearberry.exercise (abbreviation, `name`, `force`, main_muscle, other_muscle, description) 
VALUES
(
'ap',  # abbreviation
'Assisted Pull-Ups', # name
'pull', # force
'lats', # main_muscle
'Biceps, Middle Back',  # other_muscle
'Decreasing the counter-balance');

SELECT * 
FROM bearberry.exercise 
where name like "%concentration curl%"
ORDER BY id DESC;

select * from bearberry.exercise;