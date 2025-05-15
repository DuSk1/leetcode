<?php
/**
 *
 * Учитывая, что head является связанным списком, удалите узел nth из конца списка и верните его начало.
 * v
 * () -> (1) -> (2) -> (3) -> (4) -> (5) -> null
 *
 * n = 2
 * diff = n + 1
 *
 * Пример 1:
 * Ввод: head = [1,2,3,4,5], n = 2
 * Вывод: [1,2,3,5]
 *
 * () -> (1) -> (2) -> (3) -> (4) -> (5) -> null
 *
 * () -> (2) -> (3) -> (5) -> null
 *
 * Пример 2:
 * Ввод: head = [1], n = 1
 *
 * () -> (1) -> null
 *
 * Вывод: []
 *
 * Пример 3:
 * Ввод: head = [1,2], n = 1
 *
 * () -> (1) -> (2) -> null
 *
 * (1) -> (2) -> null
 *
 * Вывод: [1]
 *
 * time O(n)
 * space O(1)
 *
 * Временная сложность: временная сложность равна O(n), где n — количество узлов в связанном списке. Мы дважды проходим по списку с помощью двух указателей, но оба указателя перемещаются не более чем на n шагов.
 *
 * Сложность по памяти равна O(1), так как мы используем только постоянное количество дополнительного пространства для указателей.
 */


class ListNode
{
    public function __construct(
        public int $val = 0,
        public ?ListNode $next = null
    ) {}
}

class Solution19
{
    public function removeNthFromEnd(ListNode $head, int $n): ?ListNode
    {
        $dummy = new ListNode();
        $dummy->next = $head;

        $first = $dummy;
        $second = $dummy;

        for ($i = 1; $i <= $n + 1; $i++) {
            $first = $first->next;
        }

        while ($first !== null) {
            $first = $first->next;
            $second = $second->next;
        }

        $second->next = $second->next->next;

        return $dummy->next;
    }
}
