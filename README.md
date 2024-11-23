# **Sistema de Cadastro e Vendas - JP Veiculos 1.1.0**

## **Descrição Geral**
O sistema de cadastro e vendas JP Veículos é uma aplicação desenvolvida em PHP E MYSQL, para gerenciar de forma eficiente clientes, veículos, vendedores, vendas e pagamentos em uma loja de veículos. Ele permite cadastrar, editar, excluir e visualizar informações relacionadas, fornecendo relatórios detalhados sobre os itens que foram cadastrados no sistema.

---

## **Funcionalidades Principais**

1. **Gestão de Clientes**  
   - Cadastro de novos clientes com informações detalhadas (nome, email, telefone).  
   - Edição e exclusão de dados de clientes cadastrados.  
   - Listagem dos clientes no relatório.  

2. **Gestão de Veículos**  
   - Registro de veículos, incluindo informações como modelo, marca, ano e preço.  
   - Atualização de informações de veículos.  
   - Exclusão de veículos.  
   - Exibição do inventário em relatórios.  

3. **Gestão de Vendas**  
   - Registro de vendas vinculando clientes e veículos, com atribuição de vendedores responsáveis.  
   - Controle da data e do valor de cada venda.  
   - Atualização e exclusão de registros de vendas.  
   - Visualização detalhada das vendas realizadas, por meio do relatório.  

4. **Controle de Pagamentos**  
   - Registro de pagamentos associados a vendas.   
   - Atualização do valor pago e outros detalhes financeiros.  
   - Exclusão de registros de pagamento, mantendo o histórico de vendas.  

5. **Relatórios e Navegação**  
   - Relatórios organizados com:
     - Lista de clientes cadastrados.
     - Inventário de veículos.
     - Informações de vendas e pagamentos.  
   - Navegação intuitiva por meio de um menu principal, localizado na parte superior da tela.
     
---

## **Tecnologias Utilizadas**

- **Linguagem de Programação:** PHP  
- **Banco de Dados:** MySQL  
- **Frontend:** HTML, CSS e Bootstrap  
- **Servidor Local:** XAMPP (Apache e MySQL (PHPMyAdmin))

---

## **Divisão em Sprints**

1. **Sprint 1: Configuração do Ambiente e Estrutura Inicial**  
   - Configuração do servidor local com XAMPP.  
   - Criação do banco de dados MySQL com as tabelas `clientes`, `veiculos`, `vendas`, `vendedores` e `pagamentos`, além dos relacionamentos básicos.  
   - Desenvolvimento inicial das telas de cadastro para clientes, veículos, vendas e pagamentos.  
   - Configuração do arquivo `conexao.php` para conectar o sistema ao banco de dados.  

2. **Sprint 2: Implementação de Relatórios**  
   - Desenvolvimento de relatórios para listar os dados cadastrados:
     - Clientes registrados.  
     - Veículos registrados.  
     - Vendas realizadas e seus respectivos pagamentos.  
   - Testes para garantir que os dados exibidos no relatório correspondam ao banco de dados.  

3. **Sprint 3: Adição do Menu Principal**  
   - Implementação de um menu principal, localizado na parte superior da tela para organizar a navegação entre as telas do sistema.  
   - Ajustes no layout para melhorar a usabilidade, utilizando CSS para estilização.  
   - Testes da navegação entre páginas para evitar erros de carregamento.  

4. **Sprint 4: Funcionalidade de Edição**  
   - Adição da funcionalidade de edição de registros por meio de botões na tela de relatórios:  
     - Clientes: edição de informações como nome, email e telefone.  
     - Veículos: atualização de detalhes ou modificação das informações.  
     - Vendas e pagamentos: ajuste de dados registrados, como valores, datas e etc.  

5. **Sprint 5: Funcionalidades de Exclusão e Refinamento Final**  
   - Desenvolvimento da funcionalidade de exclusão de registros por meio de botões na tela de relatórios.    
   - Realização de testes finais em todas as funcionalidades do sistema.  
   - Ajustes finais no design e na organização do código.
   - Criação do arquivo README.

---

# **Manual de Uso do Sistema**

Este manual explica como utilizar o sistema de cadastro e vendas **JP Veículos**, abordando navegação, funcionalidades principais e instruções para executar tarefas como cadastro, edição, exclusão e geração de relatórios.

---

## **Navegação pelo Sistema**

### **Menu Principal**
Após acessar o sistema, a tela inicial é aberta possuindo um menu principal que será exibido na parte superior da tela. Ele contém links para as funcionalidades principais:
- **Cadastro de Clientes**
- **Cadastro de Veículos**
- **Cadastro de Vendas**
- **Relatórios Gerenciais**

Clique na opção desejada para navegar entre as páginas.

---

## **Funcionalidades**

### **1. Cadastro**
Cada seção (Clientes, Veículos, Vendas) permite cadastrar novos registros.

- **Clientes:**
  - Preencha informações como nome, telefone, e email.
  - Clique em **Salvar** para registrar o cliente.

- **Veículos:**
  - Insira dados como modelo, marca, ano e preço.
  - Clique em **Salvar** para adicionar o veículo.

- **Vendas:**
  - Digite o cliente e um veículo previamente cadastrados.
  - Informe os detalhes da venda.
  - Clique em **Salvar** para concluir.

### **2. Relatórios**
Na tela de relatórios, você pode:
- Visualizar dados organizados de:
  - Clientes cadastrados.
  - Veículos cadastrados.
  - Vendas realizadas e pagamentos registrados.

### **3. Edição de Registros**
Na tela de relatórios, é possível editar registros:
- Clique no botão **Editar** ao lado do registro desejado.
- Atualize as informações nos campos.
- Salve as informações que deseja editar.

### **4. Exclusão de Registros**
Para excluir um registro:
- Na tela de relatórios, clique no botão **Excluir** ao lado do registro.
- Confirme a ação.

---

### **Versionamento**

#### **Versão 1.0.0 - Primeira Versão: Cadastro e Relatório**
A versão inicial do sistema (1.0.0) incluiu as funcionalidades principais de **cadastro** e **relatórios**:

- **Cadastro de Clientes**: Permitia adicionar informações sobre os clientes.
- **Cadastro de Veículos**: Permitindo o registro de veículos disponíveis para venda.
- **Cadastro de Vendas**: Associando clientes e veículos em uma venda.
- **Relatórios**: Exibição de todos os dados cadastrados, com filtros para consulta.

Esta versão foi focada em registrar e visualizar dados, sem funcionalidades para **edição** ou **exclusão** de registros.

#### **Versão 1.1.0 - Incremento: Menu, Edição e Exclusão de Dados**
Na versão 1.1.0, foram implementadas melhorias nas funcionalidades:

- **Menu Principal**: Foi adicionado um menu de navegação para tornar a interface mais organizada e facilitar o acesso às diferentes seções do sistema.
- **Edição de Dados**: Agora é possível editar os registros de **clientes**, **veículos**, **vendas** e **pagamentos** a partir de botões na tela de relatórios, permitindo atualizações rápidas e simples.
- **Exclusão de Dados**: Foi implementada a funcionalidade de **exclusão** de registros.

---

# **Diagrama do Banco de Dados**

![tabela png](https://github.com/user-attachments/assets/d259ef74-354d-4896-9150-df52c963cce7)

---

## **Contribuidores**
- Desenvolvedor: **João Pedro da Costa Januário**
- Linguagem utilizada: **PHP**, **MYSQL**
