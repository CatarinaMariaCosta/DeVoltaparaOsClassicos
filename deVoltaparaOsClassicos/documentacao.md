# De volta para os Clássicos 

>*Projeto realizado durante 25/09/26 - 13/10/26* <br>
>*Aluna: Catarina Maria da Costa*<br>
>*Professor: Jorge Carneiro, Luiz Henrique Platini, Carlos Morato*<br>
>*Turma: I1D35*<br>

## *Contextualização*

### 1. Introdução

Com o avanço do streaming e das plataformas digitais, o hábito de alugar filmes em locadoras físicas foi se perdendo ao longo dos anos. Junto com ele, desapareceram também espaços que preservavam a memória do cinema e reuniam pessoas apaixonadas por filmes clássicos, obras que marcaram gerações e que, muitas vezes, não estão disponíveis nos catálogos digitais atuais.

O projeto "De Volta para os Clássicos" nasce dessa realidade. Trata-se de um sistema web para a gestão de uma locadora especializada em filmes antigos, que também comercializa itens colecionáveis relacionados ao universo do cinema, como pôsteres, miniaturas, fitas VHS, DVDs de edição especial e outros objetos de coleção.

### 2. Razão de eu escolher a Locadora

Pequenos comércios que trabalham com locação e venda de itens de coleção costumam controlar suas operações de forma manual, com cadernos, planilhas ou anotações soltas. Esse modelo gera problemas frequentes, como:

- Perda de informações sobre clientes, locações e vendas;<BR>
- Dificuldade em saber quais filmes estão disponíveis ou alugados;<BR>
- Falhas no controle de prazos de devolução;<BR>
- Estoque desatualizado de itens colecionáveis;<BR>
- Ausência de relatórios que auxiliem na tomada de decisões.

### 3. Objetivos
3.1 Objetivo Geral

Desenvolver um sistema web de gerenciamento para uma locadora de filmes antigos e loja de itens colecionáveis, facilitando o controle das operações e melhorando o atendimento aos clientes.

3.2 Objetivos Específicos
- Cadastrar e gerenciar clientes, filmes e itens colecionáveis;
- Registrar locações, devoluções, reservas e vendas;
- Automatizar a atualização do estoque;
- Controlar o acesso ao sistema;
- Gerar relatórios que apoiem a gestão do negócio;
- Garantir a segurança e a proteção dos dados pessoais dos clientes.

### 4. Tecnologias Utilizadas
|Tecnologia|Finalidade|
|----------|----------|
|PHP|Linguagem de programação do back-end|
|Moba/PSQL|Armazenamento dos dados|
|HTML5, CSS|Construção da interface responsiva|
|JavaScript|Interatividade nas telas|
|Visual Studio Code|Ambiente de desenvolvimento|
--------------------------------------------

## *Requisitos do Sistema*
### *Requisitos Funcionais*
|Requisitos|Explicação|
|----------|----------|
|RF01|O sistema deve permitir o cadastro, edição, consulta e exclusão de clientes (nome, e-mail).|
|RF02|O sistema deve permitir login e logout de usuários(funcionários)|
|RF03|O sistema deve permitir o cadastro, edição, consulta e exclusão de filmes (título, ano, preço, descrição, ativo).|
|RF04|O sistema deve permitir o cadastro, edição, consulta e exclusão de itens colecionáveis (título, ano, preço, descrição, ativo).|
|RF05|O sistema deve permitir buscar e filtrar filmes por ID|
|RF06|O sistema deve permitir buscar e filtrar colecionáveis por ID|
|RF07|O sistema deve registrar locações e compras, vinculando cliente, produto, data e horário de retirada |
|RF08|O sistema deve exibir o histórico de locações e compras de cada cliente.|


### *Requisitos Não Funcionais*

|Requisitos|Explicação|
|----------|----------|
|RNF01|O sistema deve ser desenvolvido em PHP (versão 8.0 ou superior), usando o VS Code como ambiente de desenvolvimento.|
|RNF02|Os dados devem ser armazenados em um banco de dados relacional (MySQL/MariaDB).|
|RNF03|As senhas devem ser armazenadas com hash seguro (password_hash()), nunca em texto puro.|
|RNF04|O sistema deve proteger contra SQL Injection, usando prepared statements (PDO).|
|RNF05|O sistema deve proteger contra XSS e CSRF, sanitizando entradas e saídas e usando tokens nos formulários.|
|RNF06|O acesso às funcionalidades deve ser controlado por sessão e nível de permissão de cada perfil.|
|RNF07|A interface deve ser responsiva, adaptando-se a computadores, tablets e celulares (HTML5, CSS3 e Bootstrap, por exemplo).|
|RNF08|A interface deve ser intuitiva e de fácil aprendizado, com identidade visual coerente com o tema retrô/clássico.|
|RNF09|As páginas devem carregar em até 3 segundos em condições normais de uso.|
|RNF10|O sistema deve ser compatível com os principais navegadores (Chrome, Firefox, Edge e Safari).|
|RNF11|Deve ser feito backup periódico do banco de dados para evitar perda de informações.|
|RNF12|O sistema deve ter alta disponibilidade durante o horário de funcionamento da loja.|
|RNF13|O sistema deve tratar erros de forma amigável, exibindo mensagens claras ao usuário e registrando logs internos.|
|RNF14|O sistema deve ser escalável e de fácil manutenção, permitindo incluir novos módulos sem reescrever os existentes, e respeitar a LGPD no tratamento dos dados pessoais.|

## *Organizaão do código*

```texto
deVoltaparaOsClassicos/
├── index.php              *página inicial / ponto de entrada do sistema*
├── documentacao.md        *arquivos de documentação geral do projeto*
├── app/                   *gerenciamento do sistema*
│   ├── clientes.php       *gerenciamento/listagem de clientes*
│   ├── colecao.php        *exibição/cadastro do acervo/coleção*
│   ├── compras.php        *histórico/processamento de pedidos*
│   ├── deleteC.php        *exclusão de produtos(coleção)*
│   ├── deleteM.php        *exclusão de produtos(filmes)*
│   ├── historico.php      *registro de compras dos clientes*
│   ├── movie.php          *exibição/cadastro do acervo/filmes*
│   ├── updateC.php        *atualização/edição de produtos(coleção)*
│   └── updateM.php        *atualização/edição de produtos(filmes)*
├── assets/                *arquivos estáticos como a logotipo*
├── database/              *camada de persistência de dados*
│   └── conexao.php        *script de conexão com o banco de dados*
├── includes/              *componentes reutilizáveis de interface e lógica comum*
│   ├── footer.php         *rodapé compartilhado do site*
│   ├── functions.php      *funções utilitárias e regras globais*
│   └── headerC.php        *cabeçalho personalizado da página inicial*
├── login/                 *controle de autenticação, telas de acesso e segurança*
│   ├── cadastrar.php      *cadastro dos funcionários*
│   ├── login.php          *login dos funcionários já cadastrados*
│   ├── logout.php         *desconecção do funcionário com as propriedades do site*
│   └── verifica_user.php  *verificação se o funcionário ja não existe*
├── style/                 *arquivos de estilização CSS*
└──   └──style.css         *layout das páginas*
```

## *Como entrar no meu projeto*

### 1. Preparar a aplicação

#### Pré-requisitos

- PHP 8 instalado e disponível no `Path` do Windows, com as extensões `PDO` e `pdo_pgsql` habilitadas e suporte a sessões.
- PostgreSQL 18 atualizado, instalado e em execução no servidor Linux, com o comando `psql` disponível no terminal remoto.
- MobaXterm e acesso SSH ao servidor, com permissão para preparar o banco e importar o dump.
- Git, caso o projeto seja obtido por clonagem.
- Navegador web no Windows.



#### 1.1. Obter o projeto

No PowerShell ou terminal PowerShell do VS Code:

```powershell
git clone https://github.com/CatarinaMariaCosta/DeVoltaParaOsClassicos.git locadora-projeto
Set-Location .\locadora-projeto\deVoltaparaOsClassicos
```

A clonagem exige acesso à conta/repositório. Se já possui os arquivos, abra no VS Code a pasta que contém `index.php`.

Confira a presença de `db/conexao.php` e `db/locadora_completa.sql`. Caso não existam, obtenha o dump do banco e a conexão PDO antes de prosseguir.

#### 1.2. Conferir os caminhos da conexão

A pasta atual do banco é `database/`.

No código atual, estes quatro arquivos ainda apontam para `../database/conexao.php`:

- `includes/functions.php`;
- `app/clientes.php`;
- `app/compras.php`;
- `app/historico.php`.

Substitua a instrução de conexão de cada um por:

```php
require_once __DIR__ . '/../db/conexao.php';
```

Esse ajuste é necessário também para o login, pois ele carrega `functions.php`. Faça esses ajustes antes de iniciar a aplicação.

### 2. Configurar banco

Execute os comandos abaixo. Para a restauração, o arquivo `locadora_completa.sql`.

#### 2.1. Criar o usuário e o banco

No terminal digite:

```bash
sudo -u postgres psql -p 5432
```

Dentro do `psql`, para criar o usuário e a base:

```sql
CREATE USER nome_do_usuario WITH PASSWORD 'senha_do_usuario';
CREATE DATABASE nome_do_banco OWNER nome_do_usuario;
\q
```

#### 2.2. Restaurar o dump

No terminal remoto do MobaXterm, importe o arquivo em uma base vazia:

```bash
psql -U nome_do_usuario -d banco_destino < locadora_completa.sql
psql -h localhost -U classico -d locadora
```

O acesso da aplicação utilizará um túnel SSH até o PostgreSQL já configurado no servidor.

### 3. Conectar ao banco e abrir no localhost

#### 3.1. Configurar o arquivo de conexão

No VS Code, abra `db/conexao.php`. O arquivo atual possui credenciais fixas, para ultilizar a configuração do seu banco você deve alterar as seguintes partes:

```php
<?php
$host = "IP_DO_BANCO/SERVIDOR";
$dbname = "NOME_DO_BANCO";
$user = "NOME_DO_USUARIO";
$password = "SENHA_DO_USUARIO";
```


#### 3.2. Iniciar o PHP pelo PowerShell

No VS Code, abra um terminal **PowerShell** na pasta que contém `index.php`. Execute:

```powershell
php -S localhost:8000
```

Abra [http://localhost:8000/login/login.php] no navegador.

#### 3.3. Criar o primeiro acesso e conferir

O dump está vazio e não inclui funcionário inicial:

1. Abra [http://localhost:8000/login/cadastrar.php] e crie uma conta.
2. Entre em `/login/login.php` com o e-mail e a senha cadastrados.
3. Acesse `/app/clientes.php` para cadastrar um cliente.
4. Em `/app/movie.php`, preencha nome, preço, descrição e ativo para cadastrar um filme.
5. Em `/app/compras.php`, escolha o cliente e informe produto e valor.
6. Confira o registro em `/app/historico.php`.

A senha do funcionário aceita até 16 caracteres no esquema atual e é armazenada em texto puro. Use somente credenciais de teste enquanto essa pendência existir.

Para encerrar, pressione `Ctrl+C` no terminal do PHP e depois na aba do túnel. Os dados permanecem salvos no PostgreSQL do servidor.

#### 3.4. Problemas comuns

| Problema | O que conferir |
|---|---|
| `php` não é reconhecido | PHP disponível no `Path` do Windows, conforme os pré-requisitos. |
| `could not find driver` | Extensão `pdo_pgsql` habilitada na instalação PHP utilizada, conforme os pré-requisitos. |
| Conexão recusada | Túnel aberto no terminal local do PostgreSQL pode estar na porta errada . |
| Falha de autenticação | Senha de usuario, nome do banco ou senha devem estar errados |
| Arquivo de conexão não encontrado | Pasta `db/` e os quatro includes citados na seção de preparação. |
| `DB_PASSWORD` ausente | Variável definida no mesmo terminal que executa o servidor PHP. |

Esses passos são um roteiro de verificação; o funcionamento completo ainda deve ser conferido no ambiente real.