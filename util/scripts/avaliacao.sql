CREATE TABLE avaliacao (
    idAvaliacao int not null auto_increment,
    nomeEquipe varchar(255),
    nomeProjeto varchar(255),
    titulo int,
    viabilidade int,
    replicabilidade int,
    inovacao int,
    apresentacao int,
    exibicao int,
    observacao varchar(255),
    notaFinal int,
    PRIMARY KEY (idAvaliacao)

);

