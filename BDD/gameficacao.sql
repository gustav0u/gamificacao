

create table times(
	codigo int(10) auto_increment,
    nome varchar(45),
    cidade_estado varchar(100),
    pontos int,
    dataFundacao date,
    primary key(codigo)
);

insert into times values(1, 'Flamengo', 'Rio de Janeiro - RJ', 83, '1895-11-17');
insert into times values(null, 'Palmeiras', 'São Paulo - SP', 72, '1914-08-26');
insert into times values(null, 'Santos', 'Santos - SP', 75, '1912-04-14');
insert into times values(null, 'Vasco', 'Rio de Janeiro - RJ', 3, '1898-08-21');
insert into times values(null, 'Cruzeiro', 'Belo Horizonte - MG', 32, '1921-01-02');
insert into times values(null, 'Internacional', 'Porto Alegre - RS', 56, '1909-04-04');
insert into times values(null, 'Atlético-MG', 'Belo Horizonte - MG', 79, '1908-03-25');
insert into times values(null, 'Grêmio', 'Porto Alegre - RS', 45, '1903-09-15');
insert into times values(null, 'Fluminense', 'Rio de Janeiro - RJ', 69, '1902-07-21');
insert into times values(null, 'Sport', 'Recife - PE', 15, '1905-05-13');

select * from times;