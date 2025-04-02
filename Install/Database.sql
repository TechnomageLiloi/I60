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

create table i60_games
(
    key_game smallint unsigned auto_increment,
    key_level tinyint unsigned not null,
    title varchar(100) not null,
    status tinyint unsigned default 1 not null,
    program text not null,
    constraint i60_games_pk
        primary key (key_game),
    constraint i60_games_i60_levels_key_level_fk
        foreign key (key_level) references i60_levels (key_level)
            on update cascade on delete cascade
);

create table i60_quests
(
    key_quest bigint unsigned auto_increment,
    key_game smallint unsigned not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    program text not null,
    constraint i60_quests_pk
        primary key (key_quest),
    constraint i60_quests_i60_games_key_game_fk
        foreign key (key_game) references i60_games (key_game)
            on update cascade on delete cascade
);

create table i60_journals
(
    key_journal bigint unsigned auto_increment,
    key_quest bigint unsigned not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    data json not null,
    constraint i60_journals_pk
        primary key (key_journal),
    constraint i60_journals_i60_quests_key_quest_fk
        foreign key (key_quest) references i60_quests (key_quest)
            on update cascade on delete cascade
);

