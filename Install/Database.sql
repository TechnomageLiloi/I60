create table i60_road
(
	key_road timestamp not null,
	title varchar(250) not null,
	summary text not null,
	status tinyint unsigned default 1 not null,
	type tinyint unsigned default 1 not null,
	data json not null,
	constraint i60_road_pk
		primary key (key_road)
);

create table i60_problems
(
	key_problem timestamp not null,
	title varchar(500) not null,
	constraint i60_problems_pk
		primary key (key_problem)
);

create table i60_levels
(
    key_level tinyint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned not null,
    program text null,
    goal varchar(250) not null default '-',
    constraint i60_levels_pk
        primary key (key_level)
);

INSERT INTO i60_levels (title, status, program, goal) VALUES ('Teacher', 1, '-', DEFAULT);

create table i60_projects
(
    key_project smallint unsigned auto_increment,
    key_level tinyint unsigned not null,
    title varchar(100) not null,
    status tinyint unsigned default 1 not null,
    program text not null,
    constraint i60_projects_pk
        primary key (key_project),
    constraint i60_projects_i60_levels_key_level_fk
        foreign key (key_level) references i60_levels (key_level)
            on update cascade on delete cascade
);

