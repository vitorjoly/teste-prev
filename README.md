## Introducao
    * Utilizacao deve ser realizada via Postman ou Insomnia 

## Rodando projeto via Docker
    * Requisitos do Sistema
        - Docker
        - Docker-compose

    * Passo a passo
        1. Clonar o projeto e acessar a pasta do mesmo:
        git clone https://github.com/vitorjoly/teste-prev.git && cd teste-prev

        2. Dar permissao na storage:
        sudo chmod -R 777 storage

        3. Copiar o env.example para .env:
        cp .env.example .env

        4. Buildar o docker:
        sail up -d

        5. Acessar no navegador:
        http://localhost