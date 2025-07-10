# Sistema de Comunicados ao Corpo Clínico

Este projeto foi desenvolvido para facilitar a publicação e visualização de comunicados internos do hospital, especialmente voltados ao corpo clínico. Ele conta com uma área administrativa para gerenciar comunicados e uma interface pública para visualização por médicos.

## 🛠 Tecnologias Utilizadas

- PHP 8.x
- Laravel 11
- Laravel Breeze (autenticação simples)
- SQLite (banco de dados local e leve)
- Blade (sistema de templates do Laravel)
- Bootstrap 5 (via CDN)
- Trix Editor (edição de texto enriquecido)
- Laravel Pagination (paginação nativa)

## 🔐 Funcionalidades

### Administração (área interna)
- Login protegido (usuários com is_admin = true)
- Cadastro, edição e exclusão de comunicados
- Marcação de comunicados como **URGENTES**
- Filtros por:
  - Termo (título ou conteúdo)
  - Urgência
  - Período (data início/fim)
- Paginação com exibição amigável
- Destaque visual para comunicados urgentes
- Layout responsivo baseado nas cores da identidade visual do hospital

### Visualização pública
- Lista de comunicados recentes com botão "Ler mais"
- Página individual de leitura
- Exibição de data e hora de publicação

## 📂 Estrutura
- `routes/web.php` – rotas públicas e protegidas
- `app/Http/Controllers/ComunicadoController.php` – lógica do CRUD
- `resources/views/comunicados` – telas para visualização e edição
- `resources/views/layouts/app.blade.php` – layout principal com Bootstrap, logotipo e rodapé institucional

## 📌 Próximas Melhorias
- Confirmação de leitura por médicos
- Estatísticas no painel admin (total, urgentes, lidos)
- Envio de comunicados por e-mail
- Upload de arquivos e anexos
- Exportar comunicado em PDF
- Log de atividades de usuários

---

**Desenvolvido por:** [Igor Dias]

Link do projeto: [https://github.com/ihfdias/comunicados-clinicos](https://github.com/ihfdias/comunicados-clinicos)
