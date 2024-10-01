create database db_banco;
-- create database if not exists db_dados;
drop table tb_cliente; -- apaga a tabela

create table tb_cliente (
id int not null,
nome varchar(50) not null,
data_cadastro date not null,
endereco text,
estado char(2),
ativo boolean default true,
valor float(8,2) default 0
);

rename table td_user to tb_user;
rename table `db_dados`.`td_user` to `db_dados`.`tb_user`; -- renomear de um jeito mais completo (sem ficar em negrito na seleção)

alter table tb_user change nome nome_user varchar(150); -- alterar nome da coluna
alter table tb_user add column sexo char(1); -- adiciona uma coluna (ao final)
alter table tb_user drop column sexo; -- apaga uma coluna
alter table tb_user add column sexo char(1) after nome_user; -- adiciona uma coluna após coluna desejada

describe tb_user;

alter table tb_user change nome_user nome_user varchar(100) not null;
alter table tb_user change id id int not null primary KEY;
 
describe tb_user;
