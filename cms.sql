
-- CREATE DATABASE cms;
-- USE cms;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
);

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'PHP'),
(2, 'web'),
(3, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(4) NOT NULL,
  `comment_post_id` int(4) NOT NULL,
  `cooment_author` varchar(200) NOT NULL,
  `comment_email` varchar(200) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(200) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `cooment_author`, `comment_email`, `comment_content`, `comment_status`) VALUES
(1, 3, 'Ssenoga Edward', 'senoeddie@gmail.com', 'this is my first comment', 'Approved'),
(2, 4, 'Ssenoga Edward', 'senoeddie@gmail.com', 'i like wat am seeing', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_title` varchar(250) NOT NULL,
  `post_author` varchar(250) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_content` text NOT NULL,
  `post_image` text NOT NULL,
  `post_status` varchar(200) NOT NULL,
  `post_cat_id` int(4) NOT NULL,
  `post_tags` text NOT NULL,
  `post_comments` int(5) NOT NULL DEFAULT '0'
);

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_author`, `post_content`, `post_image`, `post_status`, `post_cat_id`, `post_tags`, `post_comments`) VALUES
(1, 'test', 'test', '\r\n\r\nMagna ac placerat vestibulum lectus mauris ultrices eros. Purus sit amet volutpat consequat mauris. Dui faucibus in ornare quam. Neque laoreet suspendisse interdum consectetur libero id. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Amet nisl suscipit adipiscing bibendum est ultricies integer. Ante metus dictum at tempor commodo ullamcorper a lacus. Cum sociis natoque penatibus et. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. In dictum non consectetur a erat nam. Ac felis donec et odio. Sed risus pretium quam vulputate dignissim. Ipsum dolor sit amet consectetur adipiscing elit. Purus sit amet volutpat consequat mauris nunc. Cras adipiscing enim eu turpis egestas pretium. Libero nunc consequat interdum varius sit amet.', 'akash-rajendra-1284185-unsplash.jpg', 'varified', 1, '', 0),
(3, 'testing the work ', 'admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis risus sed vulputate odio ut enim. Aliquam faucibus purus in massa tempor nec feugiat. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus mauris. Sed blandit libero volutpat sed cras ornare arcu dui. Velit egestas dui id ornare arcu. Mattis aliquam faucibus purus in massa tempor nec feugiat. In hendrerit gravida rutrum quisque non tellus. Semper risus in hendrerit gravida rutrum. Placerat in egestas erat imperdiet sed euismod nisi porta lorem. Nulla pharetra diam sit amet nisl. Diam donec adipiscing tristique risus nec feugiat. Felis eget velit aliquet sagittis id consectetur purus ut. Integer vitae justo eget magna fermentum iaculis eu non.\r\n\r\nIn cursus turpis massa tincidunt dui ut ornare lectus sit. Egestas quis ipsum suspendisse ultrices gravida dictum fusce. Duis ultricies lacus sed turpis. Nulla facilisi cras fermentum odio eu feugiat. Mauris nunc congue nisi vitae suscipit. Tristique nulla aliquet enim tortor. A diam maecenas sed enim. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et. Sapien et ligula ullamcorper malesuada proin libero nunc consequat interdum. Enim nunc faucibus a pellentesque sit amet porttitor eget. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl.\r\n', 'akash-rajendra-1284185-unsplash.jpg', 'varified', 1, 'testing', 1),
(4, 'Doing The coursework', 'ssenoga edward', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis risus sed vulputate odio ut enim. Aliquam faucibus purus in massa tempor nec feugiat. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus mauris. Sed blandit libero volutpat sed cras ornare arcu dui. Velit egestas dui id ornare arcu. Mattis aliquam faucibus purus in massa tempor nec feugiat. In hendrerit gravida rutrum quisque non tellus. Semper risus in hendrerit gravida rutrum. Placerat in egestas erat imperdiet sed euismod nisi porta lorem. Nulla pharetra diam sit amet nisl. Diam donec adipiscing tristique risus nec feugiat. Felis eget velit aliquet sagittis id consectetur purus ut. Integer vitae justo eget magna fermentum iaculis eu non.\r\n\r\n\r\nMagna ac placerat vestibulum lectus mauris ultrices eros. Purus sit amet volutpat consequat mauris. Dui faucibus in ornare quam. Neque laoreet suspendisse interdum consectetur libero id. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Amet nisl suscipit adipiscing bibendum est ultricies integer. Ante metus dictum at tempor commodo ullamcorper a lacus. Cum sociis natoque penatibus et. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. In dictum non consectetur a erat nam. Ac felis donec et odio. Sed risus pretium quam vulputate dignissim. Ipsum dolor sit amet consectetur adipiscing elit. Purus sit amet volutpat consequat mauris nunc. Cras adipiscing enim eu turpis egestas pretium. Libero nunc consequat interdum varius sit amet.', 'ali-yilmaz-1320636-unsplash.jpg', 'varified', 1, 'web, coursework', 1),
(5, 'Testing the system', 'admin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis risus sed vulputate odio ut enim. Aliquam faucibus purus in massa tempor nec feugiat. Volutpat consequat mauris nunc congue nisi vitae suscipit tellus mauris. Sed blandit libero volutpat sed cras ornare arcu dui. Velit egestas dui id ornare arcu. Mattis aliquam faucibus purus in massa tempor nec feugiat. In hendrerit gravida rutrum quisque non tellus. Semper risus in hendrerit gravida rutrum. Placerat in egestas erat imperdiet sed euismod nisi porta lorem. Nulla pharetra diam sit amet nisl. Diam donec adipiscing tristique risus nec feugiat. Felis eget velit aliquet sagittis id consectetur purus ut. Integer vitae justo eget magna fermentum iaculis eu non.\r\n\r\nIn cursus turpis massa tincidunt dui ut ornare lectus sit. Egestas quis ipsum suspendisse ultrices gravida dictum fusce. Duis ultricies lacus sed turpis. Nulla facilisi cras fermentum odio eu feugiat. Mauris nunc congue nisi vitae suscipit. Tristique nulla aliquet enim tortor. A diam maecenas sed enim. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et. Sapien et ligula ullamcorper malesuada proin libero nunc consequat interdum. Enim nunc faucibus a pellentesque sit amet porttitor eget. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl.\r\n\r\nMagna ac placerat vestibulum lectus mauris ultrices eros. Purus sit amet volutpat consequat mauris. Dui faucibus in ornare quam. Neque laoreet suspendisse interdum consectetur libero id. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci. Amet nisl suscipit adipiscing bibendum est ultricies integer. Ante metus dictum at tempor commodo ullamcorper a lacus. Cum sociis natoque penatibus et. Iaculis urna id volutpat lacus laoreet non curabitur gravida arcu. In dictum non consectetur a erat nam. Ac felis donec et odio. Sed risus pretium quam vulputate dignissim. Ipsum dolor sit amet consectetur adipiscing elit. Purus sit amet volutpat consequat mauris nunc. Cras adipiscing enim eu turpis egestas pretium. Libero nunc consequat interdum varius sit amet.', '4.jpg', 'varified', 1, 'testing,post,all', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(250) NOT NULL,
  `user_firstname` varchar(250) NOT NULL,
  `user_lastname` varchar(250) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `randsalt` varchar(250) NOT NULL DEFAULT 'thisisalongstring123456'
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_password`, `user_email`, `user_role`, `randsalt`) VALUES
(3, 'admin', '', '', 'admin', '', 'admin', 'thisisalongstring123456'),
(4, 'test', 'test', 'Edward', '123', 'senoeddie@gmail.com', 'admin', 'thisisalongstring123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;
