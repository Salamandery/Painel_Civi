# 🖥️ Painel Civi

<p align="center">
  <img src="https://img.shields.io/badge/PHP-7.0+-777BB4?style=for-the-badge&logo=php"/>
  <img src="https://img.shields.io/badge/PostgreSQL-9.6+-336791?style=for-the-badge&logo=postgresql"/>
  <img src="https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black"/>
  <img src="https://img.shields.io/badge/Bootstrap-4.0+-563D7C?style=for-the-badge&logo=bootstrap"/>
  <img src="https://img.shields.io/badge/Feito%20com-Love-ff69b4?style=for-the-badge"/>
</p>

<div align="center">
  <b>🇧🇷 Português | <a href="#english-version">🇺🇸 English below</a></b>
</div>

---

## 📑 Sumário | Table of Contents
- [Sobre o Projeto | About](#sobre-o-projeto--about)
- [Tecnologias | Technologies](#tecnologias--technologies)
- [Estrutura | Structure](#estrutura--structure)
- [Instalação e Execução | Setup & Run](#instalação-e-execução--setup--run)
- [Autor | Author](#autor--author)

---

## Sobre o Projeto | About

**PT-BR:**
> O Painel Civi é um sistema web para exibição de informações dinâmicas em painéis digitais, como horários de atividades, mensagens, previsões do tempo e redes sociais. Possui interface administrativa para cadastro e atualização dos dados exibidos. Utiliza PHP, PostgreSQL, JavaScript e Bootstrap, com integração à API Climatempo para exibir informações meteorológicas em tempo real.

**EN:**
> Painel Civi is a web system for displaying dynamic information on digital panels, such as activity schedules, messages, weather forecasts, and social networks. It features an admin interface for registering and updating displayed data. Built with PHP, PostgreSQL, JavaScript, and Bootstrap, it integrates with the Climatempo API to show real-time weather information.

---

## 🚀 Tecnologias | Technologies

**PT-BR:**
- **PHP 7+**: Backend para lógica de negócio e integração com banco de dados.
- **PostgreSQL 9.6+**: Banco de dados relacional para armazenamento das informações.
- **JavaScript (ES6+)**: Scripts para interatividade e atualização dinâmica dos painéis.
- **Bootstrap 4+**: Framework CSS para layout responsivo e componentes visuais.
- **Climatempo API**: Integração para exibir clima e previsão do tempo.

**EN:**
- **PHP 7+**: Backend for business logic and database integration.
- **PostgreSQL 9.6+**: Relational database for information storage.
- **JavaScript (ES6+)**: Scripts for interactivity and dynamic panel updates.
- **Bootstrap 4+**: CSS framework for responsive layout and UI components.
- **Climatempo API**: Integration to display weather and forecast.

---

## 🗂️ Estrutura | Structure
```
Painel_Civi/
├── prd/                # Painel principal (produção)
│   ├── Gerenciador.php # Interface administrativa
│   ├── Painel.php      # Painel de exibição
│   ├── index.php       # Redirecionamento
│   └── resources/      # Recursos (PHP, JS, CSS, imagens)
├── sml/                # Painel secundário (exemplo)
│   ├── Gerenciador.php
│   ├── Painel.php
│   ├── index.php
│   └── resources/
├── basedb.backup       # Backup do banco de dados base
├── datadb.backup       # Backup do banco de dados de dados
├── BASE.docx           # Documentação base
└── README.md
```

---

## ⚙️ Instalação e Execução | Setup & Run

**PT-BR:**
1. **Pré-requisitos:** PHP 7+, PostgreSQL 9.6+, servidor web (ex: Apache/Nginx)
2. **Restaurar o banco de dados:**
   - Utilize os arquivos `basedb.backup` e `datadb.backup` para restaurar as tabelas e dados no PostgreSQL.
3. **Configurar acesso ao banco:**
   - Ajuste as credenciais em `resources/dbconnect.php` se necessário.
4. **Configurar servidor web:**
   - Aponte o DocumentRoot para a pasta `prd` ou `sml` conforme o painel desejado.
5. **Acesse via navegador:**
   - Interface administrativa: `/Gerenciador.php`
   - Painel de exibição: `/Painel.php`

**EN:**
1. **Prerequisites:** PHP 7+, PostgreSQL 9.6+, web server (e.g., Apache/Nginx)
2. **Restore the database:**
   - Use `basedb.backup` and `datadb.backup` to restore tables and data in PostgreSQL.
3. **Configure database access:**
   - Adjust credentials in `resources/dbconnect.php` if needed.
4. **Configure web server:**
   - Set DocumentRoot to the `prd` or `sml` folder as desired.
5. **Access via browser:**
   - Admin interface: `/Gerenciador.php`
   - Display panel: `/Painel.php`

---

## 👨‍💻 Autor | Author

**PT-BR:**

<div align="center">

**Rodolfo M. F. Abreu**  
Desenvolvedor de software apaixonado por tecnologia, aprendizado contínuo e boas práticas de programação. Sempre em busca de novos desafios e oportunidades para colaborar em projetos inovadores.

[![GitHub](https://img.shields.io/badge/GitHub-rodolfomfabreu-black?style=for-the-badge&logo=github)](https://github.com/salamandery)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Rodolfo%20Abreu-blue?style=for-the-badge&logo=linkedin)](https://linkedin.com/in/rodolfo-marques-ferreira-de-abreu/)

Sinta-se à vontade para entrar em contato para dúvidas, sugestões ou colaborações!

</div>

**EN:**

<div align="center">

**Rodolfo M. F. Abreu**  
Software developer passionate about technology, continuous learning, and best programming practices. Always looking for new challenges and opportunities to collaborate on innovative projects.

[![GitHub](https://img.shields.io/badge/GitHub-rodolfomfabreu-black?style=for-the-badge&logo=github)](https://github.com/salamandery)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Rodolfo%20Abreu-blue?style=for-the-badge&logo=linkedin)](https://linkedin.com/in/rodolfo-marques-ferreira-de-abreu/)

Feel free to get in touch for questions, suggestions, or collaborations!

</div>

---

<div align="center">
  <b>Feito com 💙 para painéis digitais dinâmicos.<br/>
  Made with 💙 for dynamic digital panels.</b>
</div>

---

<div align="center" id="english-version">
  <b>🇺🇸 English version above | <a href="#top">🇧🇷 Versão em português acima</a></b>
</div>