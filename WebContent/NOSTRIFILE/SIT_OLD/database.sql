
/*--------------- Creation of new tables ----------------*/

CREATE TABLE athletes (
    ath_id INT NOT NULL AUTO_INCREMENT,
    ath_firstname VARCHAR(20) NOT NULL,
    ath_lastname VARCHAR(20) NOT NULL,
    ath_email VARCHAR(45) NOT NULL,
    ath_username VARCHAR(25) UNIQUE NOT NULL,
    ath_password VARCHAR(32) NOT NULL,
    PRIMARY KEY (ath_id)
);

CREATE TABLE friends (
    fr_sender_id INT NOT NULL,
    fr_receiver_id INT NOT NULL,
    fr_accepted BOOLEAN DEFAULT '0' COMMENT 'friend request, 0 to be accepted, 1 accepted',
    PRIMARY KEY (fr_sender_id, fr_receiver_id),
    FOREIGN KEY (fr_sender_id) REFERENCES athletes(ath_id) ON DELETE CASCADE,
    FOREIGN KEY (fr_receiver_id) REFERENCES athletes(ath_id) ON DELETE CASCADE
);

CREATE TABLE events (
    ev_id INT NOT NULL,
    ev_creator_id INT NOT NULL,
    ev_title VARCHAR(45) NOT NULL,
    ev_sport ENUM('running', 'soccer', 'volley') NOT NULL,
    ev_max_partic INT NOT NULL,
    ev_date DATE NOT NULL,
    ev_time TIME NOT NULL,
    ev_street VARCHAR(45) NOT NULL,
    ev_civic_number INT DEFAULT '1',
    ev_city VARCHAR(45) NOT NULL,
    ev_zip INT(5) NOT NULL,
    ev_lat VARCHAR(15) DEFAULT NULL,
    ev_long VARCHAR(15) DEFAULT NULL,
    ev_visibility TINYINT(1) DEFAULT '0' COMMENT '0 public, 1 private',
    ev_note VARCHAR(150) DEFAULT NULL,
    PRIMARY KEY (ev_id),
    FOREIGN KEY (ev_creator_id) REFERENCES athletes(ath_id)
);


CREATE TABLE invites (
    inv_event_id INT NOT NULL,
    inv_invited_id INT NOT NULL,
    inv_visualized TINYINT(1) NOT NULL DEFAULT '0' COMMENT '0 to be visualized, 1 already visualized, 2 refused',
    PRIMARY KEY (inv_event_id, inv_invited_id),
    FOREIGN KEY (inv_event_id) REFERENCES events(ev_id) ON DELETE CASCADE,
    FOREIGN KEY (inv_invited_id) REFERENCES athletes(ath_id)
);

CREATE TABLE participates (
    par_event_id INT NOT NULL,
    par_partecipant_id INT NOT NULL,
    par_rate INT DEFAULT NULL COMMENT 'between 0 and 5',
    PRIMARY KEY (par_event_id, par_partecipant_id),
    FOREIGN KEY (par_event_id) REFERENCES events(ev_id) ON DELETE CASCADE,
    FOREIGN KEY (par_partecipant_id) REFERENCES athletes(ath_id)
);

CREATE TABLE medals (
    med_event_id INT NOT NULL,
    med_athlete_id INT NOT NULL,
    PRIMARY KEY (med_event_id, med_athlete_id),
    FOREIGN KEY (med_event_id) REFERENCES events(ev_id),
    FOREIGN KEY (med_athlete_id) REFERENCES athletes(ath_id)
);

/*--------------- Insertions of records in tables ----------------*/

INSERT INTO athletes VALUES 
(1,'Federico','Ghirardini','fghirardini@unibz.it','ghira','25d55ad283aa400af464c76d713c07ad'),
(2,'Alessandro','Mattivi','amattivi@unibz.it','matt','25d55ad283aa400af464c76d713c07ad'),
(3,'Silvia','Fracalossi','sfracalossi@unibz.it','silvia','25d55ad283aa400af464c76d713c07ad');

INSERT INTO `events` (`ev_id`, `ev_creator_id`, `ev_title`, `ev_sport`, `ev_max_partic`, `ev_date`, `ev_time`, `ev_street`, `ev_civic_number`, `ev_city`, `ev_zip`, `ev_lat`, `ev_long`, `ev_visibility`, `ev_note`) VALUES
(207196622, 1, 'Volley together', 'volley', 12, '2018-03-21', '17:00:00', 'via Roma', 10, 'Bolzano', 39100, '46.495172', '11.350763', 1, ' '),
(714112739, 3, 'Play with us!', 'soccer', 16, '2017-12-31', '10:00:00', 'via Druso', 1, 'Bolzano', 39100, '46.494687', '11.3446118', 0, ''),
(349401780, 2, 'Let\'s run!', 'running', 100, '2018-01-26', '18:00:00', 'viale Venezia', 30, 'Bolzano', 39100, '46.4971588', '11.3453384', 0, ''),
(678595365, 3, 'Running is the way', 'running', 5, '2018-01-25', '17:30:00', 'piazza della Vittoria', 1, 'Bolzano', 39100, '46.4999849', '11.3449518', 0, ''),
(933186190, 3, 'Soccer for life', 'soccer', 10, '2018-01-31', '17:00:00', 'via Druso', 1, 'Bolzano', 39100, '46.494687', '11.3446118', 0, 'In teams of 5 - we decide at the field how to group us'),
(924182290, 3, 'We love volley', 'volley', 12, '2018-01-25', '14:00:00', 'via Roma', 10, 'Bolzano', 39100, '46.4944696', '11.3403081', 0, 'Don\'t be late!'),
(726625340, 2, 'Volley after Halloween', 'volley', 12, '2017-11-03', '23:59:00', 'via Cadorna', 13, 'Bolzano', 39100, '46.5070771', '11.3472104', 0, ''),
(207196641, 3, 'Morning Routine', 'running', 8, '2018-03-01', '06:00:00', 'via Milano', 47, 'Bolzano', 39100, '46.489696', '11.3348863', 0, ''),
(429296413, 3, 'Run Run Run!', 'running', 30, '2018-03-03', '09:00:00', 'via Capri', 1, 'Bolzano', 39100, '46.495718', '11.3315669', 0, ''),
(435897200, 3, 'Soccer Elimination Tournament ', 'soccer', 24, '2018-02-13', '20:00:00', 'viale Europa', 63, 'Bolzano', 39100, '46.4916604', '11.3197547', 0, 'Four teams of 6 players'),
(449249833, 3, 'NOI soccer', 'soccer', 14, '2018-03-30', '13:00:00', 'via Alessandro Volta', 13, 'Bolzano', 39100, '46.478455400000', '11.3325093', 0, ''),
(449401780, 1, 'Christmas Volley', 'volley', 12, '2017-12-25', '12:00:00', 'via Torino', 65, 'Bolzano', 39100, '46.4910437', '11.3390718', 0, ''),
(463455651, 2, 'Match of October', 'soccer', 18, '2017-10-31', '12:00:00', 'via Firenze', 12, 'Bolzano', 39100, '46.493401', '11.3430207', 0, ''),
(711112739, 3, 'Happy Volley', 'volley', 12, '2018-02-16', '10:00:00', 'viale Europa', 20, 'Bolzano', 39100, '46.49293', '11.33172', 0, ''),
(759269438, 3, 'A soccer match', 'soccer', 10, '2018-02-28', '23:30:00', 'via Mantova', 1, 'Bolzano', 39100, '46.4881526', '11.3282762', 0, ''),
(761945069, 2, 'December Run', 'running', 12, '2017-12-25', '13:30:00', 'via Roma', 1, 'Bolzano', 39100, '46.494785', '11.3407187', 0, 'Let\'s run in december!'),
(778595365, 3, 'Run in two', 'running', 2, '2018-01-27', '12:00:00', 'via Torino', 65, 'Bolzano', 39100, '46.4910437', '11.3390718', 0, ''),
(794890204, 3, 'Students Volley', 'volley', 36, '2018-01-24', '20:00:00', 'via Fago', 2, 'Bolzano', 39100, '46.5091012', '11.3467822', 0, 'For young students of our city'),
(851389397, 3, 'Volley with the teacher', 'volley', 25, '2018-01-30', '18:00:00', 'Viale Trieste', 19, 'Bolzano', 39100, '46.493311899999', '11.3455289', 0, 'It is the stadium!'),
(852702470, 2, 'Birthday Running', 'running', 4, '2017-11-11', '19:00:00', 'via Milano', 192, 'Bolzano', 39100, '46.4904091', '11.3206072', 0, ''),
(923186190, 2, 'First volley', 'volley', 3, '2017-10-27', '18:30:00', 'via Fiume', 9, 'Bolzano', 39100, '46.4962354', '11.3447768', 0, '');

INSERT INTO `participates` (`par_event_id`, `par_partecipant_id`, `par_rate`) VALUES
(207196622, 1, NULL),
(207196622, 3, 4),
(714112739, 1, 2),
(714112739, 3, NULL),
(349401780, 1, NULL),
(349401780, 2, NULL),
(678595365, 3, NULL),
(933186190, 3, NULL),
(924182290, 3, NULL),
(726625340, 2, NULL),
(207196641, 1, NULL),
(207196641, 3, NULL),
(429296413, 3, NULL),
(435897200, 1, NULL),
(435897200, 3, NULL),
(449249833, 3, NULL),
(449401780, 1, NULL),
(449401780, 3, 5),
(463455651, 2, NULL),
(711112739, 3, NULL),
(759269438, 3, NULL),
(761945069, 1, NULL),
(761945069, 2, NULL),
(778595365, 2, NULL),
(778595365, 3, NULL),
(794890204, 3, NULL),
(851389397, 3, NULL),
(852702470, 2, NULL),
(923186190, 2, NULL);
