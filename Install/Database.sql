create table nexus_topics
(
    key_topic bigint unsigned auto_increment,
    url varchar(1000) not null,
    title varchar(250) not null,
    summary text not null,
    tags varchar(200) not null,
    ts timestamp not null,
    constraint nexus_topics_pk
        primary key (key_topic)
);

