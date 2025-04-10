create table i60_logs
(
    key_log bigint unsigned auto_increment,
    ts timestamp not null,
    tags varchar(1000) not null,
    data json not null,
    constraint logs_pk
        primary key (key_log)
);

create table i60_config
(
    key_config varchar(100) not null,
    data json not null,
    constraint config_pk
        primary key (key_config)
);

create table i60_tickets
(
    key_ticket bigint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    start timestamp not null,
    finish timestamp not null,
    trophy smallint signed default 0,
    data json not null,
    constraint i60_tickets_pk
        primary key (key_ticket)
);