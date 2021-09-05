CREATE TABLE tb_admin(
  id_admin int(11) primary key auto_increment,
  nome varchar(50),
  email varchar(50),
  senha varchar(50)
);

CREATE TABLE tb_empresa(
  id_empresa int(11) primary key auto_increment,
  nome_empresa varchar(50),
  email_empresa varchar(50),
  senha_empresa varchar(50),
  nif varchar(50),
  localizacao varchar(50),
  contacto varchar(50),
  data_created datetime
);

CREATE TABLE tb_vaga_estagio(
  id_vaga int(11) primary key auto_increment,
  id_empresa int(11),
  FOREIGN KEY (id_empresa) REFERENCES tb_empresa(id_empresa)
  area varchar(50),
  num_vaga int(5),
  num_resto int(5),
  foto varchar(220)
  data_created_vaga datetime,
);

CREATE TABLE tb_aluno_estagio(
  id_aluno int(11) primary key auto_increment,
  nome varchar(50),
  email varchar(50),
  senha varchar(50),
  foto varchar(220),
  sexo varchar(50),
  contacto int(9),
  data_created_aluno datetime
);

CREATE TABLE tb_candidatura_vaga (
  id_candidatura int(11) primary key auto_increment,
  id_aluno int(11),
  id_vaga int(11),

  FOREIGN KEY (id_aluno) REFERENCES tb_aluno_estagio(id_aluno),
  FOREIGN KEY (id_vaga) REFERENCES tb_vaga_estagio (id_vaga)

  data_created_candidatura datetime
)

CREATE TABLE tb_tarefa(
  id_tarefa int(11) primary key auto_increment,
  id_aluno int(11),
  FOREIGN key (id_aluno) REFERENCES tb_aluno_estagio(id_aluno),
  nome_tarefa varchar(50),
  descricao text,

  arquivo_entrega varchar(220),
  arquivo_resolvido varchar(220),

  estado_tarefa int(2)
  dateEntrega  date,
  dateConclusao date,

);




