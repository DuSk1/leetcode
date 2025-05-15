## [23. Merge K Sorted Lists](https://leetcode.com/problems/merge-k-sorted-lists/description/)

You are given an array of k linked-lists lists, each linked-list is sorted in ascending order.

Merge all the linked-lists into one sorted linked-list and return it.

**Example 1:**

Input: lists = [[1,4,5],[1,3,4],[2,6]]
Output: [1,1,2,3,4,4,5,6]
Explanation: The linked-lists are:
[
1->4->5,
1->3->4,
2->6
]
merging them into one sorted list:
1->1->2->3->4->4->5->6


**Example 2:**

Input: lists = []
Output: []

**Example 3:**

Input: lists = [[]]
Output: []


Constraints:

* k == lists.length
* 0 <= k <= 104
* 0 <= lists[i].length <= 500
* -104 <= lists[i][j] <= 104
* lists[i] is sorted in ascending order.
* The sum of lists[i].length will not exceed 104.

### Complexity
Time complexity: O(n), где n - total number of elements in all lists.

Memory complexity: O(1)

### Пояснения
Dummy ноду можно использовать для упрощения кода. При этом, важно не забыть вернуть dummy.next в качестве результата.
Обычно, dummy нода используется, когда мы хотим удалить первый элемент из списка.
И второе, когда мы не знаем к кому цеплять.
