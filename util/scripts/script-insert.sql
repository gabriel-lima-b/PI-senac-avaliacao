INSERT INTO
    criterios (
        nome,
        descricao,
        escala
    )
VALUES
    (
        'titulo',
        'O título contempla a proposta do projeto.',
        '0 a 1: O título não contempla a proposta do projeto.
</br>
2 a 4: O título contempla parcialmente a proposta
do projeto.
</br>
5 a 7: O título contempla a proposta do projeto, porém
não é objetivo.
</br>
8 a 10: O título contempla a proposta do projeto de
forma objetiva.'
    ),
    (
        'Viabilidade
da Solução',
        'O projeto apresenta viabilidade para a necessidade
apresentada pela empresa.',
        '0 a 1: O projeto não apresenta viabilidade para a
necessidade da empresa.
</br>
2 a 4: O projeto não apresenta solução para uma
necessidade da empresa, no entanto gera impactos
socioambientais positivos na comunidade local.
</br>
5 a 7: O projeto apresenta solução parcial para a
necessidade da empresa.
</br>
8 a 10: O projeto apresenta solução eficaz para uma
necessidade da empresa.'
    ),
    (
        'Replicabilidade
(Escalabilidade)',
        'Capacidade do projeto de ser replicado em diferentes

áreas/regiões.',
        '0 a 1: Não escalável ou não apresentou.
</br>
2 a 4: Escalável com custos altos.
</br>
5 a 7: Facilidade de escalonamento.
</br>
8 a 10: Alta Escalabilidade, possível ser replicado em
diferentes áreas e /ou regiões.'
    ),
    (
        'Inovação',
        '"Inovação é algo diferente que exerce impacto", ou seja,
o projeto deve consistir em algo diferente/novo, ainda
não incorporado aos processos gerenciais, produtos ou
serviços, e que gerará resultados para os clientes, para a
organização ou para as partes interessadas.',
        '0 a 1: Produto, processo ou serviço já existente, ou
seja, não é algo diferente ou não apresentou.
</br>
2 a 4: Novo produto, processo ou serviço, mas não
apresenta possibilidade de gerar resultado.
</br>
5 a 7: Produto, processo ou serviço já existente, porém o
projeto apresenta novas aplicabilidades, características
etc que possibilitaram a geração de resultados.
</br>
8 a 10: Alto grau de ineditismo. Novo produto, processo
ou serviço que causa impacto e possibilitará a geração de
resultados para a (s) empresa (s).'
    ),
    (
        'Apresentação
do Projeto -
Pitch',
        'Apresenta dentro do tempo estipulado e oferece uma
visão geral do projeto, abordando (a) necessidade, (b)
solução encontrada, (c) e inovação do projeto.',
        '0 a 1: Não atendeu ao tempo estipulado1 e/ ou não foi
apresentada por um estudante da equipe inscrita.
</br>
2 a 4: A apresentação não contemplou os três elementos
do projeto (necessidade, solução encontrada, e inovação
do projeto).
</br>
5 a 7: A apresentação contemplou os três elementos (a)
necessidade, (b) solução encontrada, (c) e inovação do
projeto), mas não permitiu uma visão geral do projeto.
</br>
8 a 10: Apresentação dentro do tempo estipulado,
apresentou uma visão geral do projeto e abordando (a)
necessidade, (b) solução encontrada, (c) e inovação do
projeto.'
    ),
    (
        'Exibição
visual e
apresentação
oral',
        'A exibição visual deverá ser clara e objetiva, salientando os
dados mais importantes para possibilitar o perfeito
entendimento do projeto, utilizando preferencialmente
recursos de informática.',
        '0 a 1: Não atendeu ao tempo estipulado1 e/ ou não foi
apresentada por um estudante da equipe inscrita.
</br>
2 a 4: A apresentação não condiz com a apresentação do
pitch.
</br>
5 a 7: A apresentação atendeu ao tempo estipulado para
o pitch, porém não apresentou os dados para
entendimento completo do projeto.
</br>
8 a 10: Domínio do conteúdo, clareza e desenvoltura na
exposição, compreensão do tema, Ilustrações, técnicas e
complementos utilizados.'
    );

INSERT INTO
    avaliacoes (nome, descricao, data)
VALUES
    (
        'HACKA TECH - SENAC TECH',
        'a hack tech do senac',
        '2023-11-01'
    );

insert into
    avaliacoes_criterios (id_avaliacao, id_criterio, peso_criterio)
VALUES
    (
        (
            select
                id
            from
                avaliacoes
            where
                nome = 'HACKA TECH - SENAC TECH'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Titulo'
        ),
        10
    ),
    (
        (
            select
                id
            from
                avaliacoes
            where
                nome = 'HACKA TECH - SENAC TECH'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Viabilidade
da Solução'
        ),
        20
    ),
    (
        (
            select
                id
            from
                avaliacoes
            where
                nome = 'HACKA TECH - SENAC TECH'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Replicabilidade
(Escalabilidade)'
        ),
        20
    ),
    (
        (
            select
                id
            from
                avaliacoes
            where
                nome = 'HACKA TECH - SENAC TECH'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Inovação'
        ),
        20
    ),
    (
        (
            select
                id
            from
                avaliacoes
            where
                nome = 'HACKA TECH - SENAC TECH'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Apresentação
do Projeto -
Pitch'
        ),
        20
    ),
    (
        (
            select
                id
            from
                avaliacoes
            where
                nome = 'HACKA TECH - SENAC TECH'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Exibição
visual e
apresentação
oral'
        ),
        10
    );

--  ################################   INSERTS DOS ALUNOS    ################################
INSERT INTO
    ALUNOS (nome, matricula)
VALUES
    ('Guilherme', '123456A'),
    ('Maria', '123456B'),
    ('Gabriel', '123456C'),
    ('Lucas', '123456D');

INSERT INTO
    ALUNOS (nome, matricula)
VALUES
    ('Henrique', '123456E'),
    ('Sarah', '123456F'),
    ('Simone', '123456G'),
    ('Yago', '123456H');

--  ################################   INSERTS DAS EQUIPES   ################################
INSERT INTO
    EQUIPES (NOME)
VALUES
    ('Technautas'),
    ('Segura o Tech');

--  ################################   INSERTS DAS EQUIPES - ALUNOS   ################################
INSERT INTO
    ALUNOS_EQUIPES (ID_EQUIPE, ID_ALUNO)
VALUES
    (
        (
            SELECT
                ID
            FROM
                EQUIPES
            WHERE
                NOME = 'Technautas'
        ),
        (
            SELECT
                ID
            FROM
                ALUNOS
            WHERE
                NOME = 'Guilherme'
        )
    ),
    (
        (
            SELECT
                ID
            FROM
                EQUIPES
            WHERE
                NOME = 'Technautas'
        ),
        (
            SELECT
                ID
            FROM
                ALUNOS
            WHERE
                NOME = 'Maria'
        )
    ),
    (
        (
            SELECT
                ID
            FROM
                EQUIPES
            WHERE
                NOME = 'Technautas'
        ),
        (
            SELECT
                ID
            FROM
                ALUNOS
            WHERE
                NOME = 'Gabriel'
        )
    ),
    (
        (
            SELECT
                ID
            FROM
                EQUIPES
            WHERE
                NOME = 'Technautas'
        ),
        (
            SELECT
                ID
            FROM
                ALUNOS
            WHERE
                NOME = 'Lucas'
        )
    ),
    (
        (
            SELECT
                ID
            FROM
                EQUIPES
            WHERE
                NOME = 'Segura o Tech'
        ),
        (
            SELECT
                ID
            FROM
                ALUNOS
            WHERE
                NOME = 'Henrique'
        )
    ),
    (
        (
            SELECT
                ID
            FROM
                EQUIPES
            WHERE
                NOME = 'Segura o Tech'
        ),
        (
            SELECT
                ID
            FROM
                ALUNOS
            WHERE
                NOME = 'Sarah'
        )
    ),
    (
        (
            SELECT
                ID
            FROM
                EQUIPES
            WHERE
                NOME = 'Segura o Tech'
        ),
        (
            SELECT
                ID
            FROM
                ALUNOS
            WHERE
                NOME = 'Simone'
        )
    ),
    (
        (
            SELECT
                ID
            FROM
                EQUIPES
            WHERE
                NOME = 'Segura o Tech'
        ),
        (
            SELECT
                ID
            FROM
                ALUNOS
            WHERE
                NOME = 'Yago'
        )
    );

--  ################################   INSERTS DOS AVALIADORES   ################################
INSERT INTO
    AVALIADORES (NOME)
VALUES
    ('Prof. Girafales'),
    ('Prof. Abobrinha');

--  ################################   INSERTS DAS NOTAS   ################################
INSERT INTO
    NOTAS (ID_AVALIADOR, ID_CRITERIO, NOTA)
VALUES
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Abobrinha'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Titulo'
        ),
        10
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Abobrinha'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Viabilidade
da Solução'
        ),
        18
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Abobrinha'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Replicabilidade
(Escalabilidade)'
        ),
        19
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Abobrinha'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Inovação'
        ),
        20
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Abobrinha'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Apresentação
do Projeto -
Pitch'
        ),
        18
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Abobrinha'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Exibição
visual e
apresentação
oral'
        ),
        10
    );

INSERT INTO
    NOTAS (ID_AVALIADOR, ID_CRITERIO, NOTA)
VALUES
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Girafales'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Titulo'
        ),
        9
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Girafales'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Viabilidade
da Solução'
        ),
        19
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Girafales'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Replicabilidade
(Escalabilidade)'
        ),
        20
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Girafales'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Inovação'
        ),
        15
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Girafales'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Apresentação
do Projeto -
Pitch'
        ),
        18
    ),
    (
        (
            select
                id
            from
                AVALIADORES
            where
                nome = 'Prof. Girafales'
        ),
        (
            select
                id
            from
                criterios
            where
                nome = 'Exibição
visual e
apresentação
oral'
        ),
        10
    );