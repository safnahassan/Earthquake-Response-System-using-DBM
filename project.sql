Create Table if not exists Group_details
	(Dep_ID				varchar(20),
	Phone_No			varchar(15),
	Department 			varchar(50),
	Primary key (Dep_ID, Phone_No)
	);
	
Create Table if not exists Preinstalled_Short_Message
	(M_ID			varchar(20),
	Message			varchar(200),
	Primary key(M_ID)
	);

Create Table if not exists Location
	(Pincode 			numeric(6, 0),
	Location			varchar(30),
	Primary key(Pincode)
	);

Create Table if not exists User_details
	(User_ID		varchar(20),
	Pass_word		varchar(20),
	Name			varchar(30),
	Dep_ID			varchar(20),
	Primary Key(User_ID, Pass_word),
	Foreign Key(Dep_ID) references Group_details(Dep_ID) on delete set null
	);

Create Table if not exists Message
	(M_ID			varchar (20),
	User_ID		varchar(20),
	Phone_No		varchar(15),
	Message		varchar(200),
	Location		varchar(30),
	Sending_Result	varchar(20),
	Primary Key(M_ID, Phone_No, Location),
	Foreign Key(M_ID) references Preinstalled_Short_Message(M_ID) ON DELETE CASCADE,
	Foreign Key(User_ID) references User_details(User_ID) ON DELETE CASCADE
	);

Create Table if not exists Position
	(Dep_ID		varchar (20),
	User_ID		varchar(20),
	Authority		varchar(50),
	Primary Key(Dep_ID, User_ID),
	Foreign Key(User_ID) references User_details(User_ID) on delete CASCADE,
	Foreign Key(Dep_ID) references Group_details(Dep_ID) on delete CASCADE
	);




