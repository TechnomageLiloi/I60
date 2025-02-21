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

