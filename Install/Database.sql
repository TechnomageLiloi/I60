create table i60_levels
(
    key_level tinyint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned not null,
    program text null,
    goal varchar(250) not null default '-',
    data json not null,
    constraint i60_levels_pk
        primary key (key_level)
);

INSERT INTO i60_levels (title, status, program, goal, data) VALUES ('Teacher', 1, '-', DEFAULT, '{}');

create table i60_lessons
(
    key_lesson smallint unsigned auto_increment,
    key_level tinyint unsigned not null,
    title varchar(100) not null,
    status tinyint unsigned default 1 not null,
    program text not null,
    data json not null,
    constraint i60_lessons_pk
        primary key (key_lesson),
    constraint i60_lessons_i60_levels_key_level_fk
        foreign key (key_level) references i60_levels (key_level)
            on update cascade on delete cascade
);

create table i60_problems
(
    key_problem bigint unsigned auto_increment,
    key_lesson smallint unsigned not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    program text not null,
    data json not null,
    constraint i60_problems_pk
        primary key (key_problem),
    constraint i60_problems_i60_lessons_key_lesson_fk
        foreign key (key_lesson) references i60_lessons (key_lesson)
            on update cascade on delete cascade
);

create table i60_journals
(
    key_journal bigint unsigned auto_increment,
    key_problem bigint unsigned not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    start timestamp not null,
    finish timestamp not null,
    trophy smallint signed default 0,
    data json not null,
    constraint i60_journals_pk
        primary key (key_journal),
    constraint i60_journals_i60_problems_key_problem_fk
        foreign key (key_problem) references i60_problems (key_problem)
            on update cascade on delete cascade
);

