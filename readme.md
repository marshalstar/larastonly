    _________ _______  _______  _______  _______  _______  _______
    \__   __/(  ___  )(  ____ )(  ____ \(  ____ \(  ___  )(  ____ \
       ) (   | (   ) || (    )|| (    \/| (    \/| (   ) || (    \/ _
       | |   | (___) || (____)|| (__    | (__    | (___) || (_____ (_)
       | |   |  ___  ||     __)|  __)   |  __)   |  ___  |(_____  )
       | |   | (   ) || (\ (   | (      | (      | (   ) |      ) | _
       | |   | )   ( || ) \ \__| (____/\| )      | )   ( |/\____) |(_)
       )_(   |/     \||/   \__/(_______/|/       |/     \|\_______)

        OBRIGATÓRIAS:
        ** revisar T0D0's e fazer algo com eles; xingar o Yuri quando possível
        ** fazer negativo (alto contraste)
        ** fazer aumentar/diminuir letra
        ** arrumar a tela de resposta de um usuario
        * revisar cruds
        * arrumar apresentação das ultimas avaliações
        **** tornar o site AAA no WCAG

        MARCIA (OBRIGATÓRIO):
        ? barra de acessibilidade
        ? nao mostrar "+ checklist" se nao tiver logado
        ? login // crie sua conta // login via facebook
        ? mudar "resetar" para "limpar", e tirar se desnecessário
        ? trocar ícone de criar conta (o checkbox confunde)
        ? tirar ícone de esqueci minha senha
        ? arrumar tela do admin
        ? criar usuário, o textfield está com estilo errado
        ? nao pôr url da imagem se não for upar imagem
        ? mudar mensagem de erro para português
        ? mudar "trocar senha" para "alterar senha"
        ? arrumar email que o seeder gera
        ? "deletar nao existe. é excluir"
        ? ícone de editar é lápis
        ? mensagem de deletar deve ter "sim" (em vermelho à esquerda) e "não" (à direita e com foco)
        ? comentario para resposta em questao
        ? texto de ajuda para questao
        ? alternativa "outro" em alternativas
        ? mudar nome de radio para outro nome

        FORTEMENTE RECOMENDADAS:
        + adicionar porcentagem na tabela na tela de criar checklist
        + radio apenas uma resposta por questao
        + revisar validacao de email
        + revisar validacoes do sistema
        + revisar mensagens de erro nos ajax's

        MEDIAMENTE RECOMENDADAS:
        === corrigir footer quando a página não tem nenhum conteúdo
        === corrigir css da tabela do usuário
        deixar janela de gráficos mais usável {
            === alternar entre gráficos de colunas e pizza
            === gerar tabela dos dados mais respondidos nas perguntas
        }
        ===== tornar o site AAA no W3C
        === adicionar index em titles e questions, e fazer eles funcionarem no criar checklist

    ################################################################################################################################
    ################################################################################################################################
    ################################################################################################################################


    Info API's usadas:
        "laravel/framework": "4.2.*",           -> framework
        "raveren/kint": "v0.9",                 -> debug
        "fzaninotto/faker": "1.5.*@dev",        -> cria valores aleatórios para as seeds
        "barryvdh/laravel-ide-helper": "1.*",   -> ajuda a ide a não se perder
                                                -> https://github.com/barryvdh/laravel-ide-helper
        "doctrine/dbal": "2.5.*@dev"            -> necessário para o "barryvdh/laravel-ide-helper" funcionar
        "laravelbook/ardent": "2.*"             -> junta os validadores de formulários na model (é muito simples mesmo, daria para fazer mão isto sem problemas) https://github.com/laravelbook/ardent
        https://github.com/rails/jquery-ujs     -> [depreciado - vai ser removido]
                                                -> fazer o ajax de forma mais fácil
        https://github.com/dimsemenov/Magnific-Popup
                                                -> serve para fazer modais de alto desempenho

    Possíveis API's futuras:
        mimificar o projeto:
            https://github.com/JeffreyWay/Laravel-Guard
        mimificar o html:
            https://github.com/fitztrev/laravel-html-minify
        laravel "administrator" (acho que cria os cruds para o admin):
            https://github.com/FrozenNode/Laravel-Administrator
        funções para o blade:
            https://github.com/JeffreyWay/Laravel-Guard
        front-end e middle-end mais fáceis:
            http://octobercms.com/features
            https://github.com/octobercms/october
        alert estiloso:
            http://github.hubspot.com/messenger/docs/welcome/

        phpdocumentor/reflection-docblock suggests installing dflydev/markdown (1.0.*)
            (?)
        phpdocumentor/reflection-docblock suggests installing erusev/parsedown (~0.7)
            (?)
        barryvdh/laravel-ide-helper suggests installing doctrine/dbal (Load information from the database about models for phpdocs (~2.3))
            (?)
        https://github.com/patricktalmadge/bootstrapper
            (?)
        "super-validador" de formulários
            https://github.com/nghuuphuoc/bootstrapvalidator/

    PSR's (PHP STANDARD RULES):
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md

Copyright (C) 1998-2012 Free Software Foundation, Inc.

Permission is granted to copy, distribute and/or modify this document
under the terms of the GNU Free Documentation License, Version 1.3 or
any later version published by the Free Software Foundation; with no
Invariant Sections, with no Front-Cover Texts, and with no Back-Cover
Texts.  A copy of the license is included in the "GNU Free
Documentation License" file as part of this distribution.