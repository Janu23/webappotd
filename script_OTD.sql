--Cria banco de dados MySQL
CREATE DATABASE dbotd;

--Define condificação
ALTER DATABASE dbotd CHARSET = UTF8 COLLATE = utf8_general_ci;

--Tabela de fichas de drenagem profunda(Cada linha corresponde a uma ficha)
CREATE TABLE drenagem_profunda(
	codAuto INT NOT NULL AUTO_INCREMENT,
	codMonitoramento INT,
	data VARCHAR(10),
	elemento VARCHAR(25),
	km VARCHAR(15),
	estado VARCHAR(2),
	rodovia VARCHAR(10),
	sentido VARCHAR(5),
	altura FLOAT,
	largura FLOAT,
	diametro FLOAT,
	dimensao VARCHAR(12),
	estadoConservacao VARCHAR(15),
	localizacao VARCHAR(12),
	caixaAla VARCHAR(3),
	tipo VARCHAR(10),
	tipoMontante VARCHAR(15),
	materialRevestimento VARCHAR(15),
	formato VARCHAR(15),
	sigla VARCHAR(6),
	repararEntorno VARCHAR(3),
	medidaAproximada VARCHAR(3),
	elementoExcluido VARCHAR(3),
	motivoExclusao VARCHAR(3),
	latitude1 VARCHAR(20),
	longitude1 VARCHAR(20),
	ok VARCHAR(3),
	limpeza VARCHAR(3),
	assoreado VARCHAR(3),
	afogado VARCHAR(3),
	testeAlaDanificada VARCHAR(3),
	tubulacaoDanificada VARCHAR(3),
	caixaDanificada VARCHAR(3),
	erosao VARCHAR(3),
	fissurasTrincas VARCHAR(3),
	semTampa VARCHAR(3),
	tampaDanificada VARCHAR(3),
	tampaDanificadaInexist VARCHAR(3),
	estrutura VARCHAR(20),
	semSolucaoImediata VARCHAR(3),
	tipoSemSolucaoImediata VARCHAR(3),
	descricaoOutrosSemSolucaoImediata VARCHAR(30),
	observacao VARCHAR(150),
	funcionario VARCHAR(30),
	marginal VARCHAR(3),
	correcao VARCHAR(3),
	dataEnvio VARCHAR(10),
	interferenciaTerceiros VARCHAR(3),
	tipoInterferenciaTerceiros VARCHAR(15),
	fotoInterna VARCHAR(15),
	descricaoFotoInterna VARCHAR(30),
	descricaoOutroFotoInterna VARCHAR(30),
	inacessivelRocada VARCHAR(3),
	semestre INT,
	ano INT,
	controle VARCHAR(3),
	removido VARCHAR(3),
	lote VARCHAR(15),
	foto1Ficha VARCHAR(50),
	foto2Ficha VARCHAR(50),
	foto1Nova VARCHAR(50),
	foto2Nova VARCHAR(50),
	PRIMARY KEY(codAuto)
);

--Tabela de fichas de drenagem superficial(Cada linha corresponde a uma ficha)
CREATE TABLE drenagem_superficial(
	codAuto INT NOT NULL AUTO_INCREMENT,
	identificacao2020_2 VARCHAR(30),
	data VARCHAR(10),
	codMonitoramento INT,
	elemento VARCHAR(20),
	km VARCHAR(15),
	kmFinal VARCHAR(15),
	estado VARCHAR(2),
	rodovia VARCHAR(10),
	sentido VARCHAR(10),
	corteAterro VARCHAR(10),
	altura FLOAT,
	larguraFicha VARCHAR(10),
	largura FLOAT,
	largura2 FLOAT,
	larguraExterna FLOAT,
	ambiente VARCHAR(15),
	material VARCHAR(15),
	sigla VARCHAR(15),
	latitude1 VARCHAR(20),
	longitude1 VARCHAR(20),
	latitude2 VARCHAR(20),
	longitude2 VARCHAR(20),
	comprimento FLOAT,
	tipo VARCHAR(15),
	acoes VARCHAR(15),
	ok VARCHAR(5),
	reparo VARCHAR(5),
	extensaoReparo FLOAT,
	limpeza VARCHAR(5),
	extensaoLimpeza FLOAT,
	implantar VARCHAR(5),
	extensaoImplantar FLOAT,
	estadoConservacao VARCHAR(12),
	semSolucaoImediata VARCHAR(5),
	tipoSemSolucaoImediata VARCHAR(15),
	descricaoOutrosSemSolucaoImediata VARCHAR(30),
	observacao VARCHAR(150),
	funcionario VARCHAR(50),
	marginal VARCHAR(5),
	ilha VARCHAR(5),
	correcao VARCHAR(5),
	dataEnvio VARCHAR(10),
	semestre INT,
	ano INT,
	removido VARCHAR(15),
	lote VARCHAR(50),
	foto1_fichas VARCHAR(75),
	foto2_fichas VARCHAR(75),
	foto1 VARCHAR(75),
	foto2 VARCHAR(75),
	foto3 VARCHAR(75),
	foto4 VARCHAR(75),
	foto5 VARCHAR(75),
	foto6 VARCHAR(75),
	foto7 VARCHAR(75),
	foto8 VARCHAR(75),
	foto9 VARCHAR(75),
	foto10 VARCHAR(75),
	foto11 VARCHAR(75),
	foto12 VARCHAR(75),
	foto13 VARCHAR(75),
	foto14 VARCHAR(75),
	foto15 VARCHAR(75),
	aguaDissipador VARCHAR(30),
	foto1_fichas_nova VARCHAR(75),
	foto2_fichas_nova VARCHAR(75),
	observacaoAlteracao VARCHAR(150),
	sync TINYINT(1),
	edit TINYINT(1), 
	PRIMARY KEY(codAuto)
);
--Complemento create table
--CHARACTER SET utf8 COLLATE utf8_general_ci;

--Comando para importar o xls
load data local infile '/var/www/html/webappotd/Eco101_DrenagemProfunda_Total_format.csv'
     into table drenagem_profunda
     fields terminated by ';'
     enclosed by '"'
     lines terminated by '\n'
     ignore 1 rows;

--Comando para importar o xls
load data local infile '/var/www/html/webappotd/Eco101_DrenagemSuperficial_Total_format.csv'
     into table drenagem_superficial
     fields terminated by ';'
     enclosed by '"'
     lines terminated by '\n'
     ignore 1 rows;

--Marca as fichas que foram editadas(df -> drenagem profunda)
CREATE TABLE ficha_editada_dp(
	codEdit	INT NOT NULL AUTO_INCREMENT,
	codAuto INT NOT NULL,
	sync TINYINT(1),
	edit TINYINT(1), 
	PRIMARY KEY(codEdit),
	FOREIGN KEY(codAuto) REFERENCES drenagem_profunda(codAuto)	
);

--Marca as fichas que foram editadas(ds -> drenagem superficial)
CREATE TABLE ficha_editada_ds(
	codEdit	INT NOT NULL AUTO_INCREMENT,
	codAuto INT NOT NULL,
	sync TINYINT(1),
	edit TINYINT(1), 
	PRIMARY KEY(codEdit),
	FOREIGN KEY(codAuto) REFERENCES drenagem_superficial(codAuto)	
);