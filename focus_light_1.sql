DROP DATABASE IF EXISTS focus_light_1;

CREATE DATABASE focus_light_1;

USE focus_light_1;

-- Creating table for users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating table for services
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    duration VARCHAR(50) NOT NULL,
    includes TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    details TEXT NOT NULL
);

-- Creating table for bookings
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    service_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    booking_date DATE NOT NULL,
    booking_time TIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE RESTRICT
);

-- Creating table for gallery images
CREATE TABLE gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(100) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating table for contact form submissions
CREATE TABLE contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Creating table for terms and conditions acceptance
CREATE TABLE terms_acceptance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    booking_id INT NOT NULL,
    accepted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE
);

-- Inserting sample data into services table
INSERT INTO services (name, duration, includes, price, details) VALUES
('Portraits', '1 hour', '10 edited photos, studio lighting, multiple backgrounds', 100.00, 'Our portrait sessions are tailored to capture your personality with professional lighting and creative compositions.'),
('Product Photography', '2 hours', '20 edited photos, custom setups, high-resolution images', 200.00, 'Perfect for e-commerce, our product photography highlights your items with clarity and appeal.'),
('Events', '4 hours', '50 edited photos, on-site coverage, digital gallery', 500.00, 'Capture the essence of your event with dynamic and vibrant photography.'),
('Commercial', '3 hours', '30 edited photos, branding-focused shots, studio or on-location', 400.00, 'Professional photography for business branding and marketing materials.'),
('Weddings', '8 hours', '100 edited photos, full-day coverage, album creation', 1200.00, 'Comprehensive wedding photography to preserve your special day.'),
('Birthdays', '3 hours', '40 edited photos, candid and posed shots, digital delivery', 300.00, 'Memorable birthday moments captured with joy and creativity.'),
('Sports', '3 hours', '50 edited photos, action shots, team portraits', 350.00, 'High-energy sports photography to showcase athletic moments.');

-- Inserting sample data into gallery table
INSERT INTO gallery (category, image_url, description) VALUES
('Portraits', 'https://via.placeholder.com/600', 'Stunning portrait capturing raw emotion with dramatic lighting.'),
('Events', 'https://via.placeholder.com/600', 'Vibrant event photo showcasing lively moments.'),
('Weddings', 'https://via.placeholder.com/600', 'Romantic wedding shot with elegant composition.'),
('Products', 'https://via.placeholder.com/600', 'Sleek product image with clean background.'),
('Sports', 'https://via.placeholder.com/600', 'Dynamic action shot from a sports event.');

-- Creating table for payment transactions
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    user_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    tax DECIMAL(10, 2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    transaction_reference VARCHAR(100) NOT NULL,
    status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_transaction_reference (transaction_reference)
);

-- Creating table for session scheduling to avoid conflicts
CREATE TABLE schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    service_id INT NOT NULL,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE RESTRICT,
    INDEX idx_start_end_time (start_time, end_time)
);

-- Inserting sample data into users table
INSERT INTO users (name, email, password, phone) VALUES
('John Doe', 'john@example.com', '12345678', '+233123456789'),
('Jane Smith', 'jane@example.com', '12345678', '+233987654321');	

-- Inserting sample data into bookings table
INSERT INTO bookings (user_id, service_id, name, email, phone, booking_date, booking_time, location, payment_method, amount, tax, status) VALUES
('','','','','','','','','','','',''),
('','','','','','','','','','','','');

-- Inserting sample data into contact_submissions table
INSERT INTO contact_submissions (name, email, message) VALUES
('Alice Brown', 'alice@example.com', 'Interested in booking a portrait session. Please provide availability.'),
('Bob Green', 'bob@example.com', 'Can you share details about wedding photography packages?');


-- Inserting sample data into terms_acceptance table
INSERT INTO terms_acceptance (user_id, booking_id, terms_version) VALUES
(1, 1, '1.0'),
(2, 2, '1.0');

-- Inserting sample data into payments table
INSERT INTO payments (booking_id, user_id, amount, tax, payment_method, transaction_reference, status) VALUES
(1, 1, 102.00, 2.00, 'card', 'TXN123456789', 'completed'),
(2, 2, 1224.00, 24.00, 'paypal', 'TXN987654321', 'pending');

-- Inserting sample data into schedules table
INSERT INTO schedules (booking_id, service_id, start_time, end_time, location) VALUES
(1, 1, '2025-08-01 10:00:00', '2025-08-01 11:00:00', 'Studio A, Accra'),
(2, 5, '2025-08-15 09:00:00', '2025-08-15 17:00:00', 'Venue B, Accra');

-- Inserting sample data into gallery table
INSERT INTO gallery (service_id, category, image_url, description) VALUES
(1, 'Portraits', 'https://via.placeholder.com/600/portrait1', 'Stunning portrait capturing raw emotion with dramatic lighting.'),
(2, 'Product Photography', 'https://via.placeholder.com/600/product1', 'Sleek product image with clean background for e-commerce.'),
(3, 'Events', 'https://via.placeholder.com/600/event1', 'Vibrant event photo showcasing lively moments.'),
(4, 'Commercial', 'https://via.placeholder.com/600/commercial1', 'Professional branding shot for corporate marketing.'),
(5, 'Weddings', 'https://via.placeholder.com/600/wedding1', 'Romantic wedding shot with elegant composition.'),
(6, 'Birthdays', 'https://via.placeholder.com/600/birthday1', 'Joyful birthday moment with colorful decorations.'),
(7, 'Sports', 'https://via.placeholder.com/600/sports1', 'Dynamic action shot from a sports event.');

-- Creating table for session scheduling
CREATE TABLE schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    service_id INT NOT NULL,
    photographer_id INT,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    location_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE RESTRICT,
    FOREIGN KEY (photographer_id) REFERENCES photographers(id) ON DELETE SET NULL,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE RESTRICT,
    INDEX idx_start_end_time (start_time, end_time)
);

-- Inserting sample data into users table
INSERT INTO users (name, email, password, phone) VALUES
('John Doe', 'john@example.com', '$2y$10$Kj3Yp8jX1z7Qv2g5T9wH2uK8m9n0p3q4r5t6u7v8w9x0y1z2a3b4', '233123456789'),
('Jane Smith', 'jane@example.com', '$2y$10$Lk4Zq9kX2y8R3w9T0u1H3vK9m0n1p2q3r4t5u6v7w8x9y0z1a2b3', '233987654321'),
('Alice Brown', 'alice@example.com', '$y$10$M5nZq0kX3y9R4w0T1u2H4vK0m1n2p3q4r5t6u7v8w9x0y1z2a3b4', '233555123456');

-- Inserting sample data into photographers table
INSERT INTO photographers (name, email, specialty) VALUES
('Michael Adams', 'michael@focuslight.com', 'Portraits, Weddings'),
('Sarah Lee', 'sarah@focuslight.com', 'Events, Sports'),
('David Kim', 'david@focuslight.com', 'Product Photography, Commercial');

-- Inserting sample data into locations table
INSERT INTO locations (name, address, type) VALUES
('Studio A', '123 Photography Lane, Accra', 'studio'),
('Venue B', '456 Event Road, Accra', 'venue'),
('Outdoor Park', '789 Nature Drive, Accra', 'outdoor');

-- Inserting sample data into services table
INSERT INTO services (name, duration, includes, price, details) VALUES
('Portraits', '1 hour', '10 edited photos, studio lighting, multiple backgrounds, digital delivery', 100.00, 'Tailored portrait sessions to capture your personality with professional lighting and creative compositions.'),
('Product Photography', '2 hours', '20 edited photos, custom setups, high-resolution images, white background option', 200.00, 'Perfect for e-commerce, highlighting items with clarity and appeal.'),
('Events', '4 hours', '50 edited photos, on-site coverage, digital gallery, candid shots', 500.00, 'Dynamic and vibrant photography to capture the essence of your event.'),
('Commercial', '3 hours', '30 edited photos, branding-focused shots, studio or on-location, marketing materials', 400.00, 'Professional photography for business branding and marketing.'),
('Weddings', '8 hours', '100 edited photos, full-day coverage, album creation, engagement session', 1200.00, 'Comprehensive wedding photography to preserve your special day.'),
('Birthdays', '3 hours', '40 edited photos, candid and posed shots, digital delivery, themed props', 300.00, 'Memorable birthday moments captured with joy and creativity.'),
('Sports', '3 hours', '50 edited photos, action shots, team portraits, high-energy captures', 350.00, 'High-energy sports photography to showcase athletic moments.');

-- Inserting sample data into bookings table
INSERT INTO bookings (user_id, service_id, photographer_id, name, email, phone, booking_date, booking_time, location_id, payment_method, amount, tax, status) VALUES
(1, 1, 1, 'John Doe', 'john@example.com', '233123456789', '2025-08-01', '10:00:00', 1, 'card', 100.00, 2.00, 'pending'),
(2, 5, 1, 'Jane Smith', 'jane@example.com', '233987654321', '2025-08-15', '09:00:00', 2, 'paypal', 1200.00, 24.00, 'confirmed'),
(3, 3, 2, 'Alice Brown', 'alice@example.com', '233555123456', '2025-09-01', '14:00:00', 3, 'mtn-momo', 500.00, 10.00, 'pending');

-- Inserting sample data into gallery table
INSERT INTO gallery (service_id, category, image_url, description) VALUES
(1, 'Portraits', 'https://via.placeholder.com/600/portrait1', 'Stunning portrait with dramatic lighting capturing raw emotion.'),
(2, 'Product Photography', 'https://via.placeholder.com/600/product1', 'Sleek product image with clean background for e-commerce.'),
(3, 'Events', 'https://via.placeholder.com/600/event1', 'Vibrant event photo showcasing lively moments.'),
(4, 'Commercial', 'https://via.placeholder.com/600/commercial1', 'Professional branding shot for corporate marketing.'),
(5, 'Weddings', 'https://via.placeholder.com/600/wedding1', 'Romantic wedding shot with elegant composition.'),
(6, 'Birthdays', 'https://via.placeholder.com/600/birthday1', 'Joyful birthday moment with colorful decorations.'),
(7, 'Sports', 'https://via.placeholder.com/600/sports1', 'Dynamic action shot from a sports event.'),
(1, 'Portraits', 'https://via.placeholder.com/600/portrait2', 'Classic portrait with soft lighting and natural tones.'),
(5, 'Weddings', 'https://via.placeholder.com/600/wedding2', 'Candid wedding moment filled with joy.');

-- Inserting sample data into contact_submissions table
INSERT INTO contact_submissions (name, email, message) VALUES
('Alice Brown', 'alice@example.com', 'Interested in booking a portrait session. Please provide availability.'),
('Bob Green', 'bob@example.com', 'Can you share details about wedding photography packages?'),
('Emma White', 'emma@example.com', 'Looking for a quote on product photography for my business.');

-- Inserting sample data into terms_acceptance table
INSERT INTO terms_acceptance (user_id, booking_id, terms_version) VALUES
(1, 1, '1.0'),
(2, 2, '1.0'),
(3, 3, '1.0');

-- Inserting sample data into payments table
INSERT INTO payments (booking_id, user_id, amount, tax, payment_method, transaction_reference, status) VALUES
(1, 1, 102.00, 2.00, 'card', 'TXN123456789', 'completed'),
(2, 2, 1224.00, 24.00, 'paypal', 'TXN987654321', 'pending'),
(3, 3, 510.00, 10.00, 'mtn-momo', 'TXN456789123', 'completed');

-- Inserting sample data into promotions table
INSERT INTO promotions (code, discount_percentage, start_date, end_date, service_id) VALUES
('SUMMER25', 25.00, '2025-07-01', '2025-08-31', 1),
('WEDDING10', 10.00, '2025-06-01', '2025-12-31', 5),
('EVENT20', 20.00, '2025-08-01', '2025-09-30', 3);

-- Inserting sample data into reviews table
INSERT INTO reviews (user_id, service_id, rating, comment) VALUES
(1, 1, 5, 'Amazing portrait session! The photographer was professional and creative.'),
(2, 5, 4, 'Beautiful wedding photos, captured every moment perfectly.'),
(3, 3, 5, 'The event photos were vibrant and full of energy.');

-- Inserting sample data into schedules table
INSERT INTO schedules (booking_id, service_id, photographer_id, start_time, end_time, location_id) VALUES
(1, 1, 1, '2025-08-01 10:00:00', '2025-08-01 11:00:00', 1),
(2, 5, 1, '2025-08-15 09:00:00', '2025-08-15 17:00:00', 2),
(3, 3, 2, '2025-09-01 14:00:00', '2025-09-01 18:00:00', 3);

-- Insert services
INSERT INTO services (name, description, base_price, duration) VALUES
('Portrait Photography', 'Professional studio portraits with multiple outfit changes', 150.00, '1-2 hours'),
('Wedding Photography', 'Full day coverage of your wedding with a second photographer', 800.00, '10 hours'),
('Product Photography', 'Professional product images for your e-commerce business', 50.00, '30 min per product'),
('Event Photography', 'Coverage of corporate or private events', 300.00, '2-6 hours'),
('Commercial Photography', 'Advertising and marketing images for your brand', 500.00, 'Half-day or full-day'),
('Birthday Photography', 'Capture the joy and celebration of birthdays', 200.00, '2-4 hours');

-- Insert service features
INSERT INTO service_features (service_id, feature_text) VALUES
(1, 'Professional studio setup'),
(1, 'Multiple outfit changes'),
(1, '10 high-resolution edited images'),
(1, 'All images delivered digitally'),
(1, 'Print release included'),
(2, 'Pre-wedding consultation'),
(2, 'Full day coverage (up to 10 hours)'),
(2, 'Second photographer included'),
(2, '100+ high-resolution edited images'),
(2, 'Online gallery for sharing');

-- Insert gallery categories
INSERT INTO gallery_categories (name, description) VALUES
('Portraits', 'Professional portrait photography'),
('Weddings', 'Beautiful wedding moments'),
('Products', 'High-quality product photography'),
('Events', 'Corporate and private events'),
('Commercial', 'Advertising and marketing images'),
('Birthdays', 'Birthday celebrations');

-- Insert gallery images (paths would need to be updated with actual image paths)
INSERT INTO gallery_images (category_id, title, description, image_path, is_featured) VALUES
(1, 'Executive Portrait', 'Studio lighting with a modern, professional look', 'images/gallery/portrait1.jpg', TRUE),
(1, 'Creative Portrait', 'Artistic approach with dramatic lighting', 'images/gallery/portrait2.jpg', FALSE),
(2, 'Wedding Ceremony', 'Emotional moment during the vows', 'images/gallery/wedding1.jpg', TRUE),
(2, 'Bridal Portrait', 'Elegant bridal look with natural lighting', 'images/gallery/wedding2.jpg', FALSE);

-- Insert team members
INSERT INTO team_members (full_name, position, bio, photo_path, join_date) VALUES
('Kwame Asante', 'Founder & Lead Photographer', 'With over 15 years of experience, Kwame brings an artistic eye and technical expertise to every shoot.', 'images/team/team1.jpg', '2015-01-15'),
('Ama Mensah', 'Wedding Specialist', 'Ama has a gift for capturing the emotion and beauty of weddings.', 'images/team/team2.jpg', '2017-03-22'),
('Kofi Boateng', 'Product & Commercial Photographer', 'Kofi''s meticulous attention to detail makes him our go-to for product photography.', 'images/team/team3.jpg', '2018-06-10'),
('Esi Johnson', 'Editor & Retoucher', 'Esi works her magic behind the scenes, ensuring every image meets our exacting standards.', 'images/team/team4.jpg', '2019-02-05');

-- Insert business hours
INSERT INTO business_hours (day_name, opening_time, closing_time, is_closed) VALUES
('Monday', '09:00:00', '18:00:00', FALSE),
('Tuesday', '09:00:00', '18:00:00', FALSE),
('Wednesday', '09:00:00', '18:00:00', FALSE),
('Thursday', '09:00:00', '18:00:00', FALSE),
('Friday', '09:00:00', '18:00:00', FALSE),
('Saturday', '10:00:00', '16:00:00', FALSE),
('Sunday', NULL, NULL, TRUE);

-- Insert social media links
INSERT INTO social_media (platform, icon_class, profile_url) VALUES
('Facebook', 'fab fa-facebook', 'https://facebook.com/focuslightstudio'),
('Instagram', 'fab fa-instagram', 'https://instagram.com/focuslightstudio'),
('TikTok', 'fab fa-tiktok', 'https://tiktok.com/@focuslightstudio'),
('Twitter', 'fab fa-twitter', 'https://twitter.com/focuslightstudio');

-- Business hours
CREATE TABLE business_hours (
    day_id INT AUTO_INCREMENT PRIMARY KEY,
    day_name VARCHAR(10) NOT NULL,
    opening_time TIME,
    closing_time TIME,
    is_closed BOOLEAN DEFAULT FALSE
);

-- Social media links
CREATE TABLE social_media (
    social_id INT AUTO_INCREMENT PRIMARY KEY,
    platform VARCHAR(50) NOT NULL,
    icon_class VARCHAR(50) NOT NULL,
    profile_url VARCHAR(255) NOT NULL,
    is_active BOOLEAN DEFAULT TRUE
);

-- Testimonials table
CREATE TABLE testimonials (
    testimonial_id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    client_photo VARCHAR(255),
    content TEXT NOT NULL,
    rating TINYINT CHECK (rating BETWEEN 1 AND 5),
    is_approved BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Promotions/Special Offers
CREATE TABLE promotions (
    promotion_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    discount_percent DECIMAL(5,2),
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    service_id INT,
    FOREIGN KEY (service_id) REFERENCES services(service_id) ON DELETE SET NULL
);

-- Blog posts
CREATE TABLE blog_posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    excerpt VARCHAR(300),
    author_id INT NOT NULL,
    featured_image VARCHAR(255),
    slug VARCHAR(200) UNIQUE,
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
    published_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(user_id)
);

-- Blog categories
CREATE TABLE blog_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    slug VARCHAR(50) UNIQUE,
    description TEXT
);

-- Blog post to category mapping (many-to-many)
CREATE TABLE blog_post_categories (
    post_id INT NOT NULL,
    category_id INT NOT NULL,
    PRIMARY KEY (post_id, category_id),
    FOREIGN KEY (post_id) REFERENCES blog_posts(post_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES blog_categories(category_id) ON DELETE CASCADE
);

-- Equipment inventory
CREATE TABLE equipment (
    equipment_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL,
    description TEXT,
    purchase_date DATE,
    last_maintenance DATE,
    status ENUM('available', 'in_use', 'maintenance', 'retired') DEFAULT 'available'
);

-- Client favorites (for wishlist/saved items)
CREATE TABLE client_favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    service_id INT,
    image_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (service_id) REFERENCES services(service_id) ON DELETE CASCADE,
    FOREIGN KEY (image_id) REFERENCES gallery_images(image_id) ON DELETE CASCADE
);

-- Newsletter subscriptions
CREATE TABLE newsletter_subscribers (
    subscriber_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    name VARCHAR(100),
    is_active BOOLEAN DEFAULT TRUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    unsubscribed_at TIMESTAMP NULL
);

-- Session notes (for photographer's private notes about bookings)
CREATE TABLE session_notes (
    note_id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    author_id INT NOT NULL,
    content TEXT NOT NULL,
    is_private BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(booking_id) ON DELETE CASCADE,
    FOREIGN KEY (author_id) REFERENCES users(user_id)
);

-- Add indexes to improve query performance
CREATE INDEX idx_user_email ON users(email);
CREATE INDEX idx_booking_date ON bookings(booking_date);
CREATE INDEX idx_booking_status ON bookings(status);
CREATE INDEX idx_payment_status ON payments(payment_status);
CREATE INDEX idx_service_active ON services(is_active);
CREATE INDEX idx_gallery_featured ON gallery_images(is_featured);
CREATE INDEX idx_blog_published ON blog_posts(published_at) WHERE status = 'published';

-- Active bookings view
CREATE VIEW active_bookings AS
SELECT b.booking_id, u.full_name AS client_name, s.name AS service, 
       b.booking_date, b.booking_time, b.location, b.status,
       p.total_amount, p.payment_status
FROM bookings b
JOIN users u ON b.user_id = u.user_id
JOIN services s ON b.service_id = s.service_id
LEFT JOIN payments p ON b.booking_id = p.booking_id
WHERE b.status IN ('pending', 'confirmed')
ORDER BY b.booking_date, b.booking_time;

-- Gallery portfolio view
CREATE VIEW gallery_portfolio AS
SELECT i.image_id, i.title, i.description, i.image_path, 
       c.name AS category, c.category_id
FROM gallery_images i
LEFT JOIN gallery_categories c ON i.category_id = c.category_id
WHERE i.image_path IS NOT NULL
ORDER BY i.upload_date DESC;

-- Service catalog view
CREATE VIEW service_catalog AS
SELECT s.service_id, s.name, s.description, s.base_price, s.duration,
       GROUP_CONCAT(f.feature_text SEPARATOR '|') AS features
FROM services s
LEFT JOIN service_features f ON s.service_id = f.service_id
WHERE s.is_active = TRUE
GROUP BY s.service_id;

-- Procedure to calculate monthly revenue
DELIMITER //
CREATE PROCEDURE CalculateMonthlyRevenue(IN year INT)
BEGIN
    SELECT 
        MONTH(p.payment_date) AS month,
        SUM(p.total_amount) AS total_revenue,
        COUNT(p.payment_id) AS transactions,
        AVG(p.total_amount) AS average_booking_value
    FROM payments p
    WHERE YEAR(p.payment_date) = year AND p.payment_status = 'completed'
    GROUP BY MONTH(p.payment_date)
    ORDER BY month;
END //
DELIMITER ;

-- Procedure to create a new booking
DELIMITER //
CREATE PROCEDURE CreateBooking(
    IN p_user_id INT,
    IN p_service_id INT,
    IN p_booking_date DATE,
    IN p_booking_time TIME,
    IN p_location VARCHAR(100),
    IN p_special_requests TEXT,
    OUT p_booking_id INT
)
BEGIN
    INSERT INTO bookings (user_id, service_id, booking_date, booking_time, location, special_requests)
    VALUES (p_user_id, p_service_id, p_booking_date, p_booking_time, p_location, p_special_requests);
    
    SET p_booking_id = LAST_INSERT_ID();
END //
DELIMITER ;

-- Procedure to process payment
DELIMITER //
CREATE PROCEDURE ProcessPayment(
    IN p_booking_id INT,
    IN p_amount DECIMAL(10,2),
    IN p_payment_method ENUM('momo', 'card', 'paypal'),
    IN p_transaction_id VARCHAR(100),
    OUT p_payment_id INT
)
BEGIN
    DECLARE v_tax DECIMAL(10,2);
    DECLARE v_total DECIMAL(10,2);
    
    SET v_tax = ROUND(p_amount * 0.02, 2);
    SET v_total = p_amount + v_tax;
    
    INSERT INTO payments (booking_id, amount, tax_amount, total_amount, payment_method, transaction_id, payment_status)
    VALUES (p_booking_id, p_amount, v_tax, v_total, p_payment_method, p_transaction_id, 'completed');
    
    UPDATE bookings SET status = 'confirmed' WHERE booking_id = p_booking_id;
    
    SET p_payment_id = LAST_INSERT_ID();
END //
DELIMITER ;

-- Trigger to update booking status when payment is completed
DELIMITER //
CREATE TRIGGER after_payment_completed
AFTER UPDATE ON payments
FOR EACH ROW
BEGIN
    IF NEW.payment_status = 'completed' AND OLD.payment_status != 'completed' THEN
        UPDATE bookings SET status = 'confirmed' 
        WHERE booking_id = NEW.booking_id AND status = 'pending';
    END IF;
END //
DELIMITER ;

-- Trigger to prevent double booking at same time
DELIMITER //
CREATE TRIGGER before_booking_insert
BEFORE INSERT ON bookings
FOR EACH ROW
BEGIN
    DECLARE existing_count INT;
    
    SELECT COUNT(*) INTO existing_count
    FROM bookings
    WHERE booking_date = NEW.booking_date 
    AND booking_time = NEW.booking_time
    AND status IN ('pending', 'confirmed');
    
    IF existing_count > 0 THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Time slot already booked';
    END IF;
END //
DELIMITER ;

-- Trigger to archive blog posts instead of deleting
DELIMITER //
CREATE TRIGGER before_blog_post_delete
BEFORE DELETE ON blog_posts
FOR EACH ROW
BEGIN
    INSERT INTO blog_posts_archive 
    SELECT * FROM blog_posts WHERE post_id = OLD.post_id;
    
    SIGNAL SQLSTATE '45000' 
    SET MESSAGE_TEXT = 'Posts are archived, not deleted. Update status instead.';
END //
DELIMITER ;

-- Insert testimonials
INSERT INTO testimonials (client_name, client_photo, content, rating, is_approved) VALUES
('Akosua Mensah', 'images/clients/akosua.jpg', 'Focus & Light captured our wedding perfectly! The photos are stunning and truly reflect the joy of our special day.', 5, TRUE),
('Kwabena Osei', NULL, 'Professional service from start to finish. My corporate headshots look amazing and got me many compliments.', 4, TRUE),
('Efua Johnson', 'images/clients/efua.jpg', 'The team went above and beyond for our product photography. The images increased our online sales by 30%!', 5, TRUE);

-- Insert promotions
INSERT INTO promotions (title, description, discount_percent, start_date, end_date, service_id) VALUES
('Summer Wedding Special', '15% off all wedding photography packages booked for June-August weddings', 15.00, '2023-05-01', '2023-08-31', 2),
('New Business Discount', '20% off your first product photography session', 20.00, '2023-01-01', '2023-12-31', 3),
('Family Portrait Month', 'Free 8x10 print with every family portrait session in October', NULL, '2023-10-01', '2023-10-31', 1);

-- Insert blog categories
INSERT INTO blog_categories (name, slug, description) VALUES
('Photography Tips', 'photography-tips', 'Helpful articles for better photography'),
('Wedding Advice', 'wedding-advice', 'Planning your perfect wedding photography'),
('Business Branding', 'business-branding', 'Using photography to enhance your brand');

-- Insert equipment
INSERT INTO equipment (name, type, description, purchase_date, last_maintenance, status) VALUES
('Canon EOS R5', 'Camera', 'Full-frame mirrorless camera', '2022-03-15', '2023-04-10', 'available'),
('Sony A7 IV', 'Camera', 'Professional mirrorless camera', '2022-05-20', '2023-04-05', 'in_use'),
('Profoto B10', 'Lighting', 'Compact off-camera flash', '2021-11-10', '2023-03-28', 'available'),
('Sigma 85mm f/1.4', 'Lens', 'Portrait prime lens', '2022-02-05', '2023-04-15', 'available');

-- Query to find upcoming bookings
SELECT b.booking_id, u.full_name, s.name AS service, 
       b.booking_date, b.booking_time, b.location
FROM bookings b
JOIN users u ON b.user_id = u.user_id
JOIN services s ON b.service_id = s.service_id
WHERE b.booking_date >= CURDATE()
AND b.status IN ('pending', 'confirmed')
ORDER BY b.booking_date, b.booking_time;

-- Query to find clients with multiple bookings
SELECT u.user_id, u.full_name, u.email, 
       COUNT(b.booking_id) AS booking_count,
       SUM(p.total_amount) AS total_spent
FROM users u
JOIN bookings b ON u.user_id = b.user_id
JOIN payments p ON b.booking_id = p.booking_id
WHERE p.payment_status = 'completed'
GROUP BY u.user_id
HAVING booking_count > 1
ORDER BY total_spent DESC;

-- Equipment maintenance due
SELECT name, type, last_maintenance,
       DATEDIFF(CURDATE(), last_maintenance) AS days_since_maintenance
FROM equipment
WHERE status != 'retired'
HAVING days_since_maintenance > 180
ORDER BY days_since_maintenance DESC;