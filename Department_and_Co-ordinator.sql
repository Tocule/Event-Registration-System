drop table Coordinator;
drop table participant;
drop table event;
drop table Department;

create table Department(department_name varchar(30) primary key);

create table Coordinator(coordinator_id int primary key,coordinator_name varchar(30),password varchar(30),department_name varchar(30) references Department(department_name));

create table event(event_name varchar(30) primary key,Day date,start_time varchar(30),end_time varchar(30),no_of_participants int not null,department_name varchar(30) references Department(department_name));

create table participant(participant_email varchar(30),participant_name varchar(30),participant_age int,event_name varchar(30) references event(event_name),department_name varchar(30) references Department(department_name));

insert into Department values('Bits and Bytes');
insert into Department values('Chimera');
insert into Department values('Helix');
insert into Department values('Psy');

select * from Department;

insert into Coordinator values(1,'mehraajay2000@gmail.com','Lewis@123#','Bits and Bytes');
insert into Coordinator values(2,'vermarakesh2001@gmail.com','Verstappen@123#','Chimera');
insert into Coordinator values(3,'leclerccharles89@gmail.com','Leclerc@123#','Helix');
insert into Coordinator values(4,'perezsergio78@gmail.com','Perez@123#','Psy');

select * from Coordinator;


