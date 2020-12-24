-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2020 at 07:25 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Entertainment', 3),
(2, 'Sports', 3),
(3, 'Politics & Nation', 1),
(4, 'Education & Technology', 3),
(5, 'Health', 0),
(7, 'International', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` int(10) NOT NULL,
  `post_date` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, 'IPL 2020 - Global cricket still needs an icon like MS Dhoni to continue: Former India wicket-keeper', 'India’s Mahendra Singh Dhoni may have signed off from international duties but he’ll be at the heart of the action in the Indian Premier League -- a tournament he helped inspire, and where he remains a towering figure. Dhoni, who has led the Chennai Super Kings to three titles and five runner-up finishes in the IPL’s 12 editions, will feature in the opening match on Saturday against the Mumbai Indians, the defending champions.\r\n\r\nThe game comes more than a year after the 39-year-old last played for India in their semi-final loss to New Zealand in the 2019 World Cup.\r\n\r\nAfter much speculation, the wicketkeeper-batsman finally announced the end of his 16-year international career last month.', 2, '15 Sep, 2020', '2', 'ipl-t20-2019-csk-vs-rr_c0c31e2e-f59d-11ea-a202-bb30b6351b83 (1).jpg'),
(6, 'Exclusive! Pankaj Tripathi on nepotism: If you do not have the talent, you will not survive in this industry', 'Pankaj Tripathi has become a household name today with his brilliant performances in films like ‘Gangs of Wasseypur’, ‘Stree’, ‘Angrezi Medium’ and others. His journey from a junior artist to one of the most celebrated mainstream actors is truly inspirational. In an exclusive interview with ETimes, the ace actor opened up about his brush with nepotism in Bollywood, his journey in showbiz, and more. Excerpts…\r\nMany are debating and protesting about growing nepotism in Bollywood. Has it ever bothered you?\r\nNepotism has never really bothered me in any way. I have always been busy working on my craft. People might think I am lying when I say that I have never felt uncomfortable in the industry. But this journey and experience have been mine so I only can say how it was so far. My truth is that I have had my share of struggles. I have worked immensely hard to bag roles in films. I have struggled for eight long years before people started recognizing me.\r\nAlthough I have never had any such experiences, I would not deny that I have seen these things happening in the industry with others. Star kids do get opportunities quicker than others because they belong to a certain family. I never got opportunities so easily. However, nobody stopped me too. No matter if you become a recognized actor after eight years of struggle or just a mere eight days if you do not have the talent; you will not survive in this industry. The audience is very smart. They know who is talented and who is not.', 1, '15 Sep, 2020', '2', '64529565.jpg'),
(7, 'Beyond Rhea and Kangana, another celebrity drug case is unfolding in Karnataka', 'As with the Rhea case, there are several theories that have kept media channels competing with one another.\r\nOver the last couple of months, the headlines that have dominated most of India’s national media surrounds the death of Bollywood actor Sushant Singh Rajput. With the actor’s former girlfriend Rhea Chakraborty arrested, attention has shifted to Kangana Ranaut’s battle with the Maharashtra government. Meanwhile, a case with some parallels is playing out in the state of Karnataka too. All eyes are now on an alleged drug trafficking operation in Bengaluru, which, according to the police, had supporters and enablers in Sandalwood — the Kannada film industry. Here too, two prominent women actors — Ragini Dwivedi and Sanjjanaa Galrani have been arrested.\r\n\r\nThe Rhea Chakraborty case had led to a lot of buzz in Kannada media as it played out on prime time. Parallelly, in August, the Narcotics Control Bureau (NCB) had busted a drug racket in Bengaluru and arrested a woman called Anikha along with several others. A few days after this arrest, on August 29, the NCD issued a statement that actors and musicians in Karnataka were under the scanner for alleged drug use and trafficking. This triggered the media’s obsession with the case and soon, TV channels were full of speculation on who could be using drugs and what drugs. On September 1, filmmaker Indrajit Lankesh appeared on one TV channel and claimed that he had a list of names of people who were using drugs.\r\n\r\nEven as several names did the rounds, on September 1, the Central Crime Branch of the Bengaluru police arrested a man named Ravi Shankar. A government employee, Ravi Shankar was accused of organising rave parties and soon his pictures with friend and actor Ragini Dwivedi went viral. Within a matter of days, the CCB arrested around 10 people, including two women actors (Ragini Dwivedi and Sanjjanaa Galrani), Viren Khanna, a prominent party planner who founded Bangalore Expats Club, and Vivek Oberoi’s brother-in-law Aditya Alva. \r\n\r\n', 1, '15 Sep, 2020', '2', 'rhea,-sanjana,-ragini,-kangana_1200.jpg'),
(8, 'Oppo Reno4 SE arriving on September 21 with 65W charging', 'Oppo is launching its next phone, dubbed Reno4 SE. It looks a lot like the F17 Pro, sold on the global scene, but after further inspection, instead of having four shooters in a square setup, they are actually three with an LED flash in the fourth circle.\r\n\r\nThe Oppo Reno4 SE is now listed on the company website, as well as appearing at some retailers, and will be launched on September 21\r\nThe phone will support 65W charging and have an OLED panel with a single punch hole in the upper left corner.\r\n\r\nThere is a power key on the right side of the phone, the left is for the volume rocker, and on the bottom, there’s room for a 3.5mm audio jack, USB-C port, and a speaker grille.\r\n\r\nThe battery will be 4,300 mAh, split into two 2,150 mAh cells to enable the fast charging speeds.\r\n\r\nWhile all these features are official, the phone also appeared at China Telecom with its memory configurations - 8/128 GB and 8/256 GB. The chipset will be MT6853V, which is the model number of the Mediatek Dimensity 720 5G.\r\nThe last unknown is how much will the Reno4 SE cost - China Telecom has two price offerings, but they are likely placeholders because CNY2,999 (nearly $450) seems steep given the specs.', 4, '15 Sep, 2020', '5', 'gsmarena_002.jpg'),
(10, 'Bollywood star Amitabh Bachchan is the new voice of Amazon’s Alexa', 'Amazon.com Inc. has signed up Bollywood mega star Amitabh Bachchan for its Alexa voice assistant, stealing a march over rivals Apple Inc.’s Siri and Alphabet Inc.’s Google Assistant as a country of 1.3 billion people adapts to voice-enabled internet services.\r\n\r\n“The baritone that has enchanted the Indian film industry for over five decades, will soon deliver a unique voice experience to the many Indian customers who use Alexa,” Amazon announced on its India blog on Monday. \r\nAs with Jackson, Amazon will apply neural speech technology to make Alexa sound exactly like Bachchan no matter what question he is answering without needing to record every word in his voice in the studio. Users can buy Bachchan’s voice as a skill to provide weather updates, recite poetry and give advice.\r\n\r\nIndia with over half-a-billion smartphones and some of the cheapest data rates in the world is rapidly adopting voice-enabled services as people take to the internet through voice rat.\r\n\r\n', 4, '15 Sep, 2020', '2', 'star.png'),
(13, 'IIM CAT 2020: Exam duration reduced, some other major changes announced', 'CAT 2020: The Indian Institute of Management (IIM), Indore has announced some major changes in the exam pattern for Common Admission Test (CAT) 2020. In a press release issued on Tuesday, the institute said that the exam will be conducted on November 29 in three sessions. It further said that the revised duration of the test will be 120 minutes. Till last year the exam was conducted in two sessions and for three hours in each session.\r\n\r\nAccording to the statement, there will be three sections in the question paper namely: verbal ability and reading comprehension, data interpretation and logical reasoning, and quantitative ability and candidates will get 40 minutes to solve each section and they will not be allowed to switch from one section to another while answering questions in a section.\r\n\r\n“Tutorials to understand the format of the test will be available on the CAT website from October 2020. Candidates are advised to work on the tutorials available on the CAT website well in advance,” the release further said.\r\n\r\nThe last date to register for IIM-CAT 2020 has also been extended till 5 pm on September 23. The examination will be held on November 29 .Candidates will be allowed to edit their registration form after the registration window is closed. Candidates will be able to edit their test city preference, signature and photograph in the application form.\r\n\r\nThe Common Admission Test (CAT) is a prerequisite for admission to various Post Graduate and Fellow programmes of IIMs. CAT 2020 scores are allowed to be used by listed non-IIM member institutions as well. A list of such institutions is provided on the CAT website. IIMs have no role in the selection process of non-IIM institutions.', 4, '16 Sep, 2020', '2', '_70d13520-f7d4-11ea-8a7b-62d38a5fef38 (1).jpg'),
(14, 'Social media star CarryMinati to be on Bigg Boss 14 with 3 other YouTubers', 'Social media sensation CarryMinati aka Ajey Nagar is all set to be on Bigg Boss 14. According to reports, the 21-year-old Faridabad based YouTube content creator is already in Mumbai and is quarantined in a hotel and will join Bigg Boss 14 after 14 days. The shoot of Bigg Boss 14\'s first episode will happen on October 1 with Salman Khan at Film City in Mumbai.\r\n\r\nAll 14 contestants of Bigg Boss 14 have to take medical tests and have to be quarantined before the shoot. The show premieres on October 3 on Colors TV. Last year\'s popular jodi Sidarth Shukla and Sehnaaz Gill will be seen in the first episode grilling the contestants along with Salman Khan. They will check the contestants\' abilities to survive in the house.\r\n\r\nOn Bigg Boss 14, four Youtube content creators will be seen as contestants and CarryMinati is one of them. All the four social media stars have been quarantined in a hotel in Mumbai.\r\n\r\nThe other contestants who will be seen on Bigg Boss 14 are Jasmin Bhasin, Pavitra Punia, Sara Gurpal, Naina Singh, Nishant Malkani, Jaan Kumar Sanu and Nikki Tamboli. This year, Bigg Boss will have a mix of TV stars, reality stars and YouTubers.\r\n\r\nCarryMinati started out as a YouTuber and soon became an online sensation with his quirky videos. On his YouTube channel, he shares commentaries and reactions to anything that trends on social media. The social media star is is also a rapper.', 1, '16 Sep, 2020', '2', 'carryminati_bigg_boss_14_1200x768.jpg'),
(15, 'Ahead of 2021 West Bengal polls, Mamata announces monetary help, housing for Hindu priests', 'KOLKATA: Under frequent attack by opposition parties for \"minority appeasement\", West Bengal chief minister Mamata Banerjee on Monday announced monthly financial assistance of Rs 1,000 and free housing for over 8,000 Hindu priests of the state, ahead of the assembly election which is likely to be held in April-May next year.\r\nWith an eye on the Hindi-speaking electorate and tribal voters spread across the state, she also said that a Hindi Academy and a Dalit Sahitya Academy would be set up by her government.\r\n', 3, '16 Sep, 2020', '2', 'download (2).jfif'),
(16, 'IPL 2020 Preview: Chennai Super Kings bank on experience again amid loss of key stalwarts', 'With the 2020 edition of the Indian Premier League (IPL) all set to get under way in the UAE, the eight franchises have been busy with their preparations for the marquee T20 event.\r\nNearly two months of non-stop cricketing action will entertain fans around the globe as the very best from India and some of the biggest overseas stars take centre stage in the UAE.\r\n\r\nHere, we look at how three-time champions Chennai Super Kings are shaping up ahead of their campaign opener on September 19.\r\n\r\nSQUAD\r\n\r\nMahendra Singh Dhoni (Captain), Ravindra Jadeja, Shane Watson, Dwayne Bravo, Kedar Jadhav, Murali Vijay, Faf Du Plessis, Ruturaj Gaikwad, Ambati Rayudu, Mitchell Santner, Sam Curran, Josh Hazlewood, Lungi Ngidi, Deepak Chahar, Shardul Thakur, Imran Tahir, Karn Sharma, Piyush Chawla, R Sai Kishore, Narayan Jagadeesan, KM Asif, Monu', 2, '16 Sep, 2020', '3', 'Dhoni-5.jpg'),
(17, 'IPL 2020 : Harbhajan Singh signs deal with Star Sports for IPL 2020', 'Harbhajan Singh will stay connected with the 13th edition of the Indian Premier League (IPL 2020). Despite of pulling out of his contract with the Chennai Super Kings for ‘personal reasons’, Bhajji’s connect with the IPL 2020 will stay intact. \r\n\r\nAs reported earlier on 4th Sep, the former Indian spinner has signed up officially with Star India for a broadcast stint on the IPL 2020. Bhajji will be part of the Hindi Commentary team for Star Sports. The channel is yet to officially announce the tie-up.\r\n\r\nnsideSport has further learnt that the broadcaster has also planned a special show with Harbhajan for IPL 2020. The details of the show has not been released as yet. But the cricketer himself teased the fans through this cryptic tweet on his upcoming endeavor. \r\n\r\n“Cricket aaj kal kaafi news mein hai, aur abhi abhi mujhe aisa kuch pata chala hai that will change the way you look at cricket forever! #CricketKaKhulasa,” he has stated on his Twitter handle @Harbhajan_Singh.\r\n\r\nAccording to the info available, like most of the other Hindi Commentary team members, Harbhajan will also be based out of Mumbai for the first half of the IPL 2020. Star India has made elaborate arrangements for the strong 700 member crew involved with telecast of the IPL, which will work out of Mumbai. Like in UAE, Star India has created a bio-bubble for their crew in Mumbai as well. \r\n\r\nHarbhajan along with others will stay in this BIO-BUBBLE for his role with the broadcaster. The bio-bubble has been conceptualized by Star India-Walt Disney along with expert team of doctors. ', 2, '16 Sep, 2020', '3', 'Harbhajan-Singh_16aa62f9fd6_large-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `uname`, `password`, `role`) VALUES
(2, 'Aman', 'Gupta', 'AmanGuptaag', 'f01607ed4fdfb87aa6dbf8bff397fdde', 1),
(3, 'Yash', 'Singhal', 'yashsinghal12', 'ba6562f29d5e6f42cfbf557aa08eb687', 0),
(4, 'Kashish', 'Gupta', 'kash1234', '081f992d6dce44e5e1cdf05dbcad03b8', 0),
(5, 'Ankur', 'sharma', 'ankursharma12', 'a111834a2206e9e1537ef52f48322068', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
