
    Tarefas:
        atualizar os index de todas os cruds
        fazer todos os relacionamentos "bidirecionais"
        terminar relacionamento n:n
        terminar relacionamento ternário n:n
        criar checklist de forma mais usável e fazer ele funcionar


    Info API's usadas:
        "laravel/framework": "4.2.*",           -> framework
        "raveren/kint": "v0.9",                 -> debug
        "fzaninotto/faker": "1.5.*@dev",        -> cria valores aleatórios para as seeds
        "barryvdh/laravel-ide-helper": "1.*",   -> ajuda a ide a não se perder
            -> php artisan ide-helper:models
            -> https://github.com/barryvdh/laravel-ide-helper
        "doctrine/dbal": "2.5.*@dev"            -> necessário para o "barryvdh/laravel-ide-helper" funcionar
        "laravelbook/ardent": "2.*"             -> junta os validadores de formulários na model (é muito simples mesmo, daria para fazer mão isto sem problemas) https://github.com/laravelbook/ardent
        [depreciado - vai ser removido] https://github.com/rails/jquery-ujs     -> fazer o ajax de forma mais fácil
        https://github.com/dimsemenov/Magnific-Popup ->

    Possíveis API's futuras:
        mimificar o projeto:
            https://github.com/JeffreyWay/Laravel-Guard
        mimificar o html:
            https://github.com/fitztrev/laravel-html-minify
        dom pdf para laravel:
            https://github.com/barryvdh/laravel-dompdf
        laravel "administrator" (acho que cria os cruds para o admin):
            https://github.com/FrozenNode/Laravel-Administrator
        criar formulários mais fácil (porém fica difícil modificar o estilo):
            https://github.com/Anahkiasen/former
        funções para o blade:
            https://github.com/JeffreyWay/Laravel-Guard
        usuário pronto:
            https://github.com/zizaco/confide
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

    PSR's (PHP STANDARD RULES):
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
        https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md