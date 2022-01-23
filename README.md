# apcoders

1. Introdução

O sistema foi desenvolvido com base nos pilares de orientação a objetos, portanto as classes Inquilinos, Unidades e Despesas nortearam a estrutura das regras de negócio.

Estas entidades estão relacionadas no banco de dados de modo que uma despesa é atribuída a uma determinada unidade, que por sua vez está associada a um inquilino (ou proprietário).

NOTA: As palavras inquilino e proprietário foram consideradas como sendo equivalentes para que a relação entre as entidades pudesse ser realizada.

A linguagem de programação utilizada na grande parte do sistema foi PHP, com alguns scripts em JavaScript para que se pudesse realizar a interação com o usuário.

2. Do Funcionamento

Conforme já exposto anteriormente, as entidades são relacionadas e para que o sistema funcione adequadamente a primeira entidade a ser cadastrada é o INQUILINO.

Após a introdução de um ou mais inquilinos, é possível cadastrar a(s) UNIDADES, onde existirá em um "dropdown" a relação de inquilinos cadastrada no sistema para que a mesma seja atribuída de forma relacional no banco de dados.

De forma semelhante as DESPESAS devem ser cadastradas após o cadastro da(s) unidade(s), onde a despesa será associada no banco de dados a uma determinada unidade.

Desta forma, um inquilino (ou proprietário) poderá ter nenhuma, uma ou mais unidades associadas a ele. Em outras palavras, a relação entre o tabela de inquilinos e a tabela de unidades é de um para muitas. Uma unidade, por sua vez, pode ter nenhuma, uma ou mais despesas associadas a ela, sendo a relação entre a tabela de unidades e a tabela de despesas também de uma para muitas.

3. Instruções para rodar a aplicação

Como primeiro passo, um sistema de servidor local com banco de dados deve ser lançado (Apache e MySql) ou um servidor externo deve ser utilizado para hospedar a aplicação. Após, o banco de dados deve ser criado através da instrução SQL (apcoders.sql) que está juntamente com os demais arquivos do sistema. 

Em seguida deve ser verificado se as configurações do arquivo existente em controller/conexao.php estão adequadas com relação ao servidor local ou externo.

Após, o sistema pode ser utilizado de acordo com as regras de funcionamento, conforme item 2.

