drop table Coordinator;
drop table event;
drop table Department;

create table Department(department_id int primary key,department_name varchar(30));

create table Coordinator(coordinator_id int primary key,coordinator_name varchar(30),password varchar(30),department_id int references Department(department_id));

create table event(event_name varchar(30),participant_rollno int primary key,participant_name varchar(20),timing varchar(30),department_id int references Department(department_id));

insert into Department values(100,'Bits and Bytes');
insert into Department values(101,'Chimera');
insert into Department values(102,'Helix');
insert into Department values(103,'Psy');

select * from Department;

insert into Coordinator values(1,'Ajay','Lewis@123#',100);
insert into Coordinator values(2,'Rakesh','Verstappen@123#',101);
insert into Coordinator values(3,'John','Leclerc@123#',102);
insert into Coordinator values(4,'Tom','Perez@123#',103);

select * from Coordinator;

