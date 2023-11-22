CREATE TABLE `criterios` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(255),
    `descricao` varchar(255),
    `escala` varchar(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `avaliacoes` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(255),
    `descricao` varchar(255),
    `data` date,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `avaliacoes_criterios` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `id_avaliacao` integer,
    `id_criterio` integer,
    `peso_criterio` integer,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `equipes` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `projetos` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(255),
    `id_equipe` integer,
    `id_avaliacao` integer,
    `id_nota` integer,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `alunos` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(255),
    `matricula` varchar(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `alunos_equipes` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `id_equipe` integer,
    `id_aluno` integer,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `avaliadores` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `notas` (
    `id` integer PRIMARY KEY AUTO_INCREMENT,
    `id_avaliador` integer,
    `id_criterio` integer,
    `id_projeto` integer,
    `nota` integer,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE
    `avaliacoes_criterios`
ADD
    FOREIGN KEY (`id_avaliacao`) REFERENCES `avaliacoes` (`id`);

ALTER TABLE
    `avaliacoes_criterios`
ADD
    FOREIGN KEY (`id_criterio`) REFERENCES `criterios` (`id`);

ALTER TABLE
    `projetos`
ADD
    FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id`);

ALTER TABLE
    `projetos`
ADD
    FOREIGN KEY (`id_avaliacao`) REFERENCES `avaliacoes` (`id`);

ALTER TABLE
    `alunos_equipes`
ADD
    FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id`);

ALTER TABLE
    `alunos_equipes`
ADD
    FOREIGN KEY (`id_equipe`) REFERENCES `equipes` (`id`);

ALTER TABLE
    `notas`
ADD
    FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id`);

ALTER TABLE
    `notas`
ADD
    FOREIGN KEY (`id_avaliador`) REFERENCES `avaliadores` (`id`);

ALTER TABLE
    `notas`
ADD
    FOREIGN KEY (`id_criterio`) REFERENCES `criterios` (`id`);