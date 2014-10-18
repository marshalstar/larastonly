
    Tarefas:
        fazer peso das questões
        botão de cadastre-se no login
        login e login com facebook devem estar juntos
        ajuda do que é especialidade
        usar asterísco
        criar conta com nome, email e senha apenas
        trocar retrato por imagem
        arrumar redirect
        nos botões de crud, trocar "novo blablabla" por "finalizar"
        trocar "Resetar" por "Limpar"
        nos label's, apenas a primeira letra deve ser maiúscula
        trocar "Biografia" por "Sobre você"
        diminuir label nos formulários pela metade (de 15, mudar para 7 ou 8)
        email: nome da mensagem deve começar com "Listonly"
        email: fazer ser oo mais clear possível
        sair é última opção
        agrupar funcionalidades por tipo
        links rápidos (criar checklist, responder checklist, pesquisar, [editar perfil, senha, sair])
        copiar forms do google
        fazer opções no título e checklist
        fazer opção na questão
        [{Yuri: local e arrumar graphics (where) },
        {Juan: arrumar criação checklist e respondessação},
        {Gorges: fazer a pagina home ficar bonita e fazer a navegação entre paginas fazer sentido e funcionar}]


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
        dom pdf para laravel:
            https://github.com/barryvdh/laravel-dompdf
        laravel "administrator" (acho que cria os cruds para o admin):
            https://github.com/FrozenNode/Laravel-Administrator
        funções para o blade:
            https://github.com/JeffreyWay/Laravel-Guard
        front-end e middle-end mais fáceis:
            http://octobercms.com/features
            https://github.com/octobercms/october
        alert estiloso:
            http://github.hubspot.com/messenger/docs/welcome/
        tabelas por ajax e com paginação e busca, integradas com o bootstrap e jquery e acessível:
            http://www.jquery-bootgrid.com/Examples#data-api

        phpdocumentor/reflection-docblock suggests installing dflydev/markdown (1.0.*)
            (?)
        phpdocumentor/reflection-docblock suggests installing erusev/parsedown (~0.7)
            (?)
        barryvdh/laravel-ide-helper suggests installing doctrine/dbal (Load information from the database about models for phpdocs (~2.3))
            (?)
        https://github.com/patricktalmadge/bootstrapper
            (?)

    PSR's (PHP STANDARD RULES):
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md

    util:
        atualizar o autoload:
            php artisan dump-autoload
        ajudar a ide a não se perder
            php artisan ide-helper:models