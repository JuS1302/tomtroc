-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 09 fév. 2026 à 20:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `user_id`, `title`, `author`, `description`, `image`, `is_available`, `created_at`) VALUES
(1, 1, 'Esther', 'Alabaster', 'J\'ai récemment plongé dans les pages de \"Esther\" et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table.\r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.\r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \"Esther\" incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'book1.jpg', 1, '2024-01-16 09:00:00'),
(2, 2, 'The Kinfolk Table', 'Nathan Williams', 'J\'ai récemment plongé dans les pages de \"The Kinfolk Table\" et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table.\r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.\r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers. \"The Kinfolk Table\" incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 'book2.jpg', 1, '2024-01-22 08:15:00'),
(3, 3, 'Wabi Sabi', 'Beth Kempton', 'Wabi Sabi est une philosophie japonaise qui célèbre la beauté de l\'imperfection et l\'acceptation du cycle naturel de croissance et de déclin. Ce livre magnifiquement illustré explore comment nous pouvons appliquer ces principes anciens à notre vie moderne.\r\n\r\nBeth Kempton nous guide à travers les sept concepts clés du wabi-sabi, nous aidant à trouver la paix dans l\'imperfection et à apprécier la beauté des choses simples et éphémères. \r\n\r\nÀ travers des histoires inspirantes, des exercices pratiques et des réflexions profondes, ce livre nous invite à ralentir, à observer et à trouver la sagesse dans les moments ordinaires de la vie quotidienne. Une lecture transformatrice pour quiconque cherche plus d\'authenticité et de sérénité.', 'book3.jpg', 1, '2024-02-03 10:00:00'),
(4, 4, 'Milk & Honey', 'Rupi Kaur', 'Milk and Honey est un recueil de poésie et de prose bouleversant qui explore les thèmes de la survie, de la violence, de l\'amour, de la perte et de la féminité. Divisé en quatre chapitres, chaque section traite d\'une douleur différente et offre une guérison différente.\r\n\r\nL\'écriture de Rupi Kaur est brute, honnête et profondément personnelle. Ses poèmes courts mais puissants touchent le cœur et l\'âme, résonnant avec des milliers de lecteurs à travers le monde. Les illustrations minimalistes ajoutent une dimension visuelle qui complète parfaitement les mots.\r\n\r\nCe livre est devenu un phénomène mondial, offrant réconfort et compréhension à ceux qui ont vécu des traumatismes, des peines de cœur et la recherche de soi. Une œuvre essentielle de la poésie contemporaine qui continue d\'inspirer et de guérir.', 'book4.jpg', 1, '2024-02-12 09:30:00'),
(5, 5, 'Disgrace!', 'Robert Williams', 'Disgrace! est une exploration audacieuse et provocante de l\'art moderne et de la contre-culture. Robert Williams, figure emblématique du mouvement Lowbrow, nous entraîne dans un voyage visuel et intellectuel à travers des décennies de création artistique subversive.\r\n\r\nCe livre richement illustré présente un éventail fascinant d\'œuvres qui défient les conventions et remettent en question les normes établies de l\'art contemporain. Williams partage ses réflexions sur la créativité, la rebellion et l\'importance de rester fidèle à sa vision artistique.\r\n\r\nÀ travers des essais incisifs et des reproductions d\'œuvres saisissantes, ce livre offre un regard unique sur l\'évolution de l\'art underground et son influence sur la culture populaire. Un incontournable pour les amateurs d\'art contemporain et ceux qui apprécient la créativité sans limites.', 'book5.jpg', 1, '2024-02-17 08:00:00'),
(6, 1, 'Milwaukee Mission', 'Christine Evans', 'Milwaukee Mission est un récit inspirant qui nous emmène dans un voyage extraordinaire de foi, de détermination et de transformation personnelle. Christine Evans partage son expérience bouleversante de mission humanitaire dans la ville de Milwaukee.\r\n\r\nÀ travers des anecdotes touchantes et des moments de révélation profonde, l\'auteure explore les thèmes de l\'espoir, de la résilience communautaire et du pouvoir de l\'action collective. Ce livre illustre comment un individu peut faire une différence significative dans la vie des autres.\r\n\r\nLes récits captivants d\'Evans révèlent les défis et les triomphes rencontrés lors de cette mission, offrant des leçons précieuses sur l\'empathie, le service et la découverte de soi. Une lecture motivante qui inspire à s\'engager davantage dans sa communauté et à poursuivre sa propre mission de vie.', 'book6.jpg', 1, '2024-01-18 13:30:00'),
(7, 2, 'Minimalist Graphics', 'Julia Schonlau', 'Minimalist Graphics est un guide visuel essentiel qui explore les principes fondamentaux du design minimaliste. Julia Schonlau présente une collection impressionnante de travaux contemporains qui démontrent la puissance de la simplicité dans la communication visuelle.\r\n\r\nCe livre richement illustré examine comment le minimalisme, en réduisant les éléments à leur essence, crée des designs plus impactants et mémorables. Chaque page présente des exemples inspirants de graphisme, de typographie et de mise en page qui incarnent cette philosophie.\r\n\r\nDes logos emblématiques aux affiches percutantes, en passant par l\'identité de marque et le design éditorial, ce livre couvre tous les aspects du design minimaliste. Accompagné d\'analyses détaillées et de conseils pratiques, c\'est une ressource inestimable pour les designers, créatifs et étudiants en arts visuels.', 'book7.jpg', 1, '2024-01-25 15:20:00'),
(8, 9, 'Hygge', 'Meik Wiking', 'Hygge (prononcé \"hoo-ga\") est le concept danois qui a conquis le monde entier. Meik Wiking, directeur de l\'Institut de Recherche sur le Bonheur de Copenhague, nous révèle les secrets de ce mode de vie qui fait du Danemark l\'un des pays les plus heureux au monde.\r\n\r\nCe livre chaleureux explore comment créer de l\'intimité, du confort et du bien-être dans votre vie quotidienne. Du choix de l\'éclairage parfait à l\'art de préparer un repas convivial, en passant par la création d\'espaces cosy, Wiking partage des conseils pratiques et inspirants.\r\n\r\nRichement illustré et rempli de recettes, d\'idées déco et d\'anecdotes touchantes, Hygge est plus qu\'un simple livre sur le lifestyle : c\'est une invitation à ralentir, à savourer les plaisirs simples et à cultiver le bonheur dans les petites choses. Un guide essentiel pour vivre mieux et plus heureux.', 'book8.jpg', 1, '2024-02-05 12:45:00'),
(9, 5, 'Innovation', 'Matt Ridley', 'Innovation est une exploration fascinante de la façon dont les idées naissent, évoluent et transforment notre monde. Matt Ridley, biologiste et auteur acclamé, nous emmène dans un voyage captivant à travers l\'histoire de l\'innovation humaine.\r\n\r\nCe livre révèle comment les innovations ne sont pas le fruit de génies isolés, mais plutôt le résultat de la collision et de la combinaison d\'idées existantes. Ridley démontre brillamment comment l\'innovation prospère dans des environnements d\'échange libre et de collaboration.\r\n\r\nDes outils de l\'âge de pierre aux technologies numériques d\'aujourd\'hui, Innovation explore les forces qui stimulent le progrès et les obstacles qui le freinent. Avec son style accessible et ses exemples concrets tirés de l\'histoire, de la science et de la technologie, ce livre offre une perspective unique sur l\'évolution humaine et notre capacité d\'adaptation.', 'book9.jpg', 1, '2024-02-20 13:15:00'),
(10, 4, 'Daring', 'Gretchen Rubin', 'Daring est un guide transformateur qui vous encourage à embrasser votre authenticité et à vivre courageusement. Gretchen Rubin, auteure du best-seller \"The Happiness Project\", partage ses recherches approfondies et ses expériences personnelles pour vous aider à oser être vous-même.\r\n\r\nÀ travers des histoires inspirantes, des exercices pratiques et des stratégies concrètes, ce livre explore comment surmonter la peur du jugement, cultiver la confiance en soi et prendre des risques calculés pour atteindre ses objectifs.\r\n\r\nRubin aborde des thèmes essentiels comme l\'authenticité, la vulnérabilité, la créativité et la résilience. Elle démontre comment sortir de sa zone de confort peut mener à une vie plus riche et plus épanouissante. Un livre motivant qui vous donnera le courage de poursuivre vos rêves et de vivre pleinement.', 'book10.jpg', 1, '2024-02-14 14:00:00'),
(11, 6, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'Thinking, Fast and Slow est une exploration magistrale des deux systèmes qui gouvernent notre pensée. Daniel Kahneman, psychologue et prix Nobel d\'économie, révèle les mécanismes fascinants de notre esprit et comment ils influencent nos décisions.\r\n\r\nLe Système 1 est rapide, intuitif et émotionnel. Le Système 2 est plus lent, réfléchi et logique. Kahneman nous montre comment ces deux systèmes façonnent nos jugements et nos choix, souvent de manière surprenante et contre-intuitive.\r\n\r\nÀ travers des décennies de recherches révolutionnaires, ce livre explore les biais cognitifs, les erreurs de jugement et les illusions qui affectent notre pensée quotidienne. Rempli d\'expériences fascinantes et d\'exemples concrets, c\'est un ouvrage essentiel pour quiconque souhaite comprendre comment nous pensons, décidons et agissons. Une lecture qui changera votre perception de vous-même et du monde.', 'book11.jpg', 1, '2024-03-03 10:30:00'),
(12, 7, 'A Book Full Of Hope', 'Rupi Kaur', 'A Book Full of Hope est un recueil poétique lumineux qui célèbre la guérison, l\'espoir et le renouveau. Rupi Kaur, poétesse acclamée, nous offre une collection de poèmes qui touchent l\'âme et inspirent la transformation personnelle.\r\n\r\nAprès avoir exploré la douleur et la survie dans ses œuvres précédentes, Kaur se tourne vers la lumière avec des vers qui célèbrent la résilience, l\'amour-propre et la joie de vivre. Chaque poème est une affirmation de la force intérieure et de la capacité de l\'esprit humain à se relever.\r\n\r\nAccompagnés des illustrations caractéristiques de l\'auteure, ces poèmes courts mais puissants résonnent avec authenticité et vulnérabilité. Ce livre est un baume pour l\'âme, offrant réconfort et inspiration à ceux qui traversent des moments difficiles et cherchent la lumière. Une lecture essentielle pour cultiver l\'espoir et embrasser l\'avenir avec confiance.', 'book12.jpg', 1, '2024-03-08 09:15:00'),
(13, 8, 'The Subtle Art Of Not Giving A F*ck', 'Mark Manson', 'The Subtle Art of Not Giving a F*ck est un manifeste rafraîchissant qui défie la culture de la positivité toxique et du développement personnel superficiel. Mark Manson nous propose une approche contre-intuitive pour vivre une bonne vie.\r\n\r\nContrairement aux conseils conventionnels qui nous encouragent à penser positivement et à viser toujours plus haut, Manson soutient que la clé du bonheur réside dans l\'acceptation de nos limites et le choix judicieux de nos priorités. Il ne s\'agit pas de ne se soucier de rien, mais de se soucier des bonnes choses.\r\n\r\nAvec humour, franchise et des histoires personnelles touchantes, ce livre explore des thèmes comme la responsabilité, l\'échec, la souffrance et la mort. Manson démontre comment embrasser nos imperfections et accepter l\'incertitude peut nous libérer et nous permettre de vivre plus authentiquement. Un livre provocateur qui challenge nos croyances et nous invite à redéfinir le succès.', 'book13.jpg', 1, '2024-03-14 08:45:00'),
(14, 9, 'Narnia', 'C.S. Lewis', 'The Chronicles of Narnia est une œuvre épique qui a captivé des générations de lecteurs. C.S. Lewis nous transporte dans le monde magique de Narnia, où animaux parlants, créatures mythiques et batailles épiques entre le bien et le mal prennent vie.\r\n\r\nCette collection complète des sept livres raconte l\'histoire extraordinaire d\'enfants ordinaires qui découvrent un royaume enchanté accessible à travers une armoire magique. De l\'arrivée du légendaire Aslan aux aventures héroïques des enfants Pevensie, chaque récit tisse une tapisserie riche d\'imagination et de sagesse.\r\n\r\nAu-delà de l\'aventure captivante, Lewis explore des thèmes profonds comme le courage, la rédemption, la foi et l\'amitié. Les allégories chrétiennes subtiles ajoutent une profondeur philosophique à ces contes merveilleux. Que vous les lisiez pour la première fois ou que vous les redécouvriez, les Chroniques de Narnia restent une expérience de lecture intemporelle et enrichissante.', 'book14.JPG', 1, '2024-03-10 12:00:00'),
(15, 6, 'Company Of One', 'Paul Jarvis', 'Company of One remet en question l\'obsession moderne de la croissance à tout prix. Paul Jarvis propose une philosophie d\'affaires révolutionnaire : et si rester petit était en fait la meilleure stratégie pour réussir et s\'épanouir ?\r\n\r\nÀ travers des exemples concrets et des recherches approfondies, Jarvis démontre comment les entreprises et les entrepreneurs peuvent prospérer en restant volontairement petits. Il explore comment la simplicité, l\'efficacité et la qualité peuvent l\'emporter sur l\'expansion aggressive et la maximisation des profits.\r\n\r\nCe livre aborde des sujets essentiels comme l\'autonomie, la durabilité, la satisfaction professionnelle et l\'équilibre vie-travail. Jarvis partage des stratégies pratiques pour construire une entreprise alignée avec vos valeurs et vos objectifs personnels. Une lecture inspirante pour les freelances, entrepreneurs et créatifs qui cherchent une alternative au modèle de croissance traditionnel.', 'book15.jpg', 1, '2024-03-06 15:00:00'),
(16, 8, 'The Two Towers', 'J.R.R. Tolkien', 'The Two Towers est le deuxième volet épique du chef-d\'œuvre de J.R.R. Tolkien, Le Seigneur des Anneaux. Après la dissolution de la Communauté de l\'Anneau, ce tome suit deux trajectoires parallèles alors que nos héros poursuivent leur quête périlleuse.\r\n\r\nD\'un côté, Frodo et Sam s\'aventurent seuls vers le Mordor, guidés par l\'énigmatique Gollum. De l\'autre, Aragorn, Legolas et Gimli poursuivent les Uruk-hai qui ont capturé Merry et Pippin, les menant au royaume de Rohan où une guerre se prépare.\r\n\r\nTolkien tisse magistralement des récits d\'héroïsme, de trahison et de sacrifice. Des batailles épiques comme celle du Gouffre de Helm aux moments intimes de doute et d\'espoir, ce livre approfondit les thèmes de l\'amitié, du pouvoir et de la corruption. Les descriptions immersives et les personnages mémorables font de The Two Towers un pilier incontournable de la fantasy moderne.', 'book16.jpg', 1, '2024-03-16 14:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `content`, `is_read`, `created_at`) VALUES
(1, 1, 2, 'Bonjour Bob ! Je suis intéressée par ton livre \"1984\".', 0, '2026-01-17 20:20:53'),
(2, 2, 1, 'Salut Alice ! Oui, il est disponible. Tu veux qu\'on organise un échange ?', 0, '2026-01-17 20:20:53'),
(3, 1, 2, 'Avec plaisir ! Qu\'est-ce qui t\'intéresserait en échange ?', 0, '2026-01-18 20:20:53'),
(4, 2, 1, 'J\'ai vu que tu avais \"Le Petit Prince\", ça m\'intéresse !', 0, '2026-01-18 20:20:53'),
(5, 1, 2, 'Parfait ! On peut se voir ce week-end ?', 0, '2026-01-19 08:20:53'),
(6, 3, 1, 'Hello Alice, ton livre \"Harry Potter\" est-il toujours disponible ?', 0, '2026-01-19 17:20:53'),
(7, 3, 1, 'Je cherche ce livre depuis longtemps !', 0, '2026-01-19 18:20:53'),
(8, 2, 3, 'Salut Charlie, merci pour le livre !', 0, '2026-01-14 20:20:53'),
(9, 3, 2, 'De rien, j\'espère qu\'il te plaira 😊', 0, '2026-01-14 20:20:53'),
(10, 1, 9, 'Bonjour Julie ! J\'ai vu que tu avais \"Le Seigneur des Anneaux\", il est toujours disponible ?', 1, '2026-01-16 22:52:27'),
(11, 9, 1, 'Salut Alice ! Oui tout à fait, il est en excellent état 😊', 1, '2026-01-16 22:52:27'),
(12, 1, 9, 'Super ! Qu\'est-ce qui t\'intéresserait en échange ?', 1, '2026-01-17 22:52:27'),
(13, 9, 1, 'J\'ai vu que tu avais \"Orgueil et Préjugés\", ça m\'intéresse beaucoup !', 1, '2026-01-17 22:52:27'),
(14, 1, 9, 'Parfait ! On peut se voir cette semaine pour l\'échange ?', 1, '2026-01-30 22:52:27'),
(15, 9, 2, 'Bonjour Marc, je cherche des livres de science-fiction, tu as quelque chose ?', 1, '2026-01-14 22:52:27'),
(16, 2, 9, 'Hello Julie ! Oui j\'ai \"Dune\" et \"Fondation\" disponibles', 1, '2026-01-14 22:52:27'),
(17, 8, 9, 'Oh génial ! \"Dune\" m\'intéresse vraiment. On peut échanger ?', 1, '2026-01-15 22:52:27'),
(18, 2, 9, 'Avec plaisir ! Tu as des romans policiers par hasard ?', 1, '2026-01-15 22:52:27'),
(19, 9, 2, 'Oui j\'ai \"Les Rivières pourpres\" si ça t\'intéresse', 1, '2026-01-16 22:52:27'),
(20, 2, 9, 'Parfait ! Je te propose qu\'on se retrouve samedi au café près de la librairie ?', 1, '2026-01-19 16:52:27'),
(21, 3, 9, 'Coucou Julie ! Ton livre \"Harry Potter et la Chambre des Secrets\" est disponible ?', 1, '2026-01-19 20:52:27'),
(22, 3, 9, 'Je collectionne toute la série, il me manque juste celui-là 😊', 1, '2026-01-19 21:52:27'),
(23, 9, 4, 'Salut Thomas ! J\'ai vu ton exemplaire de \"1984\", ça fait longtemps que je veux le lire !', 1, '2026-01-12 22:52:27'),
(24, 4, 9, 'Hey Julie ! Oui il est à toi si tu veux. C\'est un excellent livre !', 1, '2026-01-12 22:52:27'),
(25, 9, 4, 'Merci ! Qu\'est-ce que je peux te proposer en échange ?', 1, '2026-01-13 22:52:27'),
(26, 4, 9, 'Tu as des livres de fantasy ? J\'adore ce genre', 1, '2026-01-13 22:52:27'),
(27, 9, 4, 'J\'ai \"Le Nom du Vent\" de Patrick Rothfuss, un de mes préférés !', 1, '2026-01-13 22:52:27'),
(28, 4, 9, 'Parfait ! On fait l\'échange alors 👍', 1, '2026-01-14 22:52:27'),
(29, 5, 9, 'Bonjour Julie, je viens de m\'inscrire sur TomTroc !', 1, '2026-01-19 22:22:27'),
(30, 5, 9, 'J\'ai vu que tu avais beaucoup de classiques, tu acceptes les échanges avec les nouveaux ? 😊', 1, '2026-01-19 22:27:27'),
(31, 5, 9, 'J\'ai quelques livres récents si ça t\'intéresse !', 1, '2026-01-19 22:32:27'),
(32, 6, 9, 'Salut Julie ! Merci pour l\'échange de la semaine dernière, j\'ai adoré \"Le Petit Prince\" 📚', 1, '2026-01-09 22:52:27'),
(33, 9, 6, 'Avec plaisir Lucas ! Content qu\'il t\'ait plu 😊', 1, '2026-01-09 22:52:27'),
(34, 6, 9, 'Si tu as d\'autres recommandations n\'hésite pas !', 1, '2026-01-09 22:52:27'),
(35, 9, 6, 'Bien sûr ! Je te tiens au courant si je trouve quelque chose qui pourrait te plaire', 1, '2026-01-10 22:52:27'),
(36, 8, 9, 'Hello Julie ! (On a presque le même nom 😄)', 1, '2026-01-04 22:52:27'),
(37, 9, 8, 'Haha oui j\'avais remarqué ! 😄', 1, '2026-01-04 22:52:27'),
(38, 8, 9, 'Tu as \"L\'Étranger\" de Camus ? Je le cherche partout', 1, '2026-01-05 22:52:27'),
(39, 9, 8, 'Désolée, je l\'ai prêté à quelqu\'un. Mais si ça revient je te fais signe !', 1, '2026-01-05 22:52:27'),
(40, 8, 9, 'Merci c\'est gentil ! À bientôt 👋', 1, '2026-01-05 22:52:27'),
(41, 9, 8, 'Yes !', 1, '2026-01-20 00:15:11'),
(42, 9, 8, 'à bientôt', 1, '2026-01-20 00:16:03'),
(43, 9, 8, 'Pierre ?', 1, '2026-01-20 00:24:05'),
(44, 9, 8, 'Tu dors ?', 1, '2026-01-20 00:24:22'),
(45, 1, 9, 'Coucou Julie ! J\'ai adoré \"Le Seigneur des Anneaux\", merci encore !', 1, '2026-01-28 10:30:00'),
(46, 1, 9, 'Tu aurais d\'autres livres de fantasy à me recommander ?', 1, '2026-01-28 10:31:00'),
(47, 9, 1, 'Salut Alice ! Contente que ça t\'ait plu 😊', 1, '2026-01-28 14:20:00'),
(48, 9, 1, 'J\'ai \"Le Trône de Fer\" si ça t\'intéresse !', 1, '2026-01-28 14:21:00'),
(49, 2, 9, 'Hello Julie ! Je cherche un bon roman policier, des suggestions ?', 1, '2026-01-29 09:15:00'),
(50, 2, 9, 'J\'ai vu que tu en avais plusieurs dans ta collection', 1, '2026-01-29 09:16:00'),
(51, 3, 9, 'Salut ! Ton livre \"Dune\" est-il toujours disponible ?', 1, '2026-01-29 11:00:00'),
(52, 9, 3, 'Désolée Charlie, je viens de l\'échanger avec Marc 😕', 1, '2026-01-29 11:45:00'),
(53, 3, 9, 'Ah dommage ! Tu as d\'autres livres de SF ?', 1, '2026-01-29 12:00:00'),
(54, 4, 9, 'Bonjour Julie ! Je viens de m\'inscrire sur TomTroc 📚', 1, '2026-01-29 13:30:00'),
(55, 4, 9, 'J\'aimerais échanger avec toi, tu as une belle collection !', 1, '2026-01-29 13:31:00'),
(56, 1, 9, 'Merci pour l\'échange de samedi dernier !', 1, '2026-01-22 16:00:00'),
(57, 9, 1, 'De rien, à bientôt pour un prochain échange 😊', 1, '2026-01-22 16:30:00'),
(58, 2, 9, 'Super idée ce site, on peut vraiment trouver des pépites !', 1, '2026-01-20 19:00:00'),
(59, 9, 2, 'Complètement d\'accord ! C\'est génial de partager sa passion 📖', 1, '2026-01-20 19:15:00'),
(60, 9, 8, 'Y a quelqu\'un ?', 1, '2026-01-29 14:30:22'),
(61, 2, 1, 'Rebonjour Alice, tu as pu réfléchir pour l\'échange ?', 0, '2026-01-20 09:15:00'),
(62, 1, 2, 'Oui, désolée du retard ! Ton idée me va très bien 😊', 0, '2026-01-20 09:32:00'),
(63, 3, 1, 'Tu serais dispo cette semaine pour qu\'on se voie ?', 0, '2026-01-20 18:10:00'),
(64, 3, 1, 'Je peux me déplacer si besoin.', 0, '2026-01-20 18:12:00'),
(65, 4, 9, 'Salut Julie, je viens juste de voir ton message.', 1, '2026-01-21 08:45:00'),
(66, 4, 9, 'Toujours partante pour l\'échange ?', 1, '2026-01-21 08:46:30'),
(67, 9, 2, 'Coucou Marc, samedi me va très bien 👍', 0, '2026-01-21 10:05:00'),
(68, 6, 1, 'Bonjour Alice, ton annonce m\'intéresse beaucoup.', 0, '2026-01-21 14:20:00'),
(69, 6, 1, 'Le livre est-il toujours disponible ?', 0, '2026-01-21 14:21:10'),
(70, 4, 9, 'Hello Charlie, tu recherches toujours ce titre ?', 1, '2026-01-21 19:40:00'),
(71, 9, 8, 'hello', 1, '2026-02-07 11:03:37'),
(72, 9, 8, 'hello', 1, '2026-02-09 20:13:12');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `avatar`) VALUES
(1, 'Alice Dubois', 'alice.dubois@email.fr', '$2y$10$abcdefghijklmnopqrstuvwxyz123456', '2024-01-15 09:30:00', NULL),
(2, 'Marc Laurent', 'marc.laurent@email.fr', '$2y$10$bcdefghijklmnopqrstuvwxyz234567', '2024-01-20 13:20:00', NULL),
(3, 'Sophie Martin', 'sophie.martin@email.fr', '$2y$10$cdefghijklmnopqrstuvwxyz345678', '2024-02-01 08:15:00', NULL),
(4, 'Thomas Petit', 'thomas.petit@email.fr', '$2y$10$defghijklmnopqrstuvwxyz456789', '2024-02-10 15:45:00', NULL),
(5, 'Emma Bernard', 'emma.bernard@email.fr', '$2y$10$efghijklmnopqrstuvwxyz567890', '2024-02-15 10:00:00', NULL),
(6, 'Lucas Richard', 'lucas.richard@email.fr', '$2y$10$fghijklmnopqrstuvwxyz678901', '2024-03-01 12:30:00', NULL),
(7, 'Julie Moreau', 'julie.moreau@email.fr', '$2y$10$ghijklmnopqrstuvwxyz789012', '2024-03-05 14:20:00', NULL),
(8, 'Pierre Simon', 'pierre.simon@email.fr', '$2y$10$BrmIrwV1KrWImeb4fYFGUOEKjuWR07UxlGpDyKDiKOm4G8VB1KOIi', '2024-03-12 09:00:00', 'loutre.png'),
(9, 'Julie Simon', 'sim.ju@live.fr', '$2y$10$BrmIrwV1KrWImeb4fYFGUOEKjuWR07UxlGpDyKDiKOm4G8VB1KOIi', '2026-01-08 11:01:51', 'Julie Simon.png'),
(10, 'Alice', 'alice@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-01-19 19:20:53', NULL),
(11, 'Bob', 'bob@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-01-19 19:20:53', NULL),
(12, 'Charlie', 'charlie@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2026-01-19 19:20:53', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_sender` (`sender_id`),
  ADD KEY `idx_receiver` (`receiver_id`),
  ADD KEY `idx_created` (`created_at`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
