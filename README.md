# SimpleStock 🧾

**SimpleStock** é um projeto acadêmico desenvolvido para apoiar o ensino de **PHP** com **Programação Orientada a Objetos (POO)** no **4º período de 2025 do curso de Análise e Desenvolvimento de Sistemas** da [FASM - Faculdade Santa Marcelina Muriaé](https://www.santamarcelina.edu.br/faculdade/muriae/).

O sistema tem como objetivo apresentar, de forma prática, os conceitos fundamentais de POO aplicados no desenvolvimento de um **controle de estoque simples** com autenticação e painel administrativo.

---

## 📚 Objetivos Pedagógicos

- Introduzir os conceitos de Programação Orientada a Objetos em PHP.  
- Demonstrar boas práticas de organização de código e estrutura de diretórios.  
- Desenvolver um CRUD completo com PHP, MySQL e PDO.  
- Ensinar a criação de autenticação e controle de sessão.  
- Aplicar separação entre camadas (Modelo, Visão e Controle - MVC simplificado).

---

## 🧰 Tecnologias Utilizadas

- [PHP 8+](https://www.php.net/)  
- [MySQL](https://www.mysql.com/)  
- [PDO](https://www.php.net/manual/pt_BR/book.pdo.php)  
- HTML5 / CSS3 / Bootstrap  
- JavaScript (básico para interações)  

---

## 📂 Estrutura do Projeto

```
simplestock/
├── app/
│   ├── config/          # Configuração de banco de dados e constantes
│   ├── controller/      # Controladores da aplicação (POO)
│   ├── helper/          # Funções auxiliares
│   ├── library/         # Classes bases (POO)
│   ├── model/           # Classes de modelo (POO)
│   └── view/            # Páginas e templates
│       ├── admin/       # Views da área administrativa
│       └── comuns/      # Views comuns a aplicação
├── assets/
│   └── css/             # Arquivos de estilo
├── sql/
│   └── simplestock.sql  # Script para criação do banco de dados
├── .htaccess
├── index.php        # Ponto de entrada do sistema
└── README.md
```

---

## ⚙️ Como Instalar e Executar

1. **Clone o repositório**  
   ```bash
   git clone https://github.com/aldecirfonseca/simplestock.git
   ```

2. **Configure o ambiente**  
   - Coloque o projeto dentro do diretório do seu servidor web (ex: `htdocs` ou `www`).
   - Configure o `app/config/config.php` com seu host e os dados do seu banco.

3. **Crie o banco de dados**  
   - Importe o arquivo `sql/simplestock.sql` no seu MySQL.

4. **Acesse o sistema**  
   - Abra no navegador: [http://localhost/simplestock](http://localhost/simplestock)  
   - Faça login com as credenciais padrão (definidas no script SQL).

---

## 👨‍🏫 Público-alvo

- Alunos do 4º período de 2025 do curso de Análise e Desenvolvimento de Sistemas.  
- Pessoas que desejam aprender **PHP com POO** na prática, aplicando conceitos fundamentais em um projeto funcional.

---

## 🧑‍💻 Conceitos Aplicados

- Classes, objetos e encapsulamento  
- Herança e reutilização de código  
- Conexão com banco de dados via PDO  
- Autenticação e controle de sessão  
- CRUD com MVC simplificado  
- Boas práticas de organização e versionamento

---

## 📜 Licença

Este projeto é de uso **educacional**, podendo ser reutilizado, adaptado e distribuído livremente para fins acadêmicos.

---

## ✨ Autor

Desenvolvido por [Aldecir Fonseca](https://github.com/aldecirfonseca)  
Coordenador/Professor do curso de ADS — [FASM - Faculdade Santa Marcelina Muriaé](https://www.santamarcelina.edu.br/faculdade/muriae/)
