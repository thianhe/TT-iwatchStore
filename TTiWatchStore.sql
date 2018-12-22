drop database if exists TTiWatchStore;
create database TTiWatchStore;
use TTiWatchStore;
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
    primary key(member_id),
    unique(Account)
);
insert into MEMBER VALUES (0,"Admin"," ","admin","admin","test@gmail.com",123123123,"2017-06-15","M","taiwan");
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

insert into COMPANY VALUES (0,"Apple");
insert into COMPANY VALUES (1,"Samsung");
insert into COMPANY VALUES (2,"Fitbit");
insert into COMPANY VALUES (3,"Verizon");
insert into COMPANY VALUES (4,"Fossil");
insert into COMPANY VALUES (5,"Techcomm");
insert into COMPANY VALUES (6,"APGtek");
insert into OPERATING_SYSTEM VALUES (0,"Other");
insert into OPERATING_SYSTEM VALUES (1,"Apple IOS");
insert into OPERATING_SYSTEM VALUES (2,"Android");
insert into OPERATING_SYSTEM VALUES (3,"Wear OS");
insert into OPERATING_SYSTEM VALUES (4,"watchOS");
insert into OPERATING_SYSTEM VALUES (5,"Tizen");


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
insert into WATCH VALUES (0,12,12,0,"qwe1",0,"testste");
insert into WATCH VALUES (1,12,12,1,"qwe2",1,"testste");
insert into WATCH VALUES (2,12,12,1,"qgg3e",2,"testste");
insert into WATCH VALUES (3,12,12,2,"qwe4",0,"testste");
insert into WATCH VALUES (4,12,12,2,"qwe5",1,"testste");
insert into WATCH VALUES (5,12,12,2,"qwe6",2,"testste");
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
	date_time datetime not null,
    quantity int not null,
    cost int not null,
    primary key(storage_id,watch_id),
    foreign key(watch_id) references WATCH(watch_id));
                        
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
                            
create table ORDER_LIST(
	orderList_id int not null,
	member_id int not null,
	cost int not null,
    date_time datetime not null,
    state char(1) not null,
    primary key(orderList_id),
    foreign key(member_id) references MEMBER(member_id)
);
                            
create table ORDER_ITEM(
	orderList_id int not null,
	watch_id int not null,
    quantity int not null,
    cost int not null,
    primary key(orderList_id, watch_id),
    foreign key(orderList_id) references ORDER_LIST(orderList_id),
    foreign key(watch_id) references WATCH(watch_id)
);




