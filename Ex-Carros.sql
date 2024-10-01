-- CRIANDO UMA TABELA PARA CARRO
create table tb_carros (
id int auto_increment primary key,
marca varchar(50) not null,
modelo varchar(100) not null,
ano date not null,
preco float(9,2) default 0
);

drop table tb_carros; -- Para limpar a tabela toda!!!
alter table tb_carros change ano ano int not null; -- Mudando os type da coluna da tabela!!
describe tb_carros; -- Mostrar a descrição da taabela!!

insert into tb_carros (id,marca,modelo,ano,preco) values -- Continuação na linha de baixo!
(1,'Toyota','Corolla','2020','85000'), -- Continuação na linha de baixo!
(2,'Honda','Civic','2019','90000'), -- Continuação na linha de baixo!
(3,'Ford','Mustang','2021','300000'), -- Continuação na linha de baixo!
(4,'Chevrolet','Onix','2018','45000');  -- INSERT INTO para adiconar dados fixos na tabela!!!

truncate table tb_carros; -- Para limpar os dados inseridos pelo insert into na tabela!!!
select * from tb_carros; -- Para mostrar os dados inseridos pelo insert into!!!