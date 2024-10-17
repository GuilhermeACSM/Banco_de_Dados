-- 1. Selecionar os carros abaixo de um determinado ano:
SELECT * FROM tb_carros2 WHERE ano <= 2020;  

-- 2. Selecionar os carros e os clientes que compraram esses carros:
SELECT tb_carros2.modelo, tb_carros2.ano, tb_dpClientes.nome FROM tb_vendas JOIN tb_clientes ON tb_vendas.id_cliente = tb_clientes.id
JOIN tb_dpClientes ON tb_clientes.id_dpCliente = tb_dpClientes.id JOIN tb_carros2 ON tb_vendas.id_carro = tb_carros2.id;

-- 3. Selecionar os vendedores e os carros vendidos:
SELECT tb_dpClientes.nome AS nome_vendedor, tb_carros2.modelo, tb_carros2.ano, tb_vendas.valor FROM tb_vendas JOIN tb_vendedores ON tb_vendas.id_vendedor = tb_vendedores.id
JOIN tb_dpClientes ON tb_vendedores.id_dpCliente = tb_dpClientes.id JOIN tb_carros2 ON tb_vendas.id_carro = tb_carros2.id;

-- 4. Selecionar os clientes e seus telefones:
SELECT tb_dpClientes.nome, tb_telefone.telefone FROM tb_clientes JOIN tb_dpClientes ON tb_clientes.id_dpCliente = tb_dpClientes.id 
JOIN tb_telefone ON tb_dpClientes.id_telefone = tb_telefone.id;




