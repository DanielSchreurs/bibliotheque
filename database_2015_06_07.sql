# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.23)
# Database: library
# Generation Time: 2015-06-07 08:58:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` text COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;

INSERT INTO `answers` (`id`, `answer`, `user_id`, `question_id`, `create_at`, `update_at`)
VALUES
	(1,'Il suffit d’introduire dans la bare de recherche principale le livre que vous recherchez.\r\n',1,1,'2015-03-18','2015-03-18'),
	(2,'Nous ne référencions que les livres qui sont repris dans l’inventaire de notre bibliothèque. Si le livre n’apparait pas, c’est qu’e nous ne l\'avons pas encore.',1,2,'2015-03-18','2015-03-18'),
	(7,'Nous disposons de plusieurs exemplaires par livre toutefois il arrive que tous les exemplaires soient épuisés pour une date donnée. Nous vous conseillons de simplement reporter la date.',1,3,'2015-04-22','2015-04-22');

/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table author_book
# ------------------------------------------------------------

DROP TABLE IF EXISTS `author_book`;

CREATE TABLE `author_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `author_book` WRITE;
/*!40000 ALTER TABLE `author_book` DISABLE KEYS */;

INSERT INTO `author_book` (`id`, `book_id`, `author_id`)
VALUES
	(1,1,1),
	(2,2,2),
	(3,3,3),
	(5,5,4),
	(6,6,5),
	(7,7,6);

/*!40000 ALTER TABLE `author_book` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `photo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `logo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `datebirth` date NOT NULL,
  `datedeath` date DEFAULT NULL,
  `bio_text` text COLLATE latin1_general_ci NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL,
  `vedette` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `photo`, `logo`, `datebirth`, `datedeath`, `bio_text`, `create_at`, `update_at`, `vedette`)
VALUES
	(1,'André ','Breton','photo1774405945667358463.jpg','logo199875192950877855.png','1896-02-16','1966-09-28','Fils unique d’une famille de la petite bourgeoisie catholique dont la mère impose une éducation rigide, André Breton passe une enfance sans histoire à Pantin (Seine-St-Denis)1, dans la banlieue nord-est de Paris.\r\n\r\n§Premières rencontres décisives : Valéry, Apollinaire, Vaché\r\n\r\nAndré Breton (en haut à gauche) à coté de Théodore Fraenkel, détail d\'une photo de classe au lycée Chaptal en 1912.\r\nAu collège Chaptal, il suit une scolarité « moderne » (sans latin ni grec2), se fait remarquer par son professeur de rhétorique qui lui fait découvrir Charles Baudelaire et Joris-Karl Huysmans, et par son professeur de philosophie qui oppose le positivisme (« ordre et progrès ») aux pensées hégéliennes (« liberté de la conscience de soi ») qu’affectionne le jeune homme3. Il se lie d’amitié avec Théodore Fraenkel et René Hilsum qui publie ses premiers poèmes dans la revue littéraire du collège. Au dépit de ses parents qui le voyaient ingénieur, Breton entre en classe préparatoire au PCN4 avec Fraenkel.\r\n\r\nAu début de 1914, il adresse quelques poèmes à la manière de Stéphane Mallarmé, à la revue La Phalange que dirige le poète symboliste Jean Royère. Ce dernier les publie et met Breton en relation avec Paul Valéry.\r\n\r\nÀ la déclaration de guerre, le 3 août, il est avec ses parents à Lorient. Il a pour seul livre un recueil de poèmes d’Arthur Rimbaud qu’il connait mal. Jugeant sa poésie si « accordée aux circonstances », il reproche à son ami Fraenkel sa tiédeur devant « une œuvre aussi considérable ». Pour sa part, il proclame « l’infériorité artistique profonde de l’œuvre réaliste sur l’autre5. » Déclaré « bon pour le service » le 17 février 1915, Breton est mobilisé au 17e régiment d\'artillerie et envoyé à Pontivy, dans l’artillerie, pour faire ses classes dans ce qu\'il devrait plus tard décrire comme « un cloaque de sang, de sottise et de boue6. » La lecture d\'articles d\'intellectuels renommés comme Maurice Barrès ou Henri Bergson, le conforte dans son dégoût du nationalisme ambiant. Début juillet 1915, il est versé dans le service de santé comme infirmier et affecté à l\'hôpital bénévole de Nantes7. À la fin de l\'année, il écrit sa première lettre à Guillaume Apollinaire à laquelle il joint le poème Décembre8.\r\n\r\nEn février ou mars 1916, il rencontre un soldat en convalescence : Jacques Vaché. C’est le « coup de foudre » intellectuel. Aux tentations littéraires de Breton, Vaché lui oppose Alfred Jarry, la « désertion à l’intérieur de soi-même » et n’obéit qu’à une loi, l’« Umour (sans h) ». Découvrant dans un manuel9 ce que l’on nomme alors la « psychoanalyse » de Sigmund Freud10, à sa demande, Breton est affecté au Centre de neurologie à Saint-Dizier que dirige un ancien assistant du docteur Jean-Martin Charcot. En contact direct avec la folie, il refuse d’y voir seulement un déficit mental mais plutôt une capacité à la création11. Le 20 novembre 1916, Breton est envoyé au front comme brancardier.\r\n\r\nDe retour à Paris en 1917, il rencontre Pierre Reverdy avec qui il collabore à sa revue Nord-Sud et Philippe Soupault que lui présente Apollinaire : « Il faut que vous deveniez amis. » Soupault lui fait découvrir Les Chants de Maldoror de Lautréamont, qui provoquent chez lui une grande émotion12. Avec Louis Aragon dont il fait la connaissance à l’hôpital du Val-de-Grâce, ils passent leurs nuits de garde à se réciter des passages de Maldoror au milieu des « hurlements et des sanglots de terreur déclenchés par les alertes aériennes chez les malades » (Aragon).\r\n\r\nDans une lettre de juillet 1918 à Fraenkel, Breton évoque le projet en commun avec Aragon et Soupault, d’un livre sur quelques peintres comme Giorgio De Chirico, André Derain, Juan Gris, Henri Matisse, Picasso, Henri Rousseau... dans lesquels serait « contée à la manière anglaise » la vie de l’artiste, par Soupault, l’analyse des œuvres, par Aragon et quelques réflexions sur l’art, par Breton lui-même. Il y aurait également des poèmes de chacun en regard de quelques tableaux.\r\n\r\nMalgré la guerre, la censure et l’esprit antigermanique, parviennent de Zurich, Berlin ou Cologne, les échos des manifestations Dada ainsi que quelques-unes de leurs publications comme le Manifeste Dada 3. Au mois de janvier 1919, profondément affecté par la mort de Jacques Vaché, Breton croit voir en Tristan Tzara la réincarnation de l’esprit de révolte de son ami : « Je ne savais plus de qui attendre le courage que vous montrez. C’est vers vous que se tournent aujourd’hui tous mes regards13. »\r\n\r\n§','2015-03-04','2015-06-07',1),
	(2,'Henry','Miller','henry_miller_big.jpg','henry_miller_small.png','1980-07-26','1891-12-26','Henry Miller est le fils d\'Heinrich Miller, un entrepreneur et un tailleur américain d\'origine bavaroise et de Louise Marie Neiting. Il grandit à Brooklyn, dans un environnement familial protestant non pratiquant. Sa jeunesse est marquée par l\'errance : il enchaîne les petits boulots, entame de brèves études au City College of New York. Il devient ensuite directeur du personnel d\'une importante société télégraphique, la Western Union Telegraph. En 1924, il rencontre June, qui deviendra sa deuxième épouse. C\'est sous son impulsion qu\'il abandonne son travail de directeur de personnel afin de se consacrer totalement à la littérature. June Miller sera sa muse littéraire : dans ses romans autobiographiques, elle apparaît sous le nom de Mona, notamment dans la trilogie La Crucifixion en rose3.\r\n\r\nEn 1930, Henry Miller décide de quitter les États-Unis pour ne plus y retourner (cette décision est en partie motivée par sa rupture avec June). Il embarque vers l\'Europe et s\'installe en France, où il vit jusqu\'à ce qu\'éclate la Seconde Guerre mondiale. Ses premières années de bohème à Paris sont misérables ; il doit souvent lutter contre le froid et la faim. Dormant chaque soir sous un porche différent, courant après les repas offerts, la chance se présente un soir en la personne de Richard Osborn, un avocat américain, qui lui offre une chambre dans son propre appartement. Chaque matin, Osborn laisse un billet de 10 francs à son intention sur la table de la cuisine. Il reste neuf ans à Paris avant de s\'embarquer pour la Grèce à l\'invitation de Lawrence Durrell, un ami écrivain habitant Corfou. Il reste presqu\'une année en Grèce, voyageant dans le Péloponnèse, Corfou, la Crète et l\'Attique avant de rentrer aux États-Unis à l\'aube du déclenchement de la seconde guerre. Henry Miller a décrit son périple grec dans le Colosse de Maroussi (1941) qu\'il considérait lui-même comme son meilleur livre.','2015-03-11','2015-03-11',0),
	(3,'Isabelle','Saporta','photo931939438436843135.jpg','logo216347080485913695.png','1973-01-01','0000-00-00','Le 6 juillet 1972, Isabelle voit le jour à Sainte-Félicité, en Gaspésie, un hameau situé à l\'est de Matane. À deux ans et demi, la petite Isabelle connaît déjà ses premiers frissons d\'interprète… juchée sur le juke-box du restaurant de ses parents. L\'air choisi lui sied à ravir : Une rose pour Isabelle, de Roger Whittaker. « Ma grand-mère me chantait tout le temps une chanson western qui disait : \"C\'est l\'histoire d\'une jeune fille qui n\'avait que ses seize ans/ Qui partit pour la grande ville malgré tous ses bons parents\". Elle me disait : \"Tu vas faire une actrice ou une chanteuse.\" »\r\n\r\nDe 7 à 11 ans, Isabelle chante tous les week-ends dans les bars avec un groupe. Déménagée à Matane au début de son adolescence, elle vit difficilement ce changement; elle cesse donc de chanter en public. En 1988, des amis qui apprécient son talent l\'inscrivent à son insu à un concours qui se déroule à Matane. Elle y fait la rencontre de Josélito Michaud, alors membre du jury. \r\n\r\nAu Festival en chanson de Petite-Vallée en 1990, elle remporte le prix d\'interprétation et le prix du public avec la chanson Les gens de mon pays, de Gilles Vigneault. L\'année suivante, au Festival international de la chanson de Granby, elle décroche le prix de la meilleure interprète grâce à son interprétation d\'Amsterdam, de Jacques Brel, et de Naufrage, de Gilbert Langevin et Dan Bigras. La voilà lancée... Elle quitte Québec pour Montréal et devient choriste pour Dan Bigras. Josélito Michaud devient son agent en 1992 et ils fondent ensemble les Productions Sidéral deux ans plus tard. L\'année 1995 est déterminante pour Isabelle, qui prête sa voix à la comédienne qui joue Alys Robi, dans une télésérie qui relate l\'histoire de la chanteuse internationale. Elle y interprète fabuleusement quelques-uns de ses succès, comme Tico Tico, Amor Amor, Brésil. Puis, il y a cette importante rencontre avec Luc Plamondon. « Elle est venue chez moi pour auditionner pour le rôle de Marie-Jeanne… C\'était tellement beau! Elle m\'a dit sur la galerie, en sortant : \"Donne-moi le rôle, je vais être bonne.\" Je lui ai fait confiance. » Isabelle devient alors la serveuse automate de Starmania. Jusqu\'en 1998, elle interprète 350 fois Le monde est stone sur diverses scènes européennes.\r\n\r\nEntièrement écrit et composé par Daniel DeShaime, son premier album sort en 1996 et il s\'intitule Fallait pas. On y retrouve son premier succès : Et mon cœur en prend plein la gueule. Deux ans plus tard, elle lance États d\'amour, réalisé par Olivier Bloch-Lainé. L\'album fait une entrée très remarquée, autant au Québec, 240 000 disques vendus et un prix Félix pour l\'interprète féminine de l\'année en 1999, qu\'en Europe, où l\'album devient la clé qui lui ouvre toutes les portes. Fruit d\'une collaboration entre Richard Cocciante et Luc Plamondon, la pièce Je t\'oublierai, je t\'oublierai tourne partout. Le PDG de V2 Music France à l\'époque, Thierry Chassagne, tombe sous le charme de la chanteuse et décide de la mettre sous contrat. À la même époque, elle fait une autre rencontre déterminante, celle de Jean-Valère Albertini, alors directeur artistique de la maison de disques française. \r\n\r\nEn 1999, elle brise la glace de la scène musicale parisienne au théâtre Déjazet, « là où Ferré se sentait comme chez lui ». Au printemps, elle chante pour la première fois sur la scène de l\'Oympia de Paris, à titre d\'invitée de Serge Lama. À l\'été, l\'album Scènes d\'amour, qui contient des duos avec Serge Lama, Francis Cabrel, Michel Rivard, Claude Léveillé et Éric Lapointe entre autres, est enregistré devant le public aux FrancoFolies de Montréal. En 1999, Isabelle obtient le Félix de l\'interprète féminine de l\'année et, en 2000, Scènes d\'amour remporte le Félix de l\'album de l\'année - populaire.\r\n\r\nDe retour en France en 2000, Isabelle assure la première partie de Francis Cabrel dans tout l\'Hexagone, puis en mars à l\'Olympia. En mai, elle participe au spectacle de Patrick Bruel au Zénith. En août, elle lance son quatrième album, Mieux qu\'ici-bas, réalisé par Benjamin Biolay. Il s\'écoule à près de deux millions d\'exemplaires… L\'année suivante, portée par le raz-de-marée créé par l\'album, Isabelle surfe de récompenses en triomphes : deux Victoires de la Musique, pour l\'Album Découverte de l\'Année et l\'Artiste Découverte de l\'Année, des prestations à l\'Olympia et au Zénith et un détour par la Suisse et la Belgique… Au Québec, elle enchaîne une centaine de spectacles, s\'arrêtant au Gala de l\'ADISQ pour accepter deux nouveaux Félix, ceux pour l\'album de l\'année - populaire et le spectacle de l\'année - interprète.\r\n\r\nEn 2002, Isabelle enregistre deux disques : la compilation Ses plus belles histoires et Au moment d\'être à vous, un mariage de reprises de ses propres succès et de classiques de la chanson française, enregistrés en concert avec l\'Orchestre symphonique de Montréal. Au moment d\'être à vous remporte un succès énorme : plus de 600 000 exemplaires sont vendus en France et elle remporte le Félix de l\'interprète féminine de l\'année en 2002 et en 2003. Mais, la petite fille de Sainte-Félicité décide tout de même de s\'accorder une pause, le temps de faire le point. « Pour, comme je le dis souvent, laisser l\'eau remonter dans le puits », admet-elle. Cette année-là marque aussi la fin de son association professionnelle avec Josélito Michaud. \r\n\r\nEn 2003, elle enchaîne quatre prestations à l\'Olympia, en version symphonique. Comme elle a pris une année sabbatique, Isabelle en profite pour rejoindre Johnny Hallyday sur scène chaque soir pour chanter avec lui J\'oublierai ton nom. L\'année suivante, elle sort son septième album, Tout un jour. Écrites entre autres par Francis Cabrel, Zachary Richard et Daniel Bélanger, les chansons portent des titres révélateurs comme J\'irai jusqu\'au bout, Telle que je suis et Je voudrais. « C\'est un album très personnel et important pour moi, confie-t-elle. Il représente l\'aube d\'une nouvelle ère. Tout ce que j\'ai traversé et vécu est dans Tout un jour. » S\'ensuit une tournée dans la vaste francophonie pendant deux ans, avec une escale africaine à Carthage, en Tunisie, où 11 000 admirateurs entassés dans un amphithéâtre romain chantent en chœur ses chansons. En 2005, elle gagne le Félix de l\'artiste québécois s\'étant le plus illustré hors Québec et le spectacle de l\'année – interprète.\r\n\r\nElle lance Du temps pour toi en 2006, un album live qui immortalise la tournée de Tout un jour. Elle sort de plus un premier DVD, tiré du même spectacle. À l\'automne, les Productions Sidéral deviennent Chic Musique et Isabelle s\'adjoint à Marc-André Chicoine, à titre d\'agent et de producteur. Isabelle signe également un accord de licence avec Audiogram pour la distribution de ses disques. Désormais, c\'est elle qui tient les rênes de sa carrière. \r\n\r\nEn février 2007, elle lance le bien nommé De retour à la source, un disque qu\'elle porte en elle depuis toujours. Son son country fait écho aux musiques qui l\'ont bercée depuis sa plus tendre enfance. Elle y raconte entre autres choses son coin de pays dans Entre Matane et Baton Rouge, sa jeunesse dans Un monde à refaire et elle rend hommage à une tante adorée dans Adrienne. Le public et la critique sont conquis : elle vend plus de 130 000 albums et elle remporte trois Félix au Gala de l\'ADISQ de 2007, soit ceux de l\'interprète féminine de l\'année, de l\'album de l\'année – country et du spectacle de l\'année – interprète.\r\n\r\nL\'année suivante, elle sort Nos lendemains, réalisé par Dominique Blanc-Francard, le complice de Camille, Raphaël, Françoise Hardy et Stephan Eicher. Le disque présente des chansons composées par Julien Clerc, Maxime Le Forestier, Jean-Louis Murat, Benjamin Biolay et Jacques Veneruso. C\'est une chanson country de Ron Sexsmith, traduite en français, qui donne le titre à l\'album. Elle fait sa rentrée montréalaise au Théâtre St-Denis avec le spectacle baptisé Ta route est ma route, où elle présente du matériel inédit et des grands succès. En mars, Isabelle donne rendez-vous à ses fans français à l\'Olympia de Paris, après presque trois ans d\'absence. Puis, elle fait une tournée en France, en Suisse, en Belgique et au Luxembourg. Un mois seulement après son arrivée sur le marché français, Nos lendemains est certifié disque d\'or. Mais, ce qu\'on ne sait pas encore, c\'est qu\'Isabelle a un petit secret qui l\'émerveille, qui pousse et qui donne des coups... Le 20 octobre 2008, Marcus voit le jour. Deux semaines plus tard, Isabelle reçoit trois Félix au Gala de l\'ADISQ, pour l\'artiste québécois s\'étant le plus illustré hors Québec, l\'interprète féminine de l\'année et le spectacle de l\'année - interprète. Elle offre son dernier tour de chant dans la province en février 2009, conclut par la suite sa tournée européenne; puis, elle s\'arrête durant quelques mois, question de préparer un autre album. Le 26 novembre, elle sort Chansons pour les mois d\'hiver.\r\n\r\nEn 2011, Isabelle revient avec le disque Les grands espaces, réalisé par Benjamin Biolay. L\'opus aux accents folk et country comprend des chansons inédites signées entre autres par Jean-Louis Murat, Benjamin Biolay, Michel Rivard et Steve Marin. L\'interprète se fait également un plaisir de revisiter quelques classiques, comme ceux de Phil Spector, Daniel Lanois, Lee Hazlewood, Julien Clerc et Etta James. Soulignons de plus la participation exceptionnelle de la vedette country Dolly Parton, qui chante en duo avec elle la pièce True Blue, enregistrée à Nashville.','2015-04-10','2015-05-06',0),
	(4,'Bernard','Tapie','photo790388132708203263.jpg','logo1476384626935021311.png','1943-01-26','0000-00-00','Sous l\'impulsion de Marcel Loichot, Bernard Tapie devient ensuite consultant (« ingénieur-conseil » à l\'époque) au sein du cabinet de conseil SEMA spécialisé en redressement d\'entreprises. En 1977, il se met à son compte et se spécialise dans le rachat d\'entreprises en dépôt de bilan. Le 23 octobre 1980, suite au dépôt de bilan de la société Manufrance prononcé par le tribunal de commerce de Saint-Étienne, sans réussir à mettre la main sur les actifs de l\'entreprise, il obtiendra l\'exploitation de la marque Manufrance. Il fait ensuite parler de lui dans les médias pour la première fois en 1980, après avoir racheté très en dessous de leur valeur les châteaux du dictateur de Centrafrique Jean-Bedel Bokassa, en lui faisant croire que ses châteaux allaient être saisis par les autorités françaises. Bokassa porte plainte contre Bernard Tapie, le tribunal d\'Abidjian fait annuler la vente, ce qui est confirmé par un jugement exécutoire du Tribunal de grande instance de Paris, le 10 décembre 19817.\r\n\r\nDans les années 1980, Bernard Tapie accélère le rythme des rachats d\'entreprises. Sa méthode, qui suscite la curiosité de beaucoup d\'entrepreneurs, repose sur trois piliers essentiels8 :\r\n\r\nla renégociation des dettes des sociétés. Les sociétés cibles étant en dépôt de bilan, donc amenées à disparaître, et n\'ayant généralement pas assez d\'actifs pour espérer couvrir leurs dettes ; les créanciers, fidèles à l\'adage selon lequel « mieux vaut trois fois rien que rien du tout », acceptent d\'abandonner l\'essentiel de leur dette contre la certitude d\'être payés immédiatement d\'une petite partie.\r\nla réduction des coûts, notamment par l\'investissement dans la modernisation des méthodes de production, qui va de pair avec la réduction des effectifs. C\'est l\'aspect le plus controversé de la méthode : très fréquemment, Bernard Tapie essuie les critiques sur les nombreux licenciements qu\'il a opérés. Critiques auxquelles il répond « qu\'à choisir entre une entreprise qui meurt, avec la totalité de ses salariés qui deviennent chômeurs ; et une entreprise qui survit, mais avec la moitié de ses salariés seulement ; je préfère la deuxième solution et sauver la moitié des emplois. Et je crois que l\'économie française préfère aussi »9.\r\nla recherche de nouveaux débouchés (diversification). En restant sur leur seul marché d\'origine, les sociétés cibles ont fini en dépôt de bilan. Réduire les dettes et les coûts n\'étant souvent pas suffisant pour assurer le redressement, la recherche de nouveaux débouchés est primordiale. Bernard Tapie tente donc de faire preuve de créativité, et de trouver ainsi de nouvelles sources de revenus aux entreprises qu\'il rachète. Pour la société Look, fabricante de fixation de ski, il cherche à compenser la saisonnalité des ventes, exclusivement hivernale. Il fera ainsi fabriquer par la société les premières pédales de vélo déchaussables, sur le même principe que les fixations de ski, pour éviter les blessures occasionnées lors des chutes à vélo par les traditionnelles pédales « coques ». Pour la société Wonder, à la suite de la mort d\'un bébé ayant avalé des piles d\'une autre marque, empoisonné par le mercure contenu dans les piles, il fait créer la première pile sans mercure, la GreenPower, choisie dans toutes les zones à forte concentration d\'enfants.\r\nSes sociétés les plus connues sont Terraillon (rachetée 1 franc en 1981, revendue 125 millions de francs en 1986 à l\'américain Measurement Specialities) ; Look (rachetée 1F en 1983, revendue pour 260 millions de francs en 1988 au propriétaire des montres suisses Ebel), La Vie claire (rachetée 1F en 1980, revendue à Distriborg par le CDR en 1995) ; Testut (rachetée 1F en 1983, revendue par le CDR en 1999 au groupe américano-suisse Mettler Toledo) ; Wonder (rachetée 1F en 1984, revendue pour 470 millions de francs en 1988 à l\'américain Ralston) ; Donnay (rachetée 1F en 1988, revendue pour 100 millions de francs en 1991 à la région Wallonne).','2015-04-26','2015-04-27',0),
	(5,'Luke','Wroblewski','photo1362893657031720447','logo1310206650175221247','1975-01-01','0000-00-00','Luke is currently a Product Director at Google. Earlier he was the CEO and Co-founder of Polar (acquired by Google in 2014) and the Chief Product Officer and Co-Founder of Bagcheck (acquired by Twitter in 2011).\r\n\r\nPrior to founding start-ups, Luke was an Entrepreneur in Residence (EIR) at Benchmark Capital, the Chief Design Architect (VP) at Yahoo!, Lead User Interface Designer at eBay, and a Senior Interface Designer at NCSA: the birthplace of the first popular graphical Web browser, NCSA Mosaic.\r\n\r\nLuke is the author of three popular Web design books (Mobile First, Web Form Design & Site-Seeing: A Visual Approach to Web Usability) in addition to many articles about digital product design and strategy. He is also a consistently top-rated speaker at conferences and companies around the world, and a Co-founder and former Board member of the Interaction Design Association (IxDA).\r\n\r\nLuke also founded LukeW Ideation & Design, a product strategy and design consultancy, and taught graduate interface design courses at the University of Illinois.\r\n\r\nLuke\'s complete resume and recommendations are available on LinkedIn.','2015-06-06','2015-06-07',1),
	(6,'Ethan','Marcotte','photo1441899897794877439.jpg','logo1003172784025793279.png','1970-03-07','0000-00-00','Ethan vit à Boston, Massachusetts, et se passionne pour la belle conception, le code élégant, et l\'intersection des deux. Il est un conférencier populaire et expérimenté, ayant été présenté lors d\'un événement Apart, Carsonified atelier, et South by Southwest, et co-organisateur de la série de séminaires Handcrafted CSS avec Dan Cederholm.\r\nPlus de faits amusants: Ethan a un blog , et Blathers sans cesse sur Twitter . Sa clientèle a inclus People Magazine, le New York Magazine, le Festival du film de Sundance, The Boston Globe, et le Consortium World Wide Web. Aussi, il est grand.\r\nEst disponible pour de nouveaux engagements à partir de Septembre 2013 Ethan. Si vous souhaitez entrer en contact, s\'il vous plaît le faire !','2015-06-06','2015-06-06',0);

/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table book_reserved
# ------------------------------------------------------------

DROP TABLE IF EXISTS `book_reserved`;

CREATE TABLE `book_reserved` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reserved_from` date NOT NULL,
  `reserved_to` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `book_reserved` WRITE;
/*!40000 ALTER TABLE `book_reserved` DISABLE KEYS */;

INSERT INTO `book_reserved` (`id`, `book_id`, `user_id`, `reserved_from`, `reserved_to`)
VALUES
	(31,3,3,'2015-06-03','2015-06-03'),
	(32,2,1,'2016-04-01','2016-03-01');

/*!40000 ALTER TABLE `book_reserved` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `front_cover` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `logo` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `summary` text COLLATE latin1_general_ci NOT NULL,
  `isbn` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `presentation_cover` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nbpages` int(11) NOT NULL,
  `datepub` date NOT NULL,
  `language_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL,
  `editor_id` int(11) NOT NULL,
  `creat_at` date NOT NULL,
  `update_at` date NOT NULL,
  `vedette` tinyint(1) NOT NULL DEFAULT '0',
  `nb_copy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;

INSERT INTO `books` (`id`, `title`, `front_cover`, `logo`, `summary`, `isbn`, `presentation_cover`, `nbpages`, `datepub`, `language_id`, `genre_id`, `library_id`, `editor_id`, `creat_at`, `update_at`, `vedette`, `nb_copy`)
VALUES
	(1,'Anthologie de l\'humour noir','book1029890640380970239.jpg','book_small524723400789222463.jpg','L\'humour noir est borné par trop de choses, telles que la bêtise, l\'ironie sceptique, la plaisanterie sans gravité... (l\'énumération serait longue), mais il est par excellence l\'ennemi mortel de la sentimentalité à l\'air perpétuellement aux abois - la sentimentalité toujours sur fond bleu - et d\'une certaine fantaisie à court terme, qui se donne trop souvent pour la poésie, persiste bien vainement à vouloir soumettre l\'esprit à ses artifices caducs, et n\'en a sans doute plus pour longtemps à dresser sur le soleil, parmi les autres graines de pavot, sa tête de grue couronnée. ','225303424X ','book_presentation_cover556264826887876223.jpg',255,'1940-01-01',1,1,1,1,'2015-03-04','2015-04-17',0,2),
	(2,'La Crucifixion en rose','book311828174281316607.jpg','book_small1055306523980116735.jpg','On a pu dire de son œuvre qu\'elle était pornographique et immorale. Et jamais Henry Miller n\'aurait démenti ces propos. Aux États-Unis, Henry Miller est l\'homme par qui le scandale arrive. Le scandale de celui qui ose dire la vérité du sexe, obstinément et crûment. Dans Sexus, deuxième opus de son autobiographie, on retrouve un Henry Miller âgé d\'une trentaine d\'années qui, comme à l\'accoutumée, tire le diable par la queue, emprunte de l\'argent pour ne pas sombrer et rêve de devenir un grand écrivain. Nous sommes dans le Brooklyn des années vingt et la crise n\'est pas loin. Un jour, Miller rencontre dans un dancing une entraîneuse nommée Mara dont il tombe raide amoureux. Durant 7 ans, ils vivent une passion torride et dévastatrice. \"C\'était l\'apothéose de ma vie\", se souvient Miller au début de Sexus. L\'humour de Henry Miller n\'a pas d\'équivalent. Un mélange détonnant de fausse culpabilité juive, d\'égoïsme revendiqué et de conscience aiguisée de la lâcheté masculine. Mais, pour Miller, tout se noue et s\'enroule autour du corps des femmes. Sexe über alles ! Le sexe, comme le pensait Miller, est le domaine naturel du roman. Il devient dans Sexus la matière première du livre, transformée aussi bien en intrigue dramatique qu\'en observation sociale, en philosophie hédoniste qu\'en rempart ultime et unique contre la mort. --Denis Gombert ','B003TVZF7U ','book_presentation_cover1464884986217059839.jpg',255,'1960-01-01',1,2,1,2,'2015-03-11','2015-04-17',0,2),
	(3,'Le livre noir de l\'agriculture','book1740659771498280703.jpg','book_small314106377273631775.jpg','Isabelle Saporta est journaliste. Elle a longtemps préparé les émissions de Jean-Pierre Coffe sur France Inter. Elle est l’auteur de documentaires, dont « Manger peut-il nuire à notre santé ? »\r\nVous souvenez-vous des Shadoks, ces étranges oiseaux qui passaient leur vie à pomper, pomper, pomper et à inventer des machines toujours plus absurdes ? Les Shadoks, aujourd’hui, c’est nous, ou plutôt notre agriculture. Onéreuse, elle ne respecte ni le pacte social qui la lie aux paysans, ni le pacte environnemental qui la lie aux générations futures, ni même le pacte de santé publique qui la lie à chacun de nous. Les ressources d’eau sont gaspillées, polluées. Nous recevons chaque jour dans nos assiettes notre dose de pesticides et autres résidus médicamenteux. L’agriculteur ne s’en sort plus, et il est injustement voué aux gémonies, lui qui n’est que le bouc émissaire d’un système qu’il subit. Pendant deux ans, Isabelle Saporta a parcouru les campagnes françaises. Dans cette enquête, elle met au jour l’absurdité du système, en le remontant de la fourche à la fourchette. La conclusion semble s’imposer : puisque notre agriculture pose plus de problèmes qu’elle n’en résout, il est urgent de changer de cap. Des solutions existent, les mettre en œuvre serait aisé. Il suffirait d’une seule chose : que nos élus fassent preuve d’un peu de courage politique. Or, aujourd’hui, ce courage semble faire cruellement défaut.','jnkkqs','book_presentation_cover808141764029794175.jpg',300,'2013-01-18',1,20,1,1,'2015-04-10','2015-04-17',0,2),
	(5,'Un scandale d\'Etat, oui !','book746484435615318015.jpg','book_small494679103601813887.jpg','Les perquisitions des locaux des différents protagonistes de l’affaire du Crédit Lyonnais se succèdent depuis ces derniers jours et font la une de toute la presse. Après avoir perquisitionné le 24 janvier dernier les domiciles de Bernard Tapie et de Stéphane Richard, directeur de cabinet de la ministre de l’Economie – Christine Lagarde – au moment de l’arbitrage entre Bernard Tapie et le Crédit Lyonnais sur la vente d’Adidas, les juges d’instruction ont visité le 25 janvier les cabinets de l’avocat de Bernard Tapie et d’un des avocats du Consortium de Réalisation. Le 29 janvier dernier, c’était au tour des trois juges du tribunal arbitral ayant soldé ce contentieux de voir leurs domiciles perquisitionnés. Pour mettre fin aux rumeurs et contre vérités qui circulent autour de cette affaire complexe et très médiatisée, Bernard Tapie a décidé de dire toute LA vérité.','222222277','book_presentation_cover1465596102303977471.jpg',400,'2013-06-23',1,22,1,5,'2015-04-26','2015-04-27',0,3),
	(6,'Mobile First. N°6','book365843172941522975','book1233293893123041791.','Le designer de renom, ancien architecte du design de Yahoo!, Luke Wroblewski, nous fait partager dans ce petit guide stratégique toutes ses connaissances et son savoir-faire en matière d\'expérience mobile. Nul doute qu\'il saura vous convaincre de la nécessité d\'adopter l\'approche mobile first, qui consiste à donner la priorité aux mobiles lors de la conception d\'un site Web et ce, non seulement afin d\'ouvrir de nouvelles perspectives de croissance, mais aussi afin d\'améliorer l\'expérience utilisateur globale du site. Les stratégies orientées données et les techniques éprouvées décrites dans cet ouvrage essentiel feront de vous un maître des mobiles et vous aideront également à améliorer vos designs non mobiles.','12345678','book538631146478857663.',200,'2012-01-19',1,28,1,6,'2015-06-06','2015-06-06',0,2),
	(7,'Responsive Web design, N°4','book1207169659345963775','book452798013802129087.','Découvrez le responsive Web design, et apprenez à concevoir des sites Web agréables qui anticipent et répondent aux besoins de vos utilisateurs. En explorant des techniques CSS et des principes généraux de design, comme les grilles fluides, les images flexibles et les media queries, Ethan Marcotte démontre qu\'il est possible d\'offrir une expérience utilisateur de qualité, quelle que soit la taille, la résolution ou l\'orientation de l\'écran qui affiche le site.','12345678','book959327531830904063.',200,'2001-09-11',1,28,1,6,'2015-06-06','2015-06-06',0,3);

/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table editors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `editors`;

CREATE TABLE `editors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `bio_text` text COLLATE latin1_general_ci NOT NULL,
  `website` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `logo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `editors` WRITE;
/*!40000 ALTER TABLE `editors` DISABLE KEYS */;

INSERT INTO `editors` (`id`, `name`, `bio_text`, `website`, `logo`, `create_at`, `update_at`)
VALUES
	(1,'livre de poche','Les livres de poche dont le principe est de tenir dans une poche, avaient déjà existé. Au xviie et xviiie siècles, les livres de colportage sont des ouvrages qui par leur format et dans une certaine mesure leur conception rappellent le livre de poche actuel. Dans les années 1830, certains éditeurs de Bruxelles, pour des raisons politiques et de censure, publient de petits livres. Dès 1856, la maison d\'édition Michel Lévy frères crée la « collection Michel Lévy » à un franc et en petit format. Dans les premières année du xxe siècle, la collection Nelson publie des ouvrages de petit format, cartonnés, toilés et recouverts d\'une jaquette illustrée. En 1905, Fayard lance le « Livre populaire », romans populaires à 65 centimes de petit format et en 1916 les éditions Jules Tallandier commercialisent une collection concurrente, Livre de poche, des romans populaires encore moins chers, dont Hachette devra d\'ailleurs racheter le nom, comme Le Livre Plastic, collection créée en 1948 par Marabout1. Dans les années 1930, la maison d\'édition britannique Penguin Books publie des livres de poche et l\'éditeur américain Simon & Schuster lance sur le même modèle en 1939 les Pocket Books (en)2. Mais le succès rencontré par Le Livre de poche tient à la conjonction de ce nouvel objet de consommation avec l\'époque et la demande populaire et estudiantine d\'un livre bon marché (en 1953, il est six fois moins cher qu\'un ouvrage grand format grâce à un papier en bobines peu coûteux3, à une reliure arraphique4 d\'une nouvelle machine, le perfect binder, qui fabrique un brochage résistant avec le dos du volume collé, et à une couverture glacée recouverte d\'un vernis transparent qui la rend résistante5) et désacralisé, présenté sous des couvertures rappelant les affiches de cinéma, mais néanmoins véhicule d\'une littérature de qualité.\r\n\r\nUne légende veut que Filipacchi ait eu l\'idée de ce format en voyant un jour un soldat américain acheter un livre dans une librairie française, et le déchirer en deux pour qu’il puisse entrer dans les poches de son battle dress6.\r\n\r\nHenri Filipacchi réussit à convaincre ses amis éditeurs Albin Michel, Calmann-Lévy, Grasset et Gallimard de s\'associer à son projet et de devenir ainsi les « pères fondateurs » du Livre de poche qui selon son vœu doit publier le texte intégral de grands auteurs tombés dans le domaine public7.\r\n\r\nLes libraires sont d\'abord réticents face à ce « livre industriel » au prix agressif qui risque de faire chuter leur chiffre d\'affaires et qui est présenté en libre service sur un tourniquet placé près de l\'entrée de leur boutique, ce qui est ressenti comme une menace à leur vocation culturelle.','http://www.livredepoche.com/','livre_de_poche.png','2015-03-04','2015-03-04'),
	(2,'Buchet-Chastel','À son origine se trouve la maison d\'édition fondée en 1929 par Roberto Corrêa qui publie notamment François Mauriac, Jacques Maritain et Benjamin Crémieux. Les éditions Corrêa sont reprises en 1936 par Edmond Buchet et Jean Chastel qui en font par la suite les éditions Buchet/Chastel. Le nom de « Corrêa » reste utilisé après 19361.\r\n\r\nLa maison connaît sa période faste de 1936 à 1968. Elle publie Vlaminck, Maria Le Hardouin, Pierre Molaine, Maurice Sachs, Erskine Caldwell, Malcolm Lowry (Au-dessous du volcan). Elle obtient en 1937 le Prix Goncourt avec le roman Faux Passeports de Charles Plisnier. Elle accueille dans ses « Pages immortelles » Romain Rolland, André Maurois, Thomas Mann, Stefan Zweig, André Gide, François Mauriac, Paul Valéry. Elle découvre entre autres Henry Miller, Lawrence Durrell (Le Quatuor d\'Alexandrie), Carl Gustav Jung, lance avec succès Jean Bernard, Guy Debord (La Société du spectacle), Roland Topor (Le Locataire chimérique) et crée la collection « Musique » qui fait aujourd\'hui autorité.\r\n\r\nEn 1969, Guy Buchet, le fils du fondateur, prend la direction qu\'il garde jusqu\'en 1995, en en conservant l\'esprit authentique.\r\n\r\nEn 1995, la maison est rachetée par Pierre Zech, puis, en avril 2000, par Vera et Jan Michalski, propriétaire de Noir sur Blanc, qui créent le groupe Libella. La directrice littéraire Pascale Gautier, elle-même romancière, redynamise le département de littérature française et relance celui de littérature étrangère ; le catalogue s\'élargit au dessin avec la collection « Les Cahiers dessinés », au voyage avec la revue « Le Journal des lointains », à la poésie étrangère et, depuis 2005, au roman noir.','http://www.buchetchastel.fr/','buchet-chastel801531809887087999.png','2015-03-11','2015-04-27'),
	(5,'Plon','C’est en 1852 qu\'est créée à Paris par Henri Plon (1806-1872) la Librairie Plon, qualifiée également de Typographie. Henri est le fils de Philippe Plon (1774-1843), petit-fils d\'Emmanuel Plon (1742-1832), un imprimeur originaire de Nivelles. Philippe fut prote (chef d\'atelier) chez Firmin-Didot puis à l\'imprimerie de la Banque de France4. Henri débuta également chez Firmin-Didot, puis auprès de Thermidor Belin, le fils de François Belin, imprimeur installé à Sézanne. En 1833, Maximilien Béthune, imprimeur rue de Vaugirard, T. Belin et Henri Plon forme la société Béthune, Belin et Plon qui deviendra en 1835 Béthune et Plon. Dans les années 1840, le succès est au rendez-vous. Henri fait venir ses trois frères, Charles, Hippolyte et Louis-Charles, rachète la succession de Béthune, et forme la société Typographie des Abeilles, Plon frères et Cie. En 1850, ils furent les premiers en France à utiliser la machine à vapeur pour l\'impression, un procédé venu d\'Angleterre. Au début des années 1850, la maison Plon est principalement un imprimeur, laquelle ne cache pas son soutien au nouveau régime5.\r\n\r\nHenri et ses frères ouvrent en 1852 des locaux situés 8 rue Garancière, qui abritait à la fois un atelier de production et une maison d\'édition. Les frères Plon reçurent à cette époque le titre de « Libraire-imprimeur de l’Empereur » et publièrent les correspondances de Louis XIII, de Marie-Antoinette et de Napoléon, un catalogue qui assura le succès. Henri fut également président de la Chambre des Imprimeurs et vice-président du Cercle de la Librairie. Son fils Eugène Plon (1836-1895) s\'associe en 1873 à son beau-frère Louis-Robert Nourrit et à Émile Perrin sous la dénomination Plon, Nourrit et Cie. Eugène fut président du Cercle de la Librairie dans les années 1870-80. Après le départ de Perrin en 1883 et la mort d\'Eugène en 1895, l\'atelier est abandonné au profit des seuls métiers d\'éditeur par la nouvelle direction confiée à Pierre Mainguet et à son beau-frère, Henri-Joseph Bourdel, les petits-enfants d\'Henri.\r\n\r\nEntre 1900 et 1930, Plon, Nourrit et Cie s\'ouvrit à la littérature et aux essais, rivalisant avec Calmann-Lévy ou Flammarion et la maison est rebaptisée Librairie Plon, les petits-fils de Plon & Nourrit. Au catalogue, l\'on trouve des auteurs de best-sellers comme Paul Bourget, Abel Hermant, Julien Green. La collection « Feux croisés », dirigée par Gabriel Marcel accueille des auteurs étrangers comme Graham Greene. En 1932, « Aventures », une collection de poche cartonné sous jaquette illustrée vendu 6 francs avec des auteurs comme Maurice Renard, Jack London, Pierre Mac Orlan connaît un succès mitigé mais son format et sa présentation feront florès vingt ans plus tard.\r\n\r\nMaurice Bourdel (5 juin 1889 - 2 septembre 1968), qui a succédé à son père, édite Henri Massis ou Robert Brasillach. Lors de la Libération, la ligne est différente puisqu\'il accueille les mémoires de Winston Churchill avant de devenir plus tard l\'éditeur attitré du Général de Gaulle, par le biais de Charles Orengo, directeur éditorial inspiré. En 1953, Jean Malaurie peut ainsi créer la collection « Terre humaine » où sera publié Claude Levi-Strauss.\r\n\r\nLe temps des fusions approchait. Le dernier descendant des Plon-Nourrit, Maurice Bourdel, quitte la présidence en 1963, offrant à Thierry de Clermont-Tonnerre, venu de l\'Union financière de Paris, la possibilité d\'entreprendre des économies d\'échelle, et ce, au détriment d\'Hachette6. Clermont-Tonnerre permit d\'associer Julliard au capital et de lancer la collection de poches « 10/18 » à travers une nouvelle structure juridique, l\'Union générale d\'édition (UGE) qui englobait Plon. En 1966, Sven Nielsen, fondateur des Presses de la Cité prit une part importante dans UGE7 et forma le noyau de ce qui allait devenir le Groupe de la Cité entre 1972 et 1996.\r\n\r\nCe groupe, après bien des tractations financières, est ensuite racheté par la Compagnie générale d\'électricité (CGE) en 1988 qui place Olivier Orban à la tête de Plon qui appartient désormais à un énorme groupe appelé CEP-Communication, lequel change de nom en 1998 pour devenir Havas Publications Édition (HPE). En 2001, HPE est absorbé par Vivendi Universal. Le groupe Vivendi rencontre alors de graves problèmes financiers et doit céder plusieurs maisons d\'éditions, dont Plon, à Wendel Investissement, qui les regroupe au sein d\'une nouvelle structure, Editis. En 2008, le groupe Editis a été revendu à l\'espagnol Grupo Planeta.','http://www.plon.fr/','plon1781278324907723775.png','2015-04-26','2015-05-06'),
	(6,'Eyrolles','Éditions Eyrolles : éditeur de livres spécialisés, informatique, sciences et techniques, BTP, audiovisuel, vie pratique et artisanat, catalogue de publications','http://www.editions-eyrolles.com/','eyrolles459218999.png','2015-06-06','2015-06-06');

/*!40000 ALTER TABLE `editors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table genres
# ------------------------------------------------------------

DROP TABLE IF EXISTS `genres`;

CREATE TABLE `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;

INSERT INTO `genres` (`id`, `name`, `create_at`, `update_at`)
VALUES
	(1,'littéraire','2015-03-04','2015-03-04'),
	(2,'Bricolage','2014-03-15','2015-04-09'),
	(5,'Roman','2014-03-15','2014-03-15'),
	(6,'Policier','2014-03-15','2014-03-15'),
	(7,'philosophie','2014-03-15','2014-03-15'),
	(8,'Science-fiction humoristique','2014-03-15','2014-03-15'),
	(9,'Light fantasy','2014-03-15','2014-03-15'),
	(15,'Roman','2014-03-15','2014-03-15'),
	(16,'Policier','2014-03-15','2014-03-15'),
	(17,'philosophie','2014-03-15','2014-03-15'),
	(18,'Science-fiction humoristique','2014-03-15','2014-03-15'),
	(19,'Light fantasy','2014-03-15','2014-03-15'),
	(20,'Architecture','2015-04-10','2015-04-30'),
	(22,'Politique','2015-04-26','2015-04-26'),
	(27,'qsq','2015-05-06','2015-05-06'),
	(28,'web','2015-06-06','2015-06-06');

/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table languages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `full_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;

INSERT INTO `languages` (`id`, `code`, `full_name`, `create_at`, `update_at`)
VALUES
	(1,'fr-BE','Français','2015-03-04','2015-03-04'),
	(2,'de','Allemand','2015-04-01','2015-03-02'),
	(3,'en','Anglais','2015-04-01','2015-01-02');

/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table librarys
# ------------------------------------------------------------

DROP TABLE IF EXISTS `librarys`;

CREATE TABLE `librarys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `logo` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `slogan` text COLLATE latin1_general_ci NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL,
  `about` text COLLATE latin1_general_ci,
  `email` varchar(255) COLLATE latin1_general_ci DEFAULT '',
  `director` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `librarys` WRITE;
/*!40000 ALTER TABLE `librarys` DISABLE KEYS */;

INSERT INTO `librarys` (`id`, `name`, `phone`, `logo`, `slogan`, `create_at`, `update_at`, `about`, `email`, `director`)
VALUES
	(1,'bookme','087/88.04.87','logo_bookme','Plus qu\'une simple bibliothèque','2015-03-04','2015-03-04','Ce site est purement fictif. Il constitue un travail scolaire dans le cadre du cours de programmation web côté serveur. Le but étant de créer une application qui serait un outil de gestion d’une bibliothèque. Ce site permet à un visiteur anonyme de consulter le contenu de la bibliothèque en utilisant les critères de son choix parmi la liste suivante, titre d’un livre, nom d’un auteur, genre ou éditeur. Un administrateur identifié a la possibilité d’ajouter, modifier ou supprimer les contenus présents dans la base de données. La présentation des contenus est paginée notamment dans la rubrique, tous les livres. Chaque fiche d’un livre présente toutes les informations qui le concernent. Ces informations sont pour la plupart cliquables et déclenchent l’affichage des livres liés à l’information cliquée. Les Formulaires d’administration permettent une édition sécurisée de la base de données. Les règles d’ergonomie en matière de conception d’interactions sont à l’œuvre avec notamment, l’affichage de feedbacks et de message informatifs. Certaines fonctionnalités ont été ajoutées. Le fait de rechercher depuis une barre de recherche, la possibilité de réinitialiser son mot de passe si une question de sécurité existe, la possibilité de réserver un livre pour une date maximum d’un mois et de modifier cette dernière. Ou encore la possibilité de poser une question à la communauté et d’y répondre. ','daniel.schreurs@hotmail.com','Daniel Schreurs');

/*!40000 ALTER TABLE `librarys` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;

INSERT INTO `questions` (`id`, `question`, `user_id`, `create_at`, `update_at`)
VALUES
	(1,'Comment faire une recherche ?',1,'2015-03-18','2015-03-18'),
	(2,'Pourquoi mon livre n’apprait-il pas ?',1,'2015-03-18','2015-03-18'),
	(3,'Pourquoi je ne peux pas réserver mon livre ?',1,'2015-03-18','2015-03-18');

/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `photo` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'default',
  `role` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT 'utilisateur',
  `question` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `photo`, `role`, `question`, `answer`)
VALUES
	(1,'Daniel','Schreurs','qzd','e666b7a011e9d5ece0a6cbc3125c1e0e2bda21a5','daniel.schreurs@hotmail.cm','user_cover.jpg','administrateur',NULL,NULL),
	(3,' Daniel','Schreurs','user','7cd3964cd94c1d129b1eb33a6735410d8b865058','daniel.schreurs@hotmail.com','default','utilisateur','la vie','123');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
