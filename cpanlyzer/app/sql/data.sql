-- Feature Slider Data
-- Insert feature cards for the carousel with image URLs

INSERT INTO `wp_posts` (`post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `post_type`, `com_count`, `post_modified`, `post_modified_gmt`, `guid`) VALUES
(1, NOW(), NOW(), '', 'Scattered Profiles', 'Performance spread across multiple coding platforms.', 'publish', 'feature', 0, NOW(), NOW(), 'https://images.unsplash.com/photo-1517433456452-f9633a875f6f'),
(1, NOW(), NOW(), '', 'Unclear Analytics', 'Ratings fail to show real growth clearly.', 'publish', 'feature', 0, NOW(), NOW(), 'https://images.unsplash.com/photo-1551288049-bebda4e38f71'),
(1, NOW(), NOW(), '', 'Skill Showcase', 'No single portfolio to prove ability of CP.', 'publish', 'feature', 0, NOW(), NOW(), 'https://images.unsplash.com/photo-1522071820081-009f0129c71c'),
(1, NOW(), NOW(), '', 'Unified Dashboard', 'All competitive data in one place, in a single link.', 'publish', 'feature', 0, NOW(), NOW(), 'https://images.unsplash.com/photo-1460925895917-afdab827c52f'),
(1, NOW(), NOW(), '', 'Growth Tracking', 'Measure consistency, improvement, and progress.', 'publish', 'feature', 0, NOW(), NOW(), 'https://images.unsplash.com/photo-1508780709619-79562169bc64'),
(1, NOW(), NOW(), '', 'Peer Comparison', 'Compare progress with similar programmers.', 'publish', 'feature', 0, NOW(), NOW(), 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d');

-- Ensure image URLs are stored as thumbnails for fallback display
SET @post_id_1 = LAST_INSERT_ID() - 5;
SET @post_id_2 = LAST_INSERT_ID() - 4;
SET @post_id_3 = LAST_INSERT_ID() - 3;
SET @post_id_4 = LAST_INSERT_ID() - 2;
SET @post_id_5 = LAST_INSERT_ID() - 1;
SET @post_id_6 = LAST_INSERT_ID();

INSERT INTO `wp_postmeta` (`post_id`, `meta_key`, `meta_value`) VALUES
(@post_id_1, '_thumbnail_url', 'https://images.unsplash.com/photo-1517433456452-f9633a875f6f'),
(@post_id_2, '_thumbnail_url', 'https://images.unsplash.com/photo-1551288049-bebda4e38f71'),
(@post_id_3, '_thumbnail_url', 'https://images.unsplash.com/photo-1522071820081-009f0129c71c'),
(@post_id_4, '_thumbnail_url', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f'),
(@post_id_5, '_thumbnail_url', 'https://images.unsplash.com/photo-1508780709619-79562169bc64'),
(@post_id_6, '_thumbnail_url', 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d');
