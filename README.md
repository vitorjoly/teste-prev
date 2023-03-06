## Introducao
    * Utilizacao deve ser realizada via Postman ou Insomnia 

## Rodando projeto via Docker
    * Requisitos do Sistema
        - Docker
        - Docker-compose

    * As rotas devem ser utilizadas apos criar o usuario com o seeder
    * Na rota /login sera possivel pegar o token do usuario para usar nas outras rotas

    * Passo a passo
        1. Clonar o projeto e acessar a pasta do mesmo:
        git clone https://github.com/vitorjoly/teste-prev.git && cd teste-prev

        2. Instalar as bibliotecas PHP com 'composer install'

        3. Instalar as bibliotecas JavaScript com 'npm install'

        4. Compilar os arquivos js e css com 'npm run dev'

        5. Dar permissao na storage:
        sudo chmod -R 777 storage

        6. Copiar o env.example para .env:
        cp .env.example .env
        
        7. Buildar o docker:
        sail up -d

        8. Rodar as migrations do banco:
        sail artisan migrate

        9. Crie o usuario admin atraves do comando 'sail artisan db:seed', o email e 'admin@admin.com' e a senha 'admin123';

        10. Acessar no navegador:
        http://localhost