## [21. Merge Two Sorted Lists](https://leetcode.com/problems/merge-two-sorted-lists/description/)

You are given the heads of two sorted linked lists list1 and list2.

Merge the two lists into one sorted list. The list should be made by splicing together the nodes of the first two lists.

Return the head of the merged linked list.

**Example 1:**

Input: list1 = [1,2,4], list2 = [1,3,4]
Output: [1,1,2,3,4,4]

**Example 2:**

Input: list1 = [], list2 = []
Output: []

**Example 3:**

Input: list1 = [], list2 = [0]
Output: [0]


Constraints:

* The number of nodes in both lists is in the range [0, 50].
* -100 <= Node.val <= 100
* Both list1 and list2 are sorted in non-decreasing order.


### Complexity
Time complexity: O(n)

Memory complexity: O(1)

### Пояснения
Dummy ноду можно использовать для упрощения кода. При этом, важно не забыть вернуть dummy.next в качестве результата.
Обычно, dummy нода используется, когда мы хотим удалить первый элемент из списка, так как в этом случае нам не нужно хранить ссылку на первый элемент.
И второе, когда мы не знаем к кому цеплять.
