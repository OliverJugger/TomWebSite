INSERT INTO `photo`(`file_name`, `page`, `position`, `titre`, `description`, `album`) 
VALUES ('1.png', 'accueil', 5, '', '', 'album1'),
       ('1.png', 'accueil', 4, '', '', 'album1'),
       ('1.png', 'accueil', 6, '', '', 'album1'), 
       ('test_1.jpg', 'accueil', 1, '', '', 'album1'), 
       ('test_2.jpg', 'photo', 7, '', '', 'album1');

INSERT INTO `video`(`video_name`, `titre`, `description`, `page`, `position`) 
VALUES ('tLrmYRYmpkk', 'Terminator 2', 'Voici un film tourné en 1987 blabla', 'video', 1),
 ('tLrmYRYmpkk', 'Terminator 3', 'Voici un film tourné en 1987 blabla', 'video', 2),
VALUES ('tLrmYRYmpkk', 'Terminator 2', 'Voici un film tourné en 1987 blabla', 'video', 3);

 INSERT INTO `photo`(`file_name`, `page`, `position`, `titre`, `description`, `album`) 
 VALUES ('chicago.jpg', 'photos', 1, 'Live at Chicago', 'Great moment', 'albumEte2020'),
  ('la.jpg', 'photos', 2, 'Live at LA', 'Great moment too', 'albumEte2020'),
   ('ny.jpg', 'photos', 3, 'Live at NY', 'Great moment too too', 'albumEte2020'),
    ('chicago.jpg', 'photos', 1, 'Live at Chicago', 'Great moment', 'albumEte2021'),
     ('la.jpg', 'photos', 2, 'Live at LA', 'Great moment too', 'albumEte2021'),
      ('ny.jpg', 'photos', 3, 'Live at NY', 'Great moment too too', 'albumEte2021');


INSERT INTO `message`(`message`, `page`, `position`) VALUES ('Bienvenue sur mon site officiel TomNL Photographe', 'accueil', 1);

ALTER TABLE photo
ADD FOREIGN KEY (album) REFERENCES album(id);

INSERT INTO `album`(`titre`, `description`) 
VALUES ('album1', 'Mon premier album');

ALTER TABLE `photo` CHANGE `description` `description` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '';
ALTER TABLE `photo` CHANGE `titre` `titre` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '';

/* Ajouter la photo img/banner1.png dans gallery */
INSERT INTO `photo`(`file_name`, `page`, `position`, `album`) VALUES ('banner1.png', 'principaleAccueil', 1, 1);
/* Ajouter la photo img/banner1.png dans gallery */
INSERT INTO `photo`(`file_name`, `page`, `position`, `album`) VALUES ('banner1.png', 'principalePhotos', 1, 1);
INSERT INTO `photo`(`file_name`, `page`, `position`, `album`) VALUES ('banner1.png', 'principaleVideos', 1, 1);
