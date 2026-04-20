# 📚 API de Questões

API REST para gerenciamento de questões e registro de respostas de usuários, focada em prática e acompanhamento de desempenho.

---

## 🚀 Funcionalidades

* Autenticação de usuário
* Cadastro e listagem de categorias
* Cadastro de questões com alternativas
* Definição de resposta correta
* Registro de respostas do usuário
* Retorno imediato (acerto/erro + explicação)

---

## 🧠 Regras de Negócio

* Questão deve ter no mínimo 2 alternativas
* Apenas 1 alternativa correta
* Questão deve possuir explicação
* Toda resposta do usuário é registrada

---

## 🏗️ Arquitetura

* Clean Architecture
* Separação em: Domínio, Aplicação, Infraestrutura e Interface
* Baixo acoplamento e alta testabilidade

---

## ⚙️ Tecnologias

* PHP / Laravel
* SQL Server ou PostgreSQL
* API REST

---

## ▶️ Como rodar

```bash
git clone git@github.com:welitonvicente18/api_app_my_question.git
cd api_app_my_question
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 📌 Próximos Passos

* Simulados
* Dashboard de desempenho
* Repetição inteligente
* Gamificação

---

## 👨‍💻 Autor

Weliton Vicente
