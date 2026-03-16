CREATE DATABASE IF NOT EXISTS gearlog_db;
USE gearlog_db;

CREATE TABLE IF NOT EXISTS categories (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS User_db (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(200) NOT NULL,
his_role ENUM('Admin','Technician','Guest') DEFAULT 'Guest'
);

CREATE TABLE IF NOT EXISTS assets (
id INT AUTO_INCREMENT PRIMARY KEY,
serial_number VARCHAR(100) UNIQUE,
device_name VARCHAR(100),
price DECIMAL(10,2),
status ENUM('Unavailable','Available','Deployed','Under Repair') DEFAULT 'Available',
category_id INT,
FOREIGN KEY (category_id) REFERENCES categories(id)
);

INSERT INTO categories (name) VALUES
('Laptop'),
('Monitor'),
('Server'),
('Accessories');

INSERT INTO User_db (username, email, password, his_role) VALUES
('ShadowDrake', 'shadowdrake@email.com', '$2y$10$C/gMqdZbARRGmnjFIYiM/.1Jh0wVyNJvtvQ0O34fG6mFOviQTkzEq', 'Admin'), /*dragon123*/
('LunarWizard', 'lunarwizard@email.com', '$2y$10$YkW6C51zTZlb043ZZb2s6ujjOeKEFJ5YWomRjZhokdhlnycLPJihW', 'Technician'), /*moonmagic*/
('IronKnight', 'ironknight@email.com', '$2y$10$jywqEIwj3uhS1a2NizJMtumxQ1hHmnhSO.kSGEHEPuhG.tn000.y6', 'Guest'), /*sword456*/
('FrostPhoenix', 'frostphoenix@email.com', '$2y$10$Nm1D4ZyB6gATJKadzQmTiOxe.tPQEwrvptOuJjdpClKW2UL5AzCUe', 'Technician'), /*icefire789*/
('MysticRanger', 'mysticranger@email.com', '$2y$10$IYLj7N9zgovbRR8JpdwT6Oe95PBeITwU3Un6.beOExiQt.ypeKate', 'Guest'); /*forest999*/

INSERT INTO assets (serial_number, device_name, price, status, category_id) VALUES
('SN1001','Dell Latitude 5400',850.00,'Deployed',1),
('SN1002','HP EliteBook 840',920.00,'Available',1),
('SN1003','Lenovo ThinkPad T14',980.00,'Under Repair',1),
('SN1004','Dell XPS 13',1200.00,'Deployed',1),
('SN1005','MacBook Pro 13',1500.00,'Available',1),
('SN1006','Acer Aspire 5',650.00,'Available',1),
('SN1007','ASUS ZenBook 14',1100.00,'Deployed',1),
('SN1008','Lenovo IdeaPad 3',520.00,'Available',1),
('SN1009','HP Pavilion 15',700.00,'Under Repair',1),
('SN1010','Dell Inspiron 14',620.00,'Deployed',1),
('SN2001','Samsung 24 Monitor',180.00,'Available',2),
('SN2002','LG UltraWide 29',320.00,'Deployed',2),
('SN2003','Dell UltraSharp 27',410.00,'Available',2),
('SN2004','AOC 24G2 Gaming',210.00,'Under Repair',2),
('SN2005','BenQ GW2480',190.00,'Available',2),
('SN2006','HP M24f',175.00,'Deployed',2),
('SN2007','Philips 242E1',185.00,'Available',2),
('SN2008','Samsung Odyssey G5',340.00,'Deployed',2),
('SN2009','LG 24MP59G',205.00,'Available',2),
('SN2010','Dell SE2419H',160.00,'Available',2),
('SN3001','Dell PowerEdge R240',3200.00,'Deployed',3),
('SN3002','HP ProLiant DL360',4100.00,'Available',3),
('SN3003','Lenovo ThinkSystem SR250',3800.00,'Under Repair',3),
('SN3004','Dell PowerEdge T40',2100.00,'Available',3),
('SN3005','HPE ML30 Gen10',2600.00,'Deployed',3),
('SN3006','Cisco UCS C220',4500.00,'Available',3),
('SN3007','Dell PowerEdge R640',5200.00,'Deployed',3),
('SN3008','Lenovo SR630',4900.00,'Under Repair',3),
('SN3009','HPE DL380 Gen10',6100.00,'Available',3),
('SN3010','Dell T340 Server',2900.00,'Deployed',3),
('SN1011','Lenovo ThinkPad X13',1050.00,'Available',1),
('SN1012','Dell Latitude 7420',1300.00,'Deployed',1),
('SN1013','HP EliteBook 830',950.00,'Available',1),
('SN1014','MacBook Air M1',1250.00,'Deployed',1),
('SN1015','ASUS VivoBook 15',640.00,'Available',1),
('SN1016','Acer Swift 3',880.00,'Under Repair',1),
('SN1017','Dell Precision 5550',1600.00,'Available',1),
('SN1018','HP ZBook Firefly',1400.00,'Deployed',1),
('SN1019','Lenovo Yoga 7',980.00,'Available',1),
('SN1020','ASUS ROG Zephyrus',1700.00,'Deployed',1),
('SN2011','LG 27UL500',350.00,'Available',2),
('SN2012','Samsung Smart Monitor M5',260.00,'Deployed',2),
('SN2013','Dell P2419H',240.00,'Available',2),
('SN2014','Acer Nitro VG240',230.00,'Available',2),
('SN2015','BenQ PD2700Q',420.00,'Deployed',2),
('SN2016','HP E24 G4',210.00,'Available',2),
('SN2017','Philips 276E9Q',295.00,'Available',2),
('SN2018','LG UltraGear 27',390.00,'Under Repair',2),
('SN2019','Samsung S24R350',170.00,'Available',2),
('SN2020','Dell S2721D',330.00,'Deployed',2),
('SN3011','Dell PowerEdge R740',7200.00,'Available',3),
('SN3012','HPE DL560',8300.00,'Deployed',3),
('SN3013','Lenovo ThinkSystem SR650',6900.00,'Available',3),
('SN3014','Cisco UCS B200',7600.00,'Under Repair',3),
('SN3015','Dell PowerEdge R750',9100.00,'Available',3),
('SN3016','HPE DL325',5400.00,'Deployed',3),
('SN3017','Lenovo SR850',8700.00,'Available',3),
('SN3018','Dell PowerEdge MX740',9500.00,'Available',3),
('SN3019','HPE Synergy 480',9900.00,'Deployed',3),
('SN3020','Cisco UCS X210',8800.00,'Available',3),
('SN4001','Logitech MX Master Mouse',99.00,'Available',4),
('SN4002','Logitech K380 Keyboard',45.00,'Deployed',4),
('SN4003','Dell USB-C Dock WD19',220.00,'Available',4),
('SN4004','HP USB-C Dock G5',240.00,'Deployed',4),
('SN4005','Anker USB-C Hub',35.00,'Available',4),
('SN4006','Logitech C920 Webcam',80.00,'Available',4),
('SN4007','Jabra Evolve 40 Headset',110.00,'Deployed',4),
('SN4008','Plantronics Voyager 5200',130.00,'Available',4),
('SN4009','Logitech MX Keys Keyboard',120.00,'Available',4),
('SN4010','Microsoft Ergonomic Keyboard',95.00,'Under Repair',4),
('SN4011','Apple Magic Mouse',79.00,'Available',4),
('SN4012','Razer DeathAdder Mouse',65.00,'Deployed',4),
('SN4013','Corsair K70 Mechanical Keyboard',150.00,'Available',4),
('SN4014','Anker PowerPort Charger',30.00,'Available',4),
('SN4015','UGREEN USB-C Adapter',18.00,'Available',4),
('SN4016','Belkin Thunderbolt Dock',290.00,'Deployed',4),
('SN4017','Logitech Brio 4K Webcam',190.00,'Available',4),
('SN4018','SteelSeries Arctis 7 Headset',160.00,'Available',4),
('SN4019','Samsung T7 Portable SSD',140.00,'Deployed',4),
('SN4020','SanDisk Extreme USB 128GB',28.00,'Available',4);
