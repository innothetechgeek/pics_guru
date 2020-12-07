-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 11:56 AM
-- Server version: 10.2.33-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixguru_pix`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`) VALUES
(1, 0, 'Technology', '2017-03-04 13:03:18'),
(2, 0, 'Business', '2017-03-04 13:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(1, 2, 'John Doe', 'jdoe@gmail.com', 'Great Post!', '2017-03-17 13:57:29'),
(2, 2, 'Jan Doe', 'jane@yahoo.com', 'Thank you for this awesome post', '2017-03-17 14:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `email`, `subject`, `message`, `status`, `timestamp`) VALUES
(7, '', '', '', '', 1, '2019-10-07 14:23:15'),
(8, 'Tessa', 'Cloete.tessa@gmail.com', 'Gel nails', 'Hi\r\n\r\nI\'d like to book a gel nail polish and an eyebrow tint on 4-5 Dec.\r\n\r\nCan you send me pictures of the dark purple gel colours that you have available? \r\nI\'m hoping for a dark plum with glitter.', 1, '2019-11-04 10:21:46'),
(9, 'Lisa Bruwer ', 'lisa@cenfri.org', 'Request for appointment for Korf wedding', 'Hello Chantelle. I\'m one of Charne\'s bridesmaids for her wedding on 7 December. I\'m hoping to secure an appountment for one of the week days before - perhaps the Wednesday (4th) or Thursday (5th). I would like to book or a manicure and pedicure with gel polish. I think charne has already indicated the colour should like. It should be the dark purple with the glitter overlay on the nails and just the colour on the toes. Is there a day you\'re available? I\'m happy to come during the day if thay helps. I\'m sure your evenings are mostly booked at this point.  \r\n\r\nPlease let me know if you need further details from me. ', 1, '2019-11-23 10:28:00'),
(10, 'Diedre', 'diedre.williams@libertyhealth.net', 'New appointment ', 'Hi\r\n\r\nKindly advise if you have any openings for acrylic overlay with gel paint & nail art. Would prefer Saturday or week day after 3pm. If I did acrylic somewhere else can I just do a fill or must I soak off old set?\r\nRegards\r\nDiedre\r\n', 1, '2019-11-26 09:43:01'),
(11, 'Kenneththugs', 'raphaeUnennygrese@gmail.com', 'Delivery of your email messages.', 'Good day!  geminibeautystudio.co.za \r\n \r\nDid you know that it is possible to send business offer entirely legitimate way? \r\nWe presentation a new legitimate method of sending proposal through feedback forms. Such forms are located on many sites. \r\nWhen such business proposals are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nAlso, messages sent through contact Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis message is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - feedbackform@make-success.com', 1, '2020-01-13 02:26:48'),
(12, 'Anthonybaice', 'raphaeUnennygrese@gmail.com', 'A new method of email distribution.', 'Hi!  geminibeautystudio.co.za \r\n \r\nDo you know the best way to talk about your products or services? Sending messages exploitation contact forms will allow you to simply enter the markets of any country (full geographical coverage for all countries of the world).  The advantage of such a mailing  is that the emails that will be sent through it will end up within the mailbox that\'s supposed for such messages. Sending messages using Contact forms isn\'t blocked by mail systems, which implies it\'s certain to reach the client. You will be able to send your offer to potential customers who were previously inaccessible due to spam filters. \r\nWe offer you to test our service without charge. We are going to send up to 50,000 message for you. \r\nThe cost of sending one million messages is us $ 49. \r\n \r\nThis message is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackMessages \r\nSkype  live:contactform_18 \r\nEmail - make-success@mail.ru', 1, '2020-01-29 18:31:22'),
(13, 'Dustinbap', 'michael.njeru2@yahoo.com', 'PREMIUM INTERNATIONAL WORKSHOPS', 'We have the pleasure of introducing you to OpenCastLabs Africa Institute  (OCLA Institute Ltd). OCLA partners with government and commercial clients to deliver professional services and technology solutions in the development social change; environment and infrastructure; health, human services, social programs; business processes and telecommunications markets. \r\nCurrently, OCLA is organized into six specialized schools each providing wide range of courses. We have the school of: \r\n1.     Data Science http://opencastlabs-africa.com/school-of-data-science/ \r\n2.     Monitoring & Evaluation http://opencastlabs-africa.com/monitoring-and-evaluation/ \r\n3.     GIS & Remote Sensing http://opencastlabs-africa.com/gis-and-remote-sensing/ \r\n4.     Data Collection & Analysis http://opencastlabs-africa.com/data-collection-and-analysis/ \r\n5.     Leadership, Management & Soft Skills http://opencastlabs-africa.com/soft-skills/ \r\n6.     Development & Humanitarian http://opencastlabs-africa.com/category/courses/development-and-humanitarian-capacity-building-training-courses/ \r\n \r\nWe offer our trainings in two models, Scheduled trainings and Onsite trainings. \r\ni)              Scheduled training model: \r\nClick on the link below to view our course calendar for the year 2020. \r\n•         OCL 2020 Training Calendar http://opencastlabs-africa.com/training-courses/ \r\n \r\nii)            Onsite training model: \r\nOrganizations can choose to facilitate their custom training at their premise or facility of their choice. From a group of five (5) delegates, you can now organize a tailored training at your convenient time and venue. \r\nOpenCastLabs Africa Institute hereby invites you to partner or Train with us. Talk to us on: \r\nEmail: alfred@opencastlabs-africa.com \r\nWhatsApp: +254706428974 \r\nSkype: alfred.mutugi2 \r\n \r\nYours Sincerely, \r\nAlfred Mutugi, \r\nFor: OCL Africa Institute Limited.', 1, '2020-01-31 11:23:49'),
(14, 'Suzan de Bruyne', 'debruyne.suzan68@gmail.com', 'Price list', 'Can uou please send ne a price list. Thank you', 1, '2020-02-03 19:11:12'),
(15, 'Micahnup', 'info@acceleratesolutions.co.za', 'Need to convert your traditional training to digital training?', 'With the world going digital, companies can no longer stick to traditional training programs. Learners want more freedom to choose the training, the time and the place where they want to take it. \r\nGoing digital is the only way to meet the demands of the modern learner, who wants fast, personalised, bite-sized information, wherever they are. \r\nA Learning management Systems (LMS) is a super-easy, super safe and cloud based platform that will help you  train your employees, partners and or customers. Our LMS has all the necessary inbuilt tools to ensure that everyone involved can easily access your digital learning on a learning platform where they can enjoy an effective and engaging learning experience. \r\nWith a LMS you can start saving time and money. \r\nFor an obligation free trial contact us today: info@acceleratesolutions.co.za', 1, '2020-02-14 12:26:54'),
(16, 'Georgephect', 'nuktaloyaltypromo@gmail.com', 'FREE MARKETING TOOL - ONLY 15 ACCOUNTS TODAY.', 'IF YOU ARE NOT IN THE RETAIL BUSINESS, APOLOGIES. YOU COULD  FORWARD THIS TO SOMEONE WHO WILL BENEFIT. LOYALTY PROGRAMS ARE A GREAT MARKETING TOOL. \r\nOUR STAR PACKAGE COSTS 899$ FOR A YEAR BUT IF YOU APPLY FOR AN ACCOUNT TODAY, YOU COULD GET ONE OF THE 20 FREE ACCOUNTS ABSOLUTELY FREE. GO TO https://WWW.NUKTA.ME/LOGIN AND APPLY  AS A PARTNER. NO STRINGS ATTACHED. NO UPSELL. \r\nONCE WE GIVE 20 FREE ACCOUNTS, LATE APPLICANTS WILL GET AN OPTION TO BUY IT AT A 70% DISCOUNT. \r\nFOR MORE INFO https://www.NUKTALOYALTY.COM', 1, '2020-02-20 11:18:58'),
(17, 'Mandy', 'Hopkinsmandy7@gmail.com ', 'Appointment confusion ', 'Sorry I made bookings now but seems the availabilities change while I book. I\'m trying to book a full pedicure and French acrylics for myself and acrylics for my daughter she\'s 12. When is your next availability for us pls or do we need to book for different days? ', 1, '2020-02-20 14:03:35'),
(18, 'Kaylynn', 'kaylynncharles@gmail.com ', 'Eyebrow thread ', 'Hi\r\n\r\nI would like to know if you do eyebrow threading and the cost thereof', 1, '2020-03-07 08:00:39'),
(19, 'Kathryn Adshade ', 'kathrynadshade@gmail.com', 'Gel ', 'Please give me a price for gel polish mani and pedi. Thanks ', 1, '2020-03-13 12:18:32'),
(20, 'LouisSem', 'bitclaybtc@gmail.com', 'Maximum Make Money Project - Short-term investments with maximum profit.', 'The leader of the mobile blockchain industry in the global crypto investment platform Crypto MMM (Maximum Make Money) Announces Recruitment of MLM Specialists. \r\n \r\nFor inviting newcomers, you will get referral bonuses. There is a 3-level referral program we provide: \r\n \r\n5% for the referral of the first level (direct registration) \r\n3% for the referral of the second level \r\n1% for the referral of the third level \r\n \r\n9% of project profit goes to bonuses \r\n \r\nReferral bonuses goes to your BTC address the day after the novice\'s investment. \r\nAny reinvestment of participants, the leader receives a full bonus! \r\nTOP LEADER has the opportunity to receive an increased % of bonuses. \r\n \r\nBecome a BEST Partner in the MLM Crypto Maximum Make Money: https://www.crypto-mmm.com/?source=partner', 1, '2020-03-18 23:49:20'),
(21, 'Wes Mann', 'wordpresswizardwes@yahoo.com', 'Friendly Introduction', 'Hi there,\r\n\r\nI came across your website yesterday and ran into some missed opportunities I think you’ll want to take a look at!\r\n\r\nI own a digital marketing company in Kingston Ontario, and can already see several minor improvements that would be solved by a basic website management package. Although cheap, this can significantly improve your online presence and outreach.\r\n\r\nI know you’re probably very busy, but if you would like to learn more I\'d be happy to send you a link with all the details.\r\n\r\nI look forward to your response,\r\n\r\nWes', 1, '2020-04-01 12:30:08'),
(22, 'Raymond 	Brown', 'info@thecctvhub.com', 'Human body thermal camera high accuracy', 'Dear Sir/mdm, \r\n \r\nHow are you? \r\n \r\nWe supply N95, KN95, 3ply masks and Thermal cameras for Body Temperature Measurement up to accuracy of ±0.1?C \r\nAdvantages of thermal imaging detection: \r\n \r\n1. Intuitive, efficient and convenient, making users directly \"see\" the temperature variation. \r\n2. Thermal condition of different locations for comprehensive analysis, providing more information for judgment \r\n3. Avoiding judgment errors, reducing labor costs, and discovering poor heat dissipation and hidden trouble points \r\n4. PC software for data analysis and report output \r\n \r\nWhatsapp: +65 87695655 \r\nTelegram: cctv_hub \r\nSkype: cctvhub \r\nEmail: sales@thecctvhub.com \r\nW: http://www.thecctvhub.com/ \r\n \r\nIf you do not wish to receive email from us again, please let us know by replying. \r\n \r\nregards, \r\nRaymond', 1, '2020-04-02 17:26:51'),
(23, 'Jerrysyhok', 'no-replyUnennygrese@gmail.com', 'Delivery of your email messages.', 'Gооd dаy!  geminibeautystudio.co.za \r\n \r\nDid yоu knоw thаt it is pоssiblе tо sеnd аppеаl   lеgаl? \r\nWе оffеr а nеw wаy оf sеnding аppеаl thrоugh соntасt fоrms. Suсh fоrms аrе lосаtеd оn mаny sitеs. \r\nWhеn suсh rеquеsts аrе sеnt, nо pеrsоnаl dаtа is usеd, аnd mеssаgеs аrе sеnt tо fоrms spесifiсаlly dеsignеd tо rесеivе mеssаgеs аnd аppеаls. \r\nаlsо, mеssаgеs sеnt thrоugh соntасt Fоrms dо nоt gеt intо spаm bесаusе suсh mеssаgеs аrе соnsidеrеd impоrtаnt. \r\nWе оffеr yоu tо tеst оur sеrviсе fоr frее. Wе will sеnd up tо 50,000 mеssаgеs fоr yоu. \r\nThе соst оf sеnding оnе milliоn mеssаgеs is 49 USD. \r\n \r\nThis lеttеr is сrеаtеd аutоmаtiсаlly. Plеаsе usе thе соntасt dеtаils bеlоw tо соntасt us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019', 1, '2020-04-06 16:38:06'),
(24, 'Barbara Atyson', 'barbaratysonhw@yahoo.com', 'Explainer Videos for geminibeautystudio.co.za', 'Hi,\r\n\r\nWe\'d like to introduce to you our explainer video service which we feel can benefit your site peertrainer.com.\r\n\r\nThey can show a solution to a problem or simply promote one of your products or services. They are concise, can be uploaded to video such as Youtube, and can be embedded into your website or featured on landing pages.\r\n\r\nPlease take a look at our site here, showing video examples and our prices: https://explainervideos4u.net\r\n\r\nAfter viewing, if this is something you would like to discuss further, you can either complete the form on the above page, or reply to this email.\r\n\r\nKind Regards,\r\nBarbara', 1, '2020-04-06 22:42:32'),
(25, 'Judson Spofforth', 'spofforth.judson@msn.com', 'Content Samurai to generate more traffic to geminibeautystudio.co.za?', 'Hi,\r\n\r\nWe\'re wondering if you\'ve ever considered taking the content from geminibeautystudio.co.za and converting it into videos to promote on Youtube using Content Samurai?\r\n\r\nIt\'s another \'rod in the pond\' in terms of traffic generation, as so many people use Youtube.\r\n\r\nYou can read a bit more about the software here: https://turntextintovideo.com\r\n\r\nKind Regards,\r\nJudson', 1, '2020-04-08 04:38:18'),
(26, 'KingDennisG.com', 'kingdennisg@yandex.com', 'Covid-19 update visit KingDennisG.com ', ' New music at https://www.KingDennisG.com come play games, socialize and discover new music. \r\nTo unsubscribe visit https://www.KingDennisG.com ', 1, '2020-04-27 12:46:29'),
(27, 'Chanel', 'louw1chanel@gmail.com ', 'Nails', 'Want app', 1, '2020-04-29 17:55:46'),
(28, 'MelvinInabs', 'atrixxtrix@gmail.com', 'Human body thermal camera high accuracy and medical supplies', 'Dear Sir/mdm, \r\n \r\nHow are you? \r\n \r\nWe supply medical products: \r\n \r\nMedical masks \r\n3M 1860, 9502, 9501 \r\n3ply medical, KN95 FFP2, FFP3, N95 masks \r\nFace shield \r\nDisposable nitrile/latex gloves \r\nIsolation/surgical gown \r\nProtective PPE/Overalls \r\nIR non-contact thermometers \r\nCrystal tomato \r\n \r\nHuman body thermal cameras \r\nfor Body Temperature Measurement up to accuracy of ±0.1?C \r\n \r\nWhatsapp: +65 87695655 \r\nTelegram: cctv_hub \r\nSkype: cctvhub \r\nEmail: sales@thecctvhub.com \r\nW: http://www.thecctvhub.com/ \r\n \r\nIf you do not wish to receive email from us again, please let us know by replying. \r\n \r\nregards, \r\nCCTV HUB', 1, '2020-05-21 10:20:19'),
(29, 'Peter Corden', 'no-reply@monkeydigital.co', 're: Additional details', 'Hi There \r\nafter reviewing your geminibeautystudio.co.za website, we recommend our new 1 month SEO max Plan, as the best solution to rank efficiently, which will guarantee a positive SEO trend in just 1 month of work. One time payment, no subscriptions. \r\n \r\nMore details about our plan here: \r\nhttps://www.monkeydigital.co/product/seo-max-package/ \r\n \r\nthank you \r\nMonkey Digital \r\nsupport@monkeydigital.co', 1, '2020-06-03 09:52:58'),
(30, 'Hung Rohr', 'hacker@transitionlikeachampion.com', 'Your Site Has Been Hacked', 'PLEASE FORWARD THIS EMAIL TO SOMEONE IN YOUR COMPANY WHO IS ALLOWED TO MAKE IMPORTANT DECISIONS!\r\n\r\nWe have hacked your website http://www.geminibeautystudio.co.za and extracted your databases.\r\n\r\nHow did this happen?\r\nOur team has found a vulnerability within your site that we were able to exploit. After finding the vulnerability we were able to get your database credentials and extract your entire database and move the information to an offshore server.\r\n\r\nWhat does this mean?\r\n\r\nWe will systematically go through a series of steps of totally damaging your reputation. First your database will be leaked or sold to the highest bidder which they will use with whatever their intentions are. Next if there are e-mails found they will be e-mailed that their information has been sold or leaked and your site http://www.geminibeautystudio.co.za was at fault thusly damaging your reputation and having angry customers/associates with whatever angry customers/associates do. Lastly any links that you have indexed in the search engines will be de-indexed based off of blackhat techniques that we used in the past to de-index our targets.\r\n\r\nHow do I stop this?\r\n\r\nWe are willing to refrain from destroying your site\'s reputation for a small fee. The current fee is $2000 USD in bitcoins (BTC). \r\n\r\nSend the bitcoin to the following Bitcoin address (Copy and paste as it is case sensitive):\r\n\r\n14S9qL8jxxFYyAT58vqnpFtkjg3vrF17g7\r\n\r\nOnce you have paid we will automatically get informed that it was your payment. Please note that you have to make payment within 5 days after receiving this notice or the database leak, e-mails dispatched, and de-index of your site WILL start!\r\n\r\nHow do I get Bitcoins?\r\n\r\nYou can easily buy bitcoins via several websites or even offline from a Bitcoin-ATM. We suggest you https://cex.io/ for buying bitcoins.\r\n\r\nWhat if I don’t pay?\r\n\r\nIf you decide not to pay, we will start the attack at the indicated date and uphold it until you do, there’s no counter measure to this, you will only end up wasting more money trying to find a solution. We will completely destroy your reputation amongst google and your customers.\r\n\r\nThis is not a hoax, do not reply to this email, don’t try to reason or negotiate, we will not read any replies. Once you have paid we will stop what we were doing and you will never hear from us again!\r\n\r\nPlease note that Bitcoin is anonymous and no one will find out that you have complied.', 1, '2020-06-07 03:50:48'),
(31, 'MauriceFom', 'accounticamarketing@yahoo.com', 'Bookkeeping for only R999 per month.', 'Accountica is a registered accounting firm that offers low cost accounting to SMMEs. Get a dedicated bookkeeper and accountant for just R999 per month. No long term contracts \r\n \r\nVisit http://www.accountica.co.za or email info@accountica.co.za for more information.', 1, '2020-06-09 10:13:58'),
(32, 'test', 'test', 'test', 'test', 1, '2020-06-11 19:41:59'),
(33, 'test', 'test2', 'test', 'testing', 1, '2020-06-11 19:45:53'),
(34, 'Stephanie', 'so29011995@gmail.com', 'Test', 'Toets dit gou', 1, '2020-06-12 15:09:53'),
(35, 'Michele', 'michele7brumme@gmail.com', 'Booking', 'test', 1, '2020-09-11 11:20:12'),
(36, 'Ohna Nel', 'ohna.nel@gmail.com', 'jjjjj', 'testing', 1, '2020-09-11 11:54:53'),
(37, 'Andrea Webber', 'acwebber@gmail.com', 'photos', 'Sorry I got distracted here it is', 1, '2020-09-11 14:00:32'),
(38, 'Steve Bimpson', 'Steve@JustThinkBiG.co', 'Testing the contact form', 'Hi Ohna,\r\n\r\nJust thought I\'d run a little test for you after reading the reply to your earlier email  :-)\r\n\r\nRegards,\r\n\r\nSteve', 1, '2020-09-11 15:19:11'),
(39, 'JC N', 'info@jocathtraining.co.za', 'PHOTOGRAPHY', 'Hi how are you?', 1, '2020-09-21 11:53:31'),
(40, 'Andrea Webber', 'acwebber@gmail.com', 'link on front page', 'Hi Ohna, just seen the link on the footer letstalk@pix-guru.com takes you to the contact page a good idea', 1, '2020-09-23 13:17:27'),
(41, 'Dessie Reyes', 'information@pix-guru.com', 'pix-guru.com NOTICE.', 'ATT: pix-guru.com / PIX-GURU WEBSITE SERVICES\r\nThis notification EXPIRES ON: Oct 16, 2020\r\n\r\n\r\nWe have not gotten a payment from you.\r\nWe\'ve tried to contact you yet were incapable to contact you.\r\n\r\n\r\nKindly Browse Through: https://bit.ly/350GWcE .\r\n\r\nFor details as well as to process a optional settlement for solutions.\r\n\r\n\r\n\r\n10162020171639.\r\n', 1, '2020-10-17 00:09:43'),
(42, 'Melaine Helmick', 'pix-guru.com@pix-guru.com', 'pix-guru.com', 'Your domain name: pix-guru.com\r\n\r\nPIX-GURU\r\n\r\nThis announcement  ENDS ON: Nov 19, 2020.\r\n\r\n\r\nWe have not obtained a payment from you.\r\nWe\'ve attempted to call you but were unable to reach you.\r\n\r\n\r\nPlease Go To:  https://bit.ly/2IP3Ex9\r\n\r\n\r\nFor info and to make a optional payment for solutions.\r\n\r\n\r\n11192020103549\r\n', 1, '2020-11-19 19:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emailkey` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `image` text DEFAULT NULL,
  `currentimage` text DEFAULT NULL,
  `who` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `taken` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `audience` varchar(100) DEFAULT NULL,
  `why` varchar(100) DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `edit` varchar(100) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `image_type` int(1) DEFAULT 0,
  `taken_with` varchar(20) DEFAULT NULL,
  `other_specified` varchar(255) DEFAULT NULL,
  `camera_settings` varchar(20) DEFAULT NULL,
  `shutter_speed` varchar(10) DEFAULT NULL,
  `aperture` varchar(10) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `fstop` varchar(255) DEFAULT NULL,
  `iso_type` varchar(255) DEFAULT NULL,
  `white_balance_type` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `timestamp`, `image`, `currentimage`, `who`, `number`, `taken`, `time`, `audience`, `why`, `relationship`, `edit`, `genre`, `image_type`, `taken_with`, `other_specified`, `camera_settings`, `shutter_speed`, `aperture`, `user_id`, `fstop`, `iso_type`, `white_balance_type`) VALUES
(31, '2020-10-11 19:53:17', 'White_and_grey_horses1500.jpg', '', 'Andrea Webber', 'White and grey horses', 'Alderholt  UK', '2pm ish', 'Reference for a painting I will do', 'app,5.38. f.6.3,iso 100 exp 1/50', 'wb on auto', 'Resized to 1500x', '', 1, '', '', '', '', '', 14, '', '', ''),
(30, '2020-10-11 19:47:17', 'Avonriver_fisherman1500.jpg', '', 'Andrea Webber', 'Fishing spot', 'Alderholt  UK', '11am approx', 'Reference for a painting I will do', '', '', 'Resized to 1500x', '', 1, '', '', '', '', '', 14, '', '', ''),
(28, '2020-10-11 19:38:59', 'Landing_owl_1500.jpg', '', 'Andrea Webber', 'Owl landing', 'Hampshire UK', '11 ish ??', 'practice', 'Wanted a bird in flight', 'Need to know what setting I should have had', 'Resized to 1500x', '', 1, '', '', '', '', '', 14, '', '', ''),
(29, '2020-10-11 19:39:05', 'Landing_owl_15001.jpg', '', 'Andrea Webber', 'Owl landing', 'Hampshire UK', '11 ish ??', 'practice', 'Wanted a bird in flight', 'Need to know what setting I should have had', 'Resized to 1500x', '', 1, '', '', '', '', '', 14, '', '', ''),
(12, '2020-08-15 15:51:18', 'Ostrige_Otshoorne_2007.jpg', '', 'Andrea Webber', 'Ostrich', 'ootshoorne SA', 'not sure', '', '', '', '', '', 1, '', '', '', '', '', 14, '', '', ''),
(13, '2020-08-15 15:51:32', 'Ostrige_Otshoorne_20071.jpg', '', 'Andrea Webber', 'Ostrich', 'ootshoorne SA', 'not sure', '', '', '', '', '', 1, '', '', '', '', '', 14, '', '', ''),
(14, '2020-08-29 19:42:31', 'Lotus_Flower_1500x.jpg', '', 'Andrea Webber', 'Lotus Flower', 'Cape town', 'About 11 am I think January 2020', 'practice', 'Experimenting', 'non', 'no', '', 1, '', '', '', '', '', 14, '', '', ''),
(15, '2020-08-29 19:44:56', 'Monty_updated_1500x.jpg', '', 'Andrea Webber', 'Pastel Painting of a Dog', 'Indoors UK', '2pm', 'gift', 'as a record for my website', 'non', 'only cropped and resized', '', 1, '', '', '', '', '', 14, '', '', ''),
(16, '2020-09-13 18:31:07', 'New_forest_Heather_1500x.jpg', '', 'Andrea Webber', 'New forest heather', 'New Forest UK', 'About 11 am I think 12th Sept 2020', 'Reference for a painting I will do', 'Liked the clouds', 'non', 'cropped a little at bottom', '', 1, '', '', '', '', '', 14, '', '', ''),
(17, '2020-09-13 18:33:33', 'New_forest_ponys1500x.jpg', '', 'Andrea Webber', 'New forest ponys', 'New Forest UK', 'About 11 am I think  12th Sept 2020', 'Reference for a painting I will do', 'For the horses to place int painting', 'non', 'no', '', 1, '', '', '', '', '', 14, '', '', ''),
(18, '2020-09-24 16:46:06', 'Log_Steps_Alderholt_1500x.jpg', '', 'Andrea Webber', 'Log stepping stones', 'Alderholt  UK', '14.35', 'Reference for a painting I will do', 'Thought it would make a good Painting with artist licence adjustments', '', 'Resized to 1500x', '', 1, '', '', '', '', '', 14, '', '', ''),
(19, '2020-09-24 17:18:13', 'River_Alderholt_1500x.jpg', '', 'Andrea Webber', 'River with path', 'Alderholt  UK', 'approx  1ish', '', 'As a reference for a painting', '', '', '', 1, '', '', '', '', '', 14, '', '', ''),
(34, '2020-11-08 15:58:48', 'View_new_forest_with_Gorse_and_pony.JPG', '', 'Andrea Webber', 'Pony and Gorse in the New forest', 'New Forest UK', 'a long time ago', 'reference to paint', '', '', '', 'taken with old Nikon point and click', 1, '', '', '', '', '', 14, '5/3', '50', 'auto'),
(42, '2020-11-13 22:21:19', '', '', '1', '', '', '', '', '', '', '', '', 2, 'Point and Shoot', '', '15', '', '', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `image_feedback`
--

CREATE TABLE `image_feedback` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `aperture` varchar(15) DEFAULT NULL,
  `shutterspeed` varchar(15) DEFAULT NULL,
  `iso` varchar(15) DEFAULT NULL,
  `white_balance` varchar(15) DEFAULT NULL,
  `rule_of_thirds` varchar(25) DEFAULT NULL,
  `for_middle_background` varchar(25) DEFAULT NULL,
  `crop_frame` varchar(25) DEFAULT NULL,
  `photo_lines` varchar(25) DEFAULT NULL,
  `balance` varchar(25) DEFAULT NULL,
  `perspective` varchar(25) DEFAULT NULL,
  `framing` varchar(25) DEFAULT NULL,
  `contrast` varchar(25) DEFAULT NULL,
  `movement` varchar(25) DEFAULT NULL,
  `focus` varchar(25) DEFAULT NULL,
  `exposure` varchar(25) DEFAULT NULL,
  `dof` varchar(25) DEFAULT NULL,
  `story_clear` varchar(4) DEFAULT NULL,
  `feel` varchar(8) DEFAULT NULL,
  `no_feel` text DEFAULT NULL,
  `summary` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_feedback`
--

INSERT INTO `image_feedback` (`id`, `image_id`, `client_id`, `aperture`, `shutterspeed`, `iso`, `white_balance`, `rule_of_thirds`, `for_middle_background`, `crop_frame`, `photo_lines`, `balance`, `perspective`, `framing`, `contrast`, `movement`, `focus`, `exposure`, `dof`, `story_clear`, `feel`, `no_feel`, `summary`) VALUES
(1, 0, 0, NULL, NULL, NULL, 'Morning', 'Pix-Guru', 'Wedding Journey', 'South Africa', 'Morning', 'Morning', 'Morning', 'Morning', 'Morning', 'Morning', NULL, NULL, NULL, NULL, NULL, '', ''),
(2, 9, 1, '', '', '', 'Morning', 'Pix-Guru', 'Wedding Journey', 'South Africa', 'lines', 'balance', 'perspective', 'faraming', 'contrast', 'movement', 'Sharp', 'Underexposed', 'Deep', 'No', 'Sad', 'teasdf', 'test'),
(3, 10, 7, NULL, NULL, NULL, 'Morning', '', '', '', '', '', '', '', '', '', NULL, 'Overexposed', NULL, NULL, NULL, '', ''),
(4, 11, 14, NULL, NULL, NULL, 'Correct', 'Horizon too low', 'Good 3 D', 'Crop to left to get rule ', 'NA', 'NA', 'NA', 'NA', 'Use contrast slider in LR', 'No camera shake', 'Sharp', ' Normal_Exposed', 'Shallow', 'Yes', 'Happy', '', 'Exceptional angle .....bla bla '),
(5, 12, 14, NULL, NULL, NULL, 'Is a bit blue -', 'Yes', 'Leave in front of face a ', 'Feet cut off ', 'NA', 'NA', 'Perspective great/POV gre', 'Branch at top gives feeli', 'Bring highlight slider in', 'Photo is not showing came', 'Sharp', 'Overexposed', 'Deep', 'Yes', 'Happy', '', 'Try and give camera settings next time to enable us to give more feedback'),
(6, 13, 14, '?', '?', '?', 'Is a bit blue -', 'Yes', 'Leave in front of face a ', 'Feet cut off ', 'NA', 'NA', 'Perspective great/POV gre', 'Branch at top gives feeli', 'Bring highlight slider in', 'No camera shake', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 15, 14, '?', '?', '?', 'Blueish cast - ', 'Yes', 'Yes, dog\'s eye on top int', 'Bit closed crop in front ', 'NA', 'NA', 'Point of View is close - ', 'NA', 'Contrast between head/bac', 'A little soft - maybe F/s', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 14, 14, '?', '?', '?', 'Good', 'Nearly there - but flower', 'Background is busy - read', 'Can be cropped to elimina', 'NA', 'Very close to simmetrical', 'POV:  Mabe move closer?', 'N/A', 'Good contrast between pin', 'No camera shake', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 17, 14, '?', '?', '?', 'Correct', 'Yes', 'Good 3 D', 'Cropping is fine', 'NA', 'Nice triangle between hor', 'Horse in front blocks vie', 'NA', 'Good', 'No camera shake', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 16, 14, '?', '?', '?', 'Correct', 'Yes', 'Good 3 D', 'Cropping is fine', 'Path on the left pulls ey', 'NA', 'Good - off-centre tree is', 'NA', 'Good contrast between pin', 'No camera shake', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 19, 14, 'F5.6', '1/30', '100', '?', 'Yes', 'Good 3D', 'Not necessary', 'Beautiful s-curve of rive', 'N/A', 'Perspective great/POV gre', 'N/A', 'Low contrast because phot', 'Little bit of blurryness', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 18, 14, 'F5.6', '1/50', '500', '?', 'Yes', 'Good 3 D', 'Not necessary', 'Like the lead-on line of ', 'NA', 'Perspective great/POV gre', 'NA', 'Contrast low because of h', 'A bit of movement because', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 31, 14, 'F5.6 is fine', '1/50 - too slow', 'Is fine', 'Bit bluish - AW', 'Yes', 'Background is a bit busy ', 'Is fine', 'Horse in front - necl dra', 'Yes', 'Perspective great/POV gre', 'NA', 'Contrast can be a bit hig', 'A bit of cameera shake be', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 30, 14, 'Good', 'No movement', 'No noise on pho', 'Is a bit blue -', 'Yes', 'Good 3 D', 'Tree makes beautiful natu', 'Yes...little path on left', 'Tree and bush in front ba', 'Perspective great/POV gre', 'Tree forming frame gives ', 'Not a lot as it was taken', 'None', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 29, 14, 'Should be about', 'Fast:  about 1/', 'To get this fas', 'Looks good', 'Yes', 'Not really applicable her', 'N/A', 'NA', 'NA', 'Perspective great/POV gre', 'NA', 'Bird little bit overexpos', 'Photo blurred because of ', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 34, 14, 'F5/3 is maybe a', '?', '50 is fine', 'Auto will give ', 'Interesting \'negative\' ru', 'Good 3 D', 'No crop necessary', 'NA', 'NA', 'Perspective great/POV gre', 'NA', 'Can be a bit higher', 'A little soft - maybe F/s', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 40, 1, NULL, NULL, NULL, '', '', '', '', '', '', '', '', '', '', 'Fuzzy', ' Normal_Exposed', 'Deep', 'Yes', 'Other', '', ''),
(18, 42, 1, '', '', '', '', '', '', 'blah', '', '', 'zxcvn', '', '', '', 'Sharp', 'Underexposed', NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `color` varchar(6) NOT NULL,
  `paypal_product_id` varchar(100) DEFAULT NULL,
  `paypal_plan_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `type`, `price`, `color`, `paypal_product_id`, `paypal_plan_id`) VALUES
(1, 'beginner_annual', 99.95, 'BFDFEA', 'PROD-8T50039984181093A', 'P-0C527679F4778934KL43JIIA'),
(2, 'beginner_monthly', 9.95, '9CC6D4', 'PROD-7T414981CE078601C', 'P-2V317314LG900214PL43JIVA'),
(3, 'advanced_annual', 129.95, 'EAD8BF', 'PROD-56J77132G0271232U', 'P-3WS80453VE885144GL43JIZY'),
(4, 'advanced_monthly', 12.95, 'D8C09E', 'PROD-6829238524436051R', 'P-4XN74970FN5329212L43JI5Y');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `person_type` varchar(255) NOT NULL,
  `message` mediumtext NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `image_id`, `person_id`, `person_type`, `message`, `timestamp`) VALUES
(7, 9, 1, 'admin', 'Beautiful photograph, well planned and very professional!', '2020-07-13 08:24:39'),
(8, 9, 1, 'client', 'Thank you so much for the feedback!', '2020-07-13 08:25:10'),
(9, 9, 1, 'admin', 'I would love to hear from you soon!', '2020-07-13 08:39:54'),
(10, 10, 7, 'admin', 'Fantastic wedding photograph! I would love to see more of your work posted here!', '2020-07-13 08:45:19'),
(11, 11, 1, 'admin', '', '2020-08-15 12:24:19'),
(12, 11, 1, 'admin', '', '2020-08-15 12:26:03'),
(13, 11, 1, 'admin', '', '2020-08-15 12:34:47'),
(14, 11, 14, 'client', '', '2020-08-15 12:37:12'),
(15, 12, 1, 'admin', '', '2020-08-15 16:05:43'),
(16, 12, 1, 'admin', 'Overall a good photo - but be careful not to cut off feet next time and rather underexpose photo to capture detail in the sky  - it is a bit overexposed - you can always get detail back in shadow areas by lifting the Lightroom shadow slider.  The leave in front of face can also be edited out it draws the attention away from the face.  Always remember to focus on the eyes.  If you have time, use LR to desaturate the environment to make the ostrich stand out more.', '2020-08-16 13:09:31'),
(17, 13, 1, 'admin', 'TEST - SAME AS BEFORE - JUST TO SEE IF YOU CAN READ THIS??', '2020-08-19 11:15:28'),
(18, 15, 1, 'admin', 'Overall a good photo, but the area around the eye and top of the head a bit \'soft\' -  maybe a smaller f/stop will give more sharpness and Depth of Field?  The catch light in the eye can also be brighter.  The nose is a bit close to the edge of the painting, but maybe this is the idea?......  to put the viewer \'on edge\' and break some rules!  No reflection in the glass - a polarizing filter can be used to cut down on the reflection, but in this instance it is not necessary.  Well done! ', '2020-08-30 15:16:17'),
(19, 14, 1, 'admin', 'The contrasting colours of pink and green makes the flower stand out, but the background is busy, which is distracting - by using a wider lens opening (such as F2.8-3.5) and moving closer to the flower, will lessen DOF and make background blurry.  Beautiful soft light on Lotus flower.  Can crop the photo to get rid of some of the busy background.  By using the brush in Lightroom on less clarity and sharpness the background can also be blurred.  Rule of thirds:  maybe place flower a bit more to the right?  Ideal lens for this kind of photography, is a macro lens or turn your lens around to get a magnifying effect if you do not have a macro lens.  Focus is where it should be - well done.  \r\n', '2020-08-30 15:25:32'),
(20, 17, 1, 'admin', 'Love the sharpness of the photo - lots of Depth of Field (DOF) - everything is in focus - there is a definite 3D feel to the photo - fore-, mid- and background.  The lying horse is interesting - on the one hand it \'blocks\' the viewers eye and on the other hand it is telling a story - is the horse sleeping, sick, injured??? And the one looking at the horse on the ground with a sort of apathetic expression on its face - really an interesting story!  Even though the photo was taken in sharp midday sun, it is not overexposed.  The horizon 1/3 up also helps that the photo is not appear to be \'boring\' - very good effort!', '2020-09-16 12:56:05'),
(21, 16, 1, 'admin', 'Again a photo with lots of DOF - everything sharp in focus - the tree is a bit off-centre, which makes for a good composition and the horizon 1/3 from the top is excellent.  The green against the white clouds gives a good contrast - also the green against the pink flowers - the little pathway on the left pulls the eye into the picture.  It would have been even better if it started closer to the left corner of the image - just move a bit to the left when taking the photo.  If this photo was taken a bit later with more shadows, more texture would have been noticeable on the vegetation.  Even though the photo is taken half against the sun, it did not affect the contrast and there is no lens flare - well done!', '2020-09-16 13:04:35'),
(22, 16, 14, 'client', '', '2020-09-23 15:05:06'),
(23, 16, 14, 'client', 'Hi Ohna just noticed this reply button so I thought I would test it. \r\nThanks for the feedback on this photo.Is there a way that I could have picked up the heather in the foreground a bit sharper without loosing the focus on the clouds. As you say the later light would have made a difference.\r\n', '2020-09-23 15:11:16'),
(24, 16, 1, 'admin', 'Hi Andrea - yes, by closing down the f/stop to a narrower opening (for instance say F/stop was F/8, you can narrow it to say F/10 or f/11)  or by using hyper focus - this is an advanced function and I will explain it to you later.  ', '2020-09-24 12:21:18'),
(25, 16, 14, 'client', '', '2020-09-24 17:12:06'),
(26, 16, 14, 'client', 'thanks Ohna that helps a lot will try that next time', '2020-09-24 17:12:54'),
(27, 19, 1, 'admin', 'Feedback on completion of the form:\r\n\r\nRELATIONSHIP WITH SUBJECT:  If it is a family member or a place you love to visit etc....try to determine emotion\r\nMANIPULATED/EDITED:  If you edited in Photoshop, Lightroom etc...	\r\nGENRE:  In this case NATURE PHOTOGRAPHY	\r\nTAKEN WITH:  Canon 600D	\r\nCAMERA SETTINGS:  WB, ISO	\r\nSHUTTER SPEED:  i.e. 1/125, 1/30 etc	\r\nAPERTURE: i.e. f5.6, f8,etc\r\n\r\nFeedback on photo:\r\nTECHNICAL:\r\nISO:  100 - that\'s fine (anything up to 400 ISO is ok and photos will not show noise)\r\nF/STOP:  F5.6 - aperture a bit wide with the result the photo is a bit soft - not enough Depth of Field (DOF) - an aperture of f/8 will give a \'sharper\' photo with more DOF - just be careful to watch your shutter speed - if it is too slow, you will get blurry photos because the camera will move if it is handheld - or try to put camera on tripod, stone, camera bag etc. when you take the photo\r\n\r\n.\r\n\r\n', '2020-09-25 11:37:52'),
(28, 19, 1, 'admin', 'PART 2 OF FEEDBACK:\r\nCREATIVE:\r\nLove the S-curve of the river and the position you were standing - it pulls the eye into the photo.\r\nIf you take this photo on AV, you can try exposure compensation to eliminate the bright sky - we will still get to this - is a bit of advanced photography, but gives beautiful results when you shoot against a harsh backlight\r\nEDITING:\r\nWith a program such as Lightroom you will also be able to eliminate most of the harsh backlight - this is also causing \'light spill\' into the photo - this harsh light confuses the cameras light meter - we will get to all this!\r\nIf you email me the photo - I will edit it and show you what the end result can be.\r\n', '2020-09-25 11:43:06'),
(29, 18, 1, 'admin', 'TECHNICAL:\r\nF/STOP:  F/5.6 = a bit too wide open - maybe try something like f/8 for more DOF\r\nS/SPEED 1/50:  is slow - also the reason why photo is not sharp because there is a bit of movement.\r\nWHITE BALANCE:  I suspect the camera used AWB (auto white balance) and photo have a bit of a bluish tint to it - also sun filtering through leaves tend to be a bit bluish-  best to put camera on shade - will give warm glow to photo\r\nISO:  500 - might cause noisy photos (specs to appear on photo) - Max ISO of maybe 400?\r\n\r\nFEEDBACK ON CREATIVITY:\r\nPhoto shows definite 3D - there is a fore-, middel- and background.\r\nThe stepping logs pulls the eye into the photo with the little path disappearing - very moody kind of shot - will be beautiful if taken in fog.  RULE OF THIRDS:  Horison 1/3 from the top - this is excellent.  BACKLIGHT:  Because of strong backlight, the camera will struggle with showing contrast - there is also a lot of white light spill into the photo and it also affects the contrast - exposure compensation can help - see previous comment re this - email me this photos as well and I will show you what a bit of editing in Lightroom can do. \r\nLove the overall composition and get a feeling of tranquility when I look at the photo. \r\n\r\n', '2020-09-25 11:57:47'),
(30, 31, 1, 'admin', 'TECHNICAL:  There is definitely camera shake because of the slow shutter speed.  Focal point also not strong - in this instance you can focus on white horse, hold the focus and take the photo in the middle between the two horses.  This is called focus-lock and both horses will be in focus.\r\nWhite balance also a bit blue because of AWB - try shade or cloudy next time.  F/stop of 5.6 is fine - if there is enough light you can narrow it down to say 6.3 or 7.1 to get a sharper photo.\r\nCREATIVE/COMPOSITION:  Love the two grazing horses and the curve in their necks - background unfortunately a bit busy with wall/structure??  Love the rule of thirds you followed and also the space in front of the horses - to allow them to move into.  Love the feeling of calmness the two grazing horses gives a person.\r\nRECOMMENDATIONS:  Try using a faster shutter speed even if you have to push up your ISO to 400.  Play around with White balance until you get the one you like - AWB is usually not very good.  Watch your fore/background for disturbing elements.', '2020-10-14 13:32:15'),
(31, 30, 1, 'admin', 'TECHNICAL:  Would love to know the f/stop. s/s and ISO - but photo appears sharp and no movement.\r\nARTISTIC/COMPOSITION:  The little pathway on the left leads the eye into the photo towards the river.  The tree gives a beautiful natural frame to the photo and a feeling of intimacy.  It is also in balance with the bush in the foreground.\r\nWell executed!', '2020-10-14 13:37:10'),
(32, 29, 1, 'admin', 'This kind of photography is very difficult - even experienced bird photographers struggle with this - good that you are beginning to experiment with it.  \r\nTECHNICAL:  You need to change certain settings on your camera for this - I will explain what when we have another zoom-session.  Use a wider lens opening to get a fast shutter speed and always focus on the eyes.....use the central focus point.  Will explain all this.\r\nCREATIVE/COMPOSITION:  Love the rule of thirds you followed even if the bird is not sharp.  The soft green background forms a nice contrast with the white owl.  So sorry it came out blurred!  But, keep on trying!', '2020-10-14 13:43:43'),
(33, 34, 1, 'admin', 'TECHNICAL:  The horizon is a bit \'blown\' out - if you take a photo on auto, this is what will happen - if you shoot in M, you can control it better by exposing for the highlights - even if the foreground is a bit underexposed  - this you can fix in an editing program with lifting the shadows.  Because the photo was taken in auto, the camera saw the blown out horizon and made the horse a bit too dark.\r\nThe photo is also a bit soft because of the wide F/stop - an F/s of about F8 would have given more DOF.\r\nCOMPOSITION: \r\n Love the fact that you used \'negative\' rule of thirds - puts the viewer a bit on \'edge\' with the horse that is wandering out of the frame.  Definitely a nice way of breaking the rules.  Love the colours as well - the green and yellow makes beautiful contrast.  Foreground is clean - and there is a nice 3D feel to the photo with definite fore-, middle- and backgrounds.\r\nAlso like the horisontal lines of the vegetation and the diagonal line of the mountain - the horisontal lines gives a calming effect and the diagonal puts a bit of drama/strenght in the photo.\r\nRECOMMENDATION: \r\nI would normally tell my students  to use a GND filter for the over exposed horizon.  But, try M next time and underexpose by about 1 stop - then lift the shadows in a program such as Lightroom.\r\nThis photo has a very calming effect - love it!', '2020-11-11 17:58:58'),
(34, 42, 1, 'admin', 'y', '2020-11-13 22:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `heading`, `button`) VALUES
(2, 'Are you interested in a Free Day Trip - PHOTOGRAPHY PACKING SHEET list?', 'Yes! Send me the FREE Packing Sheet List!');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_signups`
--

CREATE TABLE `newsletter_signups` (
  `id` int(11) NOT NULL,
  `newsletter_heading` varchar(255) NOT NULL,
  `contact_name` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_signups`
--

INSERT INTO `newsletter_signups` (`id`, `newsletter_heading`, `contact_name`, `email`, `created_at`) VALUES
(1, 'Are you intrested in a Free Day Trip -PHOTOGRAPHY PACKING SHEET list?', 'jamie', 'jamie@jnz.co.za', '2020-08-03 12:08:41'),
(2, 'Are you intrested in a Free Day Trip -PHOTOGRAPHY PACKING SHEET list?', 'jamie', 'jamie@jnz.co.za', '2020-08-03 12:11:56'),
(3, 'Are you intrested in a Free Day Trip -PHOTOGRAPHY PACKING SHEET list?', 'jamie', 'jamie@jnz.co.za', '2020-08-03 12:12:26'),
(4, 'Are you intrested in a Free Day Trip -PHOTOGRAPHY PACKING SHEET list?', '', '', '2020-08-03 16:18:49'),
(5, 'Are you intrested in a Free Day Trip -PHOTOGRAPHY PACKING SHEET list?', '', '', '2020-08-03 16:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `payfast_settings`
--

CREATE TABLE `payfast_settings` (
  `id` int(11) NOT NULL,
  `merchant_id` varchar(20) NOT NULL,
  `merchant_key` varchar(30) NOT NULL,
  `demo_mode` int(1) NOT NULL DEFAULT 0,
  `passphrase` varchar(30) DEFAULT NULL,
  `payfast_debug` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payfast_settings`
--

INSERT INTO `payfast_settings` (`id`, `merchant_id`, `merchant_key`, `demo_mode`, `passphrase`, `payfast_debug`) VALUES
(1, '14392933', 't48vdcd2dty8l', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderId` varchar(100) NOT NULL,
  `billingToken` varchar(100) NOT NULL,
  `subscriptionId` varchar(100) NOT NULL,
  `facilitatorAccessToken` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `userId`, `orderId`, `billingToken`, `subscriptionId`, `facilitatorAccessToken`, `created_at`) VALUES
(5, 14, '5EA457564S481681L', 'BA-5JT42273ET082942L', 'I-R02RWSG0EA59', 'A21AAEmXYxpoOfpzbXxmQJ4guuF0UfGI_h3y4eRNosajWPA45cY5o5QwM9xWMHSHmw3oEtvG2ovyj6B19iVFpS1gfnfi6p35A', '2020-08-14 13:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `image`, `created_at`) VALUES
(1, 1, 1, 'About Pix Guru', 'Blog-Post-1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et molestie eros. Maecenas dignissim, erat at faucibus finibus, nunc nibh finibus lacus, sed gravida leo urna at erat. Proin et efficitur dolor, eget interdum enim. Cras nec ante quis tellus gravida ornare. Duis arcu lacus, elementum quis iaculis id, mattis ut turpis. Pellentesque id dignissim dolor. Curabitur finibus facilisis pulvinar. Nullam urna arcu, malesuada a purus a, pharetra pulvinar lacus. Curabitur quis ornare felis, ut ultrices nulla.</p>\r\n\r\n<p>Fusce placerat aliquam erat, et sagittis diam accumsan vitae. In elementum vel augue sit amet bibendum. Nulla cursus elit metus. Ut auctor nisl quis bibendum tincidunt. Integer gravida nisi id urna rhoncus, nec tristique magna efficitur. Mauris non blandit ipsum, ut tempus purus. Praesent rhoncus gravida aliquam. Nulla finibus mi id fermentum fringilla. Morbi volutpat, massa eget sodales tempus, est risus elementum leo, pulvinar fermentum diam nibh a mi. Phasellus porttitor vitae mauris non elementum. Sed ut lacinia sapien. Proin a metus ullamcorper lectus ultricies euismod. Donec vitae turpis eros. Morbi at imperdiet ligula. Mauris sed rutrum lectus. Phasellus eget nulla congue, dictum dolor ac, dapibus justo.</p>\r\n', 'OS_Ubuntu.png', '2017-03-17 13:22:28'),
(2, 2, 1, 'Pix Guru Packages', 'Blog-Post-2', '<p>. Cras nec ante quis tellus gravida ornare. Duis arcu lacus, elementum quis iaculis id, mattis ut turpis. Pellentesque id dignissim dolor. Curabitur finibus facilisis pulvinar. Nullam urna arcu, malesuada a purus a, pharetra pulvinar lacus. Curabitur quis ornare felis, ut ultrices nulla.</p>\r\n\r\n<p>Fusce placerat aliquam erat, et sagittis diam accumsan vitae. In elementum vel augue sit amet bibendum. Nulla cursus elit metus. Ut auctor nisl quis bibendum tincidunt. Intes elementum leo, pulvinar fermentum diam nibh a mi. Phasellus porttitor vitae mauris non elementum. Sed ut lacinia sapien. Proin a metus ullamcorper lectus ultricies euismod. Donec vitae turpis eros. Morbi at imperdiet ligula. Mauris sed rutrum lectus. Phasellus eget nulla congue, dictum dolor ac, dapibus justo.</p>\r\n', 'ci.png', '2017-03-17 13:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `heading` varchar(30) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `images` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `heading`, `price`, `description`, `images`, `timestamp`) VALUES
(22, 'Pix-Guru', 'R1500', 'Amazing', 'pix-guru1.jpg', '2020-06-14 18:05:50'),
(23, 'Pix-Guru', 'R1500', 'Amazing', 'pix-guru2.jpg', '2020-06-14 18:06:09'),
(24, 'Pix-Guru', 'R1500', 'Amazing', 'pix-guru3.jpg', '2020-06-14 18:06:23'),
(21, 'Pix-Guru', 'R1500', 'Amazing', 'pix-guru.jpg', '2020-06-14 18:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(100) NOT NULL,
  `heading` varchar(30) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `extra` varchar(1000) NOT NULL,
  `directions` varchar(1000) NOT NULL,
  `safe` varchar(1000) NOT NULL,
  `work` varchar(1000) NOT NULL,
  `result` varchar(1000) NOT NULL,
  `images` text NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `heading`, `price`, `description`, `extra`, `directions`, `safe`, `work`, `result`, `images`, `timestamp`) VALUES
(3, 'LASH OUT LASH GROWTH SERUM', 'R750', 'Stimulating formula to encourage lash growth and lash love. Paraben and hormone free. A clinically proven lash growth serum that promotes healthier and fuller looking lashes in as little as 4 weeks!\r\n', 'LASH OUT promotes fuller and healthier eyelashes. Our product is a nourishing eyelash serum that is specifically formulated to help eyelash growth by stimulating the eyelash from the root to the tip. This serum will revivify your lashes to be supple, ultimately resulting in full, strong, and long lashes!', 'Apply along the upper lash line once a day as you would when applying eyeliner, at the roots of your lovely lashes. We recommend application before going to bed. External use only. Rinse thoroughly with lukewarm water in case product comes in contact with eyes. Discontinue use and consult your doctor if irritation develops and persists.\r\n\r\n*Results may vary for each individual and is dependent on regular\r\napplication.', 'Check with your doctor on this one. Over-the-counter formulas claim to only aid in the overall health of your lash hairs, which can make them more resistant to breakage and look fuller and healthier in return, but there\'s only one serum that\'s FDA-approved to encourage lash growth. That said, if you give one a try (over-the-counter or prescription) and your eye becomes itchy and/or red, stop using it and consult a physician—you only got one set of eyes, after all (btw, if I sound like a mom, it\'s because I AM).', 'According to Courtney Buhler, founder, and CEO of Sugarlash ProR, an eyelash serum can increase your lash growth in its growing phase and might even prolong the time until it naturally falls out. “Basically, [the formula] extends your lash’s life cycle, so it doesn’t shed as quickly as it would otherwise,” she says.', 'Even if you use the best of the best eyelash serum and apply it diligently every single day, you have to be patient, since you won’t see results immediately. “Lash serums take time to show dramatic results, so get into the habit of applying one each morning,” Buhler said. And, depending on how your body reacts to the serum, your timeline will vary—some may see results after a month, and others might not notice a difference until month three or four (or if you’re using the wrong formula, never).', 'LashSerumPlain_1_1080x.png', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `temp_user`
--

CREATE TABLE `temp_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `membership` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `paid` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_user`
--

INSERT INTO `temp_user` (`id`, `username`, `password`, `created_at`, `email`, `membership`, `status`, `paid`) VALUES
(11, 'jamie', 'password', '2020-08-07 12:24:11', 'jamie@jnz.co.za', 1, 0, 0),
(12, 'jamie', 'password', '2020-08-07 12:25:35', 'jamie@jnz.co.za', 1, 0, 0),
(13, 'jamie2', 'password', '2020-08-07 12:35:04', 'jamies@jnz.co.za', 2, 0, 0),
(14, 'jameson', 'password', '2020-08-07 12:58:00', 'jameson@jnz.co.za', 2, 0, 0),
(15, 'artbyandrea', 'MNzxg328jT', '2020-08-14 15:13:05', 'artbyandrea47@gmail.com', 2, 0, 0),
(16, '', '', '2020-08-14 15:34:43', '', 2, 0, 0),
(17, '', '', '2020-08-14 15:41:42', '', 2, 0, 0),
(18, 'tester', 'password', '2020-08-14 15:42:14', 'jamie@jnz.co.za', 2, 0, 0),
(19, '', '', '2020-08-14 15:47:52', '', 3, 0, 0),
(20, '', '', '2020-08-14 15:51:31', '', 3, 0, 0),
(21, 'artbyandrea', 'MNzxg328jT', '2020-08-14 15:51:57', 'artbyandrea47@gmail.com', 2, 0, 0),
(22, 'asdfasd', '', '2020-08-14 15:53:46', 'jamie', 4, 0, 0),
(23, 'test', 'password', '2020-10-22 14:47:55', 'tester@gmail.com', 2, 0, 0),
(24, 'luciagreeff', 'luciag', '2020-11-02 20:56:29', 'luciagreeff@gmail.com', 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `membership` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `paid` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `email`, `membership`, `status`, `paid`) VALUES
(1, 'client', '2224393cee3e8c0ff778f518130de6eac3c00412', '2020-06-15 06:08:08', 'client@test.com', 2, 0, 0),
(14, 'artbyandrea', 'e4069d35b11c984aae2afb99925701c1efd556f2', '2020-08-14 15:54:21', 'artbyandrea47@gmail.com', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `membership` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `paid` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `email`, `membership`, `status`, `paid`) VALUES
(1, 'admin', '2224393cee3e8c0ff778f518130de6eac3c00412', '2019-09-16 15:19:26', 'ohna.nel@gmail.com', 0, 0, 0),
(2, 'admin123', '2224393cee3e8c0ff778f518130de6eac3c00412', '2019-09-21 21:16:48', 'michele7brumme1@gmail.com', 0, 0, 0),
(3, 'michele7brumme@gmail.com', '2224393cee3e8c0ff778f518130de6eac3c00412', '2020-08-07 13:11:56', 'michele7brumme2@gmail.com', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `title`, `type`, `price`, `status`, `timestamp`) VALUES
(2, 'Eyebrow Microblading', 'fixed', 1100.00, 1, '2019-10-04 09:27:20'),
(4, 'Gift Voucher R500', 'fixed', 500.00, 1, '2019-10-04 13:16:19'),
(5, 'ARYLIC NEW SET NAILS', 'fixed', 400.00, 1, '2019-10-04 13:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_orders`
--

CREATE TABLE `voucher_orders` (
  `id` int(100) NOT NULL,
  `recipient_name` varchar(40) NOT NULL,
  `voucher_type` varchar(10) NOT NULL,
  `voucher_value` decimal(8,2) NOT NULL,
  `recipient_number` varchar(15) NOT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_number` varchar(15) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `voucher_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_orders`
--

INSERT INTO `voucher_orders` (`id`, `recipient_name`, `voucher_type`, `voucher_value`, `recipient_number`, `client_name`, `client_email`, `client_number`, `status`, `timestamp`, `voucher_id`) VALUES
(19, 'wd', 'fixed', 1100.00, 'sd', 'sss', 'michele7brumme@gmail.com', 'ss', 0, '2020-06-11 19:56:35', 2),
(18, 'wd', 'fixed', 1100.00, 'sd', 'sss', 'michele7brumme@gmail.com', 'ss', 0, '2020-06-11 19:50:59', 2),
(16, '', 'fixed', 500.00, '', NULL, '', '', 0, '2020-01-13 12:24:19', 4),
(17, 'Testing', 'fixed', 400.00, '01234567891', 'Testing', 'testing@gmail.com', '01234567891', 0, '2020-05-27 12:24:44', 2),
(15, '', 'fixed', 400.00, '', NULL, '', '', 0, '2020-01-13 11:53:07', 2),
(14, 'Kyle Sommerville ', 'fixed', 400.00, '07377140912', 'Kyle Sommerville', 'sommervillekyle@gmail.com', '07377140912', 0, '2019-12-19 10:40:15', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_feedback`
--
ALTER TABLE `image_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_signups`
--
ALTER TABLE `newsletter_signups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payfast_settings`
--
ALTER TABLE `payfast_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `temp_user`
--
ALTER TABLE `temp_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_orders`
--
ALTER TABLE `voucher_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `image_feedback`
--
ALTER TABLE `image_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter_signups`
--
ALTER TABLE `newsletter_signups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payfast_settings`
--
ALTER TABLE `payfast_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp_user`
--
ALTER TABLE `temp_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voucher_orders`
--
ALTER TABLE `voucher_orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
