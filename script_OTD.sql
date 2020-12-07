--Cria banco de dados MySQL
CREATE DATABASE dbotd;

--Define condificação
ALTER DATABASE dbotd CHARSET = UTF8 COLLATE = utf8_general_ci;

--Tabela de fichas de drenagem profunda(Cada linha corresponde a uma ficha)
CREATE TABLE drenagem_profunda(
	codAuto INT NOT NULL AUTO_INCREMENT,
	identificacao VARCHAR(30),
	extensao VARCHAR(10),
	kmInicial VARCHAR(15),
	kmFinal VARCHAR(15),
	tipoBueiro VARCHAR(15),
	forma VARCHAR(15),
	rodovia VARCHAR(10),
	dimensoesM VARCHAR(15),
	ladoM VARCHAR(15),
	dispositivoEntradaM  VARCHAR(30),
	materialM VARCHAR(15),
	EstadoConservacaoM VARCHAR(15),
	latitudeM VARCHAR(30),
	longitudeM VARCHAR(30),
	dimensoesJ VARCHAR(15),
	ladoJ VARCHAR(15),
	estruturaSaidaJ  VARCHAR(30),
	materialJ VARCHAR(15),
	EstadoConservacaoJ VARCHAR(15),
	latitudeJ VARCHAR(30),
	longitudeJ VARCHAR(30),
	okM VARCHAR(5),
	limpezaM VARCHAR(5),
	assoreadoM VARCHAR(5),
	afogadoM VARCHAR(5),
	testaAlaDanificadaM VARCHAR(5),
	tubulacaoDanificadaM VARCHAR(5),
	caixaDanificadaM VARCHAR(5),
	erosaoM VARCHAR(5),
	fissuraTrincaM VARCHAR(5),
	tampaDanificadaInexM VARCHAR(5),
	okJ VARCHAR(5),
	limpezaJ VARCHAR(5),
	assoreadoJ VARCHAR(5),
	afogadoJ VARCHAR(5),
	testaAlaDanificadaJ VARCHAR(5),
	tubulacaoDanificadaJ VARCHAR(5),
	caixaDanificadaJ VARCHAR(5),
	erosaoJ VARCHAR(5),
	fissuraTrincaJ VARCHAR(5),
	tampaDanificadaInexJ VARCHAR(5),
	data VARCHAR(10),
	foto1M VARCHAR(75),
	foto2M VARCHAR(75),
	foto1J VARCHAR(75),
	foto2J VARCHAR(75),
	observacaoMontante VARCHAR(150),
	observacaoJusante VARCHAR(150),
	sync TINYINT(1),
	edit TINYINT(1), 
	editM TINYINT(1), 
	editJ TINYINT(1), 
	PRIMARY KEY(codAuto)
);--DEve gerar um novo csv com as coluns editM e editJ

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
load data local infile '/var/www/html/webappotd/OAC.csv'
     into table drenagem_profunda
     fields terminated by ';'
     enclosed by '"'
     lines terminated by '\n'
     ignore 2 rows;

--Comando para importar o xls
load data local infile '/var/www/html/webappotd/Eco101_DrenagemSuperficial_Total.csv'
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