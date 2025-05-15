Тут код для оптимального решения + описание (ДНЕВНИК РЕШЕНИЙ)
## [234. Palindrome Linked List](https://leetcode.com/problems/palindrome-linked-list/description/)
## [Решение](https://leetcode.com/problems/palindrome-linked-list/submissions/1110809837/)

Учитывая, что head это односвязный список, верните true если это палиндром или false в противном случае.

Пример 1:

Ввод: head = [1,2,2,1]
Вывод: true

Пример 2:
Ввод: head = [1,2]
Вывод: false

Ограничения:

Количество узлов в списке находится в диапазоне [1, 105].

0 <= Node.val <= 9


### Complexity
Time complexity: O(n)

Space complexity: O(1)

```python
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next

class Solution:
    # in:  1 -> 2 -> 3 -> None
    # out: 3 -> 2 -> 1 -> None
    # time: O(n)
    # mem: O(1)
    def reverseList(self, head: Optional[ListNode]) -> Optional[ListNode]:
        prev = None
        curr = head
        while curr:
            tmp = curr
            curr = curr.next
            tmp.next = prev
            prev = tmp
        return prev

    # in:     1  ->  2  ->  3
    # out:          mid

    # in:     1  ->  2  ->  3  ->  4
    # out:                 mid

    # time: O(n)
    # mem: O(1)
    def middleNode(self, head: Optional[ListNode]) -> Optional[ListNode]:
        # изначально ставим slow и fast на голову
        slow = head # будем двигать на 1 вперед
        fast = head # будем двигать на 2 вперед

        while fast and fast.next:
            slow = slow.next
            fast = fast.next.next
        return slow

    # time: O(n)
    # mem: O(1)
    def isPalindrome(self, head: Optional[ListNode]) -> bool:
        first_half_end_node = self.middleNode(head)
        second_half_begin_node = self.reverseList(first_half_end_node)

        p1 = head
        p2 = second_half_begin_node
        # тут важно понимать как будет выглядеть связный список после манипуляций c поворотом
        
        #      p1            p2
        # in:  1  ->  2  ->  3
        # out: 1  ->  2  <-  3
        #            /
        #     None <|
        # т е из "2" идет в None

        #      p1                   p2
        # in:  1  ->  2  ->  3  ->  4
        # out: 1  ->  2  <-  3  <-  4
        #                   /
        #            None <|

        # теперь очевидно, что мы должны сравнивать значения в
        # нодах p1 и p2 пока p2 не станет None

        while p2 and p1:
            if p1.val != p2.val:
                return False
            p1 = p1.next
            p2 = p2.next
            
        # по желанию можно вернуть список в изначальное состояние
        return True
```