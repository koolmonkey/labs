insert into kinos.movies (id, title, duration, begin_film_release, end_film_release, distributor)
values (1, 'Мадагаскар', '01:26:00', '2020-09-15 19:30:10', '2020-12-15 19:30:10', 'UIP'),
       (2, 'Терминатор', '01:48:00', '2020-09-15 19:30:10', '2020-12-15 19:30:10', 'Двадцатый Век Фокс СНГ'),
       (3, 'Ковбой Бипоп', '01:55:00', '2020-09-15 19:30:10', '2020-12-15 19:30:10', 'Columbia/Sony'),
       (4, 'Неизвестная Мэрилин', '01:47:00', '2020-12-19 18:26:19', '2020-12-23 18:26:25', 'Волга'),
       (5, 'Тайна красной планеты', '01:28:00', '2020-11-18 18:28:56', '2020-12-18 18:29:02', 'Уолт Дисней СНГ'),
       (6, 'Джеки', '01:40:00', '2020-12-24 18:30:07', '2020-12-27 18:30:11', 'Cinema Prestige'),
       (7, 'Мальчик в полосатой пижаме', '01:30:00', '2020-08-23 18:31:36', '2020-10-23 18:31:39', 'Уолт Дисней СНГ');

select title from movie_shows join movies m on m.id = movie_shows.movies_id where cinema_halls_id = 1 and cast(start_of_show as date) = '2020-09-15';