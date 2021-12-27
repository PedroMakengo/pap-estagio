-- Administrador geral do sistema (uma determinada escola que possuí o sistema)
CREATE TABLE tb_admin(
  id_admin int(11) primary key auto_increment,
  nome_admin varchar(50),
  email_admin varchar(50),
  senha_admin varchar(50),
  foto_admin varchar(200)
);

-- Toda e qualquer empresa que se inscreve no sistema um o intuito de recrutar jovens de uma escola
CREATE TABLE tb_empresa(
  id_empresa int(11) primary key auto_increment,
  nome_empresa varchar(50),
  email_empresa varchar(50),
  senha_empresa varchar(50),
  nif varchar(50),
  localizacao varchar(50),
  contacto varchar(50),
  data_registro_empresa datetime,
  responsavel_empresa varchar(50)
);

-- Disponibilização das vagas por parte das empresas registradas
CREATE TABLE tb_vaga_estagio (
  id_vaga_estagio int(11) primary key auto_increment,
  id_empresa int(11),
  area_atuacao char(50),
  numero_candidatura int(5),
  data_registro_vaga datetime,
  estado_vaga int(2),
  FOREIGN KEY(id_empresa) REFERENCES tb_empresa(id_empresa)
);

-- Registro dos alunos na plataforma
CREATE TABLE tb_aluno(
  id_aluno int(11) primary key auto_increment,
  nome varchar(50),
  email varchar(50),
  senha varchar(50),
  foto varchar(220),
  sexo varchar(50),
  contacto int(9),
  data_registro_aluno datetime
);

-- Candidatura de um determinado aluno dentro da plataforma
CREATE TABLE tb_candidatura_vaga (
  id_candidatura int(11) primary key auto_increment,
  id_aluno int(11),
  id_vaga int(11),
  FOREIGN KEY (id_aluno) REFERENCES tb_aluno(id_aluno),
  FOREIGN KEY (id_vaga) REFERENCES tb_vaga_estagio (id_vaga)
  data_registro_candidatura datetime,
  estado_candidatura int(2)
);

-- Depois de se candidatar passa a visualizar os assunto da sua empresa
CREATE TABLE tb_relatorio_estagio(
  id_relatorio int(11) primary key auto_increment,
  id_aluno int(11),
  FOREIGN key (id_aluno) REFERENCES tb_aluno(id_aluno),
  arquivo_entrega varchar(220),
  estado_tarefa int(2),
  valor_relatorio int(2),
  data_registro_relatorio datetime
);

-- Emissão de declaração de estágio
CREATE TABLE tb_emissao_declaracao(
  id_declaracao int(11) primary key auto_increment,
  id_aluno int(11),
  id_empresa int(11),
  FOREIGN KEY(id_aluno) REFERENCES tb_aluno(id_aluno),
  FOREIGN KEY(id_empresa) REFERENCES tb_empresa(id_empresa),
  data_emissao datetime,
  estado_emissao int(2)
);



