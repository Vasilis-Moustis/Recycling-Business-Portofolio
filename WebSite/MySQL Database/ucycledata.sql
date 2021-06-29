CREATE DATABASE 'ucycledata';
USE 'ucycledata';

CREATE TABLE `contacts` (
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `work` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `headUser` varchar(128) NOT NULL
) ;



CREATE TABLE `events` (
  `owner` varchar(128) NOT NULL,
  `eventname` varchar(128) NOT NULL,
  `eventdate` varchar(128) NOT NULL,
  `starttime` varchar(128) NOT NULL,
  `endtime` varchar(128) NOT NULL,
  `user` varchar(128) NOT NULL
) ;



CREATE TABLE `localcon` (
  `ownscon` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL
) ;

CREATE TABLE `complains` (
  `whocomplains` varchar(128) NOT NULL,
  `complaincontent` varchar(128) NOT NULL
) ;


CREATE TABLE `messages` (
  `sender` varchar(100) NOT NULL,
  `recipient` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ;



INSERT INTO `messages` (`sender`, `recipient`, `message`) VALUES
('admin', 'Vasileios Moustis', 'Hurry, you have an examination!');



CREATE TABLE `users` (
  `email` varchar(128) NOT NULL,
  `user` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL
) ;



INSERT INTO `users`(`email`, `user`, `phone`, `pass`) VALUES('nk9876@yahoo.gr', 'Anastasia Kati', '6930510677', 'p@ss'),
('texnlog@unipi.gr', 'admin', '210210210210', 'admin'),
('vasilis.moustis@outlook.com', 'Vasileios Moustis', '6932303560', 'root');


ALTER TABLE `contacts`
  ADD PRIMARY KEY (`headUser`,`phone`);


ALTER TABLE `events`
  ADD PRIMARY KEY (`eventname`,`user`);


ALTER TABLE `localcon`
  ADD PRIMARY KEY (`email`,`ownscon`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `user` (`user`);
COMMIT;

