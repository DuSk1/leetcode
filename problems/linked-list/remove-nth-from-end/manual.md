Тут код для оптимального решения + описание (ДНЕВНИК РЕШЕНИЙ)
## [19. Remove Nth Node From End of List](https://leetcode.com/problems/remove-nth-node-from-end-of-list/description/)

### Интуиция

Чтобы удалить n-й узел из конца односвязного списка, мы можем использовать концепцию двух указателей. Один указатель будет перемещаться по списку на n+1 шаг вперёд, а другой указатель будет начинаться с начала. Затем оба указателя будут перемещаться одновременно, пока первый указатель не достигнет конца списка. В этот момент второй указатель будет указывать на узел непосредственно перед удаляемым.

### Подход

1. Создайте фиктивный узел и установите его следующий указатель на начало заданного связанного списка. Это помогает в крайних случаях, когда может потребоваться удалить начало списка.
2. Инициализируйте два указателя, первый и второй, изначально указывающие на фиктивный узел.
3. Переместите первый указатель вперед на n + 1 шаг.
4. Перемещайте оба указателя одновременно до тех пор, пока первый указатель не достигнет конца списка.
5. Измените следующий указатель узла, на который указывает второй указатель, чтобы удалить n-й узел с конца.
6. Верните следующий указатель фиктивного узла, который указывает на изменённый связанный список.

### Сложность

* Временная сложность равна O(n), где n — количество узлов в связанном списке. Мы дважды проходим по списку с помощью двух указателей, но оба указателя перемещаются не более чем на n шагов.
* Сложность по памяти равна O(1), так как мы используем только постоянное количество дополнительного пространства для указателей.