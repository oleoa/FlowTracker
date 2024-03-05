FlowTracker
===========

A simple expense and income tracker

## Technologies
- Github
- Composer
- Npm
- Laravel
- MySql
- Digital Ocean

## Install and Run
1. Clone the repository
```bash
git clone
composer i
npm i
./s.sh
```

## Ideias:

Expenses/Income sheet.

Add expense button.

Bottom navbar for smartphone.

Left Sidebar for computer.

Calendário de quanto gastei em cada dia.

## Como funciona / Conceito básico

Quero conseguir saber quanto tenho no momento.

Quero conseguir criar expenses recorrentes e não recorrentes.

Quero conseguir criar income recorrentes e não recorrentes.

Cada income ou expense tem um nome, uma categoria, um valor, se se repete ou não e se sim com qual frequência e em que dia.

Cada categoria tem um nome, um tipo (expense ou income), o user que criou essa categoria (0) para default ou do sistema.

Cada user tem um nome, senha, email, telemóvel, imagem e configurações.

Cada user pode criar meta de quanto eles querem gastar mensalmente em geral, ou por categoria (no qual se somará ao geral).

## Páginas

### Dashboard
- O saldo Atual
- Últimos movimentos
- Quanto se recebe e quanto se gasta mensalmente
- Gráfico da quantia de dinheiro por dia nos últimos 30 dias e mais

### Expenses
- Total de quanto se gastou até agora (soma dos outros 3)
- Total de quanto se gasta mensalmente com frequência sem fim
- Total de quanto se gasta mensalmente com frequência com fim
- Total de quanto se gasta nesse mês
- Lista de despesas detalhadas
- Adicionar despesa

### Incomes
### Settings
### Categories
### Goals

## Como vai funcionar
A página inicial vai apresentar o saldo atual, quero a aplicação a mostrar sempre o quanto tenho na conta por somar os incomes e subritrair das expenses somadas, assim sempre apresento um valor real e que pode ser alterado alterando o passado.

Cada expense (ou income como os dois são a mesma coisa mas opostos) pode ser eventual, o que é mais fácil de controlar, ou repetitivo, nesse caso o problema surge para como vamos calcular essas coisas. O meu app no momento cria todas as instâncias dessa repetição até o dia de hoje (relativamente com a frequência), mas depois para de criar, então no momento estou com alguns problemas.

O primeiro problema é não criar mais instâncias depois automáticamente, posso corrigir isso por adicionar um check toda vez que o user entra numa dessas páginas, como dashboard ou expenses, e calcula se precisa adicionar novas instâncias e quais.

O segundo problema é se eu quiser parar de pagar uma que não tem fim, posso apagar algumas soltas mas não parar de vez de pagar, mas isso acho que é problema do user, para apagar a primária e depois criar outra no lugar que termine.