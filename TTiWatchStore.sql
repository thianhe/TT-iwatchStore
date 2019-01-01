drop database if exists TTiWatchStore;
create database TTiWatchStore;
use TTiWatchStore;
CREATE USER if not exists 'newuser'@'localhost' IDENTIFIED BY 'newpassword';
GRANT ALL PRIVILEGES ON *.* TO 'newuser'@'localhost';
create table MEMBER(	
	member_id int not null,
	first_name varchar(35) CHARACTER SET UTF8MB4 not null,
	last_name varchar(35) CHARACTER SET UTF8MB4 not null,
	account varchar(30) not null,
    password varchar(255) not null,
    email varchar(255) not null,
    phone_number int ,
    birthday date,
    gender char(1),
    address varchar(255),
    active varchar(255),
    primary key(member_id),
    unique(Account)
);

create table COMPANY(	
	company_id int not null,
	brand varchar(255) not null,
	primary key(company_id)
);

create table OPERATING_SYSTEM(
	op_id int not null,
    op_name varchar(255) not null,
    primary key(op_id)
);


create table WATCH(		
	watch_id int not null,
	price int not null,
	quantity int not null,
	brand_id int not null,
	watch_name varchar(255) not null,
	op_id int not null,
	description text,
	primary key(watch_id),
	foreign key(brand_id) references COMPANY(company_id),
    foreign key(op_id) references OPERATING_SYSTEM(op_id)
);

create table commentRate_List(
	comment_datetime datetime not null,
	watch_id int not null,
    member_id int not null,
    rate int not null,
    comment text,
    primary key(comment_datetime,watch_id,member_id),
    foreign key(watch_id) references WATCH(watch_id),
    foreign key(member_id) references MEMBER(member_id)
);

create table STORAGE_LIST(
	storage_id int not null,
	watch_id int not null,
    staff_id int not null,
	date_time datetime not null,
    quantity int not null,
    cost int not null,
    primary key(storage_id,watch_id),
    foreign key(watch_id) references WATCH(watch_id),
    foreign key(staff_id) references member(member_id));
                        
create table SHOPPING_CART(	
	member_id int not null,
	watch_id int not null,
    quantity int not null,
    primary key(member_id, watch_id),
    foreign key(member_id) references MEMBER(member_id),
    foreign key(watch_id) references WATCH(watch_id)
);
                            
create table TRACE_LIST(
	member_id int not null,
	watch_id int not null,
    date_time datetime not null,
    primary key(member_id, watch_id),
	foreign key(member_id) references MEMBER(member_id),
    foreign key(watch_id) references WATCH(watch_id)
);

drop table if exists order_item;
drop table if exists order_list;
drop table if exists discount;

create table ORDER_LIST(
	orderList_id int not null,
	member_id int not null,
	cost int not null,
    date_time datetime not null,
    state char(1) not null,
    r_name char(255) not null,
    r_address char(255) not null,
    r_phone int not null,
    r_email char(255) not null,
    primary key(orderList_id),
    foreign key(member_id) references MEMBER(member_id)
);
                            
create table ORDER_ITEM(
	orderList_id int not null,
	watch_id int not null,
    quantity int not null,
    cost int not null,
    primary key(orderList_id, watch_id),
    foreign key(orderList_id) references ORDER_LIST(orderList_id) on delete cascade,
    foreign key(watch_id) references WATCH(watch_id)
);


create table discount(
	discount_id int not null,
    discount_name varchar(255) not null,
    discount_type tinyint not null,/* 1.Shipping 2.Seasonings 3.Special Event */
    watches_content text,
    startDate date not null,
    endDate date not null,
    description text,
    get_free int,
    price_needed int,
    discount_percent int,
    discount_price int,
    primary key(discount_id)
);
insert into MEMBER VALUES (0,"Admin"," ","admin","admin","test@gmail.com",123123123,"2017-06-15","M","taiwan","active");
insert into COMPANY VALUES (0,"Apple");
insert into COMPANY VALUES (1,"Samsung");
insert into COMPANY VALUES (2,"Fitbit");
insert into COMPANY VALUES (3,"MyKronoz");
insert into COMPANY VALUES (4,"Fossil");
insert into COMPANY VALUES (5,"Techcomm");
insert into COMPANY VALUES (6,"Skagen");
insert into OPERATING_SYSTEM VALUES (0,"Other");
insert into OPERATING_SYSTEM VALUES (1,"Apple IOS");
insert into OPERATING_SYSTEM VALUES (2,"Android");
insert into OPERATING_SYSTEM VALUES (3,"Wear OS");

insert into WATCH VALUES (000,2290,100,0,"Apple Watch Series 3 (GPS) 38mm Silver Aluminum Case with White Sport Band - Silver Aluminum",1,"Low and high heart rate notifications. Emergency SOS. New Breathe watch faces. Automatic workout detection. New yoga and hiking workouts. Advanced features for runners like cadence and pace alerts. New head-to-head competitions. Activity sharing with friends. Personalized coaching. Monthly challenges and achievement awards. You can use Walkie-Talkie, make phone calls, and send messages. Listen to Apple Music¹ and Apple Podcasts. And use Siri in all-new ways. Apple Watch Series 3 lets you do it all right from your wrist.");
insert into WATCH VALUES (001,2590,99,0,"Apple Watch Series 3 (GPS) 42mm Space Gray Aluminum Case with Black Sport Band - Space Gray Aluminum - Silver Aluminum",1,"Low and high heart rate notifications. Emergency SOS. New Breathe watch faces. Automatic workout detection. New yoga and hiking workouts. Advanced features for runners like cadence and pace alerts. New head-to-head competitions. Activity sharing with friends. Personalized coaching. Monthly challenges and achievement awards. You can use Walkie-Talkie, make phone calls, and send messages. Listen to Apple Music¹ and Apple Podcasts. And use Siri in all-new ways. Apple Watch Series 3 lets you do it all right from your wrist.");
insert into WATCH VALUES (002,3990,87,0,"Apple Watch Series 4 (GPS) 40mm Gold Aluminum Case with Pink Sand Sport Band - Gold Aluminum",1,"Fundamentally redesigned and reengineered. The largest Apple Watch display yet. Built-in electrical heart sensor. New Digital Crown with haptic feedback. Low and high heart rate notifications. Fall detection and Emergency SOS. New Breathe watch faces. Automatic workout detection. New yoga and hiking workouts. Advanced features for runners like cadence and pace alerts. New head-to-head competitions. Activity sharing with friends. Personalized coaching. Monthly challenges and achievement awards. You can use Walkie-Talkie, make phone calls, and send messages. Listen to Apple Music¹ and Apple Podcasts. And use Siri in all-new ways. Apple Watch Series 4 lets you do it all right from your wrist.");
insert into WATCH VALUES (003,4290,98,0,"Apple Watch Series 4 (GPS) 44mm Space Gray Aluminum Case with Black Sport Band - Space Gray Aluminum",1,"Fundamentally redesigned and reengineered. The largest Apple Watch display yet. Built-in electrical heart sensor. New Digital Crown with haptic feedback. Low and high heart rate notifications. Fall detection and Emergency SOS. New Breathe watch faces. Automatic workout detection. New yoga and hiking workouts. Advanced features for runners like cadence and pace alerts. New head-to-head competitions. Activity sharing with friends. Personalized coaching. Monthly challenges and achievement awards. You can use Walkie-Talkie, make phone calls, and send messages. Listen to Apple Music¹ and Apple Podcasts. And use Siri in all-new ways. Apple Watch Series 4 lets you do it all right from your wrist.");
insert into WATCH VALUES (004,4290,88,0,"Apple Watch Series 4 (GPS) 44mm Silver Aluminum Case with White Sport Band - Silver Aluminum",1,"Fundamentally redesigned and reengineered. The largest Apple Watch display yet. Built-in electrical heart sensor. New Digital Crown with haptic feedback. Low and high heart rate notifications. Fall detection and Emergency SOS. New Breathe watch faces. Automatic workout detection. New yoga and hiking workouts. Advanced features for runners like cadence and pace alerts. New head-to-head competitions. Activity sharing with friends. Personalized coaching. Monthly challenges and achievement awards. You can use Walkie-Talkie, make phone calls, and send messages. Listen to Apple Music¹ and Apple Podcasts. And use Siri in all-new ways. Apple Watch Series 4 lets you do it all right from your wrist.");
insert into WATCH VALUES (005,5290,50,0,"Apple Watch Nike+ Series 4 (GPS + Cellular) 44mm Space Gray Aluminum Case with Anthracite/Black Nike Sport Band - Space Gray Aluminum",1,"Track your runs with GPS and altimeter. Pair your watch wirelessly with compatible gym equipment. Apple Watch Nike+ is swimproof² so you can take a post-run dip in the pool. And built-in cellular¹ lets you stream your favorite music and get phone calls, messages, and notifications - even when you don't have your phone. There are new Nike watch faces and bands: The Nike Sport Band with compression-molded perforations for breathability and the Nike Sport Loop is woven with a special reflective thread.");

insert into WATCH VALUES (006,2990,55,1,"Galaxy Watch Smartwatch 46mm Stainless Steel - Silver",2,"Stay connected on the move with this 46mm Samsung Galaxy Watch. It has Wi-Fi and Bluetooth support and includes 0.75GB of RAM and 4GB of internal storage for music, photos and more. This 46mm Samsung Galaxy Watch comes in silver and uses Gorilla Glass DX+ technology for added protection against accidental fall damage.");
insert into WATCH VALUES (007,1990,70,1,"Gear S3 Frontier Smartwatch 46mm - Dark Gray",2,"The Gear S3 has the esthetics of a truly premium watch with advanced features built right into the watch design. That's why it's so easy and effortless to use the Gear S3. It's also built for you to go days without needing your phone or to recharge. You get to feel free with the Gear S3. ");
insert into WATCH VALUES (008,2790,66,1,"Galaxy Watch Smartwatch 42mm Stainless Steel - Midnight Black",2,"Manage your time more effectively with this Samsung Galaxy Watch. The Samsung Health app helps keep you on track with fitness goals, and it pairs with both Android and iPhone devices. This Samsung Galaxy Watch comes with small and large straps to ensure a good fit, and the battery lasts up to six days after a wireless charge.");
insert into WATCH VALUES (009,2790,88,1,"Galaxy Watch Smartwatch 42mm Stainless Steel - Rose Gold",2,"Streamline your digital life with this 42mm Samsung Galaxy Watch. Its built-in Samsung Flow app provides seamless syncing with your smart devices, keeping you mobile, productive and notified with alerts about activities on your schedule. This 5ATM-rated Samsung Galaxy Watch has 4GB of internal storage for app downloads and software upgrades.");
insert into WATCH VALUES (010,1490,38,1,"Gear Fit2 Pro - Fitness Smartwatch (Large) - Black",2,"Keep in touch while running with this Samsung Gear Fit2 Pro Smart Fitness Watch. Its Bluetooth functionality lets you receive smart notifications and take calls without reaching for your phone, and it has music storage for your workout playlists. Wear this water-resistant Samsung Gear Fit2 Pro Smart Fitness Watch confidently in the shower and lap pool.");
insert into WATCH VALUES (011,1790,63,1,"Gear Sport Smartwatch 43mm - Blue",2,"Maintain a healthy lifestyle with this Samsung Gear Sport smart watch. Its fitness and diet monitoring functions track your daily activity and caloric intake to keep you focused on your personal goals. This bold blue Samsung Gear smart watch is water-resistant up to 50m, so you can wear it while swimming.");

insert into WATCH VALUES (012,1490,96,2,"Versa Smartwatch 34mm Aluminum - Black/Black",2,"Exceed your health goals with help from this Fitbit Versa smart watch. The black aluminum tech accessory looks great with any outfit, especially since you can swap its face, and it lets you get notifications from your smartphone. This Fitbit Versa smart watch is water-resistant for use in a variety of conditions, and it includes a heart rate monitor.");
insert into WATCH VALUES (013,1490,97,2,"Versa - Peach/Rose Gold",2,"Track runs and workouts with this Fitbit Versa fitness tracker. It includes a heart rate monitor for accurate health data, and you can pair it with your mobile device for on-wrist notifications and app control. This Fitbit Versa fitness tracker runs four or more days between charges and has a stylish rose gold and peach finish.");
insert into WATCH VALUES (014,1490,48,2,"Versa - Gray/Silver",2,"Outperform yourself every day with this Fitbit Versa smart fitness watch. It adapts to your feedback and provides personalized insights on your physical activities, and its built-in memory stores over 300 songs to keep you motivated. Track your endurance continuously via the PurePulse heart rate monitor of this water-resistant Fitbit Versa smart fitness watch.");
insert into WATCH VALUES (015,1790,82,2,"Versa Special Edition - Lavender Rose Gold",2,"Put yourself on the fast track to better health with help from this lavender Fitbit Versa fitness tracker. Its built-in heart rate monitor ensures accurate workout tracking, and on-wrist notifications from a paired smart device keep you from missing important communications. This Fitbit Versa fitness tracker stays powered on for more than four days between charges.");
insert into WATCH VALUES (016,1790,52,2,"Versa Special Edition - Charcoal",2,"Strap on this Fitbit Versa to track activity and progress on health goals. Incorporate clock faces and accessories (not included) to match your style, and get accurate workout information thanks to the PurePulse continuous heart rate monitor. This Fitbit Versa's battery last four or more days between charges, so you can keep up with notifications from a paired device.");
insert into WATCH VALUES (017,2290,57,2,"Ionic Smartwatch - Charcoal/smoke gray",2,"Maximize workouts with this Fitbit Ionic fitness watch. It provides dynamic personal coaching, and it has built-in GPS capability, heart rate monitoring and storage for over 300 songs to help you stay motivated. The included battery lets this Fitbit Ionic fitness watch run for more than four days on each charge.");
insert into WATCH VALUES (018,2590,13,2,"Ionic Adidas Edition Smartwatch - Ink Blue/Ice Gray/Silver Gray",0,"Enjoy run-focused workouts with this Fitbit Ionic watch. It lets you enjoy the Adidas coaching experience via six on-screen workouts, and its SmartTrack lets you track real-time activity data. This Fitbit Ionic watch has a breathable band that can be worn all day, and it monitors your heart rate and sleep activity.");
insert into WATCH VALUES (019,2290,19,2,"Ionic Smartwatch - Burnt orange/slate blue",0,"Monitor fitness goals with this Fitbit Ionic watch. Its integrated Bluetooth, Wi-Fi and GPS capabilities ensure strong connections, and the PurePulse continuous heart rate measures cardiovascular health over time, so you can adjust workout intensity accordingly. This Fitbit Ionic watch's SmartTrack and multisport modes provide real-time statistics for all your favorite activities.");
insert into WATCH VALUES (020,2290,37,2,"Ionic Smartwatch - Charcoal/smoke gray",0,"Maximize workouts with this Fitbit Ionic fitness watch. It provides dynamic personal coaching, and it has built-in GPS capability, heart rate monitoring and storage for over 300 songs to help you stay motivated. The included battery lets this Fitbit Ionic fitness watch run for more than four days on each charge.");

insert into WATCH VALUES (021,990,89,3,"ZeRound2 Smartwatch 45mm - Black with Black Silicone Band",2,"Simplify digital tasks with this MyKronoz ZeRound2 smart watch. Its built-in microphone and speaker enable remote, hands-free phone communication and voice control via Google Assistant or Siri, and the touch screen display lets you navigate through activity tracking and other features easily. Personalize this MyKronoz ZeRound2 smart watch via its customizable watch face.");
insert into WATCH VALUES (022,1990,50,3,"ZeTime Hybrid Smartwatch 39mm Stainless Steel - Brushed Silver with Black Silicone Band",2,"Get the best of traditional style and digital features with this MyKronoz ZeTime hybrid smart watch. Mechanical hands provide analog time telling, and its touch screen color display and smart crown let you navigate through activity tracking and smartphone functions easily. This always-on MyKronoz ZeTime hybrid smart watch automatically updates the current time and date based on your location.");
insert into WATCH VALUES (023,1290,74,3,"ZeRound2HR Smartwatch 45mm Brushed Black - Brushed Black with Black Leather Band",2,"Monitor your heart rate in and out of the water with this MyKronoz ZeRound smart watch. It uses Siri or Google Now to connect to your smartphone using voice commands, and a vibrating alarm reminds you of upcoming tasks. This ZeRound smart watch monitors sleep and physical activity to keep you healthy.");
insert into WATCH VALUES (024,1590,99,3,"ZeRound2HR Smartwatch 45mm Polished Silver - Polished Silver with Silver Band",2,"Manage your daily activities with this MyKronoz ZeRound smartwatch. Its built-in microphone and speaker let you respond to calls, and the vibrating alarms and notifications keep track of important schedules and reminders. This MyKronoz ZeRound smartwatch helps you achieve your physical fitness goals by monitoring your performance level and providing progress reports via its activity dashboard.");
insert into WATCH VALUES (025,1990,85,3,"ZeTime Hybrid Smartwatch 44mm Stainless Steel - Brushed Silver with Black Silicone Band",2,"Enjoy the hybrid features of this MyKronoz ZeTime smartwatch. It has mechanical hands that deliver analog time with a turned-off screen, and the multi-touch color display shows your activity data to track your fitness goals and progress. Keep updated with weather reports, important calls and appointments with this MyKronoz ZeTime smartwatch, thanks to its reminder alerts and notifications.");
insert into WATCH VALUES (026,1290,35,3,"ZeRound2HR Smartwatch 45mm Brushed Black - Brushed Black with Black/Yellow Silicone Band",2,"Check fitness stats and smartphone notifications with this MyKronoz ZeRound2 HR smart watch. It’s water-resistant, so you can use it for swimming workouts, and it supports voice commands through Siri and Google Assistant for hands-free control. Keep track of your cardio performance via the optical heart rate sensor of this MyKronoz ZeRound2 HR smart watch.");

insert into WATCH VALUES (027,2550,64,4,"Gen 4 Venture HR Smartwatch 40mm Stainless Steel - Rose Gold with Gray Silicone Strap",3,"Monitor your fitness with this Fossil Venture HR smartwatch. Its integrated GPS delivers accurate location data for efficient route tracking, and the built-in heart rate monitor, accelerometer and gyroscope record vital signs and physical activities. Email and phone functions via the touch screen display of this Fossil Venture HR smartwatch keep you connected while you’re outdoors.");
insert into WATCH VALUES (028,1990,82,4,"Gen 4 Venture HR Smartwatch 40mm Stainless Steel - Silver",3,"Customize and track fitness goals with this Fossil Venture HR smart watch. Its activity tracker records heart rate, steps and distance to provide monitoring of your physical condition, and automatic time zone updates deliver accurate local time on your travels. This Fossil Venture HR smart watch offers connectivity to Android or iOS devices via Bluetooth. ");
insert into WATCH VALUES (029,1740,26,4,"Gen 3 Explorist Smartwatch 46mm Stainless Steel - Stainless Steel with Brown Leather Strap",3,"Track your active lifestyle and professional schedule with this Fossil Gen 3 Explorist smartwatch. The touchscreen face lets you quickly navigate between functions or personalize settings, and a built-in fitness tracker keeps you informed of progress toward goals. This Fossil Gen 3 Explorist smartwatch pairs with your smartphone via Bluetooth capability to support app and message notifications on your wrist.");
insert into WATCH VALUES (030,1740,48,4,"Gen 3 Explorist Smartwatch 46mm Stainless Steel - Rose Gold with Navy Leather Strap",3,"Monitor steps and calories with this Fossil Gen 3 Explorist smartwatch. It uses Bluetooth technology to connect to your smartphone, and the full round display makes it easy to read. This Fossil Gen 3 Explorist smartwatch has a battery life of 24 hours to run the entire day.");
insert into WATCH VALUES (031,2550,65,4,"Gen 4 Explorist HR Smartwatch 45mm Stainless Steel - Black with Black Silicone Strap",3,"Wear this Fossil Gen 4 Explorist HR smartwatch to track time while maintaining access to emails. It has GPS functionality to guide you on walks and a built-in heart rate monitor to help you adjust your pace. Access the flashlight, alarms or activity tracker on the handy touch screen display of this Fossil Gen 4 Explorist HR smartwatch.");
insert into WATCH VALUES (032,1990,69,4,"Gen 4 Venture HR Smartwatch 40mm Stainless Steel - Rose Gold",3,"Record information about exercise sessions with this Fossil women's smart watch. It monitors heart rate and location, and the rose gold band blends with exercise wear at the gym or office clothing when you go to work. This Fossil women's smart watch communicates with both iPhone and Android smartphones for easy data collection.");

insert into WATCH VALUES (033,1990,35,5,"E07 IP67 Waterproof Bluetooth Smart Watch with Touch Screen",1,"Connect the watch with your phone via Bluetooth and get call and text notifications right on your wrist.Designed for swimming and can be immersed in water for up to 3 feet, but is not recommended for diving and should not be used in hot water.Collects health and fitness data, for example, how far you walk, how many steps you take and how many calories you burn. If you stay sedentary for too long, the watch will remind you to get up and take a walk. With sleep monitor, you can plan out a path to better rest as the watch tracks and analyzes your sleep quality and patterns.");
insert into WATCH VALUES (034,2990,11,5,"V11S Bluetooth Smartwatch with 3DG-Sensor, Fitness Tracker, Pedometer, Sleep Monitor and Built-in Camera - Black",1,"Receive text and call notifications on your wrist when the V11S is paired with your smartphone and never miss another important notification as you are walking or exercising.Feel free to use your smartwatch anywhere without the fear of water damage.Ttake photos on-the-go and save them on the smartwatch’s internal memory, or add a microSD card for even more storage space. With the V11S, there is no need to carry a bulky camera or take out your cell phone to snap a quick picture.");
insert into WATCH VALUES (035,990,5,5,"TD-09 Kids Smart Watch GPS and Fitness Tracker, Call & Text",1,"This watch is not compatible with AT&T, Verizon, Sprint and other CDMA networks. It will work on GSM networks in the USA, Canada, Central and South America, and other countries.Tracking of your child’s sleep quality and patterns is made easy with this functional smartwatch - one less thing for you to worry about.The geofencing feature alerts you when your child moves outside of the designated area.");
insert into WATCH VALUES (036,1290,13,5,"G500S Kids Smartwatch with GPS and Fitness Tracker for T-Mobile ONLY Yellow",1,"This watch is not compatible with at&t, Verizon, sprint and other cdma networks.Insert a gsm sim card to communicate with your child via calls or text messages.Kids-friendly intuitive touch screen: Interactive and equally easy to use on the go and at home for your child's education or entertainment.Tracking of your child's sleep quality and patterns is made easy with this functional smartwatch - one less thing for you to worry aboutKeep track of your child's location at all times with gps and lbs.");
insert into WATCH VALUES (037,1790,25,5,"G900 Kids Smart Watch with Fitness Tracker and GPS",1,"Insert a gsm sim card to communicate with your child via calls or text messages.Protect your child from unwanted phone calls, junk calls, calls from strangers and spam messages.Tracking of your child's sleep quality and patterns is made easy with this functional smartwatch.The geofencing feature alerts you when your child moves outside of the designated area.");
insert into WATCH VALUES (038,3990,40,5,"GT88 Smart Watch Camera Bluetooth GSM Call and Text Heart Rate Monitor",1,"It also saves you the trouble to check your phone all the time when you are expecting a call or message.Insert a gsm sim card to use this watch as a stand-alone phone to make and receive calls and send text messages.The built-in pedometer diligently counts steps taken, calories burnt and distance covered, allowing you to keep track of your workouts and adjust your fitness goals. With sleep monitor, you will be able to see how much rest you are getting and analyze patterns to optimize your sleep habits and feel more refreshed and energized in the morning. Sedentary reminder will nudge you to get up and take a walk whenever you have been sitting down for too long.Use the gt88 as a remote control for your camera's smartphone to take pictures or videos on-the-go when your phone is paired with the smartwatch via bluetooth.");

insert into WATCH VALUES (039,2950,75,6,"Falster 2 Smartwatch 40mm Stainless Steel - Rose-Tone Stainless Steel",3,"Keep track of your physical activities with this Skagen Falster 2 smart watch. Wear OS by Google supports smart features such as heart rate monitoring and phone alerts, and Bluetooth connectivity seamlessly syncs compatible iOS and Android devices. This Skagen Falster 2 smart watch has a stylish magnetic steel-mesh strap that fastens securely and comfortably on your wrist.");
insert into WATCH VALUES (040,2950,48,6,"Falster 2 Smartwatch 40mm Stainless Steel - Gray Stainless Steel",3,"Keep track of more than just the time with this Skagen Falster smart watch. The interchangeable steel-mesh strap fastens securely for a comfortable fit, and you can choose from a time-oriented display or a function-based menu for convenient access to reminders and apps. This Skagen Falster smart watch tracks activities to help you meet fitness goals.");
insert into WATCH VALUES (041,1750,85,6,"Jorn Connected Hybrid Smartwatch 41mm Stainless Steel - Stainless steel",3,"The Jorn Connected hybrid smartwatch combines innovative technology with classic design. Features include automatic time and date adjustment, activity and goal tracking, sleep tracking, filtered email and text notifications, dual-time function and Skagen Link technology, which allows the wearer to snap a photo, control their music and more - all with the push of a button. Jorn Connected is compatible with Android phones and iPhone. The watch runs on a standard coin-cell battery with long battery life. The battery is easily replaceable by the user, so it never needs to be recharged. And the quick-release-pin construction makes it easy to interchange the leather band with other 22mm leather or steel-mesh straps.");
insert into WATCH VALUES (042,1750,31,6,"Connected Hagen Smartwatch 42mm Titanium - Brushed gray titanium",3,"Take advantage of the lightweight design of this Skagen Hagen Connect watch. As you wear it about town or go to work with it, this watch looks great in almost any situation thanks to its effortless style. The sheer sophistication of the leather band and detailing ensure this Skagen Hagen Connect watch keep you looking good day after day.");
insert into WATCH VALUES (043,1950,22,6,"Signatur Connected Hybrid Smartwatch 36mm Stainless Steel - Rose Gold",3,"Make this sleek Skagen Signatur T-Bar hybrid smartwatch a regular part of each day. Made to look like a classic timepiece, this smartwatch has an array of features, which include alert monitoring and activity tracking. Simply connect this Skagen Signatur T-Bar hybrid smartwatch to your Apple or Android smartphone to sync data and set the time automatically.");
insert into WATCH VALUES (044,2750,10,6,"Falster 2 Smartwatch 40mm Stainless Steel - Black Silicone",3,"Receive real-time notifications with this Skagen Falster 2 smart watch. Bluetooth connectivity syncs most iOS and Android devices, and the interactive touch screen works with Wear OS by Google to support smart features such as heart rate monitoring and activity tracking. This Skagen Falster 2 smart watch has an energy-efficient dial design that offers up to 24 hours of use.");



