create database db_concessionaria1;

create table tb_dpCliente (
	id_dpCliente int auto_increment primary key,
    nome varchar(70) not null,
    rg varchar(15) not null,
    cpf varchar(11) not null,
    data_nasc date not null,
    sexo char(1) not null
);

create table tb_telefone (
	id_telefone int auto_increment primary key,
    telefone varchar(15) not null,
    id_dpCliente int not null,
    foreign key (id_dpCliente) references tb_dpCliente(id_dpCliente)
);

create table tb_email (
	id_email int auto_increment primary key,
    email varchar(30) not null,
    id_dpCliente int not null,
    foreign key (id_dpCliente) references tb_dpCliente(id_dpCliente)
);

create table tb_endereco (
	id_endereco int auto_increment primary key,
    rua varchar(40) not null,
    estado varchar(30) not null,
    pais varchar(30) not null,
    id_dpCliente int not null,
    foreign key (id_dpCliente) references tb_dpCliente(id_dpCliente)
);


create table tb_vendedor (
	id_vendedor int auto_increment primary key,
    salario float(8,2) not null,
    id_dpCliente int not null,
	foreign key (id_dpCliente) references tb_dpCliente(id_dpCliente)
);

-- DADOS PESSOAIS CLIENTES
INSERT INTO tb_dpCliente (id_dpCliente, nome, rg, cpf, data_nasc, sexo) VALUES
(1, 'Carlos Silva', '12345678', 12345678901, '1980-01-15', 'M'),
(2, 'Ana Maria Souza', '98765432', 98765432101, '1992-03-23', 'F'),
(3, 'Pedro Santos', '45678912', 45678912301, '1985-07-19', 'M'),
(4, 'Mariana Lopes', '85214796', 85214796301, '1990-12-11', 'F'),
(5, 'José Almeida', '74185296', 74185296301, '1978-09-04', 'M'),
(6, 'Rita Pereira', '36985214', 36985214701, '1991-02-10', 'F'),
(7, 'Lucas Oliveira', '14785236', 14785236901, '1988-06-15', 'M'),
(8, 'Paulo Santos', '96325874', 96325874101, '1985-11-27', 'M'),
(9, 'Maria Clara', '75395146', 75395146501, '1990-04-30', 'F'),
(10, 'Juliana Araújo', '35795182', 35795182601, '1994-08-20', 'F'),
(11, 'Gabriel Costa', '65478932', 65478932101, '1987-05-18', 'M'),
(12, 'Fernando Gomes', '95175346', 95175346801, '1975-10-25', 'M'),
(13, 'Bianca Ribeiro', '24689751', 24689751201, '1993-11-15', 'F'),
(14, 'Renato Medeiros', '98765401', 98765401201, '1981-09-19', 'M'),
(15, 'Camila Ferreira', '32165498', 32165498701, '1989-03-30', 'F'),
(16, 'Ricardo Lima', '15975328', 15975328401, '1986-02-22', 'M'),
(17, 'Sônia Dias', '65432198', 65432198701, '1995-07-12', 'F'),
(18, 'João Nogueira', '78965412', 78965412301, '1972-06-28', 'M'),
(19, 'Letícia Macedo', '85296314', 85296314701, '1991-11-01', 'F'),
(20, 'Thiago Barros', '14725836', 14725836901, '1980-01-25', 'M'),
(21, 'Eduardo Fonseca', '65498731', 65498731201, '1983-10-09', 'M'),
(22, 'Patrícia Lima', '95165472', 95165472301, '1990-08-14', 'F'),
(23, 'Vitor Martins', '78912365', 78912365401, '1985-12-03', 'M'),
(24, 'Fernanda Rocha', '96314785', 96314785201, '1993-05-28', 'F'),
(25, 'Roberto Cunha', '35724698', 35724698101, '1978-04-07', 'M'),
(26, 'Helena Carvalho', '74196358', 74196358201, '1994-02-17', 'F'),
(27, 'Carlos Brito', '85214732', 85214732601, '1986-11-21', 'M'),
(28, 'Renata Pires', '96385274', 96385274101, '1991-06-11', 'F'),
(29, 'Luís Antunes', '14725839', 14725839101, '1987-07-20', 'M'),
(30, 'Juliana Melo', '85296341', 85296341701, '1993-10-05', 'F'),
(31, 'Daniel Ferreira', '32145687', 32145687901, '1979-09-13', 'M'),
(32, 'Flávia Lopes', '98745632', 98745632101, '1990-05-26', 'F'),
(33, 'Marcelo Souza', '75395182', 75395182701, '1983-12-08', 'M'),
(34, 'Simone Braga', '15975348', 15975348701, '1992-07-22', 'F'),
(35, 'Augusto Mendes', '35795184', 35795184101, '1974-11-15', 'M'),
(36, 'Bruna Teixeira', '65498732', 65498732101, '1995-06-30', 'F'),
(37, 'Júlio César', '95175324', 95175324601, '1981-04-29', 'M'),
(38, 'Andréa Torres', '35712369', 35712369401, '1989-08-19', 'F'),
(39, 'Henrique Matos', '74196328', 74196328501, '1986-03-17', 'M'),
(40, 'Sérgio Moreira', '15975349', 15975349601, '1978-09-23', 'M'),
(41, 'Larissa Soares', '75395128', 75395128701, '1990-12-14', 'F'),
(42, 'Fábio Lima', '65412398', 65412398701, '1983-11-11', 'M'),
(43, 'Cláudia Ramos', '95135768', 95135768401, '1992-02-18', 'F'),
(44, 'Renato Lemos', '78965473', 78965473201, '1985-06-27', 'M'),
(45, 'Nathália Cruz', '75385219', 75385219701, '1994-01-13', 'F'),
(46, 'Leandro Prado', '96325814', 96325814701, '1987-10-08', 'M'),
(47, 'Paula Freitas', '45698712', 45698712301, '1990-09-16', 'F'),
(48, 'Rafael Campos', '14796385', 14796385201, '1982-03-21', 'M'),
(49, 'Tatiane Ferreira', '36925814', 36925814701, '1996-08-10', 'F'),
(50, 'Gustavo Martins', '85236914', 85236914701, '1990-12-20', 'M');


-- TELEFONES
INSERT INTO tb_telefone (id_telefone, telefone, id_dpCliente) VALUES
(1, '11987654321', 1),
(2, '21987654322', 2),
(3, '31987654323', 3),
(4, '41987654324', 4),
(5, '51987654325', 5),
(6, '61987654326', 6),
(7, '71987654327', 7),
(8, '81987654328', 8),
(9, '91987654329', 9),
(10, '10987654320', 10),
(11, '11987654330', 11),
(12, '21987654331', 12),
(13, '31987654332', 13),
(14, '41987654333', 14),
(15, '51987654334', 15),
(16, '61987654335', 16),
(17, '71987654336', 17),
(18, '81987654337', 18),
(19, '91987654338', 19),
(20, '10987654339', 20),
(21, '11987654340', 21),
(22, '21987654341', 22),
(23, '31987654342', 23),
(24, '41987654343', 24),
(25, '51987654344', 25),
(26, '61987654345', 26),
(27, '71987654346', 27),
(28, '81987654347', 28),
(29, '91987654348', 29),
(30, '10987654349', 30),
(31, '11987654350', 31),
(32, '21987654351', 32),
(33, '31987654352', 33),
(34, '41987654353', 34),
(35, '51987654354', 35),
(36, '61987654355', 36),
(37, '71987654356', 37),
(38, '81987654357', 38),
(39, '91987654358', 39),
(40, '10987654359', 40),
(41, '11987654360', 41),
(42, '21987654361', 42),
(43, '31987654362', 43),
(44, '41987654363', 44),
(45, '51987654364', 45),
(46, '61987654365', 46),
(47, '71987654366', 47),
(48, '81987654367', 48),
(49, '91987654368', 49),
(50, '10987654369', 50);
INSERT INTO tb_telefone (id_telefone, telefone, id_dpCliente) VALUES
(51, '91987654368', 50); -- adicionando telefone a mais no cliente!!!!!!!

-- MOSTRAR OS TELEFONES DOS CLIENTES
select tb_dpCliente.nome , tb_telefone.telefone from tb_dpCliente inner join tb_telefone on (tb_dpCliente.id_dpCliente = tb_telefone.id_dpCliente); -- select


-- EMAILS
INSERT INTO tb_email (id_email, email, id_dpCliente) VALUES
(1, 'carlos.silva@example.com', 1),
(2, 'ana.maria@example.com', 2),
(3, 'pedro.santos@example.com', 3),
(4, 'mariana.lopes@example.com', 4),
(5, 'jose.almeida@example.com', 5),
(6, 'rita.pereira@example.com', 6),
(7, 'lucas.oliveira@example.com', 7),
(8, 'paulo.santos@example.com', 8),
(9, 'maria.clara@example.com', 9),
(10, 'juliana.araujo@example.com', 10),
(11, 'gabriel.costa@example.com', 11),
(12, 'fernando.gomes@example.com', 12),
(13, 'bianca.ribeiro@example.com', 13),
(14, 'renato.medeiros@example.com', 14),
(15, 'camila.ferreira@example.com', 15),
(16, 'ricardo.lima@example.com', 16),
(17, 'sonia.dias@example.com', 17),
(18, 'joao.nogueira@example.com', 18),
(19, 'leticia.macedo@example.com', 19),
(20, 'thiago.barros@example.com', 20),
(21, 'eduardo.fonseca@example.com', 21),
(22, 'patricia.lima@example.com', 22),
(23, 'vitor.martins@example.com', 23),
(24, 'fernanda.rocha@example.com', 24),
(25, 'roberto.cunha@example.com', 25),
(26, 'helena.carvalho@example.com', 26),
(27, 'carlos.brito@example.com', 27),
(28, 'renata.pires@example.com', 28),
(29, 'luis.antunes@example.com', 29),
(30, 'juliana.melo@example.com', 30),
(31, 'daniel.ferreira@example.com', 31),
(32, 'flavia.lopes@example.com', 32),
(33, 'marcelo.souza@example.com', 33),
(34, 'simone.braga@example.com', 34),
(35, 'augusto.mendes@example.com', 35),
(36, 'bruna.teixeira@example.com', 36),
(37, 'julio.cesar@example.com', 37),
(38, 'andrea.torres@example.com', 38),
(39, 'henrique.matos@example.com', 39),
(40, 'sergio.moreira@example.com', 40),
(41, 'larissa.soares@example.com', 41),
(42, 'fabio.lima@example.com', 42),
(43, 'claudia.ramos@example.com', 43),
(44, 'renato.lemos@example.com', 44),
(45, 'nathalia.cruz@example.com', 45),
(46, 'leandro.prado@example.com', 46),
(47, 'paula.freitas@example.com', 47),
(48, 'rafael.campos@example.com', 48),
(49, 'maria.luiza@example.com', 49),
(50, 'joana.silva@example.com', 50),
 -- ADICIONANDO EMAIL A MAIS NO PRIMEIRO CLIENTE!!!!!
(51, 'carlos.silva@gmail.com', 1);

-- MOSTRA O EMAIL DOS CLIENTES
select tb_dpCliente.nome , tb_email.email from tb_dpCliente inner join tb_email on (tb_dpCliente.id_dpCliente = tb_email.id_dpCliente);

-- ENDEREÇOS
INSERT INTO tb_endereco (id_endereco, rua, estado, pais, id_dpCliente) VALUES
(1, 'Rua A, 123', 'São Paulo', 'Brasil', 1),
(2, 'Rua B, 456', 'Rio de Janeiro', 'Brasil', 2),
(3, 'Rua C, 789', 'Minas Gerais', 'Brasil', 3),
(4, 'Rua D, 101', 'Bahia', 'Brasil', 4),
(5, 'Rua E, 202', 'Rio Grande do Sul', 'Brasil', 5),
(6, 'Rua F, 303', 'Ceará', 'Brasil', 6),
(7, 'Rua G, 404', 'Pernambuco', 'Brasil', 7),
(8, 'Rua H, 505', 'Paraná', 'Brasil', 8),
(9, 'Rua I, 606', 'Distrito Federal', 'Brasil', 9),
(10, 'Rua J, 707', 'Espírito Santo', 'Brasil', 10),
(11, 'Rua K, 808', 'São Paulo', 'Brasil', 11),
(12, 'Rua L, 909', 'Rio de Janeiro', 'Brasil', 12),
(13, 'Rua M, 1234', 'Minas Gerais', 'Brasil', 13),
(14, 'Rua N, 5678', 'Bahia', 'Brasil', 14),
(15, 'Rua O, 1357', 'Rio Grande do Sul', 'Brasil', 15),
(16, 'Rua P, 2468', 'Ceará', 'Brasil', 16),
(17, 'Rua Q, 3579', 'Pernambuco', 'Brasil', 17),
(18, 'Rua R, 4680', 'Paraná', 'Brasil', 18),
(19, 'Rua S, 5791', 'Distrito Federal', 'Brasil', 19),
(20, 'Rua T, 6802', 'Espírito Santo', 'Brasil', 20),
(21, 'Rua U, 7913', 'São Paulo', 'Brasil', 21),
(22, 'Rua V, 8024', 'Rio de Janeiro', 'Brasil', 22),
(23, 'Rua W, 9135', 'Minas Gerais', 'Brasil', 23),
(24, 'Rua X, 0246', 'Bahia', 'Brasil', 24),
(25, 'Rua Y, 1357', 'Rio Grande do Sul', 'Brasil', 25),
(26, 'Rua Z, 2468', 'Ceará', 'Brasil', 26),
(27, 'Rua AA, 3579', 'Pernambuco', 'Brasil', 27),
(28, 'Rua AB, 4680', 'Paraná', 'Brasil', 28),
(29, 'Rua AC, 5791', 'Distrito Federal', 'Brasil', 29),
(30, 'Rua AD, 6802', 'Espírito Santo', 'Brasil', 30),
(31, 'Rua AE, 7913', 'São Paulo', 'Brasil', 31),
(32, 'Rua AF, 8024', 'Rio de Janeiro', 'Brasil', 32),
(33, 'Rua AG, 9135', 'Minas Gerais', 'Brasil', 33),
(34, 'Rua AH, 0246', 'Bahia', 'Brasil', 34),
(35, 'Rua AI, 1357', 'Rio Grande do Sul', 'Brasil', 35),
(36, 'Rua AJ, 2468', 'Ceará', 'Brasil', 36),
(37, 'Rua AK, 3579', 'Pernambuco', 'Brasil', 37),
(38, 'Rua AL, 4680', 'Paraná', 'Brasil', 38),
(39, 'Rua AM, 5791', 'Distrito Federal', 'Brasil', 39),
(40, 'Rua AN, 6802', 'Espírito Santo', 'Brasil', 40),
(41, 'Rua AO, 7913', 'São Paulo', 'Brasil', 41),
(42, 'Rua AP, 8024', 'Rio de Janeiro', 'Brasil', 42),
(43, 'Rua AQ, 9135', 'Minas Gerais', 'Brasil', 43),
(44, 'Rua AR, 0246', 'Bahia', 'Brasil', 44),
(45, 'Rua AS, 1357', 'Rio Grande do Sul', 'Brasil', 45),
(46, 'Rua AT, 2468', 'Ceará', 'Brasil', 46),
(47, 'Rua AU, 3579', 'Pernambuco', 'Brasil', 47),
(48, 'Rua AV, 4680', 'Paraná', 'Brasil', 48),
(49, 'Rua AW, 5791', 'Distrito Federal', 'Brasil', 49),
(50, 'Rua AX, 6802', 'Espírito Santo', 'Brasil', 50);


insert into tb_vendedor (id_vendedor, salario , id_dpCliente) VALUES
(1,46),
(1,47),
(1,48),
(1,49),
(1,50);







drop table tb_dpCliente;
drop table tb_email;
drop table tb_telefone;
drop table tb_endereco;

-- MOSTRA O ENDEREÇO DOS CLIENTES
select tb_dpCliente.nome , tb_endereco.rua from tb_dpCliente inner join tb_endereco on (tb_dpCliente.id_dpCliente = tb_endereco.id_dpCliente);
select tb_dpCliente.nome , tb_endereco.estado from tb_dpCliente inner join tb_endereco on (tb_dpCliente.id_dpCliente = tb_endereco.id_dpCliente);
select tb_dpCliente.nome , tb_endereco.pais from tb_dpCliente inner join tb_endereco on (tb_dpCliente.id_dpCliente = tb_endereco.id_dpCliente);
select tb_dpCliente.nome , tb_endereco.id_endereco from tb_dpCliente inner join tb_endereco on (tb_dpCliente.id_dpCliente = tb_endereco.id_dpCliente);
-- PEGANDO TODOS OS DADOS DAS TABELAS!!!
select tb_dpCliente.nome , tb_endereco.* from tb_dpCliente inner join tb_endereco on (tb_dpCliente.id_dpCliente = tb_endereco.id_dpCliente);




